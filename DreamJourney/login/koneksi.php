<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "dreamjourney";

$db_koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$db_koneksi) {
    echo "KONEKSI DATABASE GAGAL!!";
}
?>