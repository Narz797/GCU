<?php 
session_start();
  // Check if the session variable is empty
  include '../backend/log_audit2.php';
  if (empty($_SESSION['session_id'])) {
    // Redirect to the desired location
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'You already logged out',
                text: 'Please login again'
            }).then(function () {
                window.location.href = '../home';
            });
        });
    </script>
    <?php
    exit; 
}
  // include 'main2.php';
$id = $_SESSION['session_id'];
logAudit($id, 'access_teacher', $id .' has accessed the teacher profile page');
$_SESSION['transact_type'] = 'Referral';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher's Profile</title>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <!-- Remix icons -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Stylesheet -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="../assets/img/GCU_logo.png" rel="icon">
  <link rel="stylesheet" href="assets/css/edit.css">
  <link rel="stylesheet" href="assets/css/referslip.css">

  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

 <!-- Header -->
 <header class="header">
    <nav class="nav"> 
        <div class="logo">
        <img src="GCU_logo.png" alt="">
        </div>
        <div class="nav-mobile">
            <div class="list">
                <div class="list-item">
                    <button onclick="goBack()" class="list-link current">BACK</button>
                </div>
            </div>
        </div>
        <div class="align-right">
            <button class="icon-btn menu-toggle-btn menu-toggle-open place-items-center" onclick="goBack()" class="list-link current">
            <i class="ri-arrow-left-circle-line"></i>
            </button>
            <button class="icon-btn place-items-center" onclick="edit()">
              <i class="ri-edit-2-fill"></i>
            </button>
            <button class="icon-btn place-items-center" onclick="logout()">
                <i class="ri-user-3-line"></i>
            </button>
            <button class="icon-btn place-items-center" onclick="faq()">
                <i class="ri-question-mark"></i>
            </button>
        </div>
        </div>
    </nav>
</header>
<?php include '../includes/banner.php' ?>


<body>
<div class="independent-title1">
        <h2>MY PROFILE</h2>
    </div>






<div class="amen">
    <button onclick="verify()" class="btnText1" id="Update"><span class="btnText">Update</span><i class="ri-edit-2-fill"></i></button>
    <button onclick="cancel()" class="btnText1" id="Cancel"><span class="btnText">Cancel</span><i class="ri-arrow-left-circle-line"></i></button>  
</div>
<div class="container-fluid mt--7">
      <div class="row">
      


        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
   
            <div class="card-body" style="background-color:lightgray;">
              <form id ="myForm2" style="width: 100%;">

                <h6 class="heading-small text-muted mb-4" style="color:black; font-weight:bold;">User Information </h6>
                <div class="pl-lg-4">
                 
                    <div class="col-lg-6" style="width:90px; padding:0; ">
                      <div class="form-group focused id1" >
                        <label class="form-control-label" for="input-username" id="EId" >ID No.</label>
                        <input type="text"  class="form-control form-control-alternative" id="idd" readonly >
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="email">Email</label>
                        <input type="email"  class="form-control form-control-alternative" id="email" readonly >
                      </div>
                    </div>

                    <div class="col-lg-6" id="ps">
                      <div class="form-group">
                        <label class="form-control-label" for="pass">Password</label>
                        <input type="password"  class="form-control form-control-alternative" id="pass" style="border:2px solid yellow; padding: 1rem 0.75rem; height:auto;">
                        <i class="fas fa-eye" onclick="togglePasswordVisibility('pass')"></i>
                      </div>
                    </div>

                    <div class="col-lg-6" id="ps2">
                      <div class="form-group">
                        <label class="form-control-label" for="pass">Verify Password</label>
                        <input type="password"  class="form-control form-control-alternative" id="pass2" style="border:2px solid yellow; padding:1rem 0.75rem; height:auto;">
                        <i class="fas fa-eye" onclick="togglePasswordVisibility('pass2')"></i>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Last Name</label>
                        <input type="text"  class="form-control form-control-alternative" id="lname" readonly >
                      </div>
                    </div>
      
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First Name</label>
                        <input type="text"  class="form-control form-control-alternative" id="fname" readonly >
                      </div>
                    </div>
                    
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Middle Name</label>
                        <input type="text" class="form-control form-control-alternative" id="mname" readonly >
                      </div>
                    </div>
                    
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Contact Number</label>
                        <!-- Editable -->
                        <input type="text" class="form-control form-control-alternative" id="CN" readonly oninput="limitTo11Digits(event)">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">College</label>
                    <select class="form-control form-control-alternative" required id="college" name="college" disabled>
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
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Gender</label>
                        <select class="form-control form-control-alternative" required id="gender" name="gender" disabled>
                                <option disabled selected>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label  class="form-control-label" for="input-last-name">Civil Status</label>
                        <!-- Editable -->
                        <select class="form-control form-control-alternative" required id="stat" name="stat" disabled>
                            <option disabled selected>Select</option>
                                <option>Single</option>
                                <option>Married</option>
                                <option>Divorced</option>
                                <option>Widowed</option>
                            </select>
                      </div>
                    </div>
                  </div>
            </form>

<!-- 
            <button onclick="verify()" class="list-link current" id="Update">UPDATE</button>
                  <button onclick="cancel()" class="list-link current" id="Cancel">CANCEL</button> -->

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
                        <a class="btn btn-sm btn-primary" style="color: white;" onclick="update()" >Verify</a>
                        <a class="btn btn-sm btn-primary" onclick="resend()">Resend Code</a>
                    <a class="btn btn-sm btn-primary" onclick="cancel()">Cancel</a>
                    </div>
                  </div>
                </div>
            </div>
            </div>
                    <!-- fasdfas -->
                    </form>
                
                </div>
            </div>
            </div>
          </div>
        </div>
<footer id="topbar" class="topbar d-flex align-items-center" style="background-color:#008B8B; height: 50px; "></footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
      var tID = "<?php echo $_SESSION['session_id'];?>";
      function resend(){
      // document.getElementById("modal").style.display = "none";
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
        function goBack() {
            window.history.back();
        }
        function logout() {
        $.ajax({
            type: 'POST',
            url: '../../backend/log_audit.php',
            data: {
              userId: tID,
              action: 'logged out',
              details: tID + ' Clicked log out'
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
            window.location.href = '../home';
        }

    </script>


<script>
  var tID = "<?php echo $_SESSION['session_id'];?>";
  function limitTo11Digits(event) {
  var input = event.target;
  var inputValue = input.value.replace(/\D/g, ''); // Remove non-numeric characters

  if (inputValue.length > 11) {
    input.value = inputValue.slice(0, 11);
  }
}
function faq(){
        window.location.href="FAQ.php"
    }
function logout() {
  $.ajax({
            type: 'POST',
            url: '../../backend/log_audit.php',
            data: {
              userId: tID,
              action: 'logged out',
              details: tID + ' Clicked log out'
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
    window.location.href = '../home';
}
    var upd = $("#Update");
     var cnl = $("#Cancel");
     var pass = $("#ps");
     var pass2 = $("#ps2");
     cnl.hide();
     upd.hide();
     pass.hide();
     pass2.hide();

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
  function limitToSingleCharacter(event) {
  var input = event.target;
  var inputValue = input.value.toUpperCase().replace(/[^A-Z]/g, '');

  if (inputValue.length > 1) {
    input.value = inputValue.slice(0, 1);
  }
}
function toggleInput(chk, lbl) {
    var checkbox = document.getElementById(chk);
    var input = document.getElementById(lbl);

    if (!checkbox.checked) {
      input.value = " ";
    } 
  }
function fetchData() {

// Function to update the HTML elements
function updateValues(EmployeeId, college, lname, fname, mname, cn, email , gender, cs) {

    $('#idd').val(EmployeeId);//
    $('#college').val(college);
    $('#lname').val(lname);
    $('#fname').val(fname);
    $('#mname').val(mname);
    $('#gender').val(gender);
    $('#CN').val(cn);
    $('#stat').val(cs);
    $('#email').val(email);
  
}


console.log('AJAX request started');
$.ajax({
type: 'GET',
url: '../backend/get_teacher.php',
dataType: 'json',

    // ...
    success: function (data) {
      console.log(data);
        if (data.length > 0) {
              var EmployeeData = data[0]; // Assuming you expect a single row
                var EmployeeId = EmployeeData.employee_id;
                eID = EmployeeData.employee_id;
                var college = EmployeeData.college;
                var gender = EmployeeData.gender;
                var lname = EmployeeData.last_name ;
                var fname = EmployeeData.first_name;
                var mname = EmployeeData.middle_name;
                cn = EmployeeData.contact_number;
                var cs = EmployeeData.civil_status;
                var email = EmployeeData.email;
                Temail = EmployeeData.email;
                // var cs = EmployeeData.civil_status;
                console.log("ID: ", gender);

                updateValues(EmployeeId, college, lname, fname, mname, cn, email, gender, cs);

            } else {
            // Handle the case when no results are found
            // You can update the UI as needed
            console.log('No results found');
        }
},
error: function (xhr, status, error) {
    console.error('Error: ' + error);
    console.error('Status: ' + status);
    console.error('Response: ' + xhr.responseText);
}
});
}
fetchData();


function addHighlight(element) {
            element.classList.add('highlight');
        }

        // Function to remove highlight class
        function removeHighlight(element) {
            element.classList.remove('highlight');
        }
        function edit() {
    console.log("Edit btn clicked");
    cnl.show();
    upd.show();
    pass.show();
    pass2.show();
    // Get the select and input elements by their IDs
    var email = document.getElementById('email');//
    var clg = document.getElementById('college');//
    var ln = document.getElementById('lname');//
    var fn = document.getElementById('fname');//
    var mn = document.getElementById('mname');//
    var gndr = document.getElementById('gender');//
    var cn = document.getElementById('CN');//
    var cs = document.getElementById('stat');//
  


    clg.disabled = false;//
    gndr.disabled = false;//
    email.removeAttribute('readonly');//
    ln.removeAttribute('readonly');//
    fn.removeAttribute('readonly');//
    cs.disabled = false;//
    mn.removeAttribute('readonly');//
    cn.removeAttribute('readonly');//
    

    email.style.border = '2px solid yellow';
    email.style.padding = '1rem 0.75rem';
    email.style.height = 'auto';
    

    clg.style.border = '2px solid yellow';
    clg.style.padding = '1rem 0.75rem';
    clg.style.height = 'auto';

    gndr.style.border = '2px solid yellow';
    gndr.style.padding = '1rem 0.75rem';
    gndr.style.height = 'auto';

    ln.style.border = '2px solid yellow';
    ln.style.padding = '1rem 0.75rem';
     ln.style.height = 'auto';

    cn.style.border = '2px solid yellow';
    cn.style.padding = '1rem 0.75rem';
     cn.style.height = 'auto';

    cs.style.border = '2px solid yellow';
    cs.style.padding = '1rem 0.75rem';
     cs.style.height = 'auto';

    fn.style.border = '2px solid yellow';
    fn.style.padding = '1rem 0.75rem';
     fn.style.height = 'auto';

    mn.style.border = '2px solid yellow';
    mn.style.padding = '1rem 0.75rem';
     mn.style.height = 'auto';

    
}
function cancel(){
  var email = document.getElementById('email');
var clg = document.getElementById('college');
var ln = document.getElementById('lname');
var fn = document.getElementById('fname');
var mn = document.getElementById('mname');
var gndr = document.getElementById('gender');
var cn = document.getElementById('CN');
var cs = document.getElementById('stat');

clg.disabled = true;
gndr.disabled = true;
email.setAttribute('readonly', true);
ln.setAttribute('readonly', true);
fn.setAttribute('readonly', true);
cs.disabled = true;
mn.setAttribute('readonly', true);
cn.setAttribute('readonly', true);


email.style.border = '';
email.style.padding = '.625rem .75rem';

clg.style.border = '';
clg.style.padding = '.625rem .75rem';

gndr.style.border = '';
gndr.style.padding = '.625rem .75rem';

ln.style.border = '';
ln.style.padding = '.625rem .75rem';

cn.style.border = '';
cn.style.padding = '.625rem .75rem';

cs.style.border = '';
cs.style.padding = '.625rem .75rem';

fn.style.border = '';
fn.style.padding = '.625rem .75rem';

mn.style.border = '';
mn.style.padding = '.625rem .75rem';

document.getElementById("modal").style.display = "none";
fetchData();
  cnl.hide();
  upd.hide();
     pass.hide();
     pass2.hide();
}

function verify(){

                // Show loading spinner
                Swal.fire({
                title: 'Sending Code',
                text: "Please check your email for the code in order to procedd with the update",
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
    
    console.log("performing ajax");
    $.ajax({
      type: 'POST',
      url: '../backend/forgot_pass.php',
      data: {
        email: $("#email").val()
      },
      success: function(data) {
        // Hide loading spinner on success
        swal.close();
        if (data === "unregistered") {
                  
          Swal.fire({
          title: "Email Changed?",
          text: "It seems you changed your email. Do you wish to proceed?",
          icon: "question",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes"
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire({
                title: 'Sending Code',
                text: "Please check your email for the code in order to procedd with the update",
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                    },
            });
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
              icon: "success",
              title: "Code Sent!",
              text: "Go to your email to retrieve the code",
              confirmButtonText: "OK",

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                
                } 
              });
              console.log("Success",data)


        }

      },
      error: function(xhr, status, error) {
        // Hide loading spinner on error
       
        
        console.error("Error:", error);
        alert("Error: " + error);

        swal.close();
      },
    });
          }else{

          }
      });
          
         
          
        } else {
            Swal.fire({
              icon: "success",
              title: "Code Sent!",
              text: "Go to your email to retrieve the code",
              confirmButtonText: "OK",

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                
                } 
              });
              console.log("Success",data)


        }

      },
      error: function(xhr, status, error) {
        // Hide loading spinner on error
       
        
        console.error("Error:", error);
        alert("Error: " + error);

        swal.close();
      },
    });
       

}
function update(){
      console.log("Upd btn clicked");
                    // Get the select element by its ID
                    // student_user
                    var id = "<?php echo $_SESSION['session_id']; ?>";
                    var email = document.getElementById('email').value;//
                    var clg = document.getElementById('college').value;//
                    var ln = document.getElementById('lname').value;//
                    var fn = document.getElementById('fname').value;//
                    var mn = document.getElementById('mname').value;//
                    var gndr = document.getElementById('gender').value;//
                    var cn = document.getElementById('CN').value;//
                    var cs = document.getElementById('stat').value;//
                    var pass = document.getElementById('pass').value;
                    var pass2 = document.getElementById('pass2').value;
                    console.log("id: ", id);


                    
              $.ajax({
          type: 'POST',
          url: '../backend/edit_teacher.php',
          data: {
            tid: id,
            email:email,
            pass: pass,
            pass2: pass2,
            colege: clg,
            gender: gndr,
            fname: fn,
            mname: mn,
            lname: ln,
            cn: cn,
            cs: cs

          },
          success: function (data) {
            if (data === "no_match"){
              Swal.fire({
              icon: "error",
              title: "Password does not match",
              text: "Please Try Again",
              confirmButtonText: "OK",

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                
            }
          });
            }
            else{
            console.log("Server Response:", data);
            // Swal.fire({
            //   icon: "success",
            //   title: "Information Updated!"
            // });
            Swal.fire({
              icon: "success",
              title: "Information Updated!",
              text: "Double Check your information if it is correct",
              confirmButtonText: "OK",

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  location.reload();
      
            $.ajax({
            type: 'POST',
            url: '../backend/log_audit.php',
            data: {
              userId: id,
              action: 'Update Info',
              details: id + ' Updated its info'
            },
            success: function(response) {
              // Handle the response if needed
            
              console.log("logged", response);
            }
          });
            console.log("Updated:", data);
            cancel()
          } 
              });
            }
           
          },
          error: function (xhr, status, error) {
            console.error("Error marking event as done:", error);
            Swal.fire({
              icon: "error",
              title: "Error updating",
              text: "Please try again",
            });
          },
        });
    

                      // Remove the 'disabled' attribute
      //                 crse.disabled = true;

      // upd.hide();

    }
</script>