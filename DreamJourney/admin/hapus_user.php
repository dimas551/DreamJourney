<?php
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['email'];

// menghapus data dari database
$query = mysqli_query($koneksi, "DELETE FROM data_user WHERE email='$id'");
if ($query) {
    echo "<script>confirm('Data Berhasil Dihapus!'); window.location = 'user.php'</script>";
} else {
    echo "<script>confirm('Data Gagal Dihapus!'); window.location = 'user.php'</script>";
}