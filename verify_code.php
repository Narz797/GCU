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
    <h2  style="color:black; font-family: 'Lucida Console', Courier, monospace;">FORGOT PASSWORD</h2>
    <form id="verify_code" method="post">
      <label for="email" style="color:black;">Input 4 digit code*</label>
      <input type="number" id="code" name="number" required pattern="\d{4}" title="Please enter exactly four digits">
      
      <input style="background-color:black;color:white;" type="submit" value="Verify">
    </form>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
<script>
  $("#verify_code").on("submit", function(event) {
  
    event.preventDefault();
    console.log("performing ajax");
    $.ajax({
      type: 'POST',
      url: 'backend/verify.php',
      data: {
        code: $("#code").val()
      },
      success: function(data) {
        if (data === "Code Verified") {
        alert("Code Verified")
        console.log(data)
        window.location.href = "update_pass.php";
        } else {
          alert('Error, Invalid Code', data);
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
// unset($_SESSION['random_number']);//it shold clear once used for verification
?>
</html>
