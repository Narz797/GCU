<?php 

session_start();
// $randomNumber = $_SESSION['random_number'];
$origin = $_SESSION['origin'];

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="assets/css/forgot_password_style.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <style>
    .D{

      color: grey;
    }
    .DJ{
      padding: 20px;
    }
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
  <div class="D"></div>
  <div class="container">
  <div class="logo">
      <img src="assets/img/GCU_logo.png" alt="Logo" width="90" height="90">
    </div>
    <div class="logo">
      <img id="loading-spinner" style="display: none;" src="assets/img/GCU_LOGO.gif">
    </div>
    <img id="loading-spinner" src="assets/img/GCU_LOGO.gif">
    <h2  style="color:black; font-family: 'Lucida Console', Courier, monospace;">FORGOT PASSWORD</h2>
    <h4 style="color:grey; ">Enter your email and we'll send you the verification code to reset your password</h4>
    <form id="forgot_pass" method="post">
      <label for="email" style="color:black;">Email*</label>
      <input type="email" id="email" name="email" required>
      
      <input id="reset"style="background-color:black;color:white;" type="submit" value="Reset Password">
      <div class="DJ"> &#x2190; <a onclick="bck()" class="D"><b> Back to Log-in</b></a></div>
    </form>
  </div>
  <!--  -->


</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function bck(){
    window.history.back();
  }
  $("#forgot_pass").on("submit", function(event) {
    event.preventDefault();
    
    // Show loading spinner
    Swal.fire({
                title: 'Sending Email',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                    },
            });
    
    console.log("performing ajax");
    $.ajax({
      type: 'POST',
      url: 'backend/forgot_pass.php',
      data: {
        email: $("#email").val()
      },
      success: function(data) {
        // Hide loading spinner on success
        swal.close();
        if (data === "unregistered") {
          // alert("This Email in not registered, please use a registered email")
          Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "This Email in not registered, please use a registered email",
              confirmButtonText: "OK",

                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                      
                    } 
                  });
          console.log(data);
          
        } else {
          // alert("The code to change your password is sent to your email")
          Swal.fire({
              icon: "sucess",
              title: "Code Sent!",
              text: "Go to your email to retrieve the code",
              confirmButtonText: "OK",

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  window.location.href = "verify_code.php";
                } 
              });
        console.log(data)
        
        }

        // add location to enter code
      },
      error: function(xhr, status, error) {
        // Hide loading spinner on error
        swal.close();
        
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
