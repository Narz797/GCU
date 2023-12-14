<?php
session_start();
// include '../backend/register_user.php';
// include '../backend/connect_database.php';
$_SESSION['origin'] = 'Teacher_Register';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Regisration Form </title>
   <link href="../assets/img/GCU_logo.png" rel="icon">
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="assets/style.css">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- <link rel="stylesheet" href="../assets/css/stud_reg.css"> -->
  

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   


    <!-- <link href="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script> -->


</head>
<style>
      .modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 1;
  }

  .modal_content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }


    .container2 {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    text-align: center;
    background-color: #f9f9f9;
}

h1 {
    font-size: 18px;
    color: #333;
}

.id {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

.code {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    box-sizing: border-box;
}

button {
    background-color: #3457D5;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color:#5D8AA8;
}

/* Add additional styles as needed */

.fa-eye, .fa-eye-slash  {
  position: absolute;
  /* right: 10px; */
  top: 60.5%;
  right:1%;
 
  cursor: pointer;
  color: #ccc; /* Set the initial color of the eye icon */
}

 .fa-eye {
  color: black; /* Change color on focus to match the border color */
}
/* .fa-eye, .fa-eye-slash {
    position: absolute;
    right: 8px;
    top: 12px;
    cursor: pointer;
  } */
    /* .field{ */
    /* background: -webkit-linear-gradient(left, #fefefe, #61c6be); */
    /* } */
    

  
</style>
<body>
    <!-- <div class="left-column">
        <img src="assets/img/GCU_logo.png" alt="Logo" class="logo">
    </div>
     -->
    <div class="container">
        <header>TEACHER REGISTRATION FORM</header>
        <form method="POST" id="registrationForm" enctype="multipart/form-data">
            <div class="form first">
                <div class="details personal">
                    <br>
                    <hr>
                    <hr>
                    <br>
                    <br>
                    <br>
                    <div class="fields">
                        <div class="input-field">
                        <label for="idNumber">Employee ID Number:</label>
                        <input type="text" id="idNumber"  name="idNumber"  required>
                        </div>
                        <div class="input-field">
                            <label for='course'>College</label>
                            <select required id="college" name="college">
                                <option disabled selected>Select College</option>
                                <option>College of Agriculture</option>
                                <option>College of Teacher Education</option>
                                <option>College of Home Economics & Technology</option>
                                <option>College of Forestry</option>
                                <option>College of Nursing</option>
                                <option>College of Veterinary Medicine</option>
                                <option>College of Human Kinetics</option>
                                <option>College of Public Administration & Governance</option>
                                <option>College of Information Sciences</option>
                                <option>College of Arts & Humanities</option>
                                <option>College of Social Sciences</option>
                                <option>College of Numeracy & Applied Sciences</option>
                                <option>College of Natural Sciences</option>
                            </select>
                        </div>

                        <div class="input-field">
                        <label>Gender</label>
                            <select required id="gender" name="gender">
                                <option disabled selected>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Last Name</label>
                            <input type="text" id="lastname" name="lastname" required>
                        </div>

                        <div class="input-field">
                            <label>First Name</label>
                            <input type="text" id="firstname" name="firstname" required>
                        </div>

                        <div class="input-field">
                            <label>Middle Name</label>
                            <input type="text" id="middlename" name="middlename" required>
                        </div>
                        <div class="input-field">
                            <label>Contact Number</label>
                            <input type="number" id="cn"  name="cn" oninput="limitTo11Digits(event)" required>
                        </div>
                        <div class="input-field">
                            <label>Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" id="password" name="password" required>
                            <i class="fas fa-eye" onclick="togglePasswordVisibility('password')"></i>
                        </div>
                        <div class="input-field">
                            <label>Civil Status</label>
                            <select required id="stat" name="stat">
                            <option disabled selected>Select</option>
                                <option>Single</option>
                                <option>Married</option>
                                <option>Divorced</option>
                                <option>Widowed</option>
                            </select>
                        </div>
                        <div class="input-field">
                        </div>
                        <div class="input-field">
                        </div>
                        <!-- <div class="buttons"> -->
                <button class="backBtn" onclick="goback()">
                    <i class="uil uil-navigator"></i>
                    <span class="btnText">Back</span>
                </button>
                        <button class="nextBtn" id="next" onclick="add_remarks()">
                            <span class="btnText">REGISTER</span>
                            <i class="uil uil-navigator"></i>
                        </button>

                    </div>
                </div>
            </div>
                  <!-- verrify popup -->

                  <div id="modal" class="modal">
            <div class="modal_content">
                <div class="container">
                <div class="logo">
                    <img id="loading-spinner" style="display: none;" src="../assets/img/GCU_LOGO.gif">
                    </div>
                <div class="container2">
                <h1  style="color:black; font-family: 'Lucida Console', Courier, monospace;">A verification code has been den to your email, please enter the code below to fully register your account</h1>
                    <form id="verify_code" method="post">
                    
                    <div class="id">
                        <label for="email" style="color:black;">Verification Code:</label>
                        <input type="number" class="code" id="code" name="code" oninput="validateInput(this)" required>
                        <button onclick="verify()" >Verify</button>
                        <button class="btn btn-sm btn-primary" onclick="resend()">Resend Code</button>
                
                    <button class="btn btn-sm btn-primary" onclick="goback()">Cancel</button>
                    
                    </div>
        </form>

    </div>
                </div>
            </div>
                  </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
             willClose: () => {
 // Set the display property of the element with ID "modal" to "block"
 document.getElementById("modal").style.display = "block";
}
     });
 $.ajax({
type: 'POST',
url: '../backend/resend.php',
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
           // window.location.reload();
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
        function goback(){
            window.location.href="../home";
        }
          function limitTo11Digits(event) {
  var input = event.target;
  var inputValue = input.value.replace(/\D/g, ''); // Remove non-numeric characters

  if (inputValue.length > 11) {
    input.value = inputValue.slice(0, 11);
  }
}
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
 
        function closeModal() {
    document.getElementById("modal").style.display = "none";
  }
          // Add an event listener to close the modal when clicking outside of it
                window.addEventListener("click", function (event) {
                    var modal = document.getElementById("modal");
                    if (event.target === modal) {
                    closeModal();
                    }
                });



    
// --------------FOR EMAIL VERIFICATION--------------------
        function add_remarks(){
            document.getElementById("modal").style.display = "block";
                // Show loading spinner
                Swal.fire({
                title: 'Sending Email',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                    },
            });
    
    console.log("performing ajax");
    $.ajax({
      type: 'POST',
      url: '../backend/email_verify.php',
      data: {
        email: $("#email").val()
      },
      success: function(data) {
        // Hide loading spinner on success
        swal.close();
        if (data === "unregistered") {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "This Email in already registered, please use a different email",
              confirmButtonText: "OK",

                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                      
                    } 
                  });
          console.log(data);
          
        } else {
            Swal.fire({
              icon: "sucess",
              title: "Code Sent!",
              text: "Go to your email to retrieve the code",
              confirmButtonText: "OK",

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                
                } 
              });
              console.log("Success",data)

                // verify();

                    // --------------------------------------------
        }

        // add location to enter code
      },
      error: function(xhr, status, error) {
        // Hide loading spinner on error
       
        
        console.error("Error:", error);
        alert("Error: " + error);

        swal.close();
      },
    });
       


}
    
                   // Send code verificaion
                    // ----------------------------------------------
             function verify() {
                    event.preventDefault();
                    console.log("performing ajax for code verify");
                    $.ajax({
                    type: 'POST',
                    url: '../backend/verify.php',
                    data: {
                        code: $("#code").val()
                    },
                    success: function(data) {
                        console.log("code recieved", data)
                        if (data === "Code Verified") {
                            Swal.fire({
                                icon: "sucess",
                                title: "Code verified",
                                confirmButtonText: "OK",

                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                
                           
                        console.log("verified",data)
                        
                            
                                    // code to fully register
                                    // --------------------------------------

                                                $.ajax({
                                                    type: 'POST',
                                                    url: '../backend/register_user.php',
                                                    data: $("#registrationForm").serialize(),
                                                    success: function (data) {
                                                        if (data === "success_teacher") {
                                                            Swal.fire({
                                                                icon: "sucess",
                                                                title: "Registered",
                                                                text: "Congratulation, you are now registered!",
                                                                confirmButtonText: "OK",

                                                                }).then((result) => {
                                                                    /* Read more about isConfirmed, isDenied below */
                                                                    if (result.isConfirmed) {
                                                                        document.getElementById("modal").style.display = "none";
                                                                         window.location.href = "teacher-login";
                                                                    } 
                                                                });
                                              
                        
                                                        } else if (data === "registered") {
                                                            Swal.fire({
                                                                icon: "error",
                                                                title: "Email Already Used",
                                                                text: "Please use a idfferent email",
                                                                confirmButtonText: "OK",

                                                                }).then((result) => {
                                                                    /* Read more about isConfirmed, isDenied below */
                                                                    if (result.isConfirmed) {
                                                                        document.getElementById("modal").style.display = "none";
                                                                         console.log("Error",data);
                                                                    } 
                                                                });
                                        
                                                        } else{
                                                            Swal.fire({
                                                                icon: "error",
                                                                title: "Ooops...",
                                                                text: "Something went wrong, please try again",
                                                                confirmButtonText: "OK",

                                                                }).then((result) => {
                                                                    /* Read more about isConfirmed, isDenied below */
                                                                    if (result.isConfirmed) {
                                                                        // document.getElementById("modal").style.display = "none";
                                        
                                                                        console.log("Error",data);
                                                                    } 
                                                                });

                                                        }
                                                    },
                                                    error: function () {
                                                        alert("Connection error");
                                                    }
                                                });
                                    // --------------------------------------

                                } 
                                });
                        } else {
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

                };
           
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
</body>
</html>