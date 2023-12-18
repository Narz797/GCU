<?php
session_start();
include '../backend/log_audit2.php';
include '../backend/connect_database.php';
// Check if the session variable is empty
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
$id = $_SESSION['session_id'];

// Log audit entry for accessing the home page
logAudit($id, 'access_edit employee',  'Admin has accessed the edit employee page');

$emp_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM `admin_user` WHERE `admin_user_id`=:admin_user_id");
$stmt->bindParam(':admin_user_id', $emp_id);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee Account</title>
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
<style>

</style>

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
        </div>
        </div>
    </nav>
</header>
<?php include '../includes/banner.php' ?>


<body style="background:white;  ">

    <section>


    <div class="independent-title1">
            <h2>Edit Employee Account</h2>
        </div>

        <div class="amen">
    <button  onclick="update()" class="btnText1" id="Update"><span class="btnText">Update</span><i class="ri-edit-2-fill"></i></button>
    <button onclick="cancel()" class="btnText1" id="Cancel"><span class="btnText">Cancel</span><i class="ri-arrow-left-circle-line"></i></button>  
</div>

<div class="container-fluid mt--7">
      <div class="row">
      


        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
   
            <div class="card-body" style="background-color:lightgray;">

                <form id="edit_emp" name="edit_emp" method="post" >
                <h6 class="heading-small text-muted mb-4" style="color:black; font-weight:bold;">User Information </h6>
                <div class="pl-lg-4">
                 
                    <div class="col-lg-6" style="width:90px; padding:0; ">
                      <div class="form-group focused id1" >
                        <label class="form-control-label" for="input-username" id="EId" >ID No.</label>
                        <input type="number"  class="form-control form-control-alternative" id="id" name="empID" placeholder="Employee ID No." value="<?php echo $result[0]['admin_user_id'] ?>" readonly >
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="email">Email</label>
                        <input type="email"  class="form-control form-control-alternative" id="email" name='email' value="<?php echo $result[0]['email'] ?>" readonly>
                      </div>
                    </div>

                    <div class="col-lg-6" id="ps">
                      <div class="form-group">
                        <label class="form-control-label" for="pass">Password</label>
                        <input type="password"  class="form-control form-control-alternative" id="pass" style="border:2px solid yellow; padding: 1rem 0.75rem; height:auto;">
                        <i class="fas fa-eye" onclick="togglePasswordVisibility('pass')"></i>
                      </div>
                    </div>


                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Last Name</label>
                        <input type="text"  class="form-control form-control-alternative" id="lname" value="<?php echo $result[0]['last_name'] ?>" readonly>
                      </div>
                    </div>
      
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First Name</label>
                        <input type="text"  class="form-control form-control-alternative" id="fname" value="<?php echo $result[0]['first_name'] ?>" readonly>
                      </div>
                    </div>
                    
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Middle Name</label>
                        <input type="text" class="form-control form-control-alternative" id="mname" value="<?php echo $result[0]['middle_name'] ?>" readonly>
                      </div>
                    </div>
                    
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Contact Number</label>
                        <input type="text" class="form-control form-control-alternative" id="contact" value="<?php echo $result[0]['contact'] ?>" oninput="limitTo11Digits(event)" readonly>
                      </div>
                    </div>


                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Gender</label>
                        <select class="form-control form-control-alternative" required id="inputgroupselect" name="gender" disabled>
                                <option disabled selected>Select gender</option>
                                <option value="Female" <?php
                                                        $selectgender = $result[0]['gender'];

                                                        if ($selectgender === 'Female') {
                                                            echo ' selected';
                                                        }
                                                        ?>>Female</option>
                                <option value="Male" <?php
                                                        $selectgender = $result[0]['gender'];

                                                        if ($selectgender === 'Male') {
                                                            echo ' selected';
                                                        }
                                                        ?>>Male</option>
                            </select>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label  class="form-control-label" for="input-last-name">Position</label>
                        <input type="text" class="form-control form-control-alternative" id="position" value="<?php echo $result[0]['position'] ?>" readonly>
                     
                      </div>
                    </div>
                  </div>
                </div>
                </form>
            </div>
          </div>
        </div>
      </div>
</div>


   




        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <script>
            var eID = "<?php echo $_SESSION['session_id']; ?>";
                            function goBack() {
            window.history.back();
        }
            function logout() {
        Swal.fire({
      title: "Are you sure you want to logout?",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes"
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
            type: 'POST',
            url: '../../backend/log_audit.php',
            data: {
              userId: eID,
              action: 'logged out',
              details: eID + ' Clicked log out'
            },
            success: function(response) {
              console.log("logged", response);
            }
          });
    window.location.href = '../home';

}
  });
}
function limitTo11Digits(event) {
  var input = event.target;
  var inputValue = input.value.replace(/\D/g, ''); // Remove non-numeric characters

  if (inputValue.length > 11) {
    input.value = inputValue.slice(0, 11);
  }
}
var upd = $("#Update");
     var cnl = $("#Cancel");
     var pass = $("#ps");
     var pass2 = $("#ps2");
     cnl.hide();
     upd.hide();
     pass.hide();
     pass2.hide();
     function update(){
      // console.log("Upd btn clicked");
                event.preventDefault();

                // console.log($("#Sid").val());
                Swal.fire({
          title: "Are Sure?",
          text: "Do you wish to proceed?",
          icon: "question",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes"
        }).then((result) => {
        if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: '../backend/edit_emp.php',
                    data: {
                        id: $("#id").val(),
                        fname: $("#fname").val(),
                        mname: $("#mname").val(),
                        lname: $("#lname").val(),
                        gender: $("#inputgroupselect").val(),
                        email: $("#email").val(),
                        cn: $("#contact").val(),
                        position: $("#position").val(),
                        un: $("#username").val(),
                        pass: $("#pass").val()

                    },
                    success: function(data) {
                        // console.log('Success!');
                        // console.log(data);
                        Swal.fire({
              icon: "success",
              title: "Information Updated!",
              text: "Double Check your information if it is correct",
              confirmButtonText: "OK",

            }).then((result) => {
                if (result.isConfirmed) {
                        location.reload();
                        $.ajax({
                            type: 'POST',
                            url: '../backend/log_audit.php',
                            data: {
                                userId: eID,
                                action: 'Admin edited employee',
                                details: 'Admin edited employee'.$("#id").val()
                            },
                            success: function(response) {
                                // console.log("logged", response);
                            }
                        });
                    } 
              });

                    },
                    error: function(xhr, status, error) {
                        alert("Error: " + error);
                    }
                });
            }else{

}
});
            }


   
            function addHighlight(element) {
            element.classList.add('highlight');
        }

        // Function to remove highlight class
        function removeHighlight(element) {
            element.classList.remove('highlight');
        }
            function edit() {
    // console.log("Edit btn clicked");
    cnl.show();
    upd.show();
    pass.show();
    pass2.show();
    // Get the select and input elements by their IDs
    var email = document.getElementById('email');
    var ln = document.getElementById('lname');
    var fn = document.getElementById('fname');
    var mn = document.getElementById('mname');
    var gndr = document.getElementById('inputgroupselect');
    var cn = document.getElementById('contact');
    var pos = document.getElementById('position');
  



    gndr.disabled = false;
    email.removeAttribute('readonly');
    ln.removeAttribute('readonly');
    fn.removeAttribute('readonly');
    mn.removeAttribute('readonly');
    cn.removeAttribute('readonly');
    pos.removeAttribute('readonly');
    

    email.style.border = '2px solid yellow';
    email.style.padding = '1rem 0.75rem';
    email.style.height = 'auto';

    gndr.style.border = '2px solid yellow';
    gndr.style.padding = '1rem 0.75rem';
    gndr.style.height = 'auto';


    ln.style.border = '2px solid yellow';
    ln.style.padding = '1rem 0.75rem';
    ln.style.height = 'auto';

    cn.style.border = '2px solid yellow';
    cn.style.padding = '1rem 0.75rem';
    cn.style.height = 'auto';

    pos.style.border = '2px solid yellow';
    pos.style.padding = '1rem 0.75rem';
    pos.style.height = 'auto';

    fn.style.border = '2px solid yellow';
    fn.style.padding = '1rem 0.75rem';
    fn.style.height = 'auto';

    mn.style.border = '2px solid yellow';
    mn.style.padding = '1rem 0.75rem';
    mn.style.height = 'auto';

    
}

function cancel(){
    var email = document.getElementById('email');
    var ln = document.getElementById('lname');
    var fn = document.getElementById('fname');
    var mn = document.getElementById('mname');
    var gndr = document.getElementById('inputgroupselect');
    var cn = document.getElementById('contact');
    var pos = document.getElementById('position');


gndr.disabled = true;
email.setAttribute('readonly', true);
ln.setAttribute('readonly', true);
fn.setAttribute('readonly', true);
pos.disabled = true;
mn.setAttribute('readonly', true);
cn.setAttribute('readonly', true);


email.style.border = '';
email.style.padding = '.625rem .75rem';

gndr.style.border = '';
gndr.style.padding = '.625rem .75rem';

ln.style.border = '';
ln.style.padding = '.625rem .75rem';

cn.style.border = '';
cn.style.padding = '.625rem .75rem';

pos.style.border = '';
pos.style.padding = '.625rem .75rem';

fn.style.border = '';
fn.style.padding = '.625rem .75rem';

mn.style.border = '';
mn.style.padding = '.625rem .75rem';


location.reload();
  cnl.hide();
  upd.hide();
     pass.hide();
     pass2.hide();
}
        </script>

        <?php include 'includes/footer.php' ?>
</body>

</html>