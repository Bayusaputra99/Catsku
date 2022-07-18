<?php
session_start();

require 'function.php';
$produk = query("SELECT * FROM tb_produk ORDER BY nama_produk");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <title>Daftar Produk</title>
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
        <h3>Produk Makanan</h3>
        <div class="row">
            <?php $i = 1; ?>
            <?php foreach ($produk as $row) : ?>
                <div class="col-md-3">
                    <br>
                    <div class="card">
                        <img src="gambar/<?= $row["foto_produk"]; ?>" width="75" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Preview dari <?= $row["nama_produk"] ?>. Ayo lihat selengkapnya</p>
                            <a href="detail_produk.php?id_produk=<?= $row["id_produk"]; ?>" class="btn btn-warning stretched-link">Detail</a>
                        </div>
                    </div>
                </div>
            <?php $i++; ?>
            <?php endforeach; ?>
        </div>
    </div>



</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>