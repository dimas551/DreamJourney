<?php
$email = $_POST['email'];
$username = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tgl_lahir = $_POST['tgl_lahir'];
$no_telpon = $_POST['no_telpon'];
$password1 = $_POST['password'];
$password2 = $_POST['confirm_password'];
$level = "user";

if ($password1 == $password2) {
    include "koneksi.php";

    $pengacak = "p3ng4c4k";

    $passmd = md5($pengacak . md5($password1));

    $query = "INSERT INTO data_user (email, username, jenis_kelamin, tgl_lahir, no_telpon, password, level) VALUES ('$email', '$username', '$jenis_kelamin', '$tgl_lahir', '$no_telpon', '$passmd', '$level')";
    $hasil = mysqli_query($db_koneksi, $query);

    if ($hasil) {
        header("Location: login.php?message=User sudah berhasil terdaftar");
        exit();
    } else {
        header("Location: register.php?message=Email sudah ada yang memiliki");
        exit();
    }
} else {
    header("Location: register.php?message=Password yang dimasukkan tidak sama");
    exit();
}
?>