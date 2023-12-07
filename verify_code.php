<?php 

session_start();
$randomNumber = $_SESSION['random_number'];

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
  <link href="assets/css/forgot_password_style.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

  <style>
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




#loading-spinner {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 1;
      transition: opacity 0.5s ease;
      display: none;
     
    }



    input[type="number"] {
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
      transition: border-color 0.3s ease;
    }

    input[type="number"]:focus {
      outline: none;
      border-color: #2980b9; /* Change the border color on focus */
    }

    #verify:hover {
      /* background-color: #2980b9; */
      /* color:green; */
      transform: scale(1.1);
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    button {
      padding: 10px 20px;
      font-size: 16px;
      background-color: #3498db;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #2980b9; /* Change the background color on hover */
      transform: scale(1.1);
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="logo">
      <img src="assets/img/GCU_logo.png" alt="Logo" width="90" height="90">
    </div>
    <img id="loading-spinner"  src="assets/img/GCU_LOGO.gif">
    <h2  style="color:black; font-family: 'Lucida Console', Courier, monospace;">FORGOT PASSWORD</h2>
    <form id="verify_code" method="post">
        <label for="code" style="color:black;">Input 4 digit code*</label>
        <br>
        <input type="number" id="code" name="number" oninput="validateInput(this)" required>
        
      <br>
      <br>

      <input id="verify"style="background-color:black;color:white;" type="submit" value="Verify">
    </form>
    <button onclick="resend()">Resend Code</button>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function validateInput(input) {
  // Get the input value and remove any non-digit characters
  let inputValue = input.value.replace(/\D/g, '');

  // Limit the input to 4 digits
  inputValue = inputValue.slice(0, 4);

  // Update the input value
  input.value = inputValue;
}
</script>
<script>
    function resend(){
          // Show loading spinner
          Swal.fire({
                title: 'Sending Email',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                    },
            });
        $.ajax({
      type: 'POST',
      url: 'backend/resend.php',
      success: function(data) {
                // Hide loading spinner on success
                swal.close();

                Swal.fire({
              icon: "sucess",
              title: "Code Sent!",
              text: "Go to your email to retrieve the code",
              confirmButtonText: "OK",

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  window.location.reload();
                } 
              });
   
  

     
        // add location to enter code
      },
                  error: function (xhr, status, error) {
                    console.error("Error:", error);
                    alert("Error: " + error);
                  },
    });
    }
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
                  Swal.fire({
              icon: "sucess",
              title: "Code verified",
              confirmButtonText: "OK",

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  window.location.href = "update_pass.php";
                } 
              });
        
       
        } else {
          // alert('Error, Invalid Code', data);
          Swal.fire({
              icon: "error",
              title: "Invalid Code",
              text:"please try again",
              confirmButtonText: "OK",

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
          
                } 
              });
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
