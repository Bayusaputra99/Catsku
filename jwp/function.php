<?php
$conn = mysqli_connect("localhost", "root", "", "db_petsqu");
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data)
{
    global $conn;

    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $no_hp = $data["no_hp"];
    $email = strtolower(stripcslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);

    //email double check
    $result = mysqli_query($conn, "SELECT email FROM tb_pengguna
     WHERE email='$email'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Email Telah Digunakan!')
              </script>";
        return false;
    }

    // //confirmation password check
    // if ($password !== $password2) {
    //     echo "<script>
    //         alert('Konfirmasi Password Tidak Cocok!');
    //         </script>";
    //     return false;
    // }
    
    //insert to database "databasephp"
    mysqli_query($conn, "INSERT INTO tb_pengguna (nama_pengguna, alamat, no_hp, email, password, role) 
    VALUES('$nama', '$alamat', '$no_hp', '$email', '$password',  'user')");

    return mysqli_affected_rows($conn);
}

function upload()
{
    $nameFile = $_FILES['foto_produk']['name'];
    $sizeFile = $_FILES['foto_produk']['size'];
    $error = $_FILES['foto_produk']['error'];
    $tmpName = $_FILES['foto_produk']['tmp_name'];

    // cek ekstensi gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $nameFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    // if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    //     echo "<script>
    //         alert('Harap Masukkan Ekstensi Seperti JPG, JPEG atau PNG!');
    //     </script>";
    //     return false;
    // }

    // setelah pengecekan beberapa kali, gambar(preview) siap upload
    $nameNewFile = uniqid();
    $nameNewFile .= '.';
    $nameNewFile .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'gambar/' . $nameNewFile);

    return $nameNewFile;
}

function tambah_produk($data)
{
    global $conn;
    $nama_produk = $data["nama_produk"];
    $deskripsi = $data["deskripsi"];
    $harga_produk = $data["harga_produk"];

    // upload foto produk
    $foto_produk = upload();
    if (!$foto_produk) {
        return false;
    }

    $query = "INSERT INTO tb_produk (nama_produk, deskripsi, harga_produk, foto_produk) 
    VALUES ('$nama_produk', '$deskripsi' ,'$harga_produk', '$foto_produk')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//ubah data produk di tabel tb_produk
function ubah_produk($data)
{
    global $conn;
    $id_produk = $data["id_produk"];
    $nama_produk = $data["nama_produk"];
    $deskripsi = $data["deskripsi"];
    $harga_produk = $data["harga_produk"];

    $query = "UPDATE tb_produk SET
    nama_produk='$nama_produk', harga_produk='$harga_produk', deskripsi='$deskripsi' WHERE id_produk=$id_produk";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//hapus data di tabel tb_produk
function hapus_produk($id_produk)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_produk WHERE id_produk=$id_produk");
    return mysqli_affected_rows($conn);
}

//hapus data pengguna di tabel tb_pengguna
function hapus_pengguna($id_pengguna)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_pengguna WHERE id_pengguna=$id_pengguna");
    return mysqli_affected_rows($conn);
}

//ubah data pengguna di tabel tb_pengguna
function ubah_pelanggan($data)
{
    global $conn;
    $id_pengguna = $data["id_pengguna"];
    $nama_pengguna = $data["nama_pengguna"];
    $alamat = $data["alamat"];
    $no_hp = $data["no_hp"];
    $password = $data["password"];

    $query = "UPDATE tb_pengguna SET nama_pengguna='$nama_pengguna', alamat='$alamat', no_hp='$no_hp', password='$password' WHERE id_pengguna='$id_pengguna' ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// submit data dari keranjang ke tb_pesanan
function submit_keranjang($data)
{
    global $conn;
    $total_harga = $data["totalharga"];
    $id_pengguna = $_SESSION['id_pengguna'];

    $query = "INSERT INTO tb_pemesanan (id_pengguna, total_harga) VALUES('$id_pengguna', '$total_harga') ";
    mysqli_query($conn, $query);

    // Mendapatkan ID barusan
    $id_terbaru = $conn->insert_id;

    // Menyimpan data ke tb_sub_pesanan      
    foreach ($_SESSION["pesanan"] as $id_produk => $jumlah)
    {
      $insert = mysqli_query($conn, "INSERT INTO tb_sub_pemesanan (id_pemesanan, id_produk, jumlah) 
        VALUES ('$id_terbaru', '$id_produk', '$jumlah') ");
    }          

    unset($_SESSION["pesanan"]);

    echo "<script>
    alert('Submit Berhasil');
    document.location.href='riwayat_pesanan.php';
    </script>
";
}