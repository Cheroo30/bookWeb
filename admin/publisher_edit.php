<?php
session_start();
include "includes/session.php";
include "includes/conn.php"; // Include your database connection file

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if publisher ID and publisher name are provided
    if (isset($_POST['publisher_id']) && isset($_POST['nama_penerbit'])) {
        // Retrieve form data
        $publisherId = $_POST["publisher_id"];
        $publisherName = $_POST["nama_penerbit"];
        $publisherAddress = $_POST["alamat_penerbit"];
        $publisherNumber = $_POST["no_telp_penerbit"];
        $publisherEmail = $_POST["email_penerbit"];

        // Use prepared statement to prevent SQL injection
        $update_query = "UPDATE penerbit SET 
            nama_penerbit = ?, 
            alamat_penerbit = ?, 
            no_telp_penerbit = ?, 
            email_penerbit = ? 
            WHERE id_penerbit = ?";

        $stmt = mysqli_prepare($koneksi, $update_query);

        // Bind parameters and execute
        mysqli_stmt_bind_param($stmt, "ssssi", $publisherName, $publisherAddress, $publisherNumber, $publisherEmail, $publisherId);

        if (mysqli_stmt_execute($stmt)) {
            // Publisher updated successfully
            // Set session message
            $_SESSION['editpb'] = 'Publisher updated successfully';
        } else {
            // Error occurred while updating publisher
            $_SESSION['errorpb'] = mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        // Required fields are missing
        $_SESSION['errorpb'] = 'Publisher ID and Name are required.';
    }
} else {
    // Redirect or show an error message if form is not submitted
    $_SESSION['errorpb'] = 'Form submission error.';
}

// Redirect to the publisher page
header('location: publisher.php');
?>
