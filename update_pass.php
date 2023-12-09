<?php 
session_start();
$randomNumber = $_SESSION['random_number'];

?>
<!DOCTYPE html>
<html>
<head>
  <title>Update Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="assets/css/forgot_password_style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>
<style>
  /* ... Your existing styles ... */
  .container {
  position: relative;
  width: 300px; /* Adjust the width as needed */
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
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

  
  .fa-eye, .fa-eye-slash {
    position: absolute;
    right: 1px;
    top: 12px;
    cursor: pointer;
  }
  input {
  width:80%;
  padding: 10px;
  margin-bottom: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  position: relative;
}

#password:focus {
  border-color: #3498db; /* Change border color on focus */
}

 .fa-eye {
  position: absolute;
  /* right: 10px; */
  top: 40%;
  right:1%;
  transform: translateY(-50%);
  cursor: pointer;
  color: #ccc; /* Set the initial color of the eye icon */
}

 .fa-eye {
  color: black; /* Change color on focus to match the border color */
}

#resetpass:hover {
      background-color: #2980b9; /* Change the background color on hover */
      transform: scale(1.1);
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
</style>
<body>
  <div class="container">
    <div class="logo">
      <img src="assets/img/GCU_logo.png" alt="Logo" width="90" height="90">
    </div>
    <h2 style="color:black; font-family: 'Lucida Console', Courier, monospace;">Enter New Password</h2>
    <form id="forgot_pass" method="post">
      <label for="password" style="color:black;">Password</label>
      <div style="position: relative;">
        <input type="password" id="password" name="password" required>
        <i class="fas fa-eye" onclick="togglePasswordVisibility('password')"></i>
      </div>
      
      <label for="password2" style="color:black;">Re-enter Password</label>
      <div style="position: relative;">
        <input type="password" id="password2" name="password2" required>
        <i class="fas fa-eye" onclick="togglePasswordVisibility('password2')"></i>
      </div>
      <br>

      <input id="resetpass"style="background-color:black;color:white;" type="submit" value="Reset Password">
    </form>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function togglePasswordVisibility(inputId) {
        var passwordInput = document.getElementById(inputId);
        var button = document.querySelector('button[onclick="togglePasswordVisibility(\'' + inputId + '\')"]');

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            button.textContent = "Hide";
        } else {
            passwordInput.type = "password";
            button.textContent = "View";
        }
    }
</script>
<script>
  $("#forgot_pass").on("submit", function(event) {
  
    event.preventDefault();
    console.log("performing ajax");
    $.ajax({
      type: 'POST',
      url: 'backend/Update_pass.php',
      data: {
        pass1: $("#password").val(),
        pass2: $("#password2").val()
      },
      success: function(data) {
        
        if (data === "Password Reset") {

            Swal.fire({
              icon: "sucess",
              title: "Password changed",
              confirmButtonText: "OK",

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  window.location.href = "home?logout=true";
                } 
              });
        
          
        } else {
          Swal.fire({
              icon: "error",
              title: "Please try again",
              timer: 1500
            });
         
        }
     
        // add location to enter code
      },
                  error: function (xhr, status, error) {
                    console.error("Error:", error);
                    Swal.fire({
              icon: "error",
              title: "Please try again",
              timer: 1500
            });
                  },
    });
  });
</script>
<?php
//it shold clear once used for verification
?>
<!-- ... Your existing scripts ... -->
</html>
<script>
  function togglePasswordVisibility(inputId) {
    var passwordInput = document.getElementById(inputId);
    var icon = document.querySelector('i[onclick="togglePasswordVisibility(\'' + inputId + '\')"]');
  
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      icon.className = "fas fa-eye-slash";
    } else {
      passwordInput.type = "password";
      icon.className = "fas fa-eye";
    }
  }
</script>
