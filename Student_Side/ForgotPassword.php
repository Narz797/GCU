<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color:#084603;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    
    .container {
      width: 350px;
      padding: 40px;
      padding-right:60px;
      background-color: #04680c;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    
    .container h2 {
      text-align:center;
      color: #d7d70f;
      margin-bottom: 30px;
    }
    
    .container label {
      display: block;
      color: #bec0be;
      text-align: left;
      margin-bottom: 8px;
    }
    
    .container input[type="email"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-bottom: 20px;
    }
    
    .container input[type="submit"] {
      width: 70%;
      background-color: #13a110;
      color: #bcedb0;
      padding: 12px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-weight: bold;
      
    }

    .container input[type="submit"]:hover {
      background-color: rgb(179, 188, 6);
      color:black;
    }
    .container .logo {
      display: flex;
      align-items: center; /* Align logo and text vertically */
      justify-content: center; /* Center align the logo and text horizontally */
      margin-bottom: 20px;
    }
    .container .logo img {
      margin-right: 10px; /* Add some spacing between the logo and text */
      align-items:center;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="logo">
      <img src="assets/img/GCU_logo.png" alt="Logo" width="90" height="90">
    </div>
    <h2>Forgot Password</h2>
    <form action="reset_password.php" method="post">
      <label for="email">Email*</label>
      <input type="email" id="email" name="email" required>
      
      <input type="submit" value="Reset Password">
    </form>
  </div>
</body>
</html>
