<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body>
    <!-- Header -->
<header class="header">
    <nav class="nav">
        <div class="logo">
         <a href="./index.php" ><img src="assets/images/bsu.png" alt=""></a>
        </div>
        <div class="align-right">
        <button class="icon-btn theme-toggle-btn place-items-center">
            <i class="ri-sun-line theme-light-icon"></i>
            <i class="ri-moon-line theme-dark-icon"></i>
        </button>
        </div>
    </nav>
</header>
    <!-- Welcome-message -->
<section>
    <section class="banner">
        <div class="banner-container">
    <br>
        <img src="assets/images/GCU_logo.png" alt="">
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
        <h2 > Control Panel</h2>
    </div>
    <div class="card">
        <header class="card-header">
            <small>Profile Account</small>
            <h2 class="title">Welcome back,&nbspAdmin</h2>
        </header>
        <hr>
        <div class="card-body">
            <div class="card-image">
                <img src="./assets/images/sp.jpg" alt="">
            </div>
            <div class="card-information">
                <h1 class="title main-title"><span class="title-lastname main-title">uchiha,</span> Itachi Verlyn Rizz M.</h1>
                <p class="card-description1">Joined at <span>January 05, 0000</span><br><br></p>
                <p class="card-description">
                    <span>Email:</span> BSU_Rizz123@gcu.com<br>
                    <span>Position:</span> Grand Counselor
                </p>
            </div>
            <div class="card-image1">
                <img src="./assets/images/map.png" alt="">
            </div>
        </div>
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
                <a href="form.php" class="card-body-link">
                <i class="ri-folder-line"></i>Requested Forms
                </a>
                <a href="profile.php" class="card-body-link">
                <i class="ri-server-line"></i>Student Profiles
                </a>
                <a href="appointment.php" class="card-body-link">
                <i class="ri-calendar-line"></i>Appointment Schedules
                </a>
                <a href="../index.php?logout=true" class="card-body-link">
                <i class="ri-user-3-line"></i>Log-Out
                </a>
            </div>
        </div>
        <div class="card-group d-grid">
            <div class="card border one">
                <div>
                    <h2 class="title">LATEST Requested Forms</h2>
                    <p class="card-description"><b>Sasuke Uchiha</b> has requested a <b>Readmission</b> form for the 57th times.</p>
                </div>
                <a href="index.php"><button class="list-link">Read More</button></a>
            </div>
            <div class="card border two">
                <div>
                    <h2 class="title">UNOPENED Requested Forms</h2>
                    <p class="card-description"> <b>58</b> Forms waiting...</p>
                </div>
                <a href="form.php"><button class="list-link">Read More</button></a>
            </div>
            <div class="card border three">
                <div>
                    <h2 class="title">Number of Appointments TODAY</h2>
                    <p class="card-description"> <b>3</b> Appointments pending...</p>
                </div>
                <a href="appointment.php"><button class="list-link">Read More</button></a>
            </div>
            <div class="card border four">
                <div>
                    <h2 class="title">HISTORY TRANSACTIONS</h2>
                    <p class="card-description"> 
                        Sasuke Uchiha..........Duel Form<br>
                        Akatsuki Kisame......Appointment<br>
                        Sasuke Uchiha..........Duel Form<br>
                        Sasuke Uchiha..........Duel Form<br>
                        Fourth Hokage..........Feedback Form<br>
                        Sasuke Uchiha..........Duel Form<br>
                        Sasuke Uchiha..........Duel Form<br>
                        Akatsuki Kisame......Appointment<br>
                        Akatsuki Pain.............Appointment<br>
                        Sasuke Uchiha..........Duel Form<br>
                        Sasuke Uchiha..........Duel Form<br>
                        Akatsuki Deidara.....Apology Form<br>
                        Sasuke Uchiha..........Duel Form
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Footer -->
<footer id="footer" class="footer">
    <div class="container" id="footercopyright">
        <div class="copyright">
            <?php echo '&copy; ' . date('Y') . ' <strong><span>Impact</span></strong>. All Rights Reserved'; ?>
        </div>
        <div class="credits">Designed by <a class="dev" href="https://www.facebook.com/">BSIT</a></div>
    </div>
</footer>
    <!-- Script -->
<script src="./assets/index.js"></script>    
</body>
</html>