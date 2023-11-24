<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $kode_kategori = $_POST['kode_kategori'];
    $kategori = $_POST['kategori'];

    // Update the record in the database
    $query = mysqli_query($koneksi, "UPDATE data_kategori SET kategori='$kategori' WHERE kode_kategori='$kode_kategori'");

    if ($query) {
        // If the update was successful, redirect to kategori.php
        header("Location: kategori.php");
        exit();
    } else {
        // If the update fails, handle the error (you can redirect to an error page or display an error message)
        echo "Error updating record: " . mysqli_error($koneksi);
    }
} else {
    // If someone tries to access this script directly without a POST request, handle it accordingly
    echo "Invalid request";
}
?>