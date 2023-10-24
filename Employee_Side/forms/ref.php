<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Referral Slip</title>
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../assets/css/slips3.css">
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
                    <a href="../index.php" class="list-link current">Home</a>
                </li>
                <li class="list-item hov">
                    <a href="../subpage/rs-forms" class="list-link current1">Back</a>
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
    <!-- Management-area -->
<section class="management-area">
    <div class="management-area-container d-grid">
        <div class="card">
            <header class="card-header header-side">
                <h2 class="title">Student Information</h2>
                <small>Date is <u>October 05, 2025</u></small>
            </header>
            <hr>
            <div class="info">

<!-- Get student's data input in h3-->

                <p>Student ID No.</p><h3>20002213</h3>
                <p>Name of Student</p><h3>Narz Taquio</h3>
                <p>Course & Year Level</p><h3>BSIT 4th Year</h3>
                <p>Sex</p><h3>Male</h3>
                <p>Contact Number</p><h3>0909-0909-090</h3>
                <p>Guardian/Parent</p><h3>Layla Taquio</h3>
                <p>Contact Number of Guardian/Parent</p><h3>0909-0909-090</h3>
            </div>
        </div>
        <div class="card-group d-grid">
            <div class="card border one">
                <div class="teacher">

<!-- Get teacher's data -->

                    <p class="title1"> Referred by: <u>Naycer Tulas of CIS Department.</u></p>
                    <p><b> Email:</b> naycertulas00@bsugov.com</p>
                    <p> <b>Contact Number:</b> 0000-0000-000</p>
                </div>
                <div class="main-box">
                <div class="box">
                  <h2 class="title">  Reason for refferral:</h2>
                  <p class="card-description refer">Counseling</p>
                  <p class="card-description refer">Academic Deficiency/ies</p>
                  <p class="card-description refer">Absent on October 5 - 8, 2025</p>
                  <p class="card-description refer">Tardy on October 5, 2025</p>
                </div>
                </div>
                <div class="action">

<!--This will be pop-up-->

                 <a href="#divOne"><button class="yes">Received</button></a>
                 </div>
            </div>
        </div>
    </div>
</section>
<!-- This is the pop-up for the three buttons -->

                <div class="overlay" id="divOne">
                    <div class="wrapper">
                        <h1>The referred student will be contacted. Clicking send will notify the teacher that the request was received.</h1>
                        <a href="#" class="close">&times;</a>
                        <div class="popup">
                            <div class="popup2">
                                <form>
                                    <label>Attending Personnel</label>
                                    <input type="text" placeholder="Your Name">
                                    <label>Remarks</label>
                                    <textarea placeholder="Type here if you have remarks..."></textarea>
                                    <div class="tsk">

<!-- Add a function here where the data will be stored -->

                                    <input type="submit" value="send">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                 </div>
<br>
    <!-- Footer -->
<footer id="footer" class="footer">
    <div class="container" id="footercopyright">
        <div class="copyright">
            <?php echo '&copy; ' . date('Y') . ' <strong><span>Impact</span></strong>. All Rights Reserved'; ?>
        </div>
        <div class="credits">Designed by <a href="https://www.facebook.com/">BSIT</a></div>
    </div>
    <!-- Script     -->
<script src="../assets/main.js"></script>
<script src="../assets/js/table.js"></script>   
</body>
</html>