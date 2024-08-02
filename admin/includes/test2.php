<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['username']) || !isset($_SESSION['role'])) {
  // Redirect to the login page if not logged in
  header('Location: includes/formLogin.php');
  exit();
}
if (isset($_POST['logout'])) {
    // If the logout button is clicked, redirect to logout script
    header("Location: logout.php");
    exit();
}
?>
<?php
  $preUrl = explode("/", $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
  $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $preUrl[0] . "/" . $preUrl[1] . "/";
  define("base_url", $url);
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <!--
    <link rel="stylesheet" href="<?= base_url."assets/css/menubar.css";?>">
-->
    <link rel="stylesheet" href="../assets/css/menubar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <style>
      body {
        background-color: #f5f5f9;
      }
    </style>
    <!--<title>Dashboard Sidebar Menu</title>--> 
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <!--<img src="logo.png" alt="">-->
                </span>

                <div class="text logo-text">
                    <span class="name">Library</span>
                </div>
            </div>

           
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="<?= base_url."admin/home.php";?>">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="<?= base_url."admin/transaction.php";?>">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Transaction</span>
                        </a>
                    </li>
<!--
                    <div class="dropdown22">
                    <li class="nav-link">
                        <a href="#" class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Book</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url."admin/book.php";?>"><span ><i></i></span>Book List</a></li>
                            <li><a href="<?= base_url."admin/satuan.php";?>"><span ><i></i></span>Satuan List</a></li>
                            <li><a href="<?= base_url."admin/genre.php";?>"><span ><i></i></span>Genre List</a></li>
                            <li><a href="<?= base_url."admin/publisher.php";?>"><span ><i></i></span>Publisher List</a></li>
                            <li><a href="<?= base_url."admin/author.php";?>"><span ><i></i></span>Author List</a></li>
                        </ul>
                    </li>              
                    </div>
    -->
                    <li class="nav-link">
                        <a href="<?= base_url."admin/book.php";?>">
                            <i class='bx bx-book icon' ></i>
                            <span class="text nav-text">Book List</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="<?= base_url."admin/genre.php";?>">
                            <i class='bx bx-book icon' ></i>
                            <span class="text nav-text">Genre List</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="<?= base_url."admin/student.php";?>">
                            <i class='bx bx-user icon' ></i>
                            <span class="text nav-text">Student List</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="<?= base_url."admin/author.php";?>">
                            <i class='bx bx-user icon' ></i>
                            <span class="text nav-text">Author List</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="<?= base_url."admin/publisher.php";?>">
                            <i class='bx bx-user icon' ></i>
                            <span class="text nav-text">Publisher List</span>
                        </a>
                    </li>
                    
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="logout.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
<!--
                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
    -->            
            </div>
        </div>

    </nav>

    <nav>
    <header class="layout-navbar">
        <div class="navbar-content-container">
            <div class="content d-flex justify-content-end align-items-center">
                <i class='fa-solid fa-bars toggle' onclick="toggleSidebar()"></i>
                <div class="dark-light">
                    <i class='bx bx-moon moon'></i>
                    <i class='bx bx-sun sun'></i>
                </div>
                
                <div class="action">
    <div class="dropdown-pr">
        <a class="profile" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?= base_url."assets/images/Solo_Leveling_Webtoon.png";?>" />
        </a>

        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item has-icon" href="features-profile.html"><i class="far fa-user"></i> Profile</a></li>
            <li><a class="dropdown-item has-icon" href="features-activities.html"><i class="fas fa-bolt"></i> Activities</a></li>
            <li><a class="dropdown-item has-icon" href="features-settings.html"><i class="fas fa-cog"></i> Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item has-icon text-danger" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
</div>

                
        </div>
    </header>
</nav>

    

<script>
    const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        modeToggle = document.querySelector(".dark-light"),
        toggle = body.querySelector(".toggle"),
        modeSwitch = body.querySelector(".toggle-switch"),
        modeText = document.querySelector(".mode-text");

       // Retrieve sidebar state from local storage
       let isSidebarClosed = localStorage.getItem("sidebarState") === "closed";

// Set sidebar state based on the retrieved value
if (isSidebarClosed) {
    sidebar.classList.add("close");
} else {
    sidebar.classList.remove("close");
}

toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    // Update local storage with the new sidebar state
    localStorage.setItem("sidebarState", sidebar.classList.contains("close") ? "closed" : "open");
});

    let getMode = localStorage.getItem("mode");
    if (getMode && getMode === "dark-mode") {
        body.classList.add("dark");
    }

    modeToggle.addEventListener("click", () => {
        modeToggle.classList.toggle("active");
        body.classList.toggle("dark");

        if (!body.classList.contains("dark")) {
            localStorage.setItem("mode", "light-mode");
        } else {
            localStorage.setItem("mode", "dark-mode");
        }
    });
</script>

    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>