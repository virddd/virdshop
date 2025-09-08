    const decBtn = document.getElementById('decBtn');
    const incBtn = document.getElementById('incBtn');
    const qtyValue = document.getElementById('qtyValue');
    const totalPrice = document.getElementById('totalPrice');
    const unitPrice = parseInt(document.getElementById('unitPrice').innerText);

    function updateTotal() {
      const qty = parseInt(qtyValue.innerText);
      // Perbarui total harga dan format angka sesuai lokal Indonesia
      totalPrice.innerText = (unitPrice * qty).toLocaleString('id-ID');
    }

    // Penanganan klik tombol plus/minus
    incBtn.addEventListener('click', function() {
      qtyValue.innerText = parseInt(qtyValue.innerText) + 1;
      updateTotal();
    });
    decBtn.addEventListener('click', function() {
      // Math.max memastikan jumlah tidak negatif:contentReference[oaicite:3]{index=3}
      qtyValue.innerText = Math.max(parseInt(qtyValue.innerText) - 1, 0);
      updateTotal();
    });

    // Inisialisasi total saat halaman dimuat
    updateTotal();
