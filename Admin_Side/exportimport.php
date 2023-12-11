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
logAudit($id, 'access_export import',  'Admin has accessed the export import page');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export and Import of Database</title>
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
    <link rel="stylesheet" href="assets/css/profiles.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- Export -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <link href="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js" />
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
</head>
<style>
</style>

<body style="background-color: white;">
    <!-- Header -->
    <header class="header" >
        <nav class="nav">
            <div class="logo">
            <img src="assets/images/GCU_logo.png" alt="">
            </div>
            <div class="nav-mobile">
                <ul class="list">
                    <li class="list-item">
                        <a href="main.php" class="list-link current">Home</a>
                    </li>
                    <li class="list-item hov">
                        <a href="studentprofile.php" class="list-link current1">Student Profiles</a>
                    </li>
                    <li class="list-item hov">
                    <a href="teacherprofiles.php" class="list-link current1">Teacher Profiles</a>
                    </li>
                    <li class="list-item hov">
                        <a href="EmployeeProfiles.php" class="list-link current1">Employee Profiles</a>
                    </li>
                   
                    <li class="list-item hov">
                        <a href="logreport.php" class="list-link current1">Log Report</a>
                    </li>
                </ul>
                <button class="icon-btn menu-toggle-btn menu-toggle-close place-items-center">
                    <i class="ri-close-line"></i>
                </button>
            </div>
            <div class="align-right">
                <button class="icon-btn menu-toggle-btn menu-toggle-open place-items-center">
                    <i class="ri-function-line"></i>
                </button>
                <!-- <button class="icon-btn theme-toggle-btn place-items-center">
                    <i class="ri-sun-line theme-light-icon"></i>
                    <i class="ri-moon-line theme-dark-icon"></i>
                </button> -->
                <button class="icon-btn place-items-center" onclick="logout()">
                    <i class="ri-user-3-line"></i>
                </button>
            </div>
        </nav>
    </header>
    <!-- Welcome-message -->

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
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Import</button>
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
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Export</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>

    </section>
    <br>

    <!-- Script     -->
    <script>
        function logout() {
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
    </script>
    <script src="./assets/main.js"></script>
    <script src="assets/js/table.js"></script>
    
</body>
<?php include 'includes/footer.php' ?>
</html>