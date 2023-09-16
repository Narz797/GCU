<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="icon" href="assets/images/GCU_logo.png">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/css/profiles.css">
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
<style>

    </style>
<body>

    <!-- Header -->
    <header class="header">
    <nav class="nav"> 
        <div class="logo">
            <a href="./index.php" ><img src="assets/images/bsu.png" alt=""></a>
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
    
<section class="welcome-message">
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
        <h2>REQUESTED FORMS</h2>
    </div>
    <div class="container">
        <div class="card">

 <main class="table" id="customers_table">
        <section class="table-header">
            <h1>List of Students</h1>
            <div class="input-group">
                <input type="text" id="searchInput" placeholder="Search Data...">
                
            </div>
            <div class="export-file">
                <label for="export-file" class="export-file-btn" title="Export File"><img src="assets/images/export.png" alt=""></label>
                <input type="checkbox" id="export-file">

                <div class="export-file-options">
                    <label>Export As &nbsp; &#10140;</label>
                    <label for="export-file" id="toPDF">PDF <img src="assets/images/pdf.png" alt=""></label>
                    <label for="export-file" id="toJSON">JSON <img src="assets/images/json.png" alt=""></label>
                    <label for="export-file" id="toCSV">CSV <img src="assets/images/csv.png" alt=""></label>
                    <label for="export-file" id="toEXCEL">EXCEL <img src="assets/images/excel.png" alt=""></label>
                </div>


            </div>
        </section>

       

        <section class="table-body" >
            <table  id="table" >
                <thead>
                    <tr>
                        <th> Id <br> <span class="icon-arrow">&UpArrow;</span></th>
                        <th> First Name <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Last &nbspName <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Year Enrolled <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Course <br><span class="icon-arrow">&UpArrow;</span></th>
                        <!-- <th> Contact Number <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Guardian Number <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Service Requested <br><span class="icon-arrow">&UpArrow;</span></th> -->
                        <th> Action Taken<br><span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody id="data-table">
                  
                 </tbody>
             
            </table>
        </section>
    </main>

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

<!-- Script     -->
<script src="./assets/main.js"></script>

 <script src="assets/js/table.js"></script>   
</body>
</html>