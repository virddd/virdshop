function logout() {
    // console.log('test');

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