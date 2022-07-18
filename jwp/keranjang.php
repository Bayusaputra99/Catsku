<?php
session_start();
$id_pengguna = $_SESSION['id_pengguna'];
require 'function.php';

if(empty($_SESSION["pesanan"]) OR !isset($_SESSION["pesanan"]))
{
  echo "<script>
        alert('Pesanan kosong, Silahkan Pesan dahulu');
        document.location.href='produk.php';
    </script>";
}


if(isset($_POST["submit_keranjang"])){
  submit_keranjang($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <title>Keranjang</title>
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
            <li><a href="keranjang.php" class="btn btn-secondary">Keranjang</a></li>
            <li><a href="riwayat_pesanan.php">Riwayat Pesanan</a></li>
        </ul>
        <a class="btn btn-outline-light my-2 my-sm-0" type="submit" style="color: white;" href="logout.php">
				Logout
        </a>
    </div>

    <div class="container">
        <h3 style="text-align: center;">Keranjang</h3>
        <table class="table table-bordered" id="example">
            <thead class="thead-light">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Sub Harga</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
              <?php $nomor=1; ?>
              <?php $totalharga = 0; ?>
              <?php foreach ($_SESSION["pesanan"] as $id_produk => $jumlah) : ?>

              <?php 
                $ambil = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk='$id_produk'");
                $pecah = $ambil -> fetch_assoc();
                $subharga = $pecah["harga_produk"]*$jumlah;
              ?>
            <tr>
              <td><?php echo $nomor; ?></td>
              <td><?php echo $pecah["nama_produk"]; ?></td>
              <td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
              <td><?php echo $jumlah; ?></td>
              <td>Rp. <?php echo number_format($subharga); ?></td>
              <td>
                <a href="hapus_keranjang.php?id_produk=<?php echo $id_produk ?>" class="btn btn-danger btn-sm"
                onclick="return confirm ('Pesanan Ini Akan Dihapus, Apakah Kamu Yakin?');">Hapus</a>
              </td>
            </tr>
              <?php $nomor++; ?>
              <?php $totalharga+=$subharga; ?>
              <?php endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="4">Total Belanja</th>
              <th colspan="2">Rp. <?php echo number_format($totalharga) ?></th>
            </tr>
          </tfoot>
          </table>
          <form method="post" action="">
            <input type="hidden" name="totalharga" value="<?= $totalharga?> ">
            <button class="btn btn-success" type="submit" name="submit_keranjang" style="width: 200px;"
              onclick="return confirm ('Apa Kamu Yakin Pesanan Sudah Benar?');">Submit
            </button>
          </form>
    </div>



</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>