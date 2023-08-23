<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requested Forms</title>
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/form.css">

    <link rel="icon" href="assets/images/GCU_logo.png">
</head>

<body>


    <!-- Header -->
<header class="header">
    <nav class="nav container"> 
        <img src="assets/images/bsu.png" alt="" style="width:5.5%; height:auto; padding:2px">
        <div class="nav-mobile">
            <ul class="list">
                <li class="list-item">
                    <a href="index.php" class="list-link current">Home</a>
                </li>
                <li class="list-item hov">
                    <a href="profile.php" class="list-link">Student Profiles</a>
                </li>
                <li class="list-item hov">
                    <a href="appointment.php" class="list-link">Appointment Schedules</a>
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

</section>
  <div style="background-color: black; height:50px;">
</div>

    <div class="container">
        <h2 class="title independent-title">REQUESTED FORMS</h2>
        <!-- <div id="dynamicContent"></div> -->
        <div class="card">
            <header class="card-header">
                <small>The following are the requested forms for today</small>
                <h2 class="title">&nbsp&nbsp January 00, 0000</h2>
            </header>
            <hr>
          <div class=" gallery">
              <div id="dynamicContent"></div>

        </div>
    </div>
    </div>
</section>
<br>

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
 
<script>
   $(document).ready(function() {
    $.ajax({
        url: "../backend/check_transaction.php",
        type: "GET",
        dataType: "json",
        success: function(data) {
            var contentTemplate = '';

            for (var i = 0; i < data.length; i++) {
                var entry = data[i];
                
                contentTemplate += ` 
                    <div class="content1">
                        <img src="./assets/images/${entry.status === 0 ? 'a.jpg' : 'pfp.jpg'}"> 
                        <h4>${entry.transaction}</h4>
                        <p>${entry.name}</p>
                        <h5>${entry.status}</h5>
                        <br>
                        ${entry.status === 0 ? '<h5><i class="ri-mail-unread-line"></i></h5>' : '<h5><i class="ri-mail-open-line"></i></h5>'}
                        <br>
                        ${entry.status === 0 ? '<a href="./form/pop.html">' : '<a href="#">'}
                            <button class="buy-${entry.status === 0 ? 1 : 2}">READ MORE</button>
                        </a>
                    </div>
                `; // the img will be as is for now
            }

            $("#dynamicContent").html(contentTemplate);
        },
        error: function(xhr, status, error) {
            console.error("Request failed with status: " + status);
        }
    });
});
</script>  
<script src="./assets/main.js"></script> 
</body>
</html>