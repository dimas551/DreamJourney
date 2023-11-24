<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_telpon = $_POST['no_telpon'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $level = $_POST['level'];
    $password = $_POST['password'];

    if ($password) {
        $pengacak = "p3ng4c4k";
        $passmd = md5($pengacak . md5($password));

        mysqli_query($koneksi, "INSERT INTO data_user (email, username, jenis_kelamin, no_telpon, tgl_lahir, password, level) VALUES('$email','$username','$jenis_kelamin','$no_telpon','$tgl_lahir','$passmd','$level')");

        header("location:user.php");
    }
}
?>