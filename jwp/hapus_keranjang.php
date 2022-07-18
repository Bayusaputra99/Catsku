<?php 
session_start();
 
$id_produk = $_GET["id_produk"];

unset($_SESSION["pesanan"][$id_produk]);

echo "<script>
        alert('Produk Telah Dihapus Dari Keranjang');
        document.location.href='keranjang.php';
    </script>";
?>