<?php
    session_start();
    include "admin/includes/conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php
    include "includes2/navbar.php";
?>

<div id="carouselExampleAutoplaying" class="carousel slide px-5" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://static.vecteezy.com/system/resources/thumbnails/006/296/747/small/bookshelf-with-books-biography-adventure-novel-poem-fantasy-love-story-detective-art-romance-banner-for-library-book-store-genre-of-literature-illustration-in-flat-style-vector.jpg" class="d-block w-100" style="height: 60vh; object-fit: cover;" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://static.vecteezy.com/system/resources/thumbnails/006/296/747/small/bookshelf-with-books-biography-adventure-novel-poem-fantasy-love-story-detective-art-romance-banner-for-library-book-store-genre-of-literature-illustration-in-flat-style-vector.jpg" class="d-block w-100" style="height: 60vh; object-fit: cover;" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://static.vecteezy.com/system/resources/thumbnails/006/296/747/small/bookshelf-with-books-biography-adventure-novel-poem-fantasy-love-story-detective-art-romance-banner-for-library-book-store-genre-of-literature-illustration-in-flat-style-vector.jpg" class="d-block w-100" style="height: 60vh; object-fit: cover;" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<section class="bg-centers py-3 custom-bg">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mission-card">
                <a href="">
                    <img src="https://cdn.gramedia.com/uploads/highlighted_menu/Icon_category_Buku_Baru__w100_hauto.png" class="mission-image" alt="Aksesibilitas" />
                    <p>buku</p>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mission-card">
                <a href="">
                    <img src="https://cdn.gramedia.com/uploads/highlighted_menu/Icon_category_Buku_Pilihan__w100_hauto.png" class="mission-image" alt="Validitas" />
                    <p>buku</p>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mission-card">
                <a href="">
                    <img src="https://cdn.gramedia.com/uploads/highlighted_menu/Icon_category_Buku_Import__w100_hauto.png" class="mission-image" alt="Akuntabilitas" />
                    <p>buku</p>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mission-card">
                <a href="">
                    <img src="https://cdn.gramedia.com/uploads/highlighted_menu/Icon_category_ebook__w100_hauto.png" class="mission-image" alt="Akuntabilitas" />
                    <p>buku</p>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mission-card">
                <a href="">
                    <img src="https://cdn.gramedia.com/uploads/highlighted_menu/Icon_category_Voucher_Gramedia_Academy_2__w100_hauto.png" class="mission-image" alt="Akuntabilitas" />
                    <p>buku</p>
                </a>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="mt-4 mb-3">Rekomendasi Buku Untukmu</h4>
        </div>
        <div class="col text-end pt-4">
            <a href="detail/allBook.php">Lihat Semua</a>
        </div>
    </div>
    <div class="row row-cols-xxl-7 row-cols-xl-6 row-cols-lg-5 row-cols-md-4 row-cols-sm-3 g-3">
    <?php
    $query = "SELECT buku.*, penulis.nama_penulis 
              FROM buku 
              INNER JOIN penulis ON buku.id_penulis = penulis.id_penulis
              ORDER BY RAND() 
              LIMIT 6";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col">
                <div class="card h-100 shadow">
                    <a href="detail/detailBook.php?id=<?php echo $row['id_buku']; ?>" style="display: flex; justify-content: center;">
                        <img src="assets/<?php echo $row['gambar_bk']; ?>" class="card-img-top img-fluid" style="max-width: 150px;">
                    </a>
                    <div class="card-body">
                        <a href="author.php?id=<?php echo $row['id_penulis']; ?>" style="font-size: small;"><?php echo $row['nama_penulis']; ?></a>
                        <a href="detail/detailBook.php?id=<?php echo $row['id_buku']; ?>" style="text-decoration: none;">
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
    include "includes2/footer.php";
?>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
