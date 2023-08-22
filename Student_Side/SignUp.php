<?php
session_start();
$_SESSION['origin'] = 'Student_Register';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Student Sign Up</title>

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <link rel="stylesheet" href="../Css/register_style.css">
   <link href="assets/img/GCU_logo.png" rel="icon">
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
          <input type="button" value="Cancel" onclick="location.href='../index.php';" />
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

  