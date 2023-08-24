<?php
session_start();
// include '../backend/validate_user.php';
// include '../backend/connect_database.php';
$_SESSION['origin'] = 'Student';
?>

<!DOCTYPE html>
<html>

<head>
  <title>Student Login Page</title>
  <!-- Stylesheet -->
  <link rel="stylesheet" href="../Css/login_style.css">
  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="assets/img/GCU_logo.png" rel="icon">
</head>

<body>
  <div class="container">
    <div class="logo">
      <img src="../assets/img/GCU_logo.png" alt="Logo" width="90" height="90">
    </div>
    <h2>Student Login</h2>
    <form id="Login_Student_User" method="POST">
      <input type="text" id="email" placeholder="Email" name="email" required>
      <input type="password" id="password" placeholder="Password" name="password" required>
      
      <div class="login">
      <input type="submit" value="Login" id="submitButton">
      </div>
      
      <div class="forgot-password">
        <a href="ForgotPassword.php">Forgot Password?</a>
      </div>
      
      <div class="signup">
        Don't have an account? <a href="signup.php">Sign Up</a>
      </div>

      <div class="home" id="home">
        <a href="../index.php">Home</a>
      </div>
    </form>
    
    <!-- Rest of the code -->
  </div>
  <script>


    $("#Login_Student_User").on("submit", function (event) {
    var source = "student_side_login";
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
     
            if (data === "success_student") {
                window.location.href = "../Student_Side/transaction.php";
            } else {
              alert("Invalid username or password.");
            }
          
        }
    });
});


   
    
  </script>
</body>
</html>