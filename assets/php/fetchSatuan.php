<?php
include "../../admin/includes/conn.php";

// Fetch id_buku from the URL parameters
$id_buku = isset($_GET['id']) ? $_GET['id'] : null;

if ($id_buku === null) {
    // Handle case where id_buku is not provided in the URL
    echo "not found";
    exit();
}

// Fetch id_buku_satuan based on the book ID
$sql = "SELECT id_buku_satuan FROM buku_satuan WHERE id_buku = $id_buku";
$result = mysqli_query($koneksi, $sql);

if (!$result) {
    // Handle case where SQL query fails
    echo "Error: " . mysqli_error($koneksi);
    exit();
}

if ($row = mysqli_fetch_assoc($result)) {
    $id_buku_satuan = $row['id_buku_satuan'];
    echo $id_buku_satuan;
} else {
    // Handle case where id_buku_satuan is not found
    echo "not found";
}
?>
