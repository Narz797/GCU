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
                        <button type="Submit" >Register</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- verrify popup -->

                <div id="modal" class="modal">
            <div class="modal_content">
                <div class="body">
                <div class="container">
                    <form>
                    <h1>Email Verification</h1>
                    <div class="id">
                        <textarea cols="20" rows="7" placeholder="Enter your remarks here..." id="remarksTextarea"></textarea>
                        <button onclick="add_remarks()"> Add </button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
    </div>
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
        $(document).ready(function () {

            function verify(){
            document.getElementById("modal").style.display = "block";
                            // $.ajax({
                //     type: 'POST',
                //     url: '../backend/register_user.php',
                //     data: $(this).serialize() + '&source=' + source,
                //     success: function (data) {
                //         if (data === "success_teacher") {
                //             window.location.href = "teacher-login";
                //             alert("Sign up successful");
                //         } else {
                //             alert(data);
                //         }
                //     },
                //     error: function () {
                //         alert("Connection error");
                //     }
                // });

        }
            $("#registrationForm").on("submit", function (event) {
                
                // var source = "teacher_side_signup";
                // event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '../backend/email_verify.php',
                    success: function (data) {
                        if (data === "code_sent") {
                            verify();
                            console.log("code sent: ", data);
                        } else {
                            alert(data);
                        }
                    },
                    error: function () {
                        alert("Connection error");
                    }
                });
            });
        });
    </script>
</body>
</html>