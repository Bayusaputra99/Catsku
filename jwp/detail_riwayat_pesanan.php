<?php
session_start();
$id_pengguna = $_SESSION['id_pengguna'];

require 'function.php';
$pesanan = query("SELECT * FROM tb_pemesanan WHERE id_pengguna='$id_pengguna'");

// ambil data di URL
$id_pemesanan = $_GET["id_pemesanan"];

$detail_pesanan = query("SELECT * FROM tb_sub_pemesanan JOIN tb_produk ON tb_sub_pemesanan.id_produk=tb_produk.id_produk
WHERE tb_sub_pemesanan.id_pemesanan='$_GET[id_pemesanan]'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <title>Detail Riwayat Pesanan</title>
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
        <h3 style="text-align: center;">Detail Riwayat Pesanan</h3>
        <table class="table table-bordered" id="example">
          <thead class="thead-light">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Produk</th>
              <th scope="col">Harga</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Subharga</th>
            </tr>
          </thead>
          <tbody>
            <?php $totalbelanja=0; ?>   
            <?php $i = 1; ?>
            <?php foreach ($detail_pesanan as $row) : ?>
            <?php $subharga1=$row['harga_produk']*$row['jumlah']; ?>
              <tr>
                <td><?= $i; ?></td>
                <td><?= $row["nama_produk"]; ?></td>
                <td>Rp. <?= number_format($row['harga_produk']);?></td>
                <td><?= $row["jumlah"]; ?></td>
                <td>Rp. <?= number_format($row['harga_produk']*$row['jumlah']);?></td>
              </tr>
            <?php $i++; ?>
            <?php $totalbelanja+=$subharga1; ?>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
          <tr>
          <th colspan="4">Total Belanja</th>
          <th>Rp. <?= number_format($totalbelanja) ?></th>
        </tr>
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