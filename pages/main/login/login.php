<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
  <div class="login-container">
    <h1>Login</h1>
    <?php
    if (isset($_SESSION['error_message'])) {
      echo '<p class="error-message">' . $_SESSION['error_message'] . '</p>';
      unset($_SESSION['error_message']);
    }
    ?>
    <form method="POST" action="pages/main/login/login_process.php">
      <input type="email" name="email" placeholder="Enter Email" class="input-field" required><br>
      <input type="password" name="password" placeholder="Enter Password" class="input-field" required><br>
      <button type="submit" class="login-button">Login</button>
    </form>
    <p>Don't have an account? <a href="index.php?manage=register">Register</a></p>
  </div>
</body>
</html>