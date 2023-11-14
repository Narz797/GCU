<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
  <link href="assets/css/forgot_password_style.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="logo">
      <img src="assets/img/GCU_logo.png" alt="Logo" width="90" height="90">
    </div>
    <h2  style="color:black; font-family: 'Lucida Console', Courier, monospace;">FORGOT PASSWORD</h2>
    <form action="backend/password-reset-code.php" method="post">
      <label for="email" style="color:black;">Email*</label>
      <input type="email" id="email" name="email" required>
      
      <input style="background-color:black;color:white;" type="submit" value="Reset Password">
    </form>
  </div>
</body>
</html>
