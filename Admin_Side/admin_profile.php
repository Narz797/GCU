<?php
session_start();
// Include the log_audit.php file
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
logAudit($id, 'access_edit profile',  'Admin has accessed the edit profile page');

// $emp_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM `admin_admin` WHERE `admin_id`=:admin_id");
$stmt->bindParam(':admin_id', $id);
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
    <!-- Remix icons -->
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

.fa-eye, .fa-eye-slash {
    position: absolute;
    /* right: 10px; */
    top: 69%;
    right: 5%;
    transform: translateY(-50%);
    cursor: pointer;
    color: black;
}
</style>

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
            <!-- <button class="icon-btn place-items-center" onclick="faq()">
                <i class="ri-question-mark"></i>
            </button> -->
        </div>
        </div>
    </nav>
</header>
<?php include '../includes/banner.php' ?>


<body style="background:white;  ">

    <section>


    <div class="independent-title1">
            <h2>Admin Profile Edit</h2>
        </div>
        <!-- Section -->

        <div class="amen">
    <button  onclick="update()" class="btnText1" id="Update"><span class="btnText">Update</span><i class="ri-edit-2-fill"></i></button>
    <button onclick="cancel()" class="btnText1" id="Cancel"><span class="btnText">Cancel</span><i class="ri-arrow-left-circle-line"></i></button>  
</div>
<div class="container-fluid mt--7">
      <div class="row">
      


        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
   
            <div class="card-body" style="background-color:lightgray;">

                <form id="edit_emp" name="edit_emp" method="post" style="width:100%;">
                 
                <div class="pl-lg-4">
                            <!-- <input type="text" class="form-control" name='username' placeholder="Email" id="username" aria-label="Username" aria-describedby="inputGroup-sizing-lg" value="<?php echo $result[0]['uname'] ?>" > -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Email</label>
                                    <input type="email"  class="form-control form-control-alternative"  id="username" value="<?php echo $result[0]['uname'] ?>" >
                                </div>
                                </div>
                            <!-- <input type="text" class="form-control" name='password' placeholder="Password" id="pass" aria-label="Password" aria-describedby="inputGroup-sizing-lg" > -->
                            <div class="col-lg-6" id="ps">
                                <div class="form-group">
                                    <label class="form-control-label" for="ps">Password</label>
                                    <input type="password"  class="form-control form-control-alternative" id="pass">
                                    <i class="fas fa-eye" onclick="togglePasswordVisibility('pass')"></i>
                                </div>
                                </div>
                        </div>
               


                    <!-- <button type="submit" value="Edit Employee">Edit Account</button> -->
                    </div>
                    </div>
                  </div>
                </div>
                </form>
            
          </div>
        </div>
      </div>
</div>


        <br>
        </div>

        <!-- Script     -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
        <script>
            function logout() {
            Swal.fire({
      title: "Are you sure you want to logout?",
      // text: "Do you wish to proceed?",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes"
    }).then((result) => {
      if (result.isConfirmed) {
            $.ajax({
            type: 'POST',
            url: '../backend/log_audit.php',
            data: {
              userId: eID,
              action: 'logged out',
              details: eID + 'Admin Clicked log out'
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
            window.location.href = '../home';
        }
  });
        }
                           function goBack() {
            window.history.back();
        }
        function cancel(){
            location.reload();
        }
            var eID = "<?php echo $_SESSION['session_id']; ?>";
            $("#edit_emp").on("submit", function(event) {
                event.preventDefault();

                console.log($("#Sid").val());
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
                    url: '../backend/edit_adm.php',//change
                    data: {
                        id: $("#id").val(),
                        un: $("#username").val(),
                        pass: $("#pass").val()

                    },
                    success: function(data) {
                        console.log('Success!');
                        console.log(data);
                        alert("Edited Successfully");

                        window.location.href = "main.php";
                        $.ajax({
                            type: 'POST',
                            url: '../backend/log_audit.php',
                            data: {
                                userId: eID,
                                action: 'Admin edited profile',
                                details: 'Admin edited profile'.$("#id").val()
                            },
                            success: function(response) {
                                // Handle the response if needed
                                console.log("logged", response);
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

                
            });
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
        <!-- <script src="./assets/main.js"></script> -->
</body>

</html>