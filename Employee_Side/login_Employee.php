<?php
session_start();
// include '../backend/validate_user.php';
// include '../backend/connect_database.php';
$_SESSION['origin'] = 'Employee';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    @import url('https://fonts.googleapis.com/css?family=Roboto');
    body {
      font-family: 'Roboto', sans-serif;
      display: flex;
      height: 100vh;
      justify-content: center;
      align-items: center;
    }
    .container {
      width: 90%;
      margin-left: 2%;
    }
    .column {
      width: 50%;
      padding: 10px;
      margin: 0 auto;
      text-align: center;
      justify-content: center;
    }
    .logo {
      width: 60%;
      margin: auto;
      padding-top: 100px;
      -webkit-animation: mover 2s infinite alternate;
      animation: mover 1s infinite alternate;
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
      padding: 0 40px;
      box-sizing: border-box;
    }
    form .txt_field {
      position: relative;
      margin: 30px 0;
    }
    .txt_field input {
      width: 100%;
      padding: 0 5px;
      height: 40px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
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
      border-radius: 25px;
      font-size: 18px;
      color: #000000;
      font-weight: 700;
      cursor: pointer;
      outline: none;
      transition: 0.5s;
      border: none;
    }
    input[type="submit"]:hover {
      border-color: #17f522;
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
    }
    @media screen and (max-width: 768px) {
      .column {
        width: 100%;
      }
      .logo {
        width: 80%;
      }
      .center {
        max-width: 100%;
      }
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="../assets/img/GCU_logo.png" rel="icon">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="column">
        <!-- <img id="logo-gcu" src="../assets/img -->
        <img id="logo-gcu" src="../assets/img/GCU_logo.png" alt="Logo" class="logo">
      </div>
      <div class="column">
        <form id="Login_Student_Employee" method="post" style="width: 90%;">
          <h1>LOGIN FORM</h1>
          <br>
          <div class="txt_field">
            <input type="text" id="email" name="email" required />
            <span></span>
            <label>Username</label>
          </div>
          <div class="txt_field">
            <input type="password" id="password" name="password" required />
            <span></span>
            <label>Password</label>
          </div>
          <div class="pass"><a href="../ForgotPassword.php"><b>Forgot Password?</b></a></div>
          <input type="submit" value="Login" id="submitButton" />
          <div class="signup_link">Not a member? <a href="SignUp_Employee.php"><b>Signup</b></a></div>
        </form>
        <a href="/gcu/home" class="back-to-home-button">BACK TO HOME</a>
      </div>
    </div>
  </div>
</body>
<script>
  $("#Login_Student_Employee").on("submit", function(event) {
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
      success: function(data) {
        if (data === "success_employee") {
          window.location.href = "../Employee_Side/employee-home";
        } else if (data === "success_admin") {
          window.location.href = "../Admin_Side/main.php";
        } else {
          alert("Invalid username or password.");
        }
      }
    });
  });
</script>
</html>

