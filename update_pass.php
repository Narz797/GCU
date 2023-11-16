<?php 

session_start();
$randomNumber = $_SESSION['random_number'];
echo "<script>console.log($randomNumber)</script>";
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
  <link href="assets/css/forgot_password_style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.min.css">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>
<body>
  <div class="container">
    <div class="logo">
      <img src="assets/img/GCU_logo.png" alt="Logo" width="90" height="90">
    </div>
    <h2  style="color:black; font-family: 'Lucida Console', Courier, monospace;">Enter New Password</h2>
    <form id="forgot_pass" method="post">
    <label for="password" style="color:black;">Password</label>
    <input type="password" id="password" name="password" required>
    <button type="button" onclick="togglePasswordVisibility('password')">View</button>

    <label for="password2" style="color:black;">Re-enter Password</label>
    <input type="password" id="password2" name="password2" required>
    <button type="button" onclick="togglePasswordVisibility('password2')">View</button>

      <input style="background-color:black;color:white;" type="submit" value="Reset Password">
    </form>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
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
            alert("Password Changed")
          window.location.href = "home?logout=true";
          
        } else {
          alert('Error:', data);
          console.log(data);
        }
     
        // add location to enter code
      },
                  error: function (xhr, status, error) {
                    console.error("Error:", error);
                    alert("Error: " + error);
                  },
    });
  });
</script>
<?php
//it shold clear once used for verification
?>
</html>
