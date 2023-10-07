<?php 

include 'includes/main.php';

 ?>

<head>

    <!-- icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
          <!-- Vendor CSS Files -->
  <link href="../Employee_Side/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../Employee_Side/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../Employee_Side/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../Employee_Side/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../Employee_Side/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../Employee_Side/assets/apmt.css">
  
</head>
  <body>
       
  </section>

</div>
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
       
      </div>
    </div>

  </div>
</div>
      </div>
  </div>
</section>

  </body>
<?php include '../includes/footer.php' ?>

<script src="../Employee_Side/assets/js/calendar.js"></script>    
<script src="../Employee_Side/assets/main.js"></script> 