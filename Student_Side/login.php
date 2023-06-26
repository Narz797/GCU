<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
     
     
      display: flex;
      justify-content: center;
     
      align-items: center;
      height: 100vh;
    }
    
    .container {
      width: 350px;
      padding: 40px;
      background-color: #008374;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      text-align: center; /* Center align the content inside the container */
    }
    
    .container h2 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
    }
    
    .container label {
      display: block;
      color: #555;
      margin-bottom: 8px;
    }
    
    .container input[type="text"],
    .container input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-bottom: 20px;
    }
    
    .container input[type="submit"] {
      width: 100%;
      background-color: #3498db;
      color: #fff;
      padding: 12px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-weight: bold;
    }
    
    .container .forgot-password,
    .container .signup {
      text-align: center;
      margin-top: 15px;
    }
    
    .container .forgot-password a,
    .container .signup a {
      color:yellow;
      font-style: bold;
      text-decoration: none;
    }
    
    .container .forgot-password a:hover,
    .container .signup a:hover {
      color: #333;
    }

    .container .login {
      text-align: center;
      margin-top: 15px;
      grid-column: span 2;
    }
    
    .container .login a {
      color: #777;
      text-decoration: none;
    }
    
    .container .login a:hover {
      color: #333;
    }
    
    .container .logo {
      display: flex;
      align-items: center; /* Align logo and text vertically */
      justify-content: center; /* Center align the logo and text horizontally */
      margin-bottom: 20px;
    }

    .container .logo img {
      margin-right: 10px; /* Add some spacing between the logo and text */
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="logo">
      <img src="assets/img/GCU.png" alt="Logo" width="90" height="90">
    </div>
    <h2>Login</h2>
    <form action="login.php" method="post">
      <input type="text" id="username" placeholder="Username" name="username" required>
      <input type="password" id="password" placeholder="Password" name="password" required>
      
      <input type="submit" value="Login">
      
      <div class="forgot-password">
        <a href="ForgotPassword.html">Forgot Password?</a>
      </div>
      
      <div class="signup">
        Don't have an account? <a href="signup.html">Sign Up</a>
      </div>
    </form>

    <!-- Rest of the code -->
  </div>
</body>
</html>
