<?php 
session_start();
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
                text: 'Please tlogin again'
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
logAudit($id, 'access_employee', $id .' has accessed the employee home page');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
    <!-- Header -->
<header class="header">
    <nav class="nav">
        <div class="logo">
        <img src="assets/images/GCU_logo.png" alt="">
        </div>
       
    </nav>
</header>
    <!-- Banner -->
<section>
<?php include '../includes/banner.php' ?>
    <div class="title independent-title ">
        <h2 > Control Panel</h2>
    </div>
    <div class="card">
        <header class="card-header">
            <small>Profile Account</small>
            <h2 class="title">Welcome back, <span> Admin!</span></h2>
        </header>
        <hr>
    </div>
</section>
 <!-- Management-area -->
 <section class="management-area">
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
                    <i class="ri-profile-line"></i>Employee Profiles
                    </a>
                    <a href="studentprofile.php" class="card-body-link">
                    <i class="ri-account-pin-box-line"></i>Student Accounts
                    </a>
                    <a href="teacherprofiles.php" class="card-body-link">
                    <i class="ri-account-pin-box-line"></i>Teacher Accounts
                    </a>
                    <a href="admin_profile.php" class="card-body-link">
                    <i class="ri-edit-2-fill"></i>My Profile
                    </a>
                    <a onclick="logout()" class="card-body-link">
                        <i class="ri-user-3-line"></i>Log-Out
                    </a>
            </div>
        </div>
        <div class="card-group d-grid">
            <div class="card border one">
                <div>
                    <h2 class="title">Total Visitors</h2>
                    <div>
                    <div class="wrapper">
                     <div class="count">
                     <i class="ri-account-pin-box-line"></i>
                        <span class="num"><b id="total"></b></span>
                        <span class="text">pending...</span>
                    </div>
                </div>
                </div>
                </div>
                
            </div>
            <div class="card border two">
                <div>
                    <h2 class="title">Import Database</h2>
                    <div class="card-body">
                        <form action="../backend/import_database.php" method="post" enctype="multipart/form-data">
                            <p class="card-text">Import Backup Database.</p>
                            <input type="file" name="import_file" accept=".sql">
                            <button type="submit" class="yes" style="font-size: 14px;
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
                                                                    cursor: pointer;">Import&nbsp;<i class="ri-export-line"></i></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card border three">
                <div>
                    <h2 class="title">Export Database</h2>
                        <div class="card-body">
                           
                        <form action="../backend/export_database.php" method="post">
                                <p class="card-text">Export Back Up Database.</p>
                                <button type="submit" class="yes" style="font-size: 14px;
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
                                    cursor: pointer;">Export&nbsp<i class="ri-import-line"></i></button>
                            </form>


                        </div>
                </div>
            </div>
            <div class="card border four">
                <div>
                    <h2 class="title">HISTORY: FINISHED TRANSACTIONS</h2>
                    <p class="card-description" id="list-history"> 
                          
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
            //   console.log("logged", response);
            }
          });
            window.location.href = '../home';
        }
  });
        }
        function updateValues(total, employee_email) {

            // console.log("logins2 ", total);

            $('#total').text(total); //
            $('#employee_email').text(employee_email);
        }
        // Function to fetch data from get_transaction.php
        function fetchData() {
            // console.log('AJAX request started');
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
            // console.log('Response Data:', data.total_logins);
            if (data.total_logins !== undefined) {

                var total = data.total_logins;

                var employee_email = data.adminUserData[0].uname;


                updateValues(total, employee_email);
                // console.log("logins:", total)
                //    countAppointments(totalAppointments);


            } else {

                var total = 0;

                var employee_email = data.adminUserData[0].uname;


                updateValues(total, employee_email);

                // console.log('No results found');
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
            // console.log('AJAX request started');
            $.ajax({
                type: 'GET',
                url: '../backend/get_done_transaction.php',
                dataType: 'json',
                // ...
                success: function(data) {
                    // console.log(data);
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
            //   console.log("logged", response);
            }
          });
            window.location.href = '../home';
        }
  });
        }
    </script>
   <script>
    function exportDatabase() {
        Swal.fire({
      title: "Do you wish to proceed?",
      // text: "Do you wish to proceed?",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes"
    }).then((result) => {
      if (result.isConfirmed) {

            var fileName = prompt("Enter a name for the exported file:", "database_backup_" + new Date().toISOString().replace(/[^\d]/g, '') + ".sql");

            if (fileName) {
                // Set the filename in the form data
                var form = document.getElementById("exportForm");
                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", "filename");
                hiddenField.setAttribute("value", fileName);
                form.appendChild(hiddenField);

                // Submit the form
                form.submit();
            }
        
    }
  });
    }
</script>

</body>
</html>