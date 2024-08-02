<?php
  $preUrl = explode("/", $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
  $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $preUrl[0] . "/" . $preUrl[1] . "/";
  define("base_url", $url);
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
<nav class="navbar navbar-expand-lg bg-body-tertiary py-3">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?= base_url."index.php";?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url ?>detail/detailPeminjaman.php">Transaction</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url ?>logout.php">Logout</a>
            </li>
        </ul>
    </div>
    <div class="d-flex">
        <a href="<?= base_url ?>assets/php/form_login.php">
            <i class="fa-regular fa-user fa-xl"></i>
        </a>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>