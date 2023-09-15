<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appointment Schedule</title>
  <!-- Remix icons -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  
  <!-- Stylesheet -->
  <link rel="stylesheet" href="assets/css/apmt.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
  <!-- Header -->
  <header class="header">
    <nav class="nav">
      <div class="logo">
        <a href="./index.php"><img src="assets/images/bsu.png" alt=""></a>
      </div>
      <div class="nav-mobile">
        <ul class="list">
          <li class="list-item">
            <a href="index.php" class="list-link current">Home</a>
          </li>
          <li class="list-item hov">
            <a href="form.php" class="list-link current1">Requested Forms</a>
          </li>
          <li class="list-item hov">
            <a href="appointment.php" class="list-link current1">Appointment Schedules</a>
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
                  <div class="days" onclick="myFunction()"></div>
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
                  <div class="title">Add Availability</div>
                  <i class="fas fa-times close"></i>
                </div>
                <div class="add-event-body">
                  <form id="save_appointment" name="form1" method="post">
                    <div class="add-event-input">
                      <input id="from-time" type="text" placeholder="Availability Time From: 00:00"
                        class="event-time-from" />
                    </div>
                    <div class="add-event-input">
                      <input id="to-time" type="text" placeholder="Availability Time To: 00:00" class="event-time-to" />
                    </div>
                    <div class="add-event-input">
                      <input id='student' type="text" placeholder="Name of the Student" />
                    </div>
                  </form>
                </div>
                <div class="add-event-footer">
                  <button class="add-event-btn">Add Availability</button>
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
  <footer id="footer" class="footer">
    <div class="container" id="footercopyright">
      <div class="copyright">
        <?php echo '&copy; ' . date('Y') . ' <strong><span>Impact</span></strong>. All Rights Reserved'; ?>
      </div>
      <div class="credits">Designed by <a href="https://www.facebook.com/">BSIT</a></div>
    </div>
  </footer>
  <!-- Script -->
  <script src="assets/main.js"></script>
  <script src="assets/js/calendar.js"></script>
  <script>
    function myFunction() {
      alert('first');
      var response = '';
      $.ajax({
        type: "GET",
        url: "../backend/get_appointment.php",
        dataType: "html", // Fixed the syntax error here, removed the extra semicolon
        success: function(text) {
          console.log(text);
        }
      });
    }
</script>
  <script>
    $("#save_appointment").on("submit", function (event) {
      event.preventDefault();
      var employee_id = <?php echo $_SESSION['session_id'] ?>;
      var transact_type = "withdrawal"

      $.ajax({
        type: 'POST',
        url: '../../backend/create_transaction.php',
        data: {
          reason: $('#action').find(":selected").val(),
          statement: $('#reason_state').val(),
          explain: $("#reason_explain").val()
        },
        success: function (data) {
          alert(data);

        }
      });
    });

  </script>
</body>

</html>