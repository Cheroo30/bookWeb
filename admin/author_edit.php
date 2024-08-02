<?php
session_start();
include "includes/session.php";
include "includes/conn.php"; // Include your database connection file

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if author ID and author name are provided
    if (isset($_POST['author_id']) && isset($_POST['nama_penulis'])) {
        // Retrieve form data
        $authorId = $_POST["author_id"];
        $authorName = $_POST["nama_penulis"];
        $authorEmail = $_POST["email_penulis"];

        // Use prepared statement to prevent SQL injection
        $update_query = "UPDATE penulis SET 
            nama_penulis = ?, 
            email_penulis = ? 
            WHERE id_penulis = ?";

        $stmt = mysqli_prepare($koneksi, $update_query);

        // Bind parameters and execute
        mysqli_stmt_bind_param($stmt, "ssi", $authorName, $authorEmail, $authorId);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['edit'] = 'Author updated successfully';
        } else {
            $_SESSION['error'] = mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        // Required fields are missing
        $_SESSION['error'] = 'Author ID and Name are required.';
    }
} else {
    // Redirect or show an error message if form is not submitted
    $_SESSION['error'] = 'Form submission error.';
}

header('location: author.php');
?>
