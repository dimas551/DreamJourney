<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$email = $_POST['email'];
$username = $_POST['username'];
$tgl_lahir = $_POST['tgl_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$no_telpon = $_POST['no_telpon'];

// update data ke database
mysqli_query($koneksi, "UPDATE data_user SET username='$username', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', no_telpon='$no_telpon' WHERE email='$email'");

// mengalihkan halaman kembali ke index.php
header("location:user.php");