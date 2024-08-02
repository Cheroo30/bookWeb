<?php
session_start();
include "includes/conn.php"; // Include your database connection file

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $bookId = $_POST["book_id"]; // Assuming this is the ID of the book
    $nama_buku = $_POST["nama_buku"];
    $halaman = $_POST["halaman"];
    $tahun_terbit = $_POST["tahun_terbit"];
    $synopsis = $_POST["synopsis"];
    $id_genre = $_POST["id_genre"];
    $id_penulis = $_POST["id_penulis"];
    $id_penerbit = $_POST["id_penerbit"];

    $gambar_bk = ''; // Initialize the variable

    if (isset($_FILES['gambar_bk']) && $_FILES['gambar_bk']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../assets/images/coverBuku/'; // Specify the path where you want to store the uploaded files
        
        // Get current date and time
        $currentDateTime = date('YmdHis');
    
        // Get the file extension
    
        // Construct the new filename with timestamp
        $newFileName = $currentDateTime . basename($_FILES['gambar_bk']['name']);
    
        $uploadFile = $uploadDir . $newFileName;
    
        if (move_uploaded_file($_FILES['gambar_bk']['tmp_name'], $uploadFile)) {
            // File successfully uploaded
            $gambar_bk = $uploadFile;
        } else {
            // Error handling for failed file upload
            $_SESSION['errorbk'] = 'Error uploading file';
            header("Location: book.php");
            exit();
        }
    }

    // Prepare an update statement
    $sql = "UPDATE buku SET 
            nama_buku = '$nama_buku', 
            halaman = '$halaman', 
            tahun_terbit = '$tahun_terbit', 
            gambar_bk = '$gambar_bk', 
            synopsis = '$synopsis', 
            id_genre = '$id_genre', 
            id_penulis = '$id_penulis', 
            id_penerbit = '$id_penerbit' 
            WHERE id_buku = '$bookId'";

    // Execute the update statement
    if (mysqli_query($koneksi, $sql)) {
        // User updated successfully
        // Set session message
        $_SESSION['editbk'] = 'Book updated successfully';
    } else {
        // Error occurred while updating user
        $_SESSION['errorbk'] = mysqli_error($koneksi);
    }

    // Redirect to book.php
    header("Location: book.php");
    exit();
}
?>
