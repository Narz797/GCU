<?php
session_start();
// Include the log_audit.php file
include '../backend/log_audit2.php';
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
logAudit($id, 'access_admin main',  'Admin has accessed the admin home page');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="icon" href="assets/images/GCU_logo.png">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Export -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <link href="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js" />
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.full.min.js"></script>
</head>

<body style="background:white"> 
 <!-- Header -->
 <header class="header">
    <nav class="nav">
        <div class="logo">
        <img src="GCU_logo.png" alt="">
        <!-- <img src="assets/images/bsu.png" alt=""> -->
        </div>
    </nav>
</header>

    <!-- Welcome-message -->
<section> <?php include '../includes/banner.php' ?>
<div class="title independent-title ">
        <h2 >Dashboard </h2>
    </div>
    <div class="card">
        <header class="card-header">
            <small>Greetings!</small>
<!-- call employee id 
    number or 
    profession = "Admin"-->
            <h2 class="title">Welcome back, <span> Admin!</span></h2>
        </header>
        <hr>
    </div>
</section>
<br>
  <!-- Management-area -->
 
  <div class="management-area-container d-grid">
        <div class="card">
            <header class="card-header header-side">
                <h2 class="title">ACTIONS</h2>
                <small>Choose what task to do today.</small>
            </header>
            <hr>
            <div>
            <a href="logreport.php" class="card-body-link">
                        <i class="ri-folder-line"></i>Log Report
                    </a>
                    <a href="EmployeeProfiles.php" class="card-body-link">
                        <i class="ri-server-line"></i>Employee Profiles
                    </a>
                    <a href="studentprofile.php" class="card-body-link">
                        <i class="ri-server-line"></i>Student Accounts
                    </a>
                    <a href="teacherprofiles.php" class="card-body-link">
                        <i class="ri-server-line"></i>Teacher Accounts
                    </a>
                    <a href="exportimport.php" class="card-body-link">
                        <i class="ri-server-line"></i>Export/Import of Database
                    </a>
                    <a href="admin_profile.php" class="card-body-link">
                        <i class="ri-server-line"></i>Edit Profile
                    </a>
                    
                    <a onclick="logout()" class="card-body-link">
                        <i class="ri-user-3-line"></i>Log-Out
                    </a>
            </div>
        </div>
<div class="container1 ">
<section class="main  border">
  <section class="attendance ">
  <section>
        <div class="title independent-title" >
            <h2 style="color:black;">Export and Import of Database</h2>
        </div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-sm">
                    <div class="card"  style=" background: linear-gradient(to right,#ede0d4,#ffc971  ) ; color:black;">
                        <h2 class="card-title">Import Database</h2>
                        <div class="card-body" >
                            <p class="card-text">Import Back Up Database.</p>
                            <form action="../backend/import_database.php" method="post" enctype="multipart/form-data">
                                <input type='file' name='import' accept=".sql">
                                <br>
                                <br>
                                <button type="submit" class="btn btn-primary btn-lg btn-block" style="  font-size: 14px;
     
        align-items: center;
        justify-content: center; 
        height: 45px;
        max-width: 200px;
        width: 100%;
        border: none;
        outline: none;
        color: #fff;
        border-radius: 5px;
        margin: 25px 0;
        background-color: #4070f4;
        transition: all 0.3s linear;
        cursor: pointer;">Import</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card"  style=" background: linear-gradient(to right,#ede0d4,#ffc971  ) ; color:black;">
                        <h2 class="card-title">Export Database</h2>
                        <div class="card-body">
                            <p class="card-text">Export Back Up Database.</p>
                            <form action="../backend/export_database.php">
                                <br>
                                <br>
                                <button type="submit" class="btn btn-primary btn-lg btn-block" style="  font-size: 14px;
     
     align-items: center;
     justify-content: center; 
     height: 45px;
     max-width: 200px;
     width: 100%;
     border: none;
     outline: none;
     color: #fff;
     border-radius: 5px;
     margin: 25px 0;
     background-color: #4070f4;
     transition: all 0.3s linear;
     cursor: pointer;">Export</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div> 

    </section>
  </section>
</section>
</div>
</div>




    <!-- Management-area -->
    <section class="management-area" >
        <div class="management-area-container d-grid">
            <div class="card" style=" background: white">
                <header class="card-header header-side"  style="background:lightgray;">
                    <h2 class="title"  style=" color: black">ACTIONS</h2>
                    <small >Choose what task to do today.</small>
                </header>
                <hr style="border-color: gray; border-width: 2px;">
                <div>
                    <a href="logreport.php" class="card-body-link">
                        <i class="ri-folder-line"></i>Log Report
                    </a>
                    <a href="EmployeeProfiles.php" class="card-body-link">
                        <i class="ri-server-line"></i>Employee Profiles
                    </a>
                    <a href="studentprofile.php" class="card-body-link">
                        <i class="ri-server-line"></i>Student Accounts
                    </a>
                    <a href="teacherprofiles.php" class="card-body-link">
                        <i class="ri-server-line"></i>Teacher Accounts
                    </a>
                    <a href="exportimport.php" class="card-body-link">
                        <i class="ri-server-line"></i>Export/Import of Database
                    </a>
                    <a href="admin_profile.php" class="card-body-link">
                        <i class="ri-server-line"></i>Edit Profile
                    </a>
                    
                    <a onclick="logout()" class="card-body-link">
                        <i class="ri-user-3-line"></i>Log-Out
                    </a>
                </div>
            </div>
            <div class="card-group d-grid">

                <div class="one">
                    <div class="design" >
                        <h2 class="title">TOTAL LOGINS FOR TODAY</h2>
                        <span class="num"><b id="total">loading...</b></span>
                    </div>
 
                </div>


                <!-- <div class="card border three">
                <div>
                    <h2 class="title">Number of Appointments TODAY</h2>
                    <p class="card-description"> <b id="totalAppointments"></b> Appointments pending...</p>
                </div>
                <a href="appointment.php"><button class="list-link">Read More</button></a>
            </div> -->
                <div class="one">
                    <div class="design">
                        <h2 class="title1" style="color:#febe10;font-style:Montserrat;">HISTORY TRANSACTIONS</h2>

                        <p class="card-description" id="list-history">
                            <!-- Data will be inserted here dynamically -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
         var eID = "<?php echo $_SESSION['session_id'];?>";
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
        function updateValues(total, employee_email) {

            console.log("logins2 ", total);

            $('#total').text(total); //
            $('#employee_email').text(employee_email);
            //    $('#employee_position').text(employee_position);
            //    $('#date_joined').text(employee_date_joined);
            //    $('#totalAppointments').text(totalAppointments);
            //    $('#position').text(ePosition);//
            //    $('#fname').text(eFname);
            //    $('#lname').text(eLname);

            // Replace the content of the #gender div with the created image
            //    const genderElement = document.getElementById('gender');
            //    genderElement.innerHTML = ''; // Clear existing content
            //    genderElement.appendChild(image);
        }
        // Function to fetch data from get_transaction.php
        function fetchData() {
            console.log('AJAX request started');
            $.ajax({
                type: 'GET',
                url: '../backend/get_transaction_admin.php',
                dataType: 'json',
                success: function(data) {
                    processData(data);
                },
                error: function(xhr, status, error) {
                    console.error('Error: ' + error);
                    console.error('Status: ' + status);
                    console.error('Response: ' + xhr.responseText);
                    alert('An error occurred while fetching data. Please try again later.');
                }

            });
        }


        // Function to process the retrieved data
        function processData(data) {
            console.log('Response Data:', data.total_logins);
            if (data.total_logins !== undefined) {

                var total = data.total_logins;

                var employee_email = data.adminUserData[0].uname;


                updateValues(total, employee_email);
                console.log("logins:", total)
                //    countAppointments(totalAppointments);


            } else {

                var total = 0;

                var employee_email = data.adminUserData[0].uname;


                updateValues(total, employee_email);

                console.log('No results found');
            }
        }

        function updateCardDescription(data) {
            const cardDescription = $('#list-history');
            cardDescription.empty(); // Clear existing content
            if (data.length > 0) {
                data.forEach(item => {
                    cardDescription.append(`Student ${item.student_id}..........${item.transact_type}<br>`);
                });
            } else {
                cardDescription.text('No finished transactions.');
            }
        }
        // Function to fetch data from get_transaction.php
        function HistoryData() {
            console.log('AJAX request started');
            $.ajax({
                type: 'GET',
                url: '../backend/get_done_transaction.php',
                dataType: 'json',
                // ...
                success: function(data) {
                    console.log(data);
                    updateCardDescription(data);
                },
                error: function(xhr, status, error) {
                    console.error('Error: ' + error);
                    console.error('Status: ' + status);
                    console.error('Response: ' + xhr.responseText);
                }
            });
        }

        // Call the fetchData function when the page loads
        HistoryData();
        // Call the fetchData function when the page loads
        fetchData();
    </script>
    <script src="./assets/main.js"></script>
    <script src="assets/js/table.js"></script>
    <style>
        .design {
            place-items: center;
            background-color: darkgreen;
            margin: 10px 10px;
            padding: 20px 20px;
            border-style: solid;
            border-radius: 20px;
        }
    </style>
    <?php include 'includes/footer.php' ?>
</body>

</html>