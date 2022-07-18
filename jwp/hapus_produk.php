<?php
require 'function.php';

$id_produk = $_GET["id_produk"];

if (hapus_produk($id_produk) > 0) {
    echo "<script>
                alert('Produk Berhasil Dihapus');
                document.location.href='admin.php';
            </script>
        ";
} else {
    echo "<script>
                alert('Produk Gagal Dihapus');
                document.location.href='admin.php';
            </script>
        ";
}
