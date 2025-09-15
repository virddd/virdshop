

function tambahKeKeranjang(idProduk) {
    var harga = document.getElementById('harga_' + idProduk).value;
    
    console.log('ID Produk:', idProduk);
    console.log('Harga:', harga);
    
    // Validasi harga
    if (!harga || isNaN(harga) || parseFloat(harga) <= 0) {
        alert('Harga tidak valid');
        return false;
    }
    
    // Gunakan FormData (sama seperti setKuantitas)
    var formData = new FormData();
    formData.append('id_produk', idProduk);
    formData.append('harga', harga);
    formData.append('action', 'add_cart');
    
    // Debug FormData
    console.log('FormData contents:');
    for (let pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "service/proses_user.php", true);
    // JANGAN set Content-Type header untuk FormData, biarkan browser yang set otomatis
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            console.log('Response:', xhr.responseText);
            
            if (xhr.status === 200) {
                if (xhr.responseText.trim() === 'success') {
                    alert('Produk berhasil ditambahkan ke keranjang');
                    location.reload();
                } else {
                    //alert('Gagal: ' + xhr.responseText);
                }location.reload();
            } else {
                alert('HTTP Error: ' + xhr.status);
            }//location.reload();
        }//location.reload();
    };
    
    xhr.send(formData);
    return false;
};


function tambah1(idProduk) {
    var harga = document.getElementById('harga_' + idProduk).value;
    
    console.log('ID Produk:', idProduk);
    console.log('Harga:', harga);
    
    // Validasi harga
    if (!harga || isNaN(harga) || parseFloat(harga) <= 0) {
        alert('Harga tidak valid');
        return false;
    }
    
    // Gunakan FormData (sama seperti setKuantitas)
    var formData = new FormData();
    formData.append('id_produk', idProduk);
    formData.append('harga', harga);
    formData.append('action', 'add_cart');
    
    // Debug FormData
    console.log('FormData contents:');
    for (let pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../service/proses_user.php", true);
    // JANGAN set Content-Type header untuk FormData, biarkan browser yang set otomatis
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            console.log('Response:', xhr.responseText);
            
            if (xhr.status === 200) {
                if (xhr.responseText.trim() === 'success') {
                    //alert('Kuantitas berhasil ditambahkan');
                    location.reload();
                } else {
                    //alert('Gagal: ' + xhr.responseText);
                }location.reload();
            } else {
                alert('HTTP Error: ' + xhr.status);
            }//location.reload();
        }//location.reload();
    };
    
    xhr.send(formData);
    return false;
};


function hapus1(idProduk) {
    var harga = document.getElementById('harga_' + idProduk).value;
    
    console.log('ID Produk:', idProduk);
    console.log('Harga:', harga);
    
    // Validasi harga
    if (!harga || isNaN(harga) || parseFloat(harga) <= 0) {
        alert('Harga tidak valid');
        return false;
    }
    
    // Gunakan FormData (sama seperti setKuantitas)
    var formData = new FormData();
    formData.append('id_produk', idProduk);
    formData.append('harga', harga);
    formData.append('action', 'hapus');
    
    // Debug FormData
    console.log('FormData contents:');
    for (let pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../service/proses_user.php", true);
    // JANGAN set Content-Type header untuk FormData, biarkan browser yang set otomatis
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            console.log('Response:', xhr.responseText);
            
            if (xhr.status === 200) {
                if (xhr.responseText.trim() === 'success') {
                    //alert('Kuantitas berhasil dikurangi');
                    location.reload();
                } else {
                    //alert('Gagal: ' + xhr.responseText);
                }location.reload();
            } else {
                alert('HTTP Error: ' + xhr.status);
            }//location.reload();
        }//location.reload();
    };
    
    xhr.send(formData);
    return false;
};


// function hapus1(idProduk) {
//     var harga = document.getElementById('harga_' + idProduk).value;
//     var xhr = new XMLHttpRequest();
//     xhr.open("POST", "../service/proses_user.php", true);
//     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//     xhr.onreadystatechange = function () {
//         if (xhr.readyState === 4) {
//             if (xhr.status === 200) {
//                 location.reload();
//             } else {
//                 alert('gagal edit kuantitas produk');
//             }
//         };
//     };
//     xhr.send("id_produk=" + idProduk + "&action=hapus" + "&harga=" + harga);
// };


    function handleEnter(event, produk_id) {
        if (event.key === 'Enter') {
            event.preventDefault();
            event.stopPropagation();
            event.stopImmediatePropagation();

            setKuantitas(produk_id);
            return false;
        }
    }


    function setKuantitas(produk_id) {

        //event.preventDefault();
        //event.stopPropagation();

        var kuantitas = document.getElementById('kuantitas_' + produk_id).value;
        var id_produk = document.getElementById('id_produk_' + produk_id).value;
        var qty = parseInt(kuantitas);

        console.log('Kuantitas:', kuantitas); // Debug
        console.log('ID Produk:', id_produk); // Debug
        console.log('processing produk id :', produk_id);

        //var qty = parseInt(kuantitas);
        if (isNaN(qty) || qty < 1 ) {
            alert('Kuantitas tidak valid');
            document.getElementById('kuantitas' + produk_id).focus();
            return false;
        }

        var formData = new FormData();
        formData.append('kuantitas', kuantitas);
        formData.append('id_produk', id_produk);
        formData.append('action', 'set_cart');

    //     console.log('FormData for produk ' + produk_id + ':');
        
    // for (let pair of formData.entries()) {
    //     console.log(pair[0] + ': ' + pair[1]);
    // }

        var xhr = new XMLHttpRequest();

        xhr.open("POST", "../service/proses_user.php", true);
        //xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                console.log('Response for produk ' + produk_id + ':', xhr.responseText);
                
                if (xhr.status === 200) {
                    if (xhr.responseText.trim() === 'success') {
                        // alert('Kuantitas produk berhasil diubah');
                        location.reload();
                        // updateTotalHarga()
                    }location.reload();
                }location.reload();
            }location.reload();
        };
        xhr.send(formData);
        return false;
    };


function logout(idUser) {
    if (confirm('Yakin mau keluar?')) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "service/proses_user.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    alert('Berhasil keluar!');
                    location.reload();
                } else {
                    alert('gagal keluar');
                }
            }
        };
        xhr.send("akun=" + idUser + "&action=keluar");
    }
};


function harusLogin() {
    alert('Harap login dahulu');
};


function hapusKeranjang(idProduk) {
    if (confirm('Yakin mau hapus produk ini dari keranjang?')) {
        var xhr = new XMLHttpRequest(); xhr.open("POST", "../service/proses_user.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    alert('Produk berhasil dihapus dari keranjang');
                    location.reload();
                } else {
                    alert('produk gagal dihapus dari keranjang');
                }
            };
        };
        xhr.send("id_produk=" + idProduk + "&action=remove_cart");
    }
};