<?php
// Include the connection file
include 'koneksi.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the POST request
    $nama_destinasi = $_POST['nama_destinasi'];
    $gambar = $_FILES['gambar']['name'];
    $kode_kategori = $_POST['kode_kategori'];
    $kuliner = $_POST['kuliner'];
    $alamat = $_POST['alamat'];
    $map = $_POST['map'];

    $harga_option = $_POST['harga_option'];

    // Determine the 'harga' based on the selected option
    if ($harga_option == 'gratis') {
        $harga = 'GRATIS';
    } elseif ($harga_option == 'custom') {
        // Check if the custom harga input is set and not empty
        if (isset($_POST['harga']) && !empty($_POST['harga'])) {
            $harga = $_POST['harga'];
        } else {
            // If not set or empty, handle the error (you can customize this part)
            echo "Error: Custom harga is required but not provided.";
            exit; // Terminate the script or handle the error accordingly
        }
    }

    $informasi = $_POST['informasi'];
    $informasi_paragraf = '<p>' . implode('</p><p>', explode("\n", $informasi)) . '</p>';

    // Directory to store uploaded files
    $target_dir = "../upload/";
    $target_file = $target_dir . basename($_FILES['gambar']['name']);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
        // Prepare the SQL statement
        $query = "INSERT INTO data_destinasi (nama_destinasi, gambar, kode_kategori, informasi, harga, kuliner, alamat, map) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Create a prepared statement
        $stmt = mysqli_prepare($koneksi, $query);

        if ($stmt) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssisssss", $nama_destinasi, $gambar, $kode_kategori, $informasi_paragraf, $harga, $kuliner, $alamat, $map);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to a specific page after successful insertion
                header("location: destinasi.php");
            } else {
                // If there's an error in the execution of the prepared statement, display an error message
                echo "Error: " . mysqli_stmt_error($stmt);
            }
        } else {
            // If there's an error in preparing the statement, display an error message
            echo "Error: " . mysqli_error($koneksi);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // If there's an error uploading the file, display an error message
        echo "Error uploading file.";
    }
} else {
    // If the request method is not POST, display an error message
    echo "Invalid request method.";
}
?>