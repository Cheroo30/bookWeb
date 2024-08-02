<?php
session_start();
include "includes/conn.php";
include "includes/session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $nama_penerbit = mysqli_real_escape_string($koneksi, $_POST['nama_penerbit']);
    $alamat_penerbit = mysqli_real_escape_string($koneksi, $_POST['alamat_penerbit']);
    $no_telp_penerbit = mysqli_real_escape_string($koneksi, $_POST['no_telp_penerbit']);
    $email_penerbit = mysqli_real_escape_string($koneksi, $_POST['email_penerbit']);

    // Use prepared statement to prevent SQL injection
    $insert_query = "INSERT INTO penerbit (nama_penerbit, alamat_penerbit, no_telp_penerbit, email_penerbit) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $insert_query);

    // Bind parameters and execute
    mysqli_stmt_bind_param($stmt, "ssss", $nama_penerbit, $alamat_penerbit, $no_telp_penerbit, $email_penerbit);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['successpb'] = 'Publisher added successfully';
    } else {
        $_SESSION['errorpb'] = mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
} else {
    $_SESSION['errorpb'] = 'Fill up add form first';
}

header('location: publisher.php');
?>
