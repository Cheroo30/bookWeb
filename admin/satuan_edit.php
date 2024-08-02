<?php
session_start();
include "includes/conn.php";
include "includes/session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if kondisi and id_buku_satuan are provided
    if (isset($_POST['kondisi']) && isset($_POST['id_buku_satuan'])) {
        // Retrieve data from the form
        $kondisi = mysqli_real_escape_string($koneksi, $_POST['kondisi']);
        $idb = mysqli_real_escape_string($koneksi, $_POST['id_buku_satuan']);

        // Use prepared statement to prevent SQL injection
        $update_query = "UPDATE buku_satuan SET kondisi = ? WHERE id_buku_satuan = ?";
        $stmt = mysqli_prepare($koneksi, $update_query);

        // Bind parameters and execute
        mysqli_stmt_bind_param($stmt, "si", $kondisi, $idb);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['successed'] = 'Kondisi updated successfully';
        } else {
            $_SESSION['error'] = mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        // Required fields are missing
        $_SESSION['error'] = 'Kondisi and ID Buku Satuan are required.';
    }
} else {
    // Redirect or show an error message if form is not submitted
    $_SESSION['error'] = 'Form submission error.';
}

header('location: satuan.php'); // Replace 'satuan.php' with the page you want to redirect to
?>
