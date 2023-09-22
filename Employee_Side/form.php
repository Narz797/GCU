<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requested Forms</title>
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



      <!-- Export -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>  
    <link href="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"/>

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
            <a href="./index.php" ><img src="assets/images/bsu.png" alt=""></a>
        </div>
        <div class="nav-mobile">
            <ul class="list">
                <li class="list-item">
                    <a href="index.php" class="list-link current">Home</a>
                </li>
                <li class="list-item hov">
                    <a href="profile.php" class="list-link current1">Student Profiles</a>
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
        <h2>REQUESTED FORMS</h2>
    </div>

    
    <div class="container">
    <div class="card">
            <header class="card-header">
                <small>The following are the requested forms for today,</small>
                <h2 class="title">&nbsp&nbsp August 25, 2023</h2>
            </header>
            <hr>
          <div class=" gallery">
            <div class="content1">
                <img src="./assets/images/portfolio/formtemp.png">
                <h4>REFERRAL SLIP</h4>
                <p>10 pending...</p>
                <h5>QF-OSS-01</h5>
                <br>
                <h5><i class="ri-mail-unread-line size"></i></h5>
                <br>
                <a href="subpage/rs_page.php">
                <button class="buy-1">READ MORE</button></a>

            </div>
                <div class="content1">
                <img src="./assets/images/portfolio/formtemp.png">
                <h4>READMISSION SLIP</h4>
                <p>8 pending...</p>
                <h5>OSS-GCU-F12</h5>
                <br>
                <h5><i class="ri-mail-unread-line"></i></h5>
                <br>
                <a href="subpage/ra_page.php">
                <button class="buy-1">READ MORE</button></a>

            </div>
                <div class="content1">
                <img src="./assets/images/portfolio/formtemp.png">
                <h4>WITHDRAWAL SLIP</h4>
                <p>11 pending...</p>
                <h5>OSS-GCU-F13</h5>
                <br>
                <h5><i class="ri-mail-unread-line"></i></h5>
                <br>
                <a href="subpage/wds_page.php">
                <button class="buy-1">READ MORE</button></a>

            </div>
                <div class="content1">
                <img src="./assets/images/portfolio/formtemp.png">
                <h4>LEAVE OF ABSENCE SLIP</h4>
                <p>28 pending...</p>
                <h5>OSS-GCU-F11</h5>
                <br>
                <h5><i class="ri-mail-unread-line"></i></h5>
                <br>
                <a href="subpage/la_page.php">
                <button class="buy-1">READ MORE</button></a>

            </div>
          </div>
        </div>
    </div>

    <!-- History of transaction -->
    <div class="container">
        <br>
        <h2 class="title"></h2>
        <div class="card">
            <header class="card-header">
                <h1>HISTORY</h1>
                <p>&nbsp&nbsp The following are the previous requested forms.</p>
            </header>
            <hr>
            <div class=" gallery">
            <main class="table" id="customers_table">
            <section class="table-header">
                <h1>History of Requested Forms</h1>
                <div class="input-group">
                    <input type="search" placeholder="Search Data...">
                </div>
                <div class="export-file">
                    <label for="export-file" class="export-file-btn" title="Export File"></label>
                    <input type="checkbox" id="export-file">
                    <div class="export-file-options">
                        <p>Export as&nbsp; &#10140;</p>
                        <label for="export-file" id="toPDF">PDF <img src="assets/images/pdf.png" alt=""></label>
                        <label for="export-file" id="toEXCEL">EXCEL <img src="assets/images/excel.png" alt=""></label>
                    </div>
                </div>
            </section>
            <section class="table-body">
                <table id="historyTableBody">
                    <thead>
                        <tr>
                                <th>Student ID<span class="icon-arrow">&UpArrow;</span></th>                            
                                <th>Student<span class="icon-arrow">&UpArrow;</span></th>
                                <th> Course <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Date <span class="icon-arrow">&UpArrow;</span></th>
                                <th>Service Requested<span class="icon-arrow">&UpArrow;</span></th>
                                <th>Status<span class="icon-arrow">&UpArrow;</span></th>
                                <th>Action<span class="icon-arrow">&UpArrow;</span></th>
                            
                        </tr>
                    </thead>
                    <tbody >
            <!-- History data will be populated here -->
                    </tbody>
                </table>
                <p id="noHistoryMessage2">No items available.</p>
                
            </section>
            </main>
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
</body>
<!-- Script     -->
 
<script>
  $(document).ready(function () {
        $.ajax({
            url: "../backend/check_transaction.php",
            type: "GET",
            dataType: "json",
            success: function (data) {

                console.log(data);
                // if (data.status===0){
                var tableBody = $("#dynamicTable tbody");
                var historyTableBody = $("#historyTableBody tbody");
                var noHistoryMessage1 = $("#noHistoryMessage1"); 
                var noHistoryMessage2 = $("#noHistoryMessage2"); 
 

                for (var i = 0; i < data.length; i++) {
                    var entry = data[i];
                    var status = entry.status;
                    var tableToAppend = tableBody; // Determine which table to append to
                    
                    var row = $("<tr></tr>");
                    row.append("<td>" + entry.stud_user_id + "</td>");
                    row.append("<td>" + entry.first_name + " " + entry.last_name + "</td>");
                    row.append("<td>" + entry.course + "</td>");
                    row.append("<td>" + entry.date_created + "</td>");
                    row.append("<td>" + entry.transact_type + "</td>");

                    var statusClass = status == 'pending' ? 'status delivered' : 'status cancelled';
                    var statusText = status == 'pending' ? 'Unread' : 'Read';

                    var statusCell = $("<td></td>");
                    var statusLink = $("<a href='#'></a>").addClass(statusClass).text(statusText);
                    statusCell.append(statusLink);
                    row.append(statusCell);

                    var deleteCell = $("<td></td>");
                    var deleteLink = $("<a href='#'></a>").html('<i class="ri-delete-bin-6-line"></i>');
                    deleteCell.append(deleteLink);
                    row.append(deleteCell);

                    // Append the row to a table (you should have a reference to the target table, e.g., tableBody or historyTableBody)
                    
                    
                    if (status == 'pending') {
                        tableBody.append(row);
                    } else if (status == 'recieved') {
                        historyTableBody.append(row); // Append row to history table body
                    }

                 }

                var dynamicTableRowCount1 = $("#dynamicTable tbody tr").length;
                var dynamicTableRowCount2 = $("#historyTableBody tbody tr").length;

                    if (dynamicTableRowCount1 > 0) {
                    noHistoryMessage1.hide(); // Hide the no history message if there is data
                    } else {
                        noHistoryMessage1.show(); // Show the no history message if no data
                    }

                    if (dynamicTableRowCount2 > 0) {
                    noHistoryMessage2.hide(); // Hide the no history message if there is data
                    } else {
                        noHistoryMessage2.show(); // Show the no history message if no data
                    }

                $("td a").click(function () {
                    var contentElement = $(this).closest("tr");
                    // var studUserId = contentElement.data("stud-user-id");
                    var studUserId = contentElement.find("td:first-child").text();

                    $.ajax({
                        url: "../backend/update_status.php",
                        type: "POST",
                        data: { stud_user_id: studUserId },
                        success: function (response) {
                            console.log(response);
                            console.log("Status updated in the database");
                        },
                        error: function (xhr, status, error) {
                            console.error("AJAX Error:");
                            console.error("Status: " + status);
                            console.error("Error: " + error);
                            console.error("Response Text: " + xhr.responseText);
                        }
                    });
                    
                    //location.reload();
                });
        },
        error: function (xhr, status, error) {
    console.error("AJAX Error:");
    console.error("Status: " + status);
    console.error("Error: " + error);
    console.error("Response Text: " + xhr.responseText);
}

        });
    });
</script>  
<script src="./assets/main.js"></script> 

</html>