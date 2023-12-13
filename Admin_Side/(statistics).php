<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics</title>
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/css/forms.css">
    <link rel="icon" href="assets/images/GCU_logo.png">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
      <!-- Export -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>  
    <link href="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"/>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
</head>
<body>
  <!-- Header -->
  <header class="header">
    <nav class="nav"> 
        <div class="logo">
            <a href="./main.php" ><img src="assets/images/bsu.png" alt=""></a>
        </div>
        <div class="nav-mobile">
            <ul class="list">
                <li class="list-item">
                    <a href="main.php" class="list-link current">Home</a>
                </li>
                <li class="list-item hov">
                    <a href="studentprofile.php" class="list-link current1">Student Profiles</a>
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
        <h2>STATISTICS</h2>
    </div>
    <div class="container">
        <div class="card">
           <header class="card-header">
                <h1>AVERAGE DAILY ATTENDANCE RATE</h1>
                <h2 class="title">&nbsp&nbsp August 25, 2023</h2>
            </header>
            <hr>
          <div class=" gallery">
              <div id="dynamicContent"></div>
        </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
           <header class="card-header">
                <h1>ACADEMIC PERFORMANCE STATISTICS</h1>
            </header>
            <hr>
          <div class=" gallery">
              <div id="dynamicContent"></div>
        </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
           <header class="card-header">
                <h1>BEHAVIORAL AND EMOTIONAL HEALTH STATISTICS</h1>
            </header>
            <hr>
          <div class=" gallery">
              <div id="dynamicContent"></div>
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
 $(document).ready(function() {
    $.ajax({
        url: "../backend/check_transaction.php",
        type: "GET",
        dataType: "json",
        success: function(data) {
          
            var contentTemplate = '';
            for (var i = 0; i < data.length; i++) {
                var entry = data[i];
                var status = entry.status; // Store the status in a variable
                contentTemplate += `
                    <div class="content1" data-stud-user-id="${entry.stud_user_id}">
                        <img src="./assets/images/${status === 0 ? 'a.jpg' : 'pfp.jpg'}">
                        <h4>${entry.service_requested}</h4>
                        <p>${entry.last_name}</p>
                        <h5>${entry.stud_user_id}</h5>
                        <br>
                        <h5 class="status-icon">
                            <i class="${status === 0 ? 'ri-mail-unread-line' : 'ri-mail-open-line'}"></i>
                        </h5>
                        <br>
                        ${status === 0 ? '<a href="#">' : '<a href="#">'}
                            <button class="buy-${status === 0 ? 1 : 2}" ${status === 1 ? 'disabled' : ''}>READ MORE</button>
                        </a>
                    </div>
                `;
            }
            $("#dynamicContent").html(contentTemplate);
            $(".content1 button").click(function() {
    var contentElement = $(this).closest(".content1");
    var studUserId = contentElement.data("stud-user-id"); // Extract stud_user_id from content1
    // Make an AJAX request to update the status
    $.ajax({
        url: "../backend/update_status.php",
        type: "POST",
        data: { stud_user_id: studUserId },
        success: function(response) {
          console.log(response); // Log the response from the server
    console.log("Status updated in the database");
        },
        error: function(xhr, status, error) {
            console.error("Request failed with status: " + status);
        }
    });
});
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