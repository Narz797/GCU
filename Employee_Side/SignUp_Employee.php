<?php
session_start();
// include '../backend/validate_user.php';
// // include '../backend/connect_database.php';
//   // Check if the session variable is empty
//   if (empty($_SESSION['session_id'])) {
//     // Redirect to the desired location
//     echo "<script>alert('Session ID is empty. You will be redirected.'); window.location.href = 'http://localhost/GCU/home';</script>";
    
//     exit; // Make sure to exit the script after a header redirect
//   }
  
$_SESSION['origin'] = 'Employee_Register';
?>
<!DOCTYPE html>
<html>
<head>
<title>Employee Sign Up</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../Css/register_style.css">
<link href="assets/img/GCU_logo.png" rel="icon">
<link rel="icon" href="../Assets/img/GCU_logo.png">
<link href="assets/register_style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
<div class="logo">
   <img src="../assets/img/GCU_logo.png" alt="Logo" width="90" height="90">
 </div>
   <h1>Employee Registration</h1>
   <form class="form-grid">
     <div class="form-column">
       <label for="idNumber">ID Number:</label>
       <input type="text" id="idNumber" name="idNumber" required>
       
       <label for="lastName">Last Name:</label>
       <input type="text" id="lastName" name="lastName" required>
       
       <label for="firstName">First Name:</label>
       <input type="text" id="firstName" name="firstName" required>
       
       <label for="middleName">Middle Name:</label>
       <input type="text" id="middleName" name="middleName">
            
    
     </div>
     
     <div class="form-column">
      
        <label for="sex">Sex:</label>
       <input type="text" id="sex" name="sex">
       <label for="emailadd">Email Address:</label>
       <input type="text" id="emailadd" name="emailadd">
       <label for="contactNumber">Contact Number:</label>
       <input type="tel" id="contactNumber" name="contactNumber" required>
      
       <label for="cs">Position:</label>
       <input type="text" id="cs" name="cs">
       
       <button type="submit">Register</button>
     </div>
   </form>
 </div>
<script>
  $("#Signup_Employee_User").on("submit", function (event) {
  var source = "employee_side_signup";
  event.preventDefault();
  $.ajax({
      type: 'POST',
      url: '../backend/register_user.php',
      data: {
          Employee_idno: $("#Employee_idno").val(),
          firstname: $("#firstname").val(),
          lastname: $("#lastname").val(),
          middlename: $("#middlename").val(),
          select: $("#select").val(),
          position: $("#position").val(),
          email: $("#email").val(),
          username: $("#username").val(),
          password: $("#password").val(),
          source: source
      },
      success: function (data) {
  
          if (data === "success_employee") {
              window.location.href = "../Employee_Side/login_Employee.php";
              alert("Sign up successful");
          } else {
            alert(data);
          }
        // alert(data);
      },
      error: function (data) {
        alert("cannot connect");
      }
  });
  });
</script>
</body>
</html>
  