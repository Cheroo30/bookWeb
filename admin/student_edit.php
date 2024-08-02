<?php
session_start();
include "includes/session.php";
include "includes/conn.php"; // Include your database connection file

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $userId = $_POST["id_user"];
    $fullName = $_POST["nama_lengkap"];
    $userName = $_POST["username"];
    $userAddress = $_POST["alamat"];
    $userNumber = $_POST["no_telp"];
    $userEmail = $_POST["email"];

    // Query to update user details based on user ID
    $sql = "UPDATE user SET 
            nama_lengkap = '$fullName',
            username = '$userName',
            alamat = '$userAddress', 
            no_telp = '$userNumber', 
            email = '$userEmail' 
            WHERE id_user = '$userId'";

    // Execute the update query
    if (mysqli_query($koneksi, $sql)) {
        // User updated successfully
        // Set session message
        $_SESSION['editst'] = 'User updated successfully';
    } else {
        // Error occurred while updating user
        $_SESSION['errorst'] = mysqli_error($koneksi);
    }

    // Redirect to a page or show a success message
    header("Location: student.php"); // Redirect to the user list page
    exit();
} else {
    // Redirect or show an error message if form is not submitted
    echo "Form submission error.";
}
?>
