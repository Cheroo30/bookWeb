<?php
session_start();
include "includes/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Hash the password using MD5
    $hashed_password = md5($password);

    $query = "SELECT * FROM user WHERE username='$username' AND password='$hashed_password' AND role='admin'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            // Successful login for admin user
            $_SESSION['user_id'] = $row['id_user'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            // Redirect to home.php
            header("Location: home.php");
            exit();
        } else {
            // Invalid credentials
            $error_message = "Invalid username or password for admin.";
            echo $error_message; // Output for debugging
        }
    } else {
        // Query execution error
        $error_message = "Error executing query: " . mysqli_error($koneksi);
        echo $error_message; // Output for debugging
    }
}

mysqli_close($koneksi);
?>
