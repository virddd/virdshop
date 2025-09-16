


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
                } location.reload();
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
                } location.reload();
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
                } location.reload();
            } else {
                alert('HTTP Error: ' + xhr.status);
            }//location.reload();
        }//location.reload();
    };

    xhr.send(formData);
    return false;
};


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
    if (isNaN(qty) || qty < 1) {
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
                } location.reload();
            } location.reload();
        } location.reload();
    };
    xhr.send(formData);
    return false;
};



function harusLogin() {
    alert('Harap login dahulu');
};


function hapusKeranjang(idProduk) {
    const swalWithTailwindButtons = Swal.mixin({
        customClass: {
            popup: "!rounded-3xl !text-black !font-semibold !scale-80 shadow-xl/50",
            confirmButton: "bg-[#f64301] py-2 px-4 mx-3 rounded-xl text-white font-semibold shadow-md/50 hover:bg-[#d43900] active:bg-[#d43900] transition-all duration-300",
            cancelButton: "bg-neutral-300 py-2 px-4 mx-3 rounded-xl text-black font-semibold shadow-md/50 hover:bg-neutral-400 active:bg-neutral-400 transition-all duration-300"
        },
        buttonsStyling: false
    });
    swalWithTailwindButtons.fire({
        title: "Apakah kamu yakin?",
        text: "Kamu mau hapus produk ini dari keranjang?",
        icon: "warning",
        background: "#fff5e8",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            var xhr = new XMLHttpRequest(); xhr.open("POST", "../service/proses_user.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        console.log('Produk berhasil dihapus dari keranjang');
                    } else {
                        console.log('produk gagal dihapus dari keranjang');
                    }
                };
            };
            xhr.send("id_produk=" + idProduk + "&action=remove_cart");

            swalWithTailwindButtons.fire({
                background: "#fff5e8",
                title: "Terhapus!",
                text: "Produk ini berhasil dihapus",
                icon: "success"
            }).then(() =>
                location.reload()
            )
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithTailwindButtons.fire({
                background: "#fff5e8",
                title: "Dibatalkan",
                text: "Produk ini batal dihapus",
                icon: "error"
            });
            return false;
        }
    });
}


function hapus(idProduk) {
    const swalWithTailwindButtons = Swal.mixin({
        customClass: {
            popup: "!rounded-3xl !text-black !font-semibold !scale-80 shadow-xl/50",
            confirmButton: "bg-[#f64301] py-2 px-4 mx-3 rounded-xl text-white font-semibold shadow-md/50 hover:bg-[#d43900] active:bg-[#d43900] transition-all duration-300",
            cancelButton: "bg-neutral-300 py-2 px-4 mx-3 rounded-xl text-black font-semibold shadow-md/50 hover:bg-neutral-400 active:bg-neutral-400 transition-all duration-300"
        },
        buttonsStyling: false
    });
    swalWithTailwindButtons.fire({
        title: "Apakah kamu yakin?",
        text: "Kamu mau hapus produk ini dari daftar produk?",
        icon: "warning",
        background: "#fff5e8",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            var xhr = new XMLHttpRequest(); xhr.open("POST", "../service/proses.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        console.log('Produk berhasil dihapus dari keranjang');
                    } else {
                        console.log('produk gagal dihapus dari keranjang');
                    }
                };
            };
            xhr.send("id_produk=" + idProduk + "&action=hapus");

            swalWithTailwindButtons.fire({
                background: "#fff5e8",
                title: "Terhapus!",
                text: "Produk ini berhasil dihapus",
                icon: "success"
            }).then(() =>
                location.reload()
            )
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithTailwindButtons.fire({
                background: "#fff5e8",
                title: "Dibatalkan",
                text: "Produk ini batal dihapus",
                icon: "error"
            });
            return false;
        }
    });
}




document.getElementById('edit_produk').addEventListener("submit", function (e) {
    e.preventDefault();
    Swal.fire({
        title: "Do you want to save the changes?",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Save",
        denyButtonText: `Don't save`
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Saved!", "", "success").then(() =>
                this.submit());
        } else if (result.isDenied) {
            Swal.fire("Changes are not saved", "", "info");
        }
    });
})

function logout() {
    // console.log('test');
    const swalWithTailwindButtons = Swal.mixin({
        customClass: {
            popup: "!rounded-3xl !text-black !font-semibold !scale-80 shadow-xl/50",
            confirmButton: "!text-md bg-[#f64301] py-2 px-4 mx-3 rounded-xl text-white font-semibold shadow-md/50 hover:bg-[#d43900] active:bg-[#d43900] transition-all duration-300",
            cancelButton: "!text-md bg-neutral-300 py-2 px-4 mx-3 rounded-xl text-black font-semibold shadow-md/50 hover:bg-neutral-400 active:bg-neutral-400 transition-all duration-300"
        },
        buttonsStyling: false
    });
    swalWithTailwindButtons.fire({
        title: "Yakin mau keluar?",
        //text: "Kamu mau hapus produk ini?",
        icon: "warning",
        background: "#fff5e8",
        showCancelButton: true,
        confirmButtonText: "Ya, keluar!",
        cancelButtonText: "Batal!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {

            var xhr = new XMLHttpRequest();

            xhr.open("POST", "../service/proses_user.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        //alert('Berhasil keluar!');
                        
                    } else {
                        //alert('gagal keluar');
                    }
                }
            };
            

            xhr.send("akun=keluar&action=keluar");

            swalWithTailwindButtons.fire({
                confirmButtonText: "Ya",
                background: "#fff5e8",
                title: "Berhasil keluar!",
                //text: "Produk ini berhasil dihapus",
                icon: "success",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "../index.php";
                    //location.reload();
                    }
            });

            
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithTailwindButtons.fire({
                background: "#fff5e8",
                title: "Batal keluar",
                //text: "Produk ini batal dihapus",
                icon: "error"
            });
            return false;
        }
    })
}
function logoutUser() {
    // console.log('test');
    const swalWithTailwindButtons = Swal.mixin({
        customClass: {
            popup: "!rounded-3xl !text-black !font-semibold !scale-80 shadow-xl/50",
            confirmButton: "!text-md bg-[#f64301] py-2 px-4 mx-3 rounded-xl text-white font-semibold shadow-md/50 hover:bg-[#d43900] active:bg-[#d43900] transition-all duration-300",
            cancelButton: "!text-md bg-neutral-300 py-2 px-4 mx-3 rounded-xl text-black font-semibold shadow-md/50 hover:bg-neutral-400 active:bg-neutral-400 transition-all duration-300"
        },
        buttonsStyling: false
    });
    swalWithTailwindButtons.fire({
        title: "Yakin mau keluar?",
        //text: "Kamu mau hapus produk ini?",
        icon: "warning",
        background: "#fff5e8",
        showCancelButton: true,
        confirmButtonText: "Ya, keluar!",
        cancelButtonText: "Batal!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {

            var xhr = new XMLHttpRequest();

            xhr.open("POST", "service/proses_user.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        //alert('Berhasil keluar!');
                        
                    } else {
                        //alert('gagal keluar');
                    }
                }
            };
            

            xhr.send("akun=keluar&action=keluar");

            swalWithTailwindButtons.fire({
                background: "#fff5e8",
                title: "Berhasil keluar!",
                //text: "Produk ini berhasil dihapus",
                icon: "success",
            }).then((result) => {
                if (result.isConfirmed) {
                    //window.location.href = "../index.php";
                    location.reload();}
            });

            
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithTailwindButtons.fire({
                background: "#fff5e8",
                title: "Batal keluar",
                //text: "Produk ini batal dihapus",
                icon: "error"
            });
            return false;
        }
    })
}

