<?php
include "includes/conn.php";
include "includes/session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $no_telp = mysqli_real_escape_string($koneksi, $_POST['no_telp']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $role = "user"; // Assuming a default role for registered users

    // Hash the password using MD5
    $hashed_password = md5($password);

    // Use prepared statement to prevent SQL injection
    $insert_query = "INSERT INTO user (nama_lengkap, username, password, alamat, no_telp, email, role) 
                     VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $insert_query);

    // Check if the prepared statement was successfully created
    if ($stmt) {
        // Bind parameters and execute
        mysqli_stmt_bind_param($stmt, "sssssss", $nama_lengkap, $username, $hashed_password, $alamat, $no_telp, $email, $role);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['berhasil'] = 'Student added successfully';
        } else {
            $_SESSION['errorst'] = mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['errorst'] = 'Failed to create prepared statement';
    }
} else {
    $_SESSION['errorst'] = 'Fill up add form first';
}

header('location: student.php');
?>
