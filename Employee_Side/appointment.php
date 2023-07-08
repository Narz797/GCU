<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Schedule</title>
    <!-- icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/css/apmt.css">
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
                <li class="list-item hov">
                    <a href="form.php" class="list-link">Requested Forms</a>
                </li>
                <li class="list-item hov">
                    <a href="profile.php" class="list-link">Student Profiles</a>
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
        <h2 class="title independent-title">APPOINTMENT SCHEDULE</h2>
        <div class="card">
            <hr>
        <div class="body-calendar">
         <div class="container-calendar">
      <div class="left">
        <div class="calendar">
          <div class="month">
            <i class="fas fa-angle-left prev"></i>
            <div class="date">month,year</div>
            <i class="fas fa-angle-right next"></i>
          </div>
          <div class="weekdays">
            <div>Sun</div>
            <div>Mon</div>
            <div>Tue</div>
            <div>Wed</div>
            <div>Thu</div>
            <div>Fri</div>
            <div>Sat</div>
          </div>
          <div class="days"></div>
          <div class="goto-today">
            <div class="goto">
              <input type="text" placeholder="mm/yyyy" class="date-input" />
              <button class="goto-btn">Go</button>
            </div>
            <button class="today-btn">Today</button>
          </div>
        </div>
      </div>
      <div class="right">
        <div class="today-date">
          <div class="event-day">day</div>
          <div class="event-date">day month year</div>
        </div>
        <div class="events"></div>
        <div class="add-event-wrapper">
          <div class="add-event-header">
            <div class="title">Add Event</div>
            <i class="fas fa-times close"></i>
          </div>
          <div class="add-event-body">
            <div class="add-event-input">
              <input type="text" placeholder="Event Name" class="event-name" />
            </div>
            <div class="add-event-input">
              <input
                type="text"
                placeholder="Event Time From: 00:00"
                class="event-time-from"
              />
            </div>
            <div class="add-event-input">
              <input
                type="text"
                placeholder="Event Time To: 00:00"
                class="event-time-to"
              />
            </div>
          </div>
          <div class="add-event-footer">
            <button class="add-event-btn">Add Event</button>
          </div>
        </div>
      </div>
      <button class="add-event">
        <i class="fas fa-plus"></i>
      </button>
    </div>
</div>
        </div>
    </div>
</section>
<br>

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
<script src="assets/main.js"></script>   
<script src="assets/js/calendar.js"></script>    
</body>
</html>