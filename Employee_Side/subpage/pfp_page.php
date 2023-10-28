<?php
session_start();
// include '../backend/validate_user.php';
// include '../backend/connect_database.php';
  // Check if the session variable is empty
  if (empty($_SESSION['session_id'])) {
    // Redirect to the desired location
    echo "<script>alert('You have already Logged out. You will be redirected.'); window.location.href = 'http://localhost/GCU/home';</script>";
    
    exit; // Make sure to exit the script after a header redirect
  }
// Retrieve stud_id from the session

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <!-- Remix icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../assets/css/view.css">
</head>

<body>
    <!-- Header -->
<header class="header">
    <nav class="nav"> 
        <div class="logo">
            <a href="./index.php" ><img src="../assets/images/bsu.png" alt=""></a>
        </div>
        <div class="nav-mobile">
            <ul class="list">
                <li class="list-item">
                    <a href="../employee-home" class="list-link current">Home</a>
                </li>
                <li class="list-item hov">
                    <a href="../student-profile" class="list-link current1">Back</a>
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
            <button class="icon-btn place-items-center" onclick="logout()">
                <i class="ri-user-3-line"></i>
            </button>
        </div>
    </nav>
</header>
    <!-- Banner -->
<section>
    <section class="banner">
        <div class="banner-container">
    <br>
            <img src="../assets/images/GCU_logo.png" alt="">
            <div class="banner-text">
                <h5>REPUBLIC OF THE PHILIPPINES</h5>
                <hr class="banner-line">
                <h2><span>BENGUET STATE UNIVERSITY</span></h2>
                <h1>GUIDANCE AND COUNSELING UNIT</h1>
            </div>
        </div>
    </section>
   <div class="block"> 
    </div>
    <div class="title independent-title">
        <h2> STUDENT PROFILE</h2>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="card-image">
                <img src="../assets/images/male.jpg" alt="">
            </div>
            <div class="card-information">

<!-- call student 
    registered data -->

                <h2>CHET PSYCHOLOGY</h2>
                <h1 class="title main-title"><span class="title-lastname main-title">Rizzler,</span> Chad Vogn T.</h1>
                <p class="card-description1"> <span>1st</span> Year Student<br><br></p>
                <p class="card-description">
                    <span>Email:</span> chad123@gmail.com<br>
                    <span>Contact Number:</span>&nbsp0987-6543-211
                    <hr>
					<b>Guardian:</b> Jihyo Rizzler<br>
					<b>Relation:</b> Sister<br>
                    <b>Contact Number:</b>&nbsp0912-3456-789<br>
                </p>
            </div>
            <div class="card-image1">

<!-- get student 
	real-time signature
 	or ID picture-->

            <img src="../assets/images/formtemp.png" alt="ID">
            </div>
            <div class="card-image1">

<!-- get student 
    real-time signature
    or ID picture-->

            <img src="../assets/images/formtemp.png" alt="Signature">
            </div>
        </div>
    </div>
</section>
    <!-- Management-area -->
<section class="management-area">
    <div class="management-area-container d-grid">
        <div class="card">
            <header class="card-header header-side">
                <h2 class="title">Notes</h2>
                <small>Type what to take note about the student.</small>
            </header>
            <hr>

<!-- your call if you delete this area
or use the same method for the add/edit of the button in the table
below if you understand the javascript-->

        <div class="popup-box">
        <div class="popup">
        <div class="content">
            <header class="header1"><p></p>
            <i class="uil uil-times"></i>
            </header>
            <form action="#">
                <div class="row title">
                    <label>Title</label>
                    <input type="text" spellcheck="false">
                </div>
                <div class="row description">
                    <label>Content</label>
                    <textarea spellcheck="false"></textarea>
                </div>
                <button></button>
            </form>
        </div>
        </div>
        </div>
        <div class="wrapper">
            <li class="add-box">
            <div class="icon"><i class="uil uil-plus"></i></div>
            <p>Add new note</p>
            </li>
        </div>
        </div>

        <div class="card-group d-grid">
            <div class="card border one">
                <div>
                    <h2 class="title">ALL Transacted Forms/Slips</h2>
                <hr>
                    <p class="card-description">

<!-- the table header(thead) are the general 
    sortable script-->

        <table class="table-sortable">
        <thead>
            <tr>
                <th>Date of Transaction</th>
                <th>Form / Slip</th>
                <th>Reason/s</th>
                <th>Action Taken</th>
                <th>Last Updated</th>
                <th>Remarks</th>

<!-- you can find the design on the subpage
titled: remark_design.php-->

                <th>Add Remarks</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>January 1, 2020</td>
                <td>Leave of Absence</td>
                <td>Something something</td>
                <td><p class="status delivered">Excused</p></td>
                <td>January 1, 2020</td>

<!-- None is the default-->

                <td>None</td>

<!-- You can use this reference:https://www.youtube.com/watch?v=SpyVEbFQ6Bc
    for the modal update ajax of data. I'm referring to d action button btw.
    Its a bootstrap function
        ooorrr you can use the same method
        as I did with the notes area above-->

                <td><button class="add"><i class="ri-menu-add-line"></i></button></td>
            </tr>
            <tr>
                <td>January 1, 2020</td>
                <td>Leave of Absence</td>
                <td>Something something</td>
                <td><p class="status cancelled">Unexcused</p></td>
                <td>January 1, 2020</td>
                <td>None</td>
                <td><button class="add"><i class="ri-menu-add-line"></i></button></td>
            </tr>
            <tr>
                <td>October 2, 2023</td>
                <td>Absent/Tardy</td>
                <td>Something something</td>
                <td><p class="status delivered">Excused</p></td>
                <td>January 1, 2020</td>
                <td>Something something</td>
                <td><button class="add"><i class="ri-menu-add-line"></i></button></td>
            </tr>
            <tr>
                <td>January 3, 2020</td>
                <td>Readmission</td>
                <td>Something something</td>                
                <td><p class="status delivered">Processed</p></td>
                <td>January 1, 2020</td>
                <td>Something something</td>
                <td><button class="add"><i class="ri-menu-add-line"></i></button></td>
            </tr>
             <tr>
                <td>January 3, 2020</td>
                <td>Readmission</td>
                <td>Something something</td>                
                <td><p class="status pending">Pending</p></td>
                <td>January 1, 2020</td>
                <td>None</td>
                <td><button class="add"><i class="ri-menu-add-line"></i></button></td>
            </tr>
            <tr>
                <td>August 4, 2022</td>
                <td>Withdrawal</td>
                <td>Something something</td>
                <td><p class="status pending">Pending</p></td>
                <td>January 1, 2020</td>
                <td>Something something</td>
                <td><button class="add"><i class="ri-menu-add-line"></i></button></td>
            </tr>
            <tr>
                <td>August 14, 2022</td>
                <td>Dropping</td>
                <td>Something something</td>
                <td><p class="status delivered">Processed</p></td>
                <td>January 1, 2020</td>
                <td>None</td>
                <td><button class="add"><i class="ri-menu-add-line"></i></button></td>
            </tr>
            <tr>
                <td>August 14, 2022</td>
                <td>Shifting</td>
                <td>Something something</td>
                <td><p class="status delivered">Processed</p></td>
                <td>January 1, 2020</td>
                <td>None</td>
                <td><button class="add"><i class="ri-menu-add-line"></i></button></td>
            </tr>
        </tbody>
        </table> 
        </p>
                </div>
            </div>
            <div class="card border one">
                <div>
                    <h2 class="title">ALL &nbspAppointed Counseling</h2>
                    <hr>
                    <p class="card-description">
        <table class="table-sortable">
        <thead>
            <tr>
                <th>Date of Appointment</th>
                <th>Reason of Appointment</th>
                <th>Inscribed/Remarks About the Appointment</th>
                <th>Action Taken</th>
                <th>Latest Update</th>

<!-- you can find the design on the subpage
titled: edit_design.php-->

                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>January 1, 2020</td>
                <td>Something Something Something something</td>
                <td>Something something Something something Something something Something something</td>
                <td>Rescheduled</td>
                <td>January 1, 2020</td>

<!-- Have the same function as the table above-->

                <td><button class="edit"><i class="ri-pencil-line"></i></button></td>
            </tr>
            <tr>
                <td>October 2, 2023</td>
                <td>Something Something</td>
                <td>Something something</td>
                <td>Endorse to Shift</td>
                <td>January 1, 2020</td>
                <td><button class="edit"><i class="ri-pencil-line"></i></button></td>
            </tr>
            <tr>
                <td>January 3, 2020</td>
                <td>Something Something</td>
                <td>Something something</td>
                <td>Endorse to Readmit</td>
                <td>January 1, 2020</td>
                <td><button class="edit"><i class="ri-pencil-line"></i></button></td>
            </tr>
            <tr>
                <td>August 4, 2022</td>
                <td>Something Something</td>
                <td>Something something</td>
                <td>Rescheduled</td>
                <td>January 1, 2020</td>
                <td><button class="edit"><i class="ri-pencil-line"></i></button></td>
            </tr>
            <tr>
                <td>August 14, 2022</td>
                <td>Something Something</td>
                <td>Something something</td>
                <td>Cattered</td>
                <td>January 1, 2020</td>
                <td><button class="edit"><i class="ri-pencil-line"></i></button></td>
            </tr>
        </tbody>
        </table>
                </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
<?php 
// Retrieve stud_id from the session
$student = $_SESSION['stud_user_id'];

echo "<script>alert('$student')</script>";
?>
    <!-- Script -->
    <script>
            function logout() {
    window.location.href = '../../home?logout=true';
}
    </script>
<script src="../assets/main.js"></script>
<script src="../assets/js/tablesort.js"></script>
<script src="../assets/js/notes.js"></script>
</body>
</html>