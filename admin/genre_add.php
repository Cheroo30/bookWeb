<?php
session_start();
include "includes/conn.php";
include "includes/session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $nama_genre = mysqli_real_escape_string($koneksi, $_POST['nama_genre']);

    // Use prepared statement to prevent SQL injection
    $insert_query = "INSERT INTO genre (nama_genre) VALUES (?)";
    $stmt = mysqli_prepare($koneksi, $insert_query);

    // Bind parameters and execute
    mysqli_stmt_bind_param($stmt, "s", $nama_genre);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['successgr'] = 'Genre added successfully';
    } else {
        $_SESSION['errorgr'] = mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
} else {
    $_SESSION['errorgr'] = 'Fill up add form first';
}

header('location: genre.php');
?>
