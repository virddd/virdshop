<?php
session_start();
include "../service/database.php";

class POSCart {
    private $db;
    private $kasir_id;
    private $session_id;
    
    public function __construct($database, $kasir_id) {
        $this->db = $database;
        $this->kasir_id = $kasir_id;
        $this->session_id = session_id();
        
        // Buat session ID unik jika belum ada
        if (empty($this->session_id)) {
            session_regenerate_id();
            $this->session_id = session_id();
        }
    }
    
    /**
     * Tambah produk ke keranjang (disimpan ke database)
     */
    public function addToCart($produk_id, $jumlah = 1, $level_pedas = 'lv0') {
        try {
            // Cek apakah produk sudah ada di keranjang sementara
            $stmt = $this->db->prepare("
                SELECT id, jumlah FROM temp_transactions 
                WHERE session_id = ? AND kasir_id = ? AND produk_id = ?
            ");
            $stmt->bind_param("sii", $this->session_id, $this->kasir_id, $produk_id);
            $stmt->execute();
            $result = $stmt->get_result();
            
            // Ambil harga produk dari master
            $stmt_harga = $this->db->prepare("SELECT harga_produk FROM data_produk WHERE id_produk = ?");
            $stmt_harga->bind_param("i", $produk_id);
            $stmt_harga->execute();
            $harga_result = $stmt_harga->get_result();
            $harga_data = $harga_result->fetch_assoc();
            $harga = $harga_data['harga_produk'];
            
            if ($result->num_rows > 0) {
                // Update jumlah jika sudah ada
                $existing = $result->fetch_assoc();
                $new_jumlah = $existing['jumlah'] + $jumlah;
                
                $stmt_update = $this->db->prepare("
                    UPDATE temp_transactions 
                    SET jumlah = ?, updated_at = NOW() 
                    WHERE id = ?
                ");
                $stmt_update->bind_param("ii", $new_jumlah, $existing['id']);
                $stmt_update->execute();
                
            } else {
                // Insert baru
                $stmt_insert = $this->db->prepare("
                    INSERT INTO temp_transactions (session_id, kasir_id, produk_id, jumlah, harga, level_pedas)
                    VALUES (?, ?, ?, ?, ?, ?)
                ");
                $stmt_insert->bind_param("siiids", 
                    $this->session_id, $this->kasir_id, $produk_id, 
                    $jumlah, $harga, $level_pedas
                );
                $stmt_insert->execute();
            }
            
            // Update session untuk performa (optional)
            $this->syncToSession();
            
            // Log aktivitas
            $this->logActivity("ADD_TO_CART", "Tambah produk $produk_id ke keranjang");
            
            return true;
            
        } catch (Exception $e) {
            error_log("Error adding to cart: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Ambil isi keranjang dari database
     */
    public function getCartItems() {
        $stmt = $this->db->prepare("
            SELECT t.*, p.nama_produk, p.gambar_produk 
            FROM temp_transactions t
            JOIN data_produk p ON t.produk_id = p.id_produk
            WHERE t.session_id = ? AND t.kasir_id = ?
            ORDER BY t.created_at ASC
        ");
        $stmt->bind_param("si", $this->session_id, $this->kasir_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $items = [];
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
        
        return $items;
    }
    
    /**
     * Hapus item dari keranjang
     */
    public function removeFromCart($produk_id) {
        $stmt = $this->db->prepare("
            DELETE FROM temp_transactions 
            WHERE session_id = ? AND kasir_id = ? AND produk_id = ?
        ");
        $stmt->bind_param("sii", $this->session_id, $this->kasir_id, $produk_id);
        $success = $stmt->execute();
        
        if ($success) {
            $this->syncToSession();
            $this->logActivity("REMOVE_FROM_CART", "Hapus produk $produk_id dari keranjang");
        }
        
        return $success;
    }
    
    /**
     * Update jumlah produk
     */
    public function updateQuantity($produk_id, $jumlah_baru) {
        if ($jumlah_baru <= 0) {
            return $this->removeFromCart($produk_id);
        }
        
        $stmt = $this->db->prepare("
            UPDATE temp_transactions 
            SET jumlah = ?, updated_at = NOW()
            WHERE session_id = ? AND kasir_id = ? AND produk_id = ?
        ");
        $stmt->bind_param("isii", $jumlah_baru, $this->session_id, $this->kasir_id, $produk_id);
        $success = $stmt->execute();
        
        if ($success) {
            $this->syncToSession();
            $this->logActivity("UPDATE_QUANTITY", "Update jumlah produk $produk_id menjadi $jumlah_baru");
        }
        
        return $success;
    }
    
    /**
     * Hitung total keranjang
     */
    public function getTotal() {
        $stmt = $this->db->prepare("
            SELECT SUM(jumlah * harga) as total 
            FROM temp_transactions 
            WHERE session_id = ? AND kasir_id = ?
        ");
        $stmt->bind_param("si", $this->session_id, $this->kasir_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        return $row['total'] ?? 0;
    }
    
    /**
     * Proses checkout - pindah ke transaksi final
     */
    public function checkout($customer_name = '', $payment_method = 'cash', $payment_amount = 0) {
        try {
            $this->db->begin_transaction();
            
            // Generate transaction code
            $transaction_code = 'TRX' . date('Ymd') . sprintf('%04d', rand(1, 9999));
            
            $total = $this->getTotal();
            $change = $payment_amount - $total;
            
            // Insert ke tabel transactions
            $stmt_trans = $this->db->prepare("
                INSERT INTO transactions (transaction_code, kasir_id, customer_name, 
                                        total_amount, payment_method, payment_amount, 
                                        change_amount, status)
                VALUES (?, ?, ?, ?, ?, ?, ?, 'completed')
            ");
            $stmt_trans->bind_param("sissddd", 
                $transaction_code, $this->kasir_id, $customer_name,
                $total, $payment_method, $payment_amount, $change
            );
            $stmt_trans->execute();
            
            $transaction_id = $this->db->insert_id;
            
            // Pindah dari temp ke transaction_details
            $cart_items = $this->getCartItems();
            foreach ($cart_items as $item) {
                $stmt_detail = $this->db->prepare("
                    INSERT INTO transaction_details 
                    (transaction_id, produk_id, nama_produk, jumlah, harga_satuan, subtotal, level_pedas)
                    VALUES (?, ?, ?, ?, ?, ?, ?)
                ");
                $subtotal = $item['jumlah'] * $item['harga'];
                $stmt_detail->bind_param("iisidds", 
                    $transaction_id, $item['produk_id'], $item['nama_produk'],
                    $item['jumlah'], $item['harga'], $subtotal, $item['level_pedas']
                );
                $stmt_detail->execute();
            }
            
            // Hapus dari temp_transactions
            $this->clearCart();
            
            $this->db->commit();
            
            $this->logActivity("CHECKOUT", "Checkout berhasil - $transaction_code");
            
            return [
                'success' => true,
                'transaction_code' => $transaction_code,
                'total' => $total,
                'change' => $change
            ];
            
        } catch (Exception $e) {
            $this->db->rollback();
            error_log("Checkout error: " . $e->getMessage());
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
    
    /**
     * Kosongkan keranjang
     */
    public function clearCart() {
        $stmt = $this->db->prepare("
            DELETE FROM temp_transactions 
            WHERE session_id = ? AND kasir_id = ?
        ");
        $stmt->bind_param("si", $this->session_id, $this->kasir_id);
        $success = $stmt->execute();
        
        if ($success) {
            unset($_SESSION['cart_items']);
            $this->logActivity("CLEAR_CART", "Kosongkan keranjang");
        }
        
        return $success;
    }
    
    /**
     * Sinkronisasi ke session untuk performa
     */
    private function syncToSession() {
        $_SESSION['cart_items'] = $this->getCartItems();
        $_SESSION['cart_total'] = $this->getTotal();
    }
    
    /**
     * Log aktivitas kasir
     */
    private function logActivity($action, $description) {
        $ip_address = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        
        $stmt = $this->db->prepare("
            INSERT INTO activity_logs (kasir_id, action, description, ip_address)
            VALUES (?, ?, ?, ?)
        ");
        $stmt->bind_param("isss", $this->kasir_id, $action, $description, $ip_address);
        $stmt->execute();
    }
    
    /**
     * Recovery keranjang dari database (jika session hilang)
     */
    public function recoverCart() {
        $this->syncToSession();
        $this->logActivity("RECOVER_CART", "Recovery keranjang dari database");
    }
}

// CONTOH PENGGUNAAN:

// Inisialisasi
$kasir_id = $_SESSION['kasir_id'] ?? 1; // ID kasir dari login
$cart = new POSCart($db, $kasir_id);

// Tambah ke keranjang
if (isset($_POST['add_to_cart'])) {
    $result = $cart->addToCart($_POST['produk_id'], $_POST['jumlah'], $_POST['level_pedas']);
    echo $result ? "Berhasil ditambahkan" : "Gagal menambahkan";
}

// Tampilkan keranjang
$cart_items = $cart->getCartItems();
$total = $cart->getTotal();
?>

<!-- HTML untuk menampilkan keranjang -->
<div class="cart-items">
    <?php foreach ($cart_items as $item): ?>
        <div class="cart-item">
            <h3><?= htmlspecialchars($item['nama_produk']) ?></h3>
            <p>Harga: Rp <?= number_format($item['harga']) ?></p>
            <p>Jumlah: <?= $item['jumlah'] ?></p>
            <p>Subtotal: Rp <?= number_format($item['jumlah'] * $item['harga']) ?></p>
            
            <!-- Tombol update jumlah -->
            <button onclick="updateQuantity(<?= $item['produk_id'] ?>, <?= $item['jumlah'] + 1 ?>)">+</button>
            <button onclick="updateQuantity(<?= $item['produk_id'] ?>, <?= $item['jumlah'] - 1 ?>)">-</button>
            
            <!-- Tombol hapus -->
            <button onclick="removeItem(<?= $item['produk_id'] ?>)">Hapus</button>
        </div>
    <?php endforeach; ?>
    
    <div class="cart-total">
        <h3>Total: Rp <?= number_format($total) ?></h3>
        <button onclick="checkout()">Checkout</button>
    </div>
</div>