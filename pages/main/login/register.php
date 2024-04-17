<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="register-container">
      <h1>Registration</h1>
      <form method="POST" action="pages/main/login/register_process.php">
        <input type="text" name="fullname" placeholder="Full Name" class="input-field" required>
        <input type="email" name="email" placeholder="Enter Email" class="input-field" required>
        <input type="password" name="password" placeholder="Enter Password" class="input-field" required>
        <input type="phonenumber" name="phonenumber" placeholder="Enter Phone Number" class="input-field" required>
        <button type="submit" name="register" class="register-button">Register</button>
      </form>
      <p>Already have an account? <a href="index.php?manage=login2">Log in</a></p>
    </div>
</body>
</html>
