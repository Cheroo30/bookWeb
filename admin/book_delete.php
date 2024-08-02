<?php
include "includes/conn.php";
include "includes/session.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $idToDelete = $_GET['id'];

    // Perform the deletion
    $deleteSql = "DELETE FROM buku WHERE id_buku = $idToDelete";

    if (mysqli_query($koneksi, $deleteSql)) {
        // Redirect to book.php after successful deletion
        header("Location: book.php");
        exit;
    } else {
        echo "Error deleting book: " . mysqli_error($koneksi);
    }

    // Close the database connection
    mysqli_close($koneksi);
} else {
    // Invalid request or missing parameter
    echo "Invalid request.";
}
?>
