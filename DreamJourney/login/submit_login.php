<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM data_user WHERE email = '$email'";
    $hasil = mysqli_query($db_koneksi, $query);
    $data = mysqli_fetch_array($hasil);

    $pengacak = "p3ng4c4k";
    $passmd = md5($pengacak . md5($password));

    if ($data) {
        $passmd = md5($pengacak . md5($password));
        if ($passmd == $data['password']) {
            $_SESSION['level'] = $data['level'];

            if ($_SESSION['level'] == "admin") {
                header('location:../admin/landing_admin.php');
                exit();
            } else if ($_SESSION['level'] == "user") {
                $_SESSION['email'] = $data['email'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['jenis_kelamin'] = $data['jenis_kelamin'];
                $_SESSION['no_telpon'] = $data['no_telpon'];
                $_SESSION['tgl_lahir'] = $data['tgl_lahir'];

                header('location:../index.php');
                exit();
            }
        } else {
            $error_message = "Email atau password tidak cocok.";
        }
    } else {
        $error_message = "Email tidak ditemukan.";
    }

    if (isset($error_message)) {
        $_SESSION['error_message'] = $error_message;
        header('location: login.php');
        exit();
    }
}
?>