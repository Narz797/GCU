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

<body style="background:white;">

    <!-- Header -->
    <header class="header">
        <nav class="nav">
            <div class="logo">
                <img src="assets/images/bsu.png" alt="">
            </div>
            <div class="nav-mobile">
                <ul class="list">
                    <li class="list-item">
                        <a href="main.php" class="list-link current">Home</a>
                    </li>
                    <li class="list-item hov">
                        <a href="main.php" class="list-link current1">Back</a>
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
                <button class="icon-btn theme-toggle-btn place-items-center">
                    <i class="ri-sun-line theme-light-icon"></i>
                    <i class="ri-moon-line theme-dark-icon"></i>
                </button>
                <button class="icon-btn place-items-center">
                    <i class="ri-user-3-line"></i>
                </button>
            </div>
        </nav>
    </header>
    <!-- Welcome-message -->

    <section>


        <div class="title independent-title">
            <h2>Edit Account</h2>
        </div>
        <!-- Section -->

        <section class="table-body">
            <section id="table" style=" background: linear-gradient(to right,#ede0d4,#ffc971  ) ;">

                <form id="edit_emp" name="edit_emp" method="post">
                    <br>
                    <center>
                        <div class="input-group input-group-lg">
                            <input type="number" class="form-control" id="id" name="empID" placeholder="Employee ID No." aria-label="Admin ID No." aria-describedby="inputGroup-sizing-lg" value="<?php echo $result[0]['admin_id'] ?>" readonly required>
                        </div>
                        <br>
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control" name='username' placeholder="Email" id="username" aria-label="Username" aria-describedby="inputGroup-sizing-lg" value="<?php echo $result[0]['uname'] ?>" >
                            <input type="text" class="form-control" name='password' placeholder="Password" id="pass" aria-label="Password" aria-describedby="inputGroup-sizing-lg" >
                        </div>
                    </center>

                    <br>
                    <button type="submit" class="button" style="background:#008374" value="Edit Employee">Edit Account</button>
                </form>
            </section>

        </section>
        <br>
        </div>

        <style>
            .table-body {
                background-color: darkolivegreen;

            }
        </style>


        <!-- Script     -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
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
        <script src="./assets/main.js"></script>
        <?php include 'includes/footer.php' ?>  
</body>

</html>