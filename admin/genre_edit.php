<?php
session_start();
include "includes/conn.php";
include "includes/session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if genre ID and genre name are provided
    if (isset($_POST['genre_id']) && isset($_POST['nama_genre'])) {
        // Retrieve data from the form
        $genreId = mysqli_real_escape_string($koneksi, $_POST['genre_id']);
        $nama_genre = mysqli_real_escape_string($koneksi, $_POST['nama_genre']);

        // Use prepared statement to prevent SQL injection
        $update_query = "UPDATE genre SET nama_genre = ? WHERE id_genre = ?";
        $stmt = mysqli_prepare($koneksi, $update_query);

        // Bind parameters and execute
        mysqli_stmt_bind_param($stmt, "si", $nama_genre, $genreId);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['editgr'] = 'Genre updated successfully';
        } else {
            $_SESSION['errorgr'] = mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        // Required fields are missing
        $_SESSION['errorgr'] = 'Genre ID and Genre Name are required.';
    }
} else {
    // Redirect or show an error message if form is not submitted
    $_SESSION['errorgr'] = 'Form submission error.';
}

header('location: genre.php');
?>
