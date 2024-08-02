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

// Include navbar
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
                    <a href="detailPeminjaman.php" class="list-group-item list-group-item-action<?= basename($_SERVER['PHP_SELF']) == 'detailPeminjaman.php' ? ' active' : '' ?>">
                        Book that been borrowed
                    </a>
                    <a href="detailDikembalikan.php" class="list-group-item list-group-item-action<?= basename($_SERVER['PHP_SELF']) == 'detailDikembalikan.php' ? ' active' : '' ?>">
                        Book that been return
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="card-title mb-4">Return list</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Book Name</th>
                                    <th scope="col">Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Fetch books returned by the user
                                $query = "SELECT buku.nama_buku, buku.gambar_bk
                                          FROM detail_peminjaman
                                          INNER JOIN buku_satuan ON detail_peminjaman.id_buku_satuan = buku_satuan.id_buku_satuan
                                          INNER JOIN buku ON buku_satuan.id_buku = buku.id_buku
                                          INNER JOIN peminjaman ON detail_peminjaman.id_peminjaman = peminjaman.id_peminjaman
                                          WHERE detail_peminjaman.status_peminjaman = 'Dikembalikan' AND peminjaman.id_user = $id_user";

                                $result = mysqli_query($koneksi, $query);

                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['nama_buku'] ?></td>
                                        <td><img src="<?= $row['gambar_bk'] ?>" alt="Book Image" style="max-width: 100px; max-height: 100px;"></td>
                                    </tr>
                                    <?php
                                }

                                // Close the database connection
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
