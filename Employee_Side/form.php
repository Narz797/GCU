<?php
session_start();
  // Check if the session variable is empty
  if (empty($_SESSION['session_id'])) {
    // Redirect to the desired location
    echo "<script>alert('You have already Logged out. You will be redirected.'); window.location.href = 'http://localhost/GCU/home';</script>";
    
    exit; // Make sure to exit the script after a header redirect
  }
    $_SESSION['form_type']='all';//
?>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.full.min.js"></script>

</head>
<body>
  <!-- Header -->
  <header class="header">
    <nav class="nav"> 
        <div class="logo">
            <a href="./employee-home" ><img src="assets/images/bsu.png" alt=""></a>
        </div>
        <div class="nav-mobile">
            <ul class="list">
                <li class="list-item">
                    <a href="./employee-home" class="list-link current">Home</a>
                </li>
                <li class="list-item hov">
                    <a href="./student-profile" class="list-link current1">Student Profiles</a>
                </li>
                <li class="list-item hov">
                    <a href="./appointment" class="list-link current1">Appointment Schedules</a>
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
            <button class="icon-btn place-items-center" onclick="logout()">
                <i class="ri-user-3-line"></i>
            </button>
            <button class="icon-btn place-items-center" onclick="archive()">
                <i class="ri-archive-drawer-line"></i>
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
                <!-- get current date
    M/D/Y-->
    <h2 class="title"><?php echo date('F j, Y'); ?></h2>
            </header>
            <hr>
          <div class=" gallery">

          <div class="content1">
                <img src="./assets/images/read.jpg">
                <h4>CLASS ADMISSION SLIP</h4>
                <p><span class="num" data-val="28">000</span>
                <span class="text">pending...</span></p>
                <h5>don't know the serial number</h5>
                <br>
                <h5><i class="ri-mail-unread-line"></i></h5>
                <br>
                <a href="subpage/ca_page.php">
                <button class="buy-1">READ MORE</button></a>
            </div>

            <div class="content1">
                <img src="./assets/images/loa.jpg">
                <h4>LOA SLIP</h4>
                <p><span class="num"  id="LOA"></span>
                <span class="text">pending...</span></p>
                <h5>OSS-GCU-F11</h5>
                <br>
                <h5><i class="ri-mail-unread-line"></i></h5>
                <br>
                <a href="subpage/loa-forms">
                <button class="buy-1">READ MORE</button></a>
            </div>
            <div class="content1">
                <img src="./assets/images/read.jpg">
                <h4>READMISSION SLIP</h4>
                <p><span class="num"  id="RA"></span>
                <span class="text">pending...</span></p>
                <h5>OSS-GCU-F12</h5>
                <br>
                <h5><i class="ri-mail-unread-line"></i></h5>
                <br>
                <a href="subpage/ra-forms">
                <button class="buy-1">READ MORE</button></a>
            </div>
            <div class="content1">
                <img src="./assets/images/ref.jpg">
                <h4>REFERRAL SLIP</h4>
                <p><span class="num" id="RS"></span>
                <span class="text">pending...</span></p>
                <h5>QF-OSS-01</h5>
                <br>
                <h5><i class="ri-mail-unread-line size"></i></h5>
                <br>
                <a href="subpage/rs-forms">
                <button class="buy-1">READ MORE</button></a>
            </div>
            <div class="content1">
                <img src="./assets/images/wds.jpg">
                <h4>WDS SLIP</h4>
                <p><span class="num" id="WDS"></span>
                <span class="text">pending...</span></p>
                <h5>OSS-GCU-F13</h5>
                <br>
                <h5><i class="ri-mail-unread-line"></i></h5>
                <br>
                <a href="subpage/wds-forms">
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
                <p>&nbsp&nbsp The following are all the previous transactions.</p>
            </header>
            <hr>
            <div class=" gallery">
            <main class="table" id="customers_table">
            <section class="table-header">
                <h1>List of <b>All Unfinished Transactions</b></h1>
                <div class="input-group">
                    <input type="search" id="searchInput" onkeyup="searchTable()" placeholder="Search Data... ">
                </div>
                <div class="export-file">
                    <label for="export-file" class="export-file-btn" title="Export File"><img src="assets/images/file-transfer-line.png" alt=""></label>
                    <input type="checkbox" id="export-file">
                    <div class="export-file-options">
                        <p>Export as&nbsp; &#10140;</p>
                        <label for="export-file" id="exportToExcel" onclick="exportToExcel()">EXCEL <img src="assets/images/excel.png" alt=""></label>

                    </div>
                </div>
            </section>
            <section class="table-body">
                <table id="dynamicTable">
                <thead>
                        <tr>
                            <th> Id <br><span class="icon-arrow">&UpArrow;</span></th>
                            <th> Student <br><span class="icon-arrow">&UpArrow;</span></th>
                            <th> College <br><span class="icon-arrow">&UpArrow;</span></th>
                            <th> Course <br><span class="icon-arrow">&UpArrow;</span></th>
                            <th> Contact <br><span class="icon-arrow">&UpArrow;</span></th>
                            <th> Date<br><span class="icon-arrow">&UpArrow;</span></th>
                            <th> Requested<br> <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Status<br> <span class="icon-arrow">&UpArrow;</span></th>
                        </tr>
                    </thead>
                    <tbody id="data-table">
            <!-- History data will be populated here -->
                    </tbody>
                </table>
                <p id="noHistoryMessage2">Empty</p>
                
            </section>
            </main>
            </div>
        </div>
    </div>
</section>
<br>
</body>
 
<script>
        function searchTable() { //searches in all column
            var input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("dynamicTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                tr[i].style.display = "none"; // Hide all rows initially
                for (j = 0; j < tr[i].getElementsByTagName("td").length; j++) {
                    td = tr[i].getElementsByTagName("td")[j];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = ""; // Display the row if any column matches the search criteria
                            break; // Break out of the inner loop to avoid hiding the row again
                        }
                    }
                }
            }
        }


        function updateValues(LOA, RA, RS, WDS) {
        $('#LOA').text(LOA);
        $('#RA').text(RA);
        $('#RS').text(RS);
        $('#WDS').text(WDS);
   
    }
    function logout() {
    window.location.href = '../home?logout=true';
}
function archive() {
    window.location.href = './subpage/archive.php';
        }
function fetchData() { //getting total
        console.log('AJAX request started');
        $.ajax({
            type: 'GET',
            url: '../backend/get_transaction.php',
            dataType: 'json',
            
                // ...
                success: function (data) {
                    console.log(data.latest_data);
                    if (data.latest_data.length > 0) {
                            var totalLOA = data.total_pending_LOA;
                            var totalRA = data.total_pending_RA;
                            var totalRS = data.total_pending_RS;
                            var totalWDS = data.total_pending_WDS;
                            console.log("LOA",totalLOA);
                            console.log("RA",totalRA);
                            console.log("LOA",totalRS);
                            console.log("RS",totalLOA);
                            updateValues(totalLOA, totalRA, totalRS, totalWDS);
                            console.log(totalLOA);

                        } else {

                        console.log('No results found');
                    }
            },
            error: function (xhr, status, error) {
                console.error('Error: ' + error);
                console.error('Status: ' + status);
                console.error('Response: ' + xhr.responseText);
            }
        });
    }
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
                var noHistoryMessage2 = $("#noHistoryMessage2"); 
 
                for (var i = 0; i < data.length; i++) {
                    
                    var entry = data[i];
                    var status = entry.status;
                    var tableToAppend = tableBody; // Determine which table to append to
                    var row = $("<tr></tr>");
                    row.append("<td>" + entry.stud_user_id + "</td>");
                    row.append("<td>" + entry.first_name + "" + entry.last_name +"</td>");
                    row.append("<td>" + entry.Colleges + "</td>");
                    row.append("<td>" + entry.course + "</td>");
                    row.append("<td>" + entry.Contact_number + "</td>");
                    row.append("<td>" + entry.date_created + "</td>");
                    row.append("<td>" + entry.transact_type + "</td>");
                    // row.append("<td>" + entry.status + "</td>");
                     // Check the value of entry.status and set the class and text accordingly
                        if (status == 'done') {
                            row.append("<td><p class='status delivered'>Done</p></td>");
                        } else if (status == 'pending') {
                            row.append("<td><p class='status pending'>Pending</p></td>");
                        } else {
                            // Handle other cases, e.g., 'Cancelled' or anything else
                            row.append("<td><p class='status cancelled'>" + status + "</p></td>");
                        }
                    tableBody.append(row);
                    // Append the row to a table (you should have a reference to the target table, e.g., tableBody or historyTableBody)
                 }
                 console.log("data",data);
                var dynamicTableRowCount1 = $("#dynamicTable tbody tr").length;
                    if (dynamicTableRowCount1 > 0) {
                    noHistoryMessage2.hide(); // Hide the no history message if there is data
                    } else {
                        noHistoryMessage2.show(); // Show the no history message if no data
                    }
            
                    // Add Sorting Event Listeners
                    const table_rows = document.querySelectorAll('#dynamicTable tbody tr');
                const tableHeadings = document.querySelectorAll('#dynamicTable th');
                tableHeadings.forEach((head, i) => {
                    let sort_asc = true;
                    head.onclick = () => {
                        head.classList.toggle('asc', sort_asc);
                        sort_asc = head.classList.contains('asc') ? false : true;
                        sortTable(i, sort_asc);
                    };
                });
                    // Sorting Function
                function sortTable(column, sort_asc) {
                    [...table_rows].sort((a, b) => {
                        let first_row = a.querySelectorAll('td')[column].textContent.toLowerCase();
                        let second_row = b.querySelectorAll('td')[column].textContent.toLowerCase();
                        return sort_asc ? (first_row < second_row ? 1 : -1) : (first_row < second_row ? -1 : 1);
                    })
                    .map(sorted_row => document.querySelector('tbody').appendChild(sorted_row));
                }
        },
        error: function (xhr, status, error) {
    console.error("AJAX Error:");
    console.error("Status: " + status);
    console.error("Error: " + error);
    console.error("Response Text: " + xhr.responseText);
}
        });
    
    });
    fetchData();

// export to excel

function exportToExcel() {
    const table = document.getElementById("dynamicTable");
    const rows = table.getElementsByTagName("tr");
    const data = [];

    // Iterate through the visible table rows and collect cell values
    for (let i = 0; i < rows.length; i++) {
        if (rows[i].style.display !== "none") {
            const cells = rows[i].getElementsByTagName("td");
            const rowData = [];
            for (let j = 0; j < cells.length; j++) {
                rowData.push(cells[j].textContent.trim());
            }
            data.push(rowData);
        }
    }

    // Create a worksheet
    const worksheet = XLSX.utils.aoa_to_sheet(data);

    // Create a workbook with the worksheet
    const workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, "Filtered Table Data");

    // Export the workbook to an Excel file
    XLSX.writeFile(workbook, "All transactions.xlsx");
}



</script>  
<script src="./assets/main.js"></script> 
<!-- <script src="assets/js/table.js"></script>  -->
<!-- <script src="./assets/js/count.js"></script>  -->
</html>