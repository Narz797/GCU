<?php
session_start();
// include '../backend/validate_user.php';
// include '../backend/connect_database.php';
$_SESSION['origin'] = 'Employee';
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto');

   

        body {
  /* background: #2980b9; */
  font-family: 'Roboto', sans-serif;
  /* background: rgb(51, 138, 11); */
  /* background: rgb(51, 138, 11); */
    /* background: -webkit-linear-gradient(left, #0c4401, #ebeeeb);  */
display: flex;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

        /* .field{ */
            
            /* background: -webkit-linear-gradient(left, #fefefe, #61c6be); */
         
        /* } */

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
            /* flex-direction: row; */
        }

        .left-column {
            /* flex: 1; */
             padding: 5px; 
            /* display: flex; */
            /* justify-content: center; */
            /* align-items: center; */
            /* width: auto;
            margin-left:auto; */
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
  padding: 0 40px;
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
  
  /* color: #000000; */
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
  /* background: -webkit-linear-gradient(left, #f3e302 , #f6f8f5); */

    /* background: -webkit-linear-gradient(left, #e7e7e2 , #0c4401); */
}
input[type="submit"]:hover {
  border-color:#17f522;
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

    </style>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      <link href="../assets/img/GCU_logo.png" rel="icon">
</head>
<body>
   <!-- <fieldset style="width:80%;"> -->
    <div class="container" style="width: 90%; margin-left: 2%;">
        <div class="left-column">
            <img src="../assets/img/GCU_logo.png" alt="Logo" class="logo">
        </div>

        
        
        <form id="Login_Student_Employee" method="post" style="width: 50%;">
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
            <div class="pass"><a href="ForgotPassword.php"><b>Forgot Password?</b></a></div>
            <input type="submit" value="Login" id="submitButton" />
            <div class="signup_link">Not a member? <a href="#"><b>Signup</b></a></div>
          </form>

       
    </div>


        


    

 

  
</body>
<script>
      function goHome() {
                  // Redirect to the desired page
                  window.location.href = '../Student_Side/index.php';
              }
          $("#Login_Student_Employee").on("submit", function (event) {
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
        success: function (data) {
     
            if  (data === "success_employee") {
                window.location.href = "../Employee_Side/index.php";
            } else if  (data === "success_admin") {
                window.location.href = "../Admin_Side/main.php";
            } else {
              alert("Invalid username or password.");
            } 
          
        }
    });
});


   
    
  </script>
</html>
