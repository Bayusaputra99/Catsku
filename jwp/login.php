<?php
session_start();
include 'function.php';

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM tb_pengguna WHERE email = '$email' AND password = '$password' ");
    $cek = mysqli_num_rows($result);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($result);

        if ($data['role'] == "admin") {
            $_SESSION['role'] = "admin";
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['id_pengguna'] = $data['id_pengguna'];
            header("location:admin.php");
        } else if ($data['role'] == "user") {
            $_SESSION['role'] = "user";
            $_SESSION['nama']  = $data['nama'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['id_pengguna'] = $data['id_pengguna'];
            header("location:produk.php");
        }
    } else {
        $error = true;
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

    <title>Login</title>
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
            <li><a href="registrasi.php">Registrasi</a></li>
        </ul>
        <a class="btn btn-outline-light my-2 my-sm-0" type="submit" style="color: white;" href="login.php">
            Login
    </a>
    </div>

    <div class="container">
        <h3>Login</h3>
        <br>
        <?php if (isset($error)) : ?>
            <p style="color: red;"><br>Username atau Password Salah</p>
        <?php endif; ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Email</label>
                <input type="email" name="email" id="email" class="form-control" style="width: 50%;" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" style="width: 50%;">
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
        <br>
    </div>



</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>