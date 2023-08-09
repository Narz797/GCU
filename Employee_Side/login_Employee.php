<?php
session_start();
// include '../backend/validate_user.php';
// include '../backend/connect_database.php';
$_SESSION['origin'] = 'Employee';
?>

<!DOCTYPE html>
<html>

<head>
  <title>Student Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;

      align-items: center;
      height: 100vh;
    }

    .container {
      width: 380px;
      padding: 40px;
      padding-right:60px;
      background-color: #04680c;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      text-align: center;
      /* Center align the content inside the container */
    }

    .container h2 {
      text-align: center;
      color: #d7d70f;
      margin-bottom: 30px;
    }

    .container label {
      display: block;
      color: #555;
      margin-bottom: 8px;
      text-align:center;
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
      width: 40%;
      background-color: #13a110;
      color: #bcedb0;
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
      color: yellow;
      font-style: bold;
      text-decoration: none;
    }

    .container .forgot-password a:hover,
    .container .signup a:hover {
      
      text-decoration: underline;
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
      align-items: center;
      /* Align logo and text vertically */
      justify-content: center;
      /* Center align the logo and text horizontally */
      margin-bottom: 20px;
    }

    .container .logo img {
      margin-right: 10px; /* Add some spacing between the logo and text */
      align-items:center;
    }
  </style>
  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="logo">
      <img src="assets/images/GCU_logo.png" alt="Logo" width="90" height="90">
    </div>
    <h2>Login</h2>
    <form id="Login_Student_Employee" method="POST">
      <input type="text" id="email" placeholder="Email" name="email" required>
      <input type="password" id="password" placeholder="Password" name="password" required>
      
      <div class="login">
      <input type="submit" value="Login" id="submitButton">
      </div>
      
      <div class="forgot-password">
        <a href="ForgotPassword.php">Forgot Password?</a>
      </div>
      <div class="switch-user">
        <a href="../Student_side/login.php">LOGIN as Student</a>
      </div>
      
      <div class="signup">
        Don't have an account? <a href="SignUp_Employee.php">Sign Up</a>
      </div>
    </form>
    
    <!-- Rest of the code -->
  </div>
  <script>

    $("#Login_Student_Employee").on("submit", function (event) {
    var source = "employee_side_login";
    event.preventDefault();

    $.ajax({
        type: 'POST',
        url: '../backend/validate_user.php',
        data: {
            email: $("#email").val(),
            password: $("#password").val(),
            source: source
        },
        success: function (data) {
     
            if  (data === "success_employee") {
                window.location.href = "../Employee_Side/index.php";
            } else {
              alert("Invalid username or password.");
            }
          
        }
    });
});


   
    
  </script>
</body>
</html>