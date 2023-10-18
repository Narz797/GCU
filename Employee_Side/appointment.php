<?php
  session_start();
?>
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
          <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/apmt.css">
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
        <h2>APPOINTMENT SCHEDULE</h2>
    </div>
    <div class="container">
        <br>
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
              <input type="text" placeholder="Student Name" class="event-student-name"/>
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
        <!-- for edit -->
        <div class="edit-event-wrapper">
          <div class="edit-event-header">
            <div class="title">Add Event</div>
            <i class="fas fa-times close"></i>
          </div>
          <div class="edit-event-body">
            <div class="edit-event-input">
              <input type="text" placeholder="Event Name" class="edit-event-name" />
            </div>
            <div class="edit-event-input">
              <input type="text" placeholder="Student Name" class="edit-event-student-name"/>
            </div>
            <div class="edit-event-input">
              <input
                type="text"
                placeholder="Event Time From: 00:00"
                class="edit-event-time-from"
              />
            </div>
            <div class="edit-event-input">
              <input
                type="text"
                placeholder="Event Time To: 00:00"
                class="edit-event-time-to"
              />
            </div>
          </div>

        </div>
        <!--  -->
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
<div class="container">
        <br>
        <h2 class="title"></h2>
        <div class="card">
            <header class="card-header">
                <h1>Appointments</h1>
                <p>&nbsp&nbsp The following are the requested appointments.</p>
            </header>
            <hr>
            <div class=" gallery">
            <main class="table" id="customers_table">
            <section class="table-header">
                <h1>List of <b>Requested Appointments</b></h1>
                <div class="input-group">
                    <input type="search" placeholder="Search Data...">
                </div>
                <div class="export-file">
                    <label for="export-file" class="export-file-btn" title="Export File"><img src="assets/images/file-transfer-line.png" alt=""></label>
                    <input type="checkbox" id="export-file">
                    <div class="export-file-options">
                        <p>Export as&nbsp; &#10140;</p>
                        <label for="export-file" id="toEXCEL">EXCEL <img src="assets/images/excel.png" alt=""></label>
                    </div>
                </div>
            </section>
            <section class="table-body">
                <table>
                    <thead>
                        <tr>
                            <th> Id <br><span class="icon-arrow">&UpArrow;</span></th>
                            <th> Student <br><span class="icon-arrow">&UpArrow;</span></th>
                            <th> College <br><span class="icon-arrow">&UpArrow;</span></th>
                            <th> Course <br><span class="icon-arrow">&UpArrow;</span></th>
                            <th> Contact <br><span class="icon-arrow">&UpArrow;</span></th>
                            <th> Date of Appointment<br><span class="icon-arrow">&UpArrow;</span></th>
                            <th> Time of Appointment<br><span class="icon-arrow">&UpArrow;</span></th>
                            <th> Reason<br> <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Action<br><span class="icon-arrow">&UpArrow;</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> 1 </td>
                            <td> Zinzu, Chan Lee</td>
                            <td> CHET </td>
                            <td> Psychology </td>
                            <td> 000-000-0000 </td>
                            <td> 17 Dec, 2022 </td>
                            <td> 8:00 - 9:00 </td>
                            <td> Counseling </td>
                            <td> <a href="#"><button>View</button></a></td>
                        </tr>
                        <tr>
                            <td> 2 </td>
                            <td> Zinzu, Chan Lee</td>
                            <td> CHET </td>
                            <td> Psychology </td>
                            <td> 000-000-0000 </td>
                            <td> 17 Dec, 2022 </td>
                            <td> 10:00 - 11:00 </td>
                            <td> Counseling </td>
                            <td> <a href="#"><button>View</button></a></td>
                        </tr>
                        <tr>
                            <td> 3 </td>
                            <td> Zinzu, Chan Lee</td>
                            <td> CHET </td>
                            <td> Psychology </td>
                            <td> 000-000-0000 </td>
                            <td> 17 Dec, 2022 </td>
                            <td> 1:00 - 4:00 </td>
                            <td> Counseling </td>
                            <td> <a href="#"><button>View</button></a></td>
                        </tr>
                    </tbody>
                </table>
            </section>
            </main>
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
</footer>

<!-- Script     -->
<script>
  var sessionID = <?php echo json_encode($_SESSION['session_id']); ?>;
</script>

<script src="assets/main.js"></script>   
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/js/calendar.js"></script> 
<script src="./assets/js/table.js"></script>   
<style>
  
</style>
</body>
</html>