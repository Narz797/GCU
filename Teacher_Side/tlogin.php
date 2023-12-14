<?php
session_start();
$_SESSION['origin'] = 'Teacher';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <style>
       @import url('https://fonts.googleapis.com/css?family=Roboto');
    body {
      
      font-family: 'Roboto', sans-serif;
      background: rgb(51, 138, 11);
      background: -webkit-linear-gradient(331deg, #0c4401, #ebeeeb); 
      /* background-image: linear-gradient(225deg, #0c4401, transparent, #ebeeeb); */
      display: flex;
      height: 110vh;
      justify-content: center;
      align-items: center;
      width: 100%;
    }
    .fa-eye {
  position: absolute;
  /* right: 10px; */
  top: 40%;
  right:1%;
 
  cursor: pointer;
  color: #ccc; /* Set the initial color of the eye icon */
}

 .fa-eye {
  color: black; /* Change color on focus to match the border color */
}
.fa-eye, .fa-eye-slash {
    position: absolute;
    right: 8px;
    top: 12px;
    cursor: pointer;
  }
    /* .field{ */
    /* background: -webkit-linear-gradient(left, #fefefe, #61c6be); */
    /* } */
    #logo-gcu {
      width: 60%;
      margin: auto;
      padding-top: 100px;
 
    }
    .container {
      margin: 0px;
      padding: 0px;
       /* flex-direction: row;  */
    }
    /* Create two equal columns that floats next to each other */
    .column {
      width: 50%;
      padding: 10px;
      margin: 0 auto;
      text-align: center;
      justify-content: center;
      /* Should be removed. Only for demonstration */
    }
    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
      
    }
    /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
      .column {
        width: 100%;
      }
    }
    .right-column {
      /* margin-top: 2%; */
      /* flex: 2; */
      /* background-color: -webkit-linear-gradient(left, #fefefe, #96ded8); */
      padding: 5px;
      /* border-radius: 10px; */
    }
    .logo {
      /* width: 100px;
            height: auto; */
    }
    @-webkit-keyframes mover {
      0% {
        transform: translateY(0);
      }
      100% {
        transform: translateY(-20px);
      }
    }
    @keyframes mover {
      0% {
        transform: translateY(0);
      }
      100% {
        transform: translateY(-20px);
      }
    }
    /* Add your existing styles here */
    .center {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      max-width: 420px;
      width: 100%;
      background: white;
      border-radius: 10px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
    }
    .center h1 {
      text-align: center;
      padding: 20px 0;
      border-bottom: 1px solid silver;
    }
    .center form {
      padding: 0px;
      margin: 0px;
      box-sizing: border-box;
    }
    form .txt_field {
      position: relative;
      /* border-bottom: 2px solid #050505; */
      margin: 30px 0;
    }
    .txt_field input {
      width: 100%;
      padding: 0 5px;
      height: 40px;
      font-size: 16px;
      border: 1px solid #ccc;
      /* Add a border around the input */
      border-radius: 5px;
      /* Add rounded corners to the border */
      outline: none;
    }
    .txt_field label {
      position: absolute;
      top: 50%;
      left: 5px;
      color: #0f0909;
      transform: translateY(-50%);
      font-size: 16px;
      pointer-events: none;
      transition: 0.5s;
    }
    .txt_field span::before {
      content: "";
      position: absolute;
      top: 40px;
      left: 0;
      width: auto;
      height: 2px;
      background: #004e0d;
      transition: 0.5s;
    }
    .txt_field input:focus~label,
    .txt_field input:valid~label {
      top: -10px;
      /* color: #000000; */
    }
    .txt_field input:focus~span::before,
    .txt_field input:valid~span::before {
      width: 100%;
    }
    .pass {
      margin: -5px 0 20px 5px;
      color: #0e0b0b;
      cursor: pointer;
    }
    .pass:hover {
      text-decoration: underline;
      color: rgb(17, 13, 2);
    }
    input[type="submit"] {
      width: 100%;
      height: 50px;
      background: #e7a10b;
      border-radius: 5px;
      font-size: 18px;
      color: #000000;
      font-weight: 700;
      cursor: pointer;
      outline: none;
      transition: 0.5s;
      border: none;
      /* background: -webkit-linear-gradient(left, #f3e302 , #f6f8f5); */
      /* background: -webkit-linear-gradient(left, #e7e7e2 , #0c4401); */
    }
    input[type="submit"]:hover {
      background: #ffe2a5;
      /* background: -webkit-linear-gradient(left, #f3e302 , #f6f8f5); */
    }
    .signup_link {
      margin: 30px 0;
      text-align: center;
      font-size: 16px;
      color: #131212;
    }
    .signup_link a {
      color: #105c06;
      text-decoration: none;
    }
    .signup_link a:hover {
      text-decoration: underline;
    }
    #back_button {
      padding: 10px 30px;
      float: left;
      /* Adjusted the float property */
      position: fixed;
      /* Fixed position so it stays in place */
      top: 10px;
      /* Positioned at the top */
      left: 50px;
      /* Positioned at the left */
      z-index: 1000;
      background-color: #105c06;
    }
    @media screen and (max-width: 600px) {
      .column {
        width: 100%;
      }
    }

    /* Add this CSS to your existing styles or in a separate style tag or file */

/* Add this CSS to your existing styles or in a separate style tag or file */

/* Add this CSS to your existing styles or in a separate style tag or file */

.back-to-home-button {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.back-to-home-button:hover {
    background-color: #2980b9;
    color: #fff;
    transform: scale(1.1);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    /* Add any additional styles for hover effect */
}

  </style>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <link href="assets/img/GCU_logo.png" rel="icon">
</head>
<body>
  <div class="container" >
    <div class="row">
      <div class="column">
        <img id='logo-gcu' src="../assets/img/GCU_logo.png" alt="Logo" class="logo">
      </div>
      <div class="column">
        <form id="Login_Teacher_User" method="post" style='margin:10%'>
          <h1>LOGIN FORM</h1>
          <br>
          <div class="txt_field">
            <input type="text" id="email" name="email" required />
            <span></span>
            <label>Email</label>
          </div>
          <div class="txt_field">
            <input type="password" id="password" name="password" required />
            <i class="fas fa-eye" onclick="togglePasswordVisibility('password')"></i>
            <span></span>
            <label>Password</label>
          </div>
          <div class="pass"><a href="../ForgotPassword.php"><b>Forgot Password?</b></a></div>
          <input type="submit" value="Login" id="submitButton" />
          <div class="signup_link">Not a member? <a href="agreement.php"><b>Signup</b></a></div>
        </form>
        <a href="../home" class="back-to-home-button">BACK TO HOME</a>
      </div>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $("#Login_Teacher_User").on("submit", function(event) {
    var source = "teacher_side_login";
    event.preventDefault();
    $.ajax({
      type: 'POST',
      url: '../backend/validate_user.php',
      data: {
        email: $("#email").val(),
        password: $("#password").val(),
        source: source
      },
      success: function(data) {
        if (data === "success_teacher") {
          $.ajax({
            type: 'POST',
            url: '../backend/log_audit.php',
            data: {
              userId: $("#idno").val(),
              action: 'login_success',
              details: 'Successful login for teacher with ID: ' + $("#idno").val()
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
          window.location.href = "index.php";
        } else {
          $.ajax({
            type: 'POST',
            url: '../backend/log_audit.php',
            data: {
              userId: 0,
              action: 'login_failure',
              details: 'Unsuccessful login attempt for teacher with ID: ' + $("#idno").val()
            },
            success: function(response) {
              // Handle the response if needed
              console.log("error logged", response); 
            }
          });
          // alert('Error, teacher not registered');
          Swal.fire({
              icon: "error",
              title: "Invalid Credentials",
              text: "Please try again",
            });
        }
      }
    });
  });
</script>
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
</html>
