<?php
session_start();
include 'function.php';
// ambil id dari URL
$id_pengguna = $_GET["id_pengguna"];
$pengguna= query("SELECT * FROM tb_pengguna WHERE id_pengguna=$id_pengguna")[0];

// cek apakah tombol submit ditekan
if(isset($_POST["submit"])){
  // cek apakah data pengguna berhasil diubah
  if(ubah_pelanggan($_POST)>0){
    echo "<script>
            alert('Data Pelanggan Berhasil Diubah');
            document.location.href='pelanggan.php';
          </script>
        ";
  } else {
    echo "<script>
          alert('Data Pelanggan Gagal Diubah');
          document.location.href='pelanggan.php';
        </script>
      ";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.83.1">
  <title>Ubah Pelanggan</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
  <!-- Custom styles for this template -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/dashboard_admin.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
</head>

<body>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="admin.php">Petsqu Shop</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="admin.php">
                Daftar Produk
              </a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="pelanggan.php">
                Pelanggan
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pesanan.php">
                Pesanan
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">
                Logout
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <h2 style="text-align: center; margin-top: 1%;"><b>Ubah Pelanggan</b></h2>
        <form action="" method="post">
          <table style="margin-left: 30%; margin-top: 1%; margin-bottom: 1%;">
          <input type="hidden" name="id_pengguna" value="<?=$pengguna["id_pengguna"]?>">
            <tr style="height: 50px;">
                <td style="width: 40%;">Nama</td>
                <td>        
                <input style="width: 300px;" type="text" name="nama_pengguna" value="<?=$pengguna["nama_pengguna"]?>" onkeypress="return /[a-z ]/i.test(event.key)">
                </td>
            </tr>
            <tr style="height: 50px;">
                <td >Alamat</td>
                <td>        
                    <input style="width: 300px;" type="text" name="alamat" required value="<?=$pengguna["alamat"]?>" >
                </td>
            </tr>
            <tr style="height: 50px;">
                <td>No. HP</td>
                <td>        
                    <input style="width: 300px;" type="number" name="no_hp" required value="<?=$pengguna["no_hp"]?>"  onkeypress="return /[0-9]/i.test(event.key)">
                </td>
            </tr>
            <tr style="height: 50px;">
                <td >Email</td>
                <td>        
                    <input style="width: 300px;" type="email" name="email" placeholder="" value="<?=$pengguna["email"]?>"  disabled>
                </td>
            </tr>
            <tr style="height: 50px;">
                <td >Password</td>
                <td>        
                    <input style="width: 300px;" type="password" name="password" placeholder="" required autocomplete="off">
                </td>
            </tr>
          </table>
          <button class="btn btn-primary" type="submit" style="margin-left: 45%;" name="submit">Submit</button>
          <a class="btn btn-secondary" href="pelanggan.php" style="margin-left: 5%;">Cancel</a>
        </form>
      </main>
    </div>
  </div>

    <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://kit.fontawesome.com/5be3928c9f.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
    $('#example').DataTable();
    } );
  </script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
</body>

</html>

