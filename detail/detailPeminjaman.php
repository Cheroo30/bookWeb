<?php
session_start();

// Include database connection
include "../admin/includes/conn.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('You need to log in to access this page.');</script>"; // Alert the user
    echo "<script>window.location.href='../assets/php/form_login.php';</script>"; // Redirect to login page
    exit();
}
// Retrieve user ID from session
$id_user = $_SESSION['user_id'];
include "../includes2/navbar.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">Navigation</h5>
                </div>
                <div class="list-group list-group-flush">
                    <a href="<?= base_url."detail/detailPeminjaman.php";?>" class="list-group-item list-group-item-action<?= basename($_SERVER['PHP_SELF']) == 'detailPeminjaman.php' ? ' active' : '' ?>">
                        Book that been borrowed
                    </a>
                    <a href="<?= base_url."detail/detailDikembalikan.php";?>" class="list-group-item list-group-item-action<?= basename($_SERVER['PHP_SELF']) == 'detailDikembalikan.php' ? ' active' : '' ?>">
                        Book that been return
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="card-title mb-4">Borrowed list</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Book Name</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
include "../admin/includes/conn.php";

// Handle book return logic
if (isset($_GET['return'])) {
    $return_id = $_GET['return'];

    // Update status_peminjaman to 'Dikembalikan' for the selected book
    $return_query = "UPDATE detail_peminjaman AS dp
    INNER JOIN peminjaman AS p ON dp.id_peminjaman = p.id_peminjaman
    SET dp.status_peminjaman = 'Dikembalikan', p.tgl_dikembalikan = NOW()
    WHERE dp.id_detail_peminjaman = $return_id";


    $return_result = mysqli_query($koneksi, $return_query);

    if ($return_result) {
        echo "Book returned successfully.";
    } else {
        echo "Error returning the book: " . mysqli_error($koneksi);
    }
}

// Fetch books borrowed by the user
$query = "SELECT buku.nama_buku, detail_peminjaman.id_detail_peminjaman
          FROM detail_peminjaman
          INNER JOIN buku_satuan ON detail_peminjaman.id_buku_satuan = buku_satuan.id_buku_satuan
          INNER JOIN buku ON buku_satuan.id_buku = buku.id_buku
          INNER JOIN peminjaman ON detail_peminjaman.id_peminjaman = peminjaman.id_peminjaman
          WHERE detail_peminjaman.status_peminjaman = 'Dipinjam' AND peminjaman.id_user = $id_user";

$result = mysqli_query($koneksi, $query);

$no = 1;
while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nama_buku'] ?></td>
        <td>
            <a href='detailPeminjaman.php?return=<?= $row['id_detail_peminjaman'] ?>' class='btn btn-primary btn-sm'>Return</a>
        </td>
    </tr>
    <?php
}

mysqli_close($koneksi);
?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
    include "../includes2/footer.php";
?>
    </div>
</div>

