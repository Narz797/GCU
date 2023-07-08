<!-- New Comment -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body>
    <!-- Floating-background-image -->
    <div class="floating-background-image">
        <img src="./assets/images/b.png" alt="">
    </div> 

    <!-- Header -->
<header class="header">
    <nav class="nav container">
        <a href="./index.php" class="logo">GCU</a>
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
    <div class="container">
        <br>
        <h2 class="title independent-title">Control Panel</h2>
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
    <div class="management-area-container container d-grid">
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
    <footer class="footer">
        <div class="footer-container container">
            <span class="copyright-information">&copy;2023 BSIT3B Group3. All rights reserved.</span>
            <ul class="list">
                <li class="list-item">
                    <a href="#">Terms and Conditions</a>
                </li>
                <li class="list-item">
                    <a href="#">Privacy Policy</a>
                </li>
            </ul>
            <p><i>UI developed by Dulagan, Nichole I.</i></p>
        </div>
    </footer>

<!-- Script     -->
<script src="./assets/index.js"></script>    
</body>
</html>