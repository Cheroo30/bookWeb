<?php
session_start();
include "../admin/includes/conn.php";
include "../includes2/navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Semua Buku</title>
    <!-- Custom styles -->
    <style>
        .card-img-top {
            max-width: 150px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h4 class="mt-4 mb-3">Semua Buku</h4>
            </div>
        </div>
        <div class="row row-cols-xxl-7 row-cols-xl-6 row-cols-lg-5 row-cols-md-4 row-cols-sm-3 g-3">
        <?php
        $query = "SELECT buku.*, penulis.nama_penulis 
                  FROM buku 
                  INNER JOIN penulis ON buku.id_penulis = penulis.id_penulis
                  ORDER BY buku.id_buku DESC"; // Change the query as needed

        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col">
                    <div class="card h-100 shadow">
                        <a href="../detail/detailBook.php?id=<?php echo $row['id_buku']; ?>" style="display: flex; justify-content: center;">
                            <img src="../assets/<?php echo $row['gambar_bk']; ?>" class="card-img-top img-fluid" alt="Book Cover">
                        </a>
                        <div class="card-body">
                            <a href="../author.php?id=<?php echo $row['id_penulis']; ?>" style="font-size: small;"><?php echo $row['nama_penulis']; ?></a>
                            <a href="../detail/detailBook.php?id=<?php echo $row['id_buku']; ?>" style="text-decoration: none;">
                                <h6 class="card-title"><?php echo $row['nama_buku']; ?></h6>
                            </a>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            // Handle case where no data is found
            echo "<div class='col'>No records found.</div>";
        }

        // Close the database connection
        mysqli_close($koneksi);
        ?>
    </div>
    </div>
<?php
    include "../includes2/footer.php";
?>
</body>
</html>
