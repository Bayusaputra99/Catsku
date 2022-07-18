<?php
require 'function.php';

$id_pengguna = $_GET["id_pengguna"];

if (hapus_pengguna($id_pengguna) > 0) {
    echo "<script>
                alert('Pelanggan Berhasil Dihapus');
                document.location.href='pelanggan.php';
            </script>
        ";
} else {
    echo "<script>
                alert('Pelanggan Gagal Dihapus');
                document.location.href='pelanggan.php';
            </script>
        ";
}
