<?php
  
    include "includes/conn.php";
   // Mengambil total buku dari database
$sql = "SELECT COUNT(*) as total_buku FROM buku";
$result = $koneksi->query($sql);

// Inisialisasi variabel untuk menyimpan nilai total buku
$total_buku = 0;

// Menampilkan data jika ada
if ($result->num_rows > 0) {
    // Mengambil nilai total buku dari hasil query
    $row = $result->fetch_assoc();
    $total_buku = $row["total_buku"];
} else {
    echo "0 results";
}

$sql = "SELECT COUNT(*) as total_author FROM penulis";
$result = $koneksi->query($sql);

// Inisialisasi variabel untuk menyimpan nilai total buku
$total_author = 0;

// Menampilkan data jika ada
if ($result->num_rows > 0) {
    // Mengambil nilai total buku dari hasil query
    $row = $result->fetch_assoc();
    $total_author = $row["total_author"];
} else {
    echo "0 results";
}

$sql = "SELECT COUNT(*) as total_publisher FROM penerbit";
$result = $koneksi->query($sql);

// Inisialisasi variabel untuk menyimpan nilai total publisher
$total_publisher = 0;

// Menampilkan data jika ada
if ($result->num_rows > 0) {
    // Mengambil nilai total publisher dari hasil query
    $row = $result->fetch_assoc();
    $total_publisher = $row["total_publisher"];
} else {
    echo "0 results";
}

$sql = "SELECT COUNT(*) as total_user FROM user";
$result = $koneksi->query($sql);

// Inisialisasi variabel untuk menyimpan nilai total user
$total_user = 0;

// Menampilkan data jika ada
if ($result->num_rows > 0) {
    // Mengambil nilai total user dari hasil query
    $row = $result->fetch_assoc();
    $total_user = $row["total_user"];
} else {
    echo "0 results";
}
$koneksi->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   
    <title>Your Website</title>
   
</head>
<body>
    <style>
        body.dark .cont .card {
    background-color: #2b2c40;
    color:white;
    transition: all 0.3s ease;
}
    </style>
    <?php
        include "includes/test2.php";
    ?>

    <!-- Main Content -->
    <div class="main-content">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
        <!-- Display error and success messages (if needed)
         Replace these messages with your desired content
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class='icon fa fa-warning'></i> Error!</h4>
            Error message goes here.
        </div>

        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class='icon fa fa-check'></i> Success!</h4>
            Success message goes here.
        </div>
        -->
<div class="cont">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-4">
            <div class="card mb-4 shadow" style="min-height: 320px;">
                <div class="card-body d-flex flex-column justify-content-center py-5 py-xl-4" style="height: 100%;">
                    <div class="row gx-4 align-items-center">
                        <div class="col-xl-6">
                            <div class="text-center text-xl-start text-xxl-center px-4 mb-4 mb-xl-0 mb-xxl-4">
                                <h1 class="text-primary">Welcome back, your dashboard is ready!</h1>
                                <p class="text-gray-700 mb-0">Browse our fully designed UI toolkit! Browse our prebuilt app pages, components, and utilities, and be sure to look at our full documentation!</p>
                            </div>
                        </div>
                        <div class="col-xl-6 text-center">
                            <img src="https://sb-admin-pro-angular.startbootstrap.com/assets/img/illustrations/at-work.svg" class="img-fluid" style="max-width: 100%; height: auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
    <div class="container">
  <div class="row">
  <div class="col-md-6 mb-4">
      <div class="card text-white bg-primary">
        <div class="card-body">
          <div class="text-white-75 small mb-3">Total Book</div>
          <div class="text-lg fw-bold mb-3"><?php echo $total_buku; ?></div>
          <a href="book.php" class="btn btn-outline-light">View Report</a>
          <i class="fa-solid fa-book fa-2xl text-white-50 float-end">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="feather feather-calendar"></svg>
          </i>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div class="card text-white bg-secondary">
        <div class="card-body">
          <div class="text-white-75 small mb-3">Total Author</div>
          <div class="text-lg fw-bold mb-3"><?php echo $total_author; ?></div>
          <a href="author.php" class="btn btn-outline-light">View Report</a>
          <i class="fa-solid fa-user fa-2xl text-white-50 float-end">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="feather feather-calendar"></svg>
          </i>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mb-4">
      <div class="card text-white bg-success">
        <div class="card-body">
          <div class="text-white-75 small mb-3">Total Publisher</div>
          <div class="text-lg fw-bold mb-3"><?php echo $total_publisher; ?></div>
          <a href="publisher.php" class="btn btn-outline-light">View Report</a>
          <i class="fa-solid fa-user fa-2xl text-white-50 float-end">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="feather feather-calendar"></svg>
          </i>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div class="card text-white bg-warning">
        <div class="card-body">
          <div class="text-white-75 small mb-3">Total User</div>
          <div class="text-lg fw-bold mb-3"><?php echo $total_user; ?></div>
          <a href="student.php" class="btn btn-outline-light">View Report</a>
          <i class="fa-solid fa-user fa-2xl text-white-50 float-end">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="feather feather-calendar"></svg>
          </i>
        </div>
      </div>
    </div>
  </div>
</div>

    </div>
<?php
    include "../includes2/footer.php";
?>
    <!-- Add your scripts or additional content here -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
</body>
</html>
