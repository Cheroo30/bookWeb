<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
  body {
    background-color: #f8f9fa;
  }
  .registration-container {
    max-width: 400px;
    margin: 50px auto;
    padding: 30px;
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
  }
  .registration-container h3 {
    text-align: center;
    margin-bottom: 30px;
    color: #333;
  }
  .form-control:focus {
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
  }
  .btn-register {
    background-color: #007bff;
    border-color: #007bff;
    transition: all 0.3s ease-in-out;
  }
  .btn-register:hover {
    background-color: #0056b3;
    border-color: #0056b3;
  }
  .btn-register:focus {
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
  }
</style>
</head>
<body>
<div class="registration-container">
  <h3>Register</h3>
  <form action="../register.php" method="post">
    <div class="form-group">
      <label for="nama_lengkap"><i class="fas fa-user"></i> Nama Lengkap</label>
      <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Enter nama lengkap" required>
    </div>
    <div class="form-group">
      <label for="username"><i class="fas fa-user"></i> Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
    </div>
    <div class="form-group">
      <label for="password"><i class="fas fa-lock"></i> Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
    </div>
    <div class="form-group">
      <label for="email"><i class="fas fa-lock"></i> Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
    </div>
    <button type="submit" class="btn btn-primary btn-block btn-register"><i class="fas fa-user-plus"></i> Register</button>
  </form>
  <p class="text-center mt-3">Already have an account? <a href="formLogin.php">Login here</a></p>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
