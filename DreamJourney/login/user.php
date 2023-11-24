<?php
session_start();

if (!isset($_SESSION['level']) || $_SESSION['level'] !== "user") {
    header('location:login.php'); // Redirect jika pengguna tidak memiliki sesi atau level yang sesuai.
    exit();
}
?>