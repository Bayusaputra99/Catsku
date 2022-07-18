<?php 
session_start();

$id_produk = $_GET['id_produk'];

if(!isset($_SESSION['role'])) {
    echo "<script>
        alert('Silahkan Registrasi atau Login Terlebih Dahulu');
        document.location.href='registrasi.php';
    </script>";
  }else{
    if (isset($_SESSION['pesanan'][$id_produk]))
    {
	    $_SESSION['pesanan'][$id_produk]+=1;
    }
    else 
    {
	    $_SESSION['pesanan'][$id_produk]=1;
    }
    echo "<script>
            alert('Produk telah masuk ke keranjang');
            document.location.href='keranjang.php';
        </script>";
}
?>