<?php
session_start();

// Include database connection
include "../admin/includes/conn.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: form_login.php"); // Redirect to login page if user is not logged in
    exit();
}

// Retrieve user ID from session
$id_user = $_SESSION['user_id'];

// Fetch books borrowed by the user
$query = "SELECT buku.nama_buku, detail_peminjaman.id_detail_peminjaman, peminjaman.id_user
          FROM detail_peminjaman
          INNER JOIN buku_satuan ON detail_peminjaman.id_buku_satuan = buku_satuan.id_buku_satuan
          INNER JOIN buku ON buku_satuan.id_buku = buku.id_buku
          INNER JOIN peminjaman ON detail_peminjaman.id_peminjaman = peminjaman.id_peminjaman
          WHERE detail_peminjaman.status_peminjaman = 'Dipinjam' AND peminjaman.id_user = $id_user";

$result = mysqli_query($koneksi, $query);

// Handle case where no books are borrowed
if (mysqli_num_rows($result) === 0) {
    echo "You have no books borrowed.";
} else {
    // Display the list of borrowed books
    echo "<h2>List of Borrowed Books:</h2>";
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>{$row['nama_buku']} <a href='detailPeminjaman.php?return={$row['id_detail_peminjaman']}'>Return</a></li>";
    }
    echo "</ul>";
}

// Handle book return logic
if (isset($_GET['return'])) {
    $return_id = $_GET['return'];

    // Update status_peminjaman to 'Dikembalikan' for the selected book
    $return_query = "UPDATE detail_peminjaman SET status_peminjaman = 'Dikembalikan' WHERE id_detail_peminjaman = $return_id";
    $return_result = mysqli_query($koneksi, $return_query);

    if ($return_result) {
        echo "Book returned successfully.";
    } else {
        echo "Error returning the book: " . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>
