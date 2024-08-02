<?php
session_start();
include "../admin/includes/conn.php";

// Fetch id_buku from the URL parameters
$id_buku = isset($_GET['id']) ? $_GET['id'] : null;

if ($id_buku === null) {
    // Handle case where id_buku is not provided in the URL
    echo "id_buku is not provided";
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include "../includes2/navbar.php";
    ?>

   <div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-4 mb-3">Book Detail</h2>
        </div>
    </div>
    <?php
// Assuming you have established a database connection

// Fetch book details based on the ID passed through GET parameter
if(isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $book_id = mysqli_real_escape_string($koneksi, $_GET['id']);
    
    // Query to fetch book details
    $query = "SELECT buku.*, penulis.nama_penulis, penerbit.nama_penerbit, genre.nama_genre
              FROM buku 
              INNER JOIN penulis ON buku.id_penulis = penulis.id_penulis
              INNER JOIN penerbit ON buku.id_penerbit = penerbit.id_penerbit
              INNER JOIN genre ON buku.id_genre = genre.id_genre
              WHERE buku.id_buku = $book_id";

    // Fetch total number of books
    $query .= ";SELECT COUNT(DISTINCT buku_satuan.id_buku_satuan) AS total_buku_available
    FROM buku_satuan
    LEFT JOIN detail_peminjaman ON buku_satuan.id_buku_satuan = detail_peminjaman.id_buku_satuan
    WHERE buku_satuan.id_buku = $book_id AND (detail_peminjaman.status_peminjaman IS NULL OR detail_peminjaman.status_peminjaman != 'Dipinjam')";


    
    // Execute the multi-query
    if(mysqli_multi_query($koneksi, $query)) {
        // Fetch the first result set
        if($result = mysqli_store_result($koneksi)) {
            $book = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
        }

        // Move to the next result set
        mysqli_next_result($koneksi);

        // Fetch the second result set
        if($result = mysqli_store_result($koneksi)) {
            $row = mysqli_fetch_assoc($result);
            $total_buku_available = $row['total_buku_available'];
            mysqli_free_result($result);
        }
    } else {
        // Handle error
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Handle case where no ID is provided
    echo "<div class='col'>No ID provided.</div>";
    exit(); // Exit the script if no ID is provided
}
?>


<div class="row">
    <div class="col-md-3">
        <img src="<?php echo $book['gambar_bk']; ?>" class="img-fluid rounded" alt="Book Cover" style="max-width: 90%;">
    </div>
    <div class="col-md-8 mt-4 mt-md-0">
        <h3 class="mb-3"><?php echo $book['nama_buku']; ?></h3>
        <p><strong>Author:</strong> <a href="author.php?id=<?php echo $book['id_penulis']; ?>"><?php echo $book['nama_penulis']; ?></a></p>
        <p><strong>Genre:</strong> <?php echo $book['nama_genre']; ?></p>
        <p><strong>Total Book Units:</strong> <?php echo $total_buku_available; ?></p>
        <p><strong>Description:</strong></p>
        <p class=""><?php echo $book['synopsis']; ?></p>
<!-- Inside your form in book detail page -->
<!-- Inside your form in book detail page -->



        <div class="row mt-4">
            <div class="col-md-6">
                <h5 class="mb-2 fs-6">Jumlah Halaman</h5>
                <p><?php echo $book['halaman']; ?></p>
                <h5 class="mb-2 fs-6">Tanggal Terbit</h5>
                <p><?php echo $book['tahun_terbit']; ?></p>
                <h5 class="mb-2 fs-6">ISBN</h5>
                <p><?php echo $book['kode_isbn']; ?></p>
                <h5 class="mb-2 fs-6">Bahasa</h5>
                <p>Indonesia</p>
            </div>
            <div class="col-md-6">
                <h5 class="mb-2 fs-6">Penerbit</h5>
                <p><a href="publisher.php?id=<?php echo $book['id_penerbit']; ?>"><?php echo $book['nama_penerbit']; ?></a></p>
                <h5 class="mb-2 fs-6">Berat</h5>
                <p>0.25 kg</p>
                <h5 class="mb-2 fs-6">Lebar</h5>
                <p>13.5 cm</p>
                <h5 class="mb-2 fs-6">Panjang</h5>
                <p>20.0 cm</p>
            </div>
        </div>
        <form id="pinjamForm" method="post" action="../assets/php/inputPeminjaman.php">
    <!-- Set id_user using session only when the Pinjam button is clicked -->
    <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['user_id']; ?>" readonly>
    <!-- Set id_buku_satuan using the fetched id_buku_satuan -->
    <input type="hidden" name="id_buku_satuan" value="<?php echo $id_buku_satuan; ?>">
    <!-- Display checkboxes for selecting multiple available books for borrowing -->
    <h4>Select available books to borrow:</h4>
<?php
// Fetch all available book units for the current book
$sql = "SELECT DISTINCT bs.id_buku_satuan 
        FROM buku_satuan bs 
        WHERE bs.id_buku = $id_buku 
        AND NOT EXISTS (
            SELECT 1 
            FROM detail_peminjaman dp 
            WHERE dp.id_buku_satuan = bs.id_buku_satuan 
            AND dp.status_peminjaman = 'Dipinjam'
        )";

$result = mysqli_query($koneksi, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id_buku_satuan = $row['id_buku_satuan'];
        // Display checkbox for each available book unit
        echo "<input type='checkbox' name='selected_books[]' value='$id_buku_satuan'> Book Unit ID: $id_buku_satuan<br>";
    }
} else {
    echo "Tidak ada buku yang tersedia.";
}
?>

    <!-- Your other form fields -->
    <button type="button" id="pinjamButton" class="btn btn-primary">Pinjam</button>
</form>
    </div>
    <?php
    include "../includes2/footer.php";
?>
</div>

</div>
<script>
document.getElementById("pinjamButton").addEventListener("click", function() {

    // Submit the form
    document.getElementById("pinjamForm").submit();
});
</script>



</body>
</html>
