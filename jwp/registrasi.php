<?php
session_start();
include 'function.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
      echo "<script>
              alert('Registrasi Berhasil!');
              document.location.href='login.php';
              </script>";
    } else {
      echo "<script>
              alert('Registrasi Gagal!');
              document.location.href='registrasi.php';
              </script>";
    }
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

    <title>Registrasi</title>
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
            <li><a href="registrasi.php" class="btn btn-secondary">Registrasi</a></li>
        </ul>
        <a class="btn btn-outline-light my-2 my-sm-0" type="submit" style="color: white;" href="login.php">
            Login
    </a>
    </div>

    <div class="container">
        <h3>Form Register</h3>
        <br>
        <form action="" method="post">
            <table style="margin-left: 40%;">
                <tr style="height: 50px;">
                    <td style="width: 50%;">Nama</td>
                    <td>        
                        <input type="text" name="nama" placeholder="" required autocomplete="off" onkeypress="return /[a-z ]/i.test(event.key)">
                    </td>
                </tr>
                <tr style="height: 50px;">
                    <td >Alamat</td>
                    <td>        
                        <input type="text" name="alamat" placeholder="" required autocomplete="off">
                    </td>
                </tr>
                <tr style="height: 50px;">
                    <td>No.HP</td>
                    <td>        
                        <input type="number" name="no_hp" placeholder="" required autocomplete="off" onkeypress="return /[0-9]/i.test(event.key)">
                    </td>
                    <tr style="height: 50px;">
                        <td >Email</td>
                        <td>        
                            <input type="email" name="email" placeholder="" required autocomplete="off">
                        </td>
                    </tr>
                    <tr style="height: 50px;">
                        <td >Password</td>
                        <td>        
                            <input type="password" name="password" placeholder="" required autocomplete="off">
                        </td>
                    </tr>
                </tr>
            </table>
            <br>
            <button type="submit" name="register" class="btn btn-primary" style="margin-left: 45%;">Register</button>
            <a style="margin-left: 5%;" href="produk.php" class="btn btn-secondary" >Cancel</a>
        </form>
    </div>



</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>