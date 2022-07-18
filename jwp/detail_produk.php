<?php
session_start();

require 'function.php';
// ambil data di URL
$id_produk = $_GET["id_produk"];

// query data stocks berdasarkan id
$pilih_produk = query("SELECT * FROM tb_produk WHERE id_produk=$id_produk")[0];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <title>Detail Produk</title>
</head>
<style>
    * {
        padding: 0;
        margin: 0;
    }
    
    .navbar {
        float: left;
        background: #000000;
        width: 100%;
    }
    
    .navbar li {
        float: left;
        list-style: none;
    }
    
    .navbar li a {
        color: #ffffff;
        text-decoration: none;
        padding: 20px;
        display: block;
        font-weight: bold;
    }
    
    .navbar li a:hover {
        background: #ffffff;
        color: #000000;
    }
    
    .central ul {
        width: -moz-fit-content;
        width: -webkit-fit-content;
        width: fit-content;
        margin: auto;
    }
    
    .hero-content h1 {
        text-align: center;
        padding-top: 10%;
    }
    
    .gambar {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>

<body>
    <div class="navbar">
        <ul>
            <li><a href="">PetsQu Shop</a></li>
        </ul>
        <ul style="text-align: center;">
            <li><a href="dashboard.php">Beranda</a></li>
            <li><a href="produk.php" class="btn btn-secondary">Produk</a></li>
            <?php
                if(!isset($_SESSION['role'])) {
            ?>
                <li><a href="registrasi.php">Registrasi</a></li>
            </ul>
            <a class="btn btn-outline-light my-2 my-sm-0" type="submit" style="color: white;" href="login.php">
                    Login
            </a>
            <?php } else {?>
                <li><a href="keranjang.php">Keranjang</a></li>
                <li><a href="riwayat_pesanan.php">Riwayat Pesanan</a></li>
            </ul>
            <a class="btn btn-outline-light my-2 my-sm-0" type="submit" style="color: white;" href="logout.php">
                    Logout
            </a>
            <?php } ?>   
    </div>

    <div class="container">
        <h3>Detail Produk Makanan</h3>
        <table style="margin-bottom: 220px;">
            <img src="gambar/<?=$pilih_produk["foto_produk"]?>" align="left" width="350" style="margin-right: 20px;">
            <br><br>
            <tr>
                <td style="width: 150px;"><b>Nama</b></td>
                <td style="width: 10px;"><b>:</b></td>
                <td><b><?=$pilih_produk["nama_produk"]?></b></td>
            </tr>
            <tr>
                <td><b>Harga</b></td>
                <td><b>:</b></td>
                <td><b><?=$pilih_produk["harga_produk"]?></b></td>
            </tr>
       </table>
        <br>
        <h5 style="margin-top: 20px">Deskripsi Produk Makanan</h5>
        <p style="text-align: justify;"><?=$pilih_produk["deskripsi"]?></p>
        <a href="beli.php?id_produk=<?=$pilih_produk["id_produk"];?>" class="btn btn-success btn-sm btn-block" style="max-width: 300px;">Beli</a>
    </div>



</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>