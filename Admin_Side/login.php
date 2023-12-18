<?php
session_start();

$_SESSION['origin'] = 'Student';
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto');
   
        body {

  font-family: 'Roboto', sans-serif;
  display: flex;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}
        .left-column img {
            margin-top: 15%;
            margin-bottom: 5%;
            margin-left: 5%;
            width: 60%;
            -webkit-animation: mover 2s infinite alternate;
            animation: mover 1s infinite alternate;
        }
        .container {
          
            display: flex;
        }
        .left-column {
             padding: 5px; 
        }
        .right-column {
            padding: 5px;
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
  border: 1px solid #ccc; /* Add a border around the input */
  border-radius: 5px; /* Add rounded corners to the border */
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
.txt_field input:focus ~ label,
.txt_field input:valid ~ label {
  top: -10px;
  
}
.txt_field input:focus ~ span::before,
.txt_field input:valid ~ span::before {
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
  border-color:#17f522;
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
      
       
   
    
    </style>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<link href="assets/img/GCU_logo.png" rel="icon">
</head>
<body>
    <div class="container" style="width: 90%; margin-left: 2%;">
        <div class="left-column">
            <img src="../assets/img/GCU_logo.png" alt="Logo" class="logo">
        </div>
        
        
        <form id="Login_Student_User" method="post" style="width: 50%;">
          <h1>LOGIN FORM</h1>
        <br>
        
            <div class="txt_field">
              <input type="email" id="email" name="email" required />
              <span></span>
              <label>Email</label>
            </div>
            <div class="txt_field">
              <input type="password" id="password" name="password" required />
              <span></span>
              <label>Password</label>
            </div>
            <div class="pass"><a href="ForgotPassword.php"><b>Forgot Password?</b></a></div>
            <input type="submit" value="Login" id="submitButton" />
            <div class="signup_link">Not a member? <a href="Admin_SignUp.php"><b>Signup</b></a></div>
          </form>
       
    </div>
</body>
<script>
    $("#Login_Student_User").on("submit", function (event) {
    var source = "student_side_login";
    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: '../backend/validate_user.php',
        data: {
            email: $("#email").val(),
            password: $("#password").val(),
            source: source
        },
        success: function (data) {
     
            if (data === "success_student") {
                window.location.href = "../Student_Side/transaction.php";
            } else {
              alert("Invalid username or password.");
            }
          
        }
    });
});
   
    
  </script>
</html>
