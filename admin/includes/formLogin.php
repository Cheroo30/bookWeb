<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
  body {
    background-color: #f8f9fa;
  }
  .login-container {
    max-width: 400px;
    margin: 50px auto;
    padding: 30px;
    margin-top:100px;
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
  }
  .login-container h3 {
    text-align: center;
    margin-bottom: 30px;
    color: #333;
  }
  .form-control:focus {
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
  }
  .btn-login {
    background-color: #007bff;
    border-color: #007bff;
    transition: all 0.3s ease-in-out;
  }
  .btn-login:hover {
    background-color: #0056b3;
    border-color: #0056b3;
  }
  .btn-login:focus {
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
  }
</style>
</head>
<body>
<div class="login-container">
  <h3>Welcome Back!</h3>
  <form action="../login.php" method="post">
    <div class="form-group">
      <label for="username"><i class="fas fa-user"></i> Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
    </div>
    <div class="form-group">
    <label for="password"><i class="fas fa-lock"></i> Password</label>
    <div class="input-group">
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                <i class="fas fa-eye"></i>
            </button>
        </div>
    </div>
</div>

    <button type="submit" class="btn btn-primary btn-block btn-login"><i class="fas fa-sign-in-alt"></i> Login</button>
  </form>
  <p class="text-center mt-3">Don't have an account? <a href="formRegistrasi.php">register here</a></p>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('password');
        const toggleButton = document.getElementById('togglePassword');

        toggleButton.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            toggleButton.querySelector('i').classList.toggle('fa-eye-slash');
        });
    });
</script>

</body>
</html>
