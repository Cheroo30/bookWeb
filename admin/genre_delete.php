<?php
include "includes/conn.php";
include "includes/session.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $idToDelete = $_GET['id'];

    // Perform the deletion
    $deleteSql = "DELETE FROM genre WHERE id_genre = $idToDelete";

    if (mysqli_query($koneksi, $deleteSql)) {
        // Redirect to genre.php after successful deletion
        header("Location: genre.php");
        exit;
    } else {
        echo "Error deleting genre: " . mysqli_error($koneksi);
    }

    // Close the database connection
    mysqli_close($koneksi);
} else {
    // Invalid request or missing parameter
    echo "Invalid request.";
}
?>
