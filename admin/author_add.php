<?php
session_start();
include "includes/conn.php";
include "includes/session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $nama_penulis = mysqli_real_escape_string($koneksi, $_POST['nama_penulis']);
    $email_penulis = mysqli_real_escape_string($koneksi, $_POST['email_penulis']);

    // Perform database insert
    $insert_query = "INSERT INTO penulis (nama_penulis, email_penulis) VALUES ('$nama_penulis', '$email_penulis')";

    if (mysqli_query($koneksi, $insert_query)) {
        $_SESSION['success'] = 'Book added successfully';
    }
    else{
        $_SESSION['error'] = $koneksi->error;
    }
}	
else{
    $_SESSION['error'] = 'Fill up add form first';
}
header('location: author.php');



?>
