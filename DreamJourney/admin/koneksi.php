<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "dreamjourney";

$koneksi = mysqli_connect($host, $user, $pass);
$db_koneksi = mysqli_select_db($koneksi, $db);

if (!$db_koneksi) {
    echo "KONEKSI DATABASE GAGAL!!";
}
?>