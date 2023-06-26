<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
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
    
    .container input[type="email"] {
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
  </style>
</head>
<body>
  <div class="container">
    <h2>Forgot Password</h2>
    <form action="reset_password.php" method="post">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      
      <input type="submit" value="Reset Password">
    </form>
  </div>
</body>
</html>
