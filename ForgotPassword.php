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
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Change RGBA values to 0, 0, 0 for black */


      animation: fadeInUp 1s ease-in-out; /* Animation */
}

@keyframes fadeInUp {
  0% {
    opacity: 0;
    transform: translateY(20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
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

    #reset:hover {
      /* background-color: #2980b9; */
      /* color:green; */
      transform: scale(1.1);
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
  </style>
</head>
<body>
  <div class="container">
  <div class="logo">
      <img src="assets/img/GCU_logo.png" alt="Logo" width="90" height="90">
    </div>
    <div class="logo">
      <img id="loading-spinner" style="display: none;" src="assets/img/GCU_LOGO.gif">
    </div>
    <img id="loading-spinner" src="assets/img/GCU_LOGO.gif">
    <h2  style="color:black; font-family: 'Lucida Console', Courier, monospace;">FORGOT PASSWORD</h2>
    <form id="forgot_pass" method="post">
      <label for="email" style="color:black;">Email*</label>
      <input type="email" id="email" name="email" required>
      
      <input id="reset"style="background-color:black;color:white;" type="submit" value="Reset Password">
    </form>
  </div>
  <!--  -->


</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        if (data === "unregistered") {
          // alert("This Email in not registered, please use a registered email")
          Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "This Email in not registered, please use a registered email",
             
            });
          console.log(data);
          
        } else {
          // alert("The code to change your password is sent to your email")
          Swal.fire({
              icon: "sucess",
              title: "Code Sent!",
              text: "Go to your email to retrieve the code",

            });
        console.log(data)
        window.location.href = "verify_code.php";
        }

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
