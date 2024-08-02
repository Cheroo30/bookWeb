<?php
session_start(); // Start the session

include "../../admin/includes/conn.php";

// Check if user_id is set in the session
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('You need to log in to borrow books.');</script>"; // Alert the user
    echo "<script>window.location.href='form_login.php';</script>"; // Redirect to login page
    exit;
}

// Retrieve the user ID from the session
$id_user = $_SESSION['user_id'];

// Check if selected_books array is set
if (!isset($_POST['selected_books'])) {
    echo "<script>alert('No books selected.');";
    echo "window.location.href = '../../index.php';</script>";
    exit;
}

// Retrieve selected book IDs from the form
$selected_books = $_POST['selected_books'];

// Initialize variable to track successful borrowings
$success_count = 0;

// Initialize array to store unavailable books
$unavailable_books = [];

// Loop through each selected book
foreach ($selected_books as $id_buku_satuan) {
    // Check if the book is currently borrowed
    $sql1 = mysqli_query($koneksi, "SELECT * FROM detail_peminjaman WHERE id_buku_satuan = '$id_buku_satuan' AND status_peminjaman = 'Dipinjam'");
    $cek = mysqli_num_rows($sql1);

    if ($cek > 0) {
        // If the book is not available, add it to the unavailable books array
        $unavailable_books[] = $id_buku_satuan;
    } else {
        $tgl_peminjaman = date('Y-m-d');
        $tgl_pengembalian = date('Y-m-d', strtotime('+3 days', strtotime($tgl_peminjaman)));

        // Insert into peminjaman table
        $sql2 = mysqli_query($koneksi, "INSERT INTO peminjaman (id_user, tgl_peminjaman, tgl_pengembalian) VALUES ('$id_user', '$tgl_peminjaman', '$tgl_pengembalian')");

        if ($sql2) {
            $id_peminjaman = mysqli_insert_id($koneksi);

            // Insert into detail_peminjaman table
            $sql3 = mysqli_query($koneksi, "INSERT INTO detail_peminjaman (id_peminjaman, id_buku_satuan, status_peminjaman) VALUES ('$id_peminjaman', '$id_buku_satuan', 'Dipinjam')");

            if ($sql3) {
                $success_count++; // Increment success count for each successful borrowing
            } else {
                echo "Error: " . mysqli_error($koneksi);
            }
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }
}

// Check if all selected books were successfully borrowed
if ($success_count == count($selected_books)) {
    echo "<script>alert('All selected books have been successfully borrowed!');";
    echo "window.location.href = '../../index.php';</script>";
} else {
    // If some books were not available, display an alert with the list of unavailable books
    $unavailable_books_str = implode(", ", $unavailable_books);
    echo "<script>alert('The following books are not available for borrowing: $unavailable_books_str');";
    echo "window.location.href = '../../index.php';</script>";
}
?>
