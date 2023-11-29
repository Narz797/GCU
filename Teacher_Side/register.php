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
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="register.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <title>Teacher Regisration Form </title>
   <link href="../assets/img/GCU_logo.png" rel="icon">


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
  #loading-spinner {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 1;
      transition: opacity 0.5s ease;
      display: none;
      
    
    }

    .container1 {
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

input {
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


    

  
</style>
<body>



    <!-- Might as well put the header or banner here-->

    <div class="container">
        <header>TEACHER REGISTRATION FORM</header>
        <form id="registrationForm" method="POST">
            <div class="form first">
                <div class="details personal">
                    <br>
                    <hr>
                    <br>
                    <div class="fields">
                        <div class="input-field">
                            <label for="idNumber">Employee ID Number:</label>
                            <input type="text" id="idNumber"  name="idNumber" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                        </div>
                        <div class="input-field">
                            <label>College</label>
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
                            <input type="text" id="cn"  name="cn"oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                        </div>
                        <div class="input-field">
                            <label>Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" id="password" name="password" required>
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
                        <button onclick="window.location.href='.././home'">BACK</button>
                        <!-- <button type="submit">SUBMIT</button> -->
                        <button  onclick="add_remarks()">REGISTER</button>
                    </div>
                </div>
            </div>
       
        <!-- verrify popup -->

                <div id="modal" class="modal">
            <div class="modal_content">
                <div class="body">
                <div class="logo">
                    <img id="loading-spinner" style="display: none;" src="../assets/img/GCU_LOGO.gif">
                    </div>
                <div class="container1">
                    <form id="verify_code" method="post">
                    <h1>A verification code has been den to your email, please enter the code below to fully register your account</h1>
                    <div class="id">
                        <label for="email" style="color:black;">Verification Code:</label>
                        <input type="number" id="code" name="code" oninput="validateInput(this)" required>
                        <button onclick="verify()" >Verify</button>
                    </div>
                    <!-- fasdfas -->
                    </form>
                </div>
                </div>
            </div>
            </div>
            </form>
    </div>
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
    $("#loading-spinner").show();
    
    console.log("performing ajax");
    $.ajax({
      type: 'POST',
      url: '../backend/email_verify.php',
      data: {
        email: $("#email").val()
      },
      success: function(data) {
        // Hide loading spinner on success
        $("#loading-spinner").hide();
        if (data === "unregistered") {
          alert("This Email is already registered")
          console.log(data);
          
        } else {
          alert("The verification code has sent to your email.")
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

        $("#loading-spinner").hide();
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
                        alert("Code Verified")
                        console.log("verified",data)
                        
                            
                                    // code to fully register
                                    // --------------------------------------

                                                $.ajax({
                                                    type: 'POST',
                                                    url: '../backend/register_user.php',
                                                    data: $("#registrationForm").serialize(),
                                                    success: function (data) {
                                                        if (data === "success_teacher") {
                                                            document.getElementById("modal").style.display = "none";
                                                            window.location.href = "teacher-login";
                                                            alert("Congratulation, you are now registered!");
                                                        } else {
                                                            document.getElementById("modal").style.display = "none";
                                                            alert("Somehin went wrong, please try again");
                                                            console.log("Error",data);
                                                        }
                                                    },
                                                    error: function () {
                                                        alert("Connection error");
                                                    }
                                                });
                                    // --------------------------------------
                        } else {
                        alert('Error, Invalid Code, please try again', data);
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
</body>
</html>