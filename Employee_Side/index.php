<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
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
<header class="header"style="background-color: black;">
    <nav class="nav container">
         <a href="./index.php" ><img src="assets/images/bsu.png" alt="" style="width:5.5%; height:auto; padding:2px"></a>
        <div class="align-right">
            <button class="icon-btn theme-toggle-btn place-items-center">
                <i class="ri-sun-line theme-light-icon"></i>
                <i class="ri-moon-line theme-dark-icon"></i>
            </button>
        </div>
    </nav>
</header>


    <!-- Welcome-message -->
<section class="welcome-message">
    <section style="background-color: #F5F5DC; color:black;">
    <div class="container">
        <div style=" display:flex; justify-content:center; padding-top:2%; padding-bottom: 2%;">
  <br>
  <img src="assets/images/GCU_logo.png" alt="" style="display: inline-block; vertical-align: middle;  width:10%; height:auto;">
  <div id="RBG" style="display: inline-block; vertical-align: middle;">
    <h5 style="font-family: 'Georgia', serif;">REPUBLIC OF THE PHILIPPINES</h5>
    <hr class="line" style="width: 100%; border-color: black; margin-bottom: 0;">
    <h1 style="font-family: 'Times New Roman', serif;"><span>BENGUET STATE UNIVERSITY</span></h1>
    <h1 style="font-family: 'Garamond', serif; font-weight: bold;">GUIDANCE AND COUNSELING UNIT</h1>
  </div>
</div>
<style>

#RBG h5{
  font-size: 1vw;
 }
 #RBG h3{
  font-size: 1.8vw;
 }
 #RBG h1{
  font-size: 2vw;
 }
 </style>
</section>

  <div style="background-color: black; height:50px;">
</div>
        <h2 class="title independent-title">&nbsp Control Panel</h2>
        <div class="card">
            <header class="card-header">
                <small>Profile Account</small>
                <h2 class="title">Welcome back, &nbspAdmin</h2>
            </header>
            <hr>
            <div class="card-body">
                <div class="card-image">
                    <img src="./assets/images/pfp.jpg" alt="">
                </div>
                <div class="card-information">
                    <h1 class="title main-title"> Itachi Uchiha</h1>
                    <p class="card-description1">Joined at January 05, 0000<br><br></p>
                    <p class="card-description">
                        Email: uchiha@massacre.com<br>
                        Gender: Genderfluid<br>
                        Status: Intern
                    </p>
                </div>
                <div class="card-image1">
                    <img src="./assets/images/pfpback.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    
</section>

    <!-- Management-area -->
<section class="management-area">
    <div class="management-area-container  d-grid">
        <div class="card">
            <header class="card-header">
                <h2 class="title">Actions</h2>
                <small>Choose what task to do today</small>
            </header>
            <hr>
            <div class="card-body1">
                <a href="form.php" class="card-body-link">
                    <i class="ri-folder-line"></i>Requested Forms
                </a>
                <a href="profile.php" class="card-body-link">
                    <i class="ri-server-line"></i>Student Profiles
                </a>
                 <a href="appointment.php" class="card-body-link">
                    <i class="ri-calendar-line"></i>Appointment Schedules
                </a>
                <a href="sisu.php" class="card-body-link">
                    <i class="ri-user-3-line"></i>Log-Out
                </a>
            </div>
        </div>

        <div class="card-group d-grid">
            <div class="card border one">
                <div>
                    <h2 class="title">Latest Requested Forms</h2>
                    <p class="card-description">Sasuke Uchiha has requested a duel form for the 57th times.</p>
                </div>
                <button class="list-link">Read More</button>
            </div>
            <div class="card border two">
                <div>
                    <h2 class="title">Number of Requested Forms</h2>
                    <p class="card-description"> 58 Forms waiting...</p>
                </div>
                <button class="list-link">Read More</button>
            </div>
            <div class="card border three">
                <div>
                    <h2 class="title">Number of Appointments Today</h2>
                    <p class="card-description"> 3 Appointments pending...</p>
                </div>
                <button class="list-link">Read More</button>
            </div>
            <div class="card border four">
                <div>
                    <h2 class="title">Recent Requested Forms</h2>
                    <p class="card-description"> 
                        Sasuke Uchiha..........Duel Form<br>
                        Sasuke Uchiha..........Duel Form<br>
                        Sasuke Uchiha..........Duel Form<br>
                        Sasuke Uchiha..........Duel Form<br>
                        Sasuke Uchiha..........Duel Form<br>
                        Sasuke Uchiha..........Duel Form<br>
                        Sasuke Uchiha..........Duel Form<br>
                        Sasuke Uchiha..........Duel Form<br>
                        Sasuke Uchiha..........Duel Form<br>
                    </p>
                </div>
                <button class="list-link">Read More</button>
            </div>
        </div>
        
    </div>
    
</section>

    <!-- Footer -->
 <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info" id="titlefooter">
          <div title="footertitle">
          <a href="index.php" class="logo d-flex align-items-center">
            <span>Guidance and Counseling Unit</span>
          </a>
          </div>
          <p>Benguet State University</p>
          <div class="social-links d-flex mt-4">
            <a href="#" class="twitter"><i class="ri-twitter-line"></i></a>
            <a href="#" class="facebook"><i class="ri-facebook-fill"></i></a>
            <a href="#" class="instagram"><i class="ri-instagram-line"></i></a>
            <a href="#" class="linkedin"><i class="ri-linkedin-fill"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links" id="footerlinks">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links" id="footerservices">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Forms</a></li>
            <li><a href="#">Forms</a></li>
            <li><a href="#">Forms</a></li>
            <li><a href="#">Forms</a></li>
            <li><a href="#">Forms</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start" id="footercontacts">
          <h4>Contact Us</h4>
          <p>
            A108 Adam Street <br>
            New York, NY 535022<br>
            United States <br><br>
            <strong>Phone:</strong> +1 5589 55488 55<br>
            <strong>Email:</strong> info@example.com<br>
          </p>

        </div>

      </div>
    </div>

    <div class="container mt-4" id="footercopyright">
      <div class="copyright">
        <?php echo '&copy; ' . date('Y') . ' <strong><span>Impact</span></strong>. All Rights Reserved'; ?>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>


 
<!-- Script     -->
<script src="./assets/index.js"></script>    
</body>
</html>