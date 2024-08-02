<?php
session_start();
include "includes/conn.php";
include "includes/session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $nama_buku = mysqli_real_escape_string($koneksi, $_POST['nama_buku']);
    $halaman = mysqli_real_escape_string($koneksi, $_POST['halaman']);
    $tahun_terbit = mysqli_real_escape_string($koneksi, $_POST['tahun_terbit']);
    $kode_isbn = mysqli_real_escape_string($koneksi, $_POST['kode_isbn']);
    $synopsis = mysqli_real_escape_string($koneksi, $_POST['synopsis']);
    $id_genre = mysqli_real_escape_string($koneksi, $_POST['id_genre']);
    $id_penerbit = mysqli_real_escape_string($koneksi, $_POST['id_penerbit']);
    $id_penulis = mysqli_real_escape_string($koneksi, $_POST['id_penulis']);

    $gambar_bk = ''; // Initialize the variable

    if (isset($_FILES['gambar_bk']) && $_FILES['gambar_bk']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../assets/images/coverBuku'; // Specify the path where you want to store the uploaded files
        
        // Get current date and time
        $currentDateTime = date('YmdHis');
    
        // Get the file extension
        $extension = pathinfo($_FILES['gambar_bk']['name'], PATHINFO_EXTENSION);
    
        // Construct the new filename with timestamp
        $newFileName = $currentDateTime . '_gambar_bk.' . $extension;
    
        $uploadFile = $uploadDir . $newFileName;
    
        if (move_uploaded_file($_FILES['gambar_bk']['tmp_name'], $uploadFile)) {
            // File successfully uploaded
            $gambar_bk = $uploadFile;
        } else {
            // Error handling for failed file upload
            echo "<script>alert('Error uploading file'); window.location='book.php';</script>";
            exit();
        }
    }

    // Perform database insert
    $insert_query = "INSERT INTO buku (nama_buku, halaman, tahun_terbit, kode_isbn, synopsis, gambar_bk, id_genre, id_penerbit, id_penulis) VALUES ('$nama_buku', '$halaman', '$tahun_terbit', '$kode_isbn', '$synopsis', '$gambar_bk', '$id_genre', '$id_penerbit', '$id_penulis')";

    if (mysqli_query($koneksi, $insert_query)) {
        $_SESSION['successbk'] = 'Book added successfully';
    }
    else{
        $_SESSION['errorbk'] = $koneksi->error;
    }
}	
else{
    $_SESSION['errorbk'] = 'Fill up add form first';
}
header('location: book.php');


?>
