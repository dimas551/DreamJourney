<?php
include 'koneksi.php';

$kode_kategori = $_POST['kode_kategori'];
$kategori = $_POST['kategori'];

// menginput data ke database
mysqli_query($koneksi, "INSERT INTO data_kategori VALUES('','$kategori')");

// mengalihkan halaman kembali ke index.php
header("location:kategori.php");
