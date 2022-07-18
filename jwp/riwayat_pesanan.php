<?php
session_start();
$id_pengguna = $_SESSION['id_pengguna'];

require 'function.php';
$pesanan = query("SELECT * FROM tb_pemesanan WHERE id_pengguna='$id_pengguna'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <title>Riwayat Pesanan</title>
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
            <li><a href="produk.php">Produk</a></li>
            <li><a href="keranjang.php">Keranjang</a></li>
            <li><a href="riwayat_pesanan.php" class="btn btn-secondary">Riwayat Pesanan</a></li>
        </ul>
        <a class="btn btn-outline-light my-2 my-sm-0" type="submit" style="color: white;" href="logout.php">
				Logout
        </a>
    </div>

    <div class="container">
        <h3 style="text-align: center;">Riwayat Pesanan</h3>
        <table class="table table-bordered" id="example">
            <thead class="thead-light">
              <tr>
                <th scope="col">No</th>
                <th scope="col">ID Pesanan</th>
                <th scope="col">Tanggal Pemesanan</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            <?php foreach ($pesanan as $row) : ?>
              <tr>
                <td><?= $i; ?></td>
                <td><?= $row["id_pemesanan"]; ?></td>
                <td><?= $row['tanggal_pemesanan']; ?></td>
                <td><?= $row["total_harga"]; ?></td>
                <td>
                  <a href="detail_riwayat_pesanan.php?id_pemesanan=<?=$row["id_pemesanan"];?>">Detail</a>
                </td>
              </tr>
              <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
            <tfoot>
            </tfoot>
          </table>
    </div>



</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>