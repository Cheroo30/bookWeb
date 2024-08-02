<?php
include "includes/conn.php";
include "includes/session.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $idToDelete = $_GET['id'];

    // Perform the deletion
    $deleteSql = "DELETE FROM user WHERE id_user = $idToDelete";

    if (mysqli_query($koneksi, $deleteSql)) {
        // Redirect to penerbitss.php after successful deletion
        header("Location: student.php");
        exit;
    } else {
        echo "Error deleting user: " . mysqli_error($koneksi);
    }

    // Close the database connection
    mysqli_close($koneksi);
} else {
    // Invalid request or missing parameter
    echo "Invalid request.";
}
?>
