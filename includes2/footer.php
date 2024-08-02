<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Title</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add custom styles here */
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
        }
        body.dark .footer {
            background-color: #2b2c40;
            transition:all 0.3s ease;
            color:white;
        }
    </style>
</head>
<body>

    <!-- Your page content goes here -->

    <footer class="footer">
        <div class="container mt-3 text-center">
            <p>&copy; <?php echo date("Y"); ?> Library. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
