<?php
session_start();
$_SESSION['origin'] = 'Student_Register';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Student Sign Up</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color:#084603;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      width: 60%;
      margin: 0 auto;
      padding: 40px;
      background-color: #04680c;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center; /* Center align the content inside the container */
    }

    .container h2 {
      margin-bottom: 20px;
    }

    .logo {
      display: flex;
      align-items: center; /* Align logo and text vertically */
      justify-content: center; /* Center align the logo and text horizontally */
      margin-bottom: 20px;
    }

    .logo img {
      margin-right: 10px; /* Add some spacing between the logos */
    }

    .form-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .form-group {
      flex-basis: calc(50% - 5px);
    }

    .form-group:first-child {
      margin-right: 10px;
    }

    .form-group:last-child {
      margin-left: 20px;
    }



    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="password"] {
      width: 90%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-group .buttons {
      display: flex;
      justify-content: center; /* Updated alignment property */
    }

    .form-group input[type="submit"],
    .form-group input[type="button"] {
      margin-left: 10px;
      padding: 10px;
      background-color: #13a110;
      color: #bcedb0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .form-group input[type="submit"]:hover,
    .form-group input[type="button"]:hover {
      background-color: rgb(179, 188, 6);
      color:black;
    }

    .container .login {
    text-align: center;
    margin-top: 15px;
    grid-column: span 2;
    color: #000000;
    }
    
    .container .login a {
      font-style: bold;
      color: yellow;
      text-decoration: none;
    }
    
    .container .login a:hover {
      color: #333;
    }

    .container h2 {
      text-align:center;
      color: #d7d70f;
      margin-bottom: 30px;
    }

  </style>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="logo">
     
      <img src="assets/img/GCU_logo.png" alt="Logo" width="90" height="90">
    </div>
    <h2>Sign Up</h2>
    <form id="Signup_Student_User" method="POST">
      

      <div class="form-group">
        <input type="number" id="idno" placeholder="Student ID No:" name="idno" required>
      </div>
      <br>

     

      <div class="form-row">
        <div class="form-group">
          <input type="text" id="firstname" placeholder="First Name" name="firstname" required>
        </div>

        <div class="form-group">
          <input type="text" id="lastname" placeholder="Last Name" name="lastname" required>
        </div>

      </div>

      <div class="form-row">
        <div class="form-group">
          <input type="text" id="middlename" placeholder="Middle Name" name="middlename" required>
        </div>

        <div class="form-group">
			<label for="select">Gender</label>
              <select name="select" id="select">
				  <option>Male</option>
				  <option>Female</option>
    			</select>
        </div>

      </div>

     <div class="form-row">
        <div class="form-group">
          <input type="number" id="year" name="year" placeholder="Year (YYYY)" min="1999" max="2020" required>
        </div>

        <div class="form-group">
          <input type="text" id="course"  placeholder="Course" name="course" required>
        </div>

      </div>

       <div class="form-row">
        <div class="form-group">
          <label for="date">Birthdate:</label>
    	  <input type="date" name="date" id="date">
        </div>

        <div class="form-group">
          <input type="email" id="email" placeholder="Email" name="email" required>
        </div>

      </div>

    

      <div class="form-row">
        <div class="form-group">
          <input type="text" id="username" placeholder="Username" name="username" required>
        </div>

        <div class="form-group">
          <input type="password" id="password" placeholder="Password" name="password" required>
        </div>
      </div>

      <div class="form-group">
        <div class="buttons">
          <input type="submit" value="Sign Up" id="submitButton">
          <input type="button" value="Cancel">
        </div>
      </div>

        <div class="login">
          Already have an account? <a href="login.php">Log in</a>
        </div>

      </div>

    </form>
  </div>

<script>

  $("#Signup_Student_User").on("submit", function (event) {
  var source = "student_side_signup";
  event.preventDefault();

  $.ajax({
      type: 'POST',
      url: '../backend/register_user.php',
      data: {
        idno: $("#idno").val(),
        firstname: $("#firstname").val(),
        lastname: $("#lastname").val(),
        middlename: $("#middlename").val(),
        select: $("#select").val(),
          year: $("#year").val(),
          course: $("#course").val(),
          date: $("#date").val(),
          email: $("#email").val(),
          username: $("#username").val(),
          password: $("#password").val(),

          source: source
      },
      success: function (data) {
  
          if (data === "success_student") {
              window.location.href = "../Student_Side/login.php";
              alert("Sign up successful");
          } else {
            alert(data);
          }
        
      }, error: function (data) {
        alert("Connection error");
      }
  });
  });


</script>
</body>
</html>

  