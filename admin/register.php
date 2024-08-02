<?php
include "includes/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $no_telp = mysqli_real_escape_string($koneksi, $_POST['no_telp']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $role = "admin"; // Assuming a default role for registered users

    // Hash the password using MD5
    $hashed_password = md5($password);

    $insert_query = "INSERT INTO user (nama_lengkap, username, password, alamat, no_telp, email, role) 
                     VALUES ('$nama_lengkap', '$username', '$hashed_password', '$alamat', '$no_telp', '$email', '$role')";

    if (mysqli_query($koneksi, $insert_query)) {
        // Registration successful
        header("Location: home.php"); // Redirect to a success page or login page
        exit();
    } else {
        // Registration failed
        $error_message = "Error registering user: " . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>