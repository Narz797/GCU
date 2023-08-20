<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/profile.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        <h2 class="title independent-title">STUDENT PROFILE</h2>
        <div class="card">

 <main class="table" id="customers_table">
        <section class="table-header">
            <h1>List of Students</h1>
            <div class="input-group">
                <input type="text" id="searchInput" placeholder="Search Data...">
                <img src="assets/images/search.png" alt="">
            </div>
            <div class="export-file">
                <label for="export-file" class="export-file-btn" title="Export File"></label>
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
        <section class="table-body">
        <table border="1">
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th> First Name <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Lastname <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Grnder <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Year Enrolled <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Course <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Birthdate <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Email <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                 </tbody>
             
            </table>
            <table border="1" id="data-table">
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th> First Name <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Lastname <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Grnder <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Year Enrolled <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Course <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Birthdate <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Email <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                 </tbody>
             
            </table>
        </section>
    </main>

        </div>
    </div>


</section>
<br>




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
<script src="./assets/main.js"></script>



<script>
        $(document).ready(function() {
            // Fetch data using $.ajax
            $.ajax({
                url: '../backend/search_student.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    const table = document.getElementById('data-table');
                    const searchInput = document.getElementById('searchInput');

                    function filterData() {
                        const searchTerm = searchInput.value.toLowerCase();

                        table.innerHTML = ''; // Clear existing table rows

                        data.forEach(row => {
                            if (
                                row.stud_user_id.toString().includes(searchTerm) ||
                                row.first_name.toLowerCase().includes(searchTerm) ||
                                row.last_name.toLowerCase().includes(searchTerm)
                            ) {
                                const newRow = table.insertRow();
                            newRow.insertCell().textContent = row.stud_user_id;
                            newRow.insertCell().textContent = row.first_name;
                            newRow.insertCell().textContent = row.last_name;
                            newRow.insertCell().textContent = row.gender;
                            newRow.insertCell().textContent = row.year_enrolled;
                            newRow.insertCell().textContent = row.course;
                            newRow.insertCell().textContent = row.birth_date;
                            newRow.insertCell().textContent = row.email;
                            }
                        });
                    }

                    searchInput.addEventListener('input', filterData);

                    // Initial table population
                    filterData();
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        });
    </script>




 <!-- <script src="assets/js/table.js"></script>    -->
</body>
</html>