<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $kode_destinasi = $_POST['kode_destinasi'];
    $nama_destinasi = $_POST['nama_destinasi'];
    $gambar = $_FILES['gambar']['name'];
    $kode_kategori = $_POST['kode_kategori'];
    $informasi = $_POST['informasi'];
    $harga = $_POST['harga'];
    $kuliner = $_POST['kuliner'];
    $alamat = $_POST['alamat'];
    $map = $_POST['map'];

    $target_dir = "../upload/";
    $target_file = $target_dir . basename($_FILES['gambar']['name']);

    $query = mysqli_query($koneksi, "UPDATE data_destinasi SET nama_destinasi='$nama_destinasi', gambar='$gambar', kode_kategori='$kode_kategori', informasi='$informasi', harga='$harga', kuliner='$kuliner', alamat='$alamat', map='$map' WHERE kode_destinasi='$kode_destinasi'");

    if ($query) {
        // Perform file upload after successful query execution
        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
            // If the update was successful, redirect to destinasi.php
            header("Location: destinasi.php");
            exit();
        } else {
            // If file upload fails, delete the incomplete record or handle the error
            echo "Error moving uploaded file";
        }
    } else {
        // If the query fails, handle the error
        echo "Error updating record: " . mysqli_error($koneksi);
    }
} else {
    // If someone tries to access this script directly without a POST request, handle it accordingly
    echo "Invalid request";
}
?>