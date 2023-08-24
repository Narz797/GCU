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

    <link rel="icon" href="assets/images/GCU_logo.png">
</head>

<body>
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
    <!-- Header -->
    <?php
 
    include 'includes/head.php';
    
    ?>

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
                <a href="../index.php" class="card-body-link">
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
 <?php
 
 include 'includes/footer.php';
 
 ?>

 
<!-- Script     -->
<script src="./assets/index.js"></script>    
</body>
</html>