<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profiles</title>
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="pop.css">
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
        <div class="nav-mobile">
            <ul class="list">
                <li class="list-item">
                    <a href="index.php" class="list-link current">Home</a>
                </li>
                <li class="list-item">
                    <a href="form.php" class="list-link">Requested Forms</a>
                </li>
                <li class="list-item">
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
                            <div class="card-image">
                    <img src="./assets/images/pfpback.jpg" alt="">
                </div>
            <div class="card-body">
                <div class="card-information">
                    <h1 class="title main-title"> Itachi Uchiha</h1>
                    <p class="card-description1">Joined at January 05, 0000<br><br></p>
                    <p class="card-description">
                        Email: uchiha@massacre.com<br>
                        Gender: Genderfluid<br>
                        Status: Intern
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
    <!-- Management-area -->


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
<script src="./assets/main.js"></script>    
</body>
</html>