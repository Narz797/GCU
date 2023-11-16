<?php 

session_start();
// $randomNumber = $_SESSION['random_number'];
$origin = $_SESSION['origin'];
 echo "<script>console.log($origin)</script>";
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
  <link href="assets/css/forgot_password_style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.min.css">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <style>
    .container {
      position: relative;
    }

    #loading-spinner {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 1;
      transition: opacity 0.5s ease;
      display: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="logo">
      <img id="loading-spinner" style="display: none;" src="assets/img/GCU_LOGO.gif">
    </div>
    <img id="loading-spinner" src="assets/img/GCU_LOGO.gif">
    <h2  style="color:black; font-family: 'Lucida Console', Courier, monospace;">FORGOT PASSWORD</h2>
    <form id="forgot_pass" method="post">
      <label for="email" style="color:black;">Email*</label>
      <input type="email" id="email" name="email" required>
      
      <input style="background-color:black;color:white;" type="submit" value="Reset Password">
    </form>
  </div>
  <!--  -->


</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
<script>
  $("#forgot_pass").on("submit", function(event) {
    event.preventDefault();
    
    // Show loading spinner
    $("#loading-spinner").show();
    
    console.log("performing ajax");
    $.ajax({
      type: 'POST',
      url: 'backend/forgot_pass.php',
      data: {
        email: $("#email").val()
      },
      success: function(data) {
        // Hide loading spinner on success
        $("#loading-spinner").hide();
        
        alert("The code to change your password is sent to your email")
        console.log(data)
        window.location.href = "verify_code.php";
        // add location to enter code
      },
      error: function(xhr, status, error) {
        // Hide loading spinner on error
        $("#loading-spinner").hide();
        
        console.error("Error:", error);
        alert("Error: " + error);
      },
    });
  });
</script>
<?php
// unset($_SESSION['random_number']);//it shold clear once used for verification
?>
</html>
