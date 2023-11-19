<?php
session_start();
include '../backend/log_audit2.php';
// include '../backend/validate_user.php';
// include '../backend/connect_database.php';
  // Check if the session variable is empty
  if (empty($_SESSION['session_id'])) {
    // Redirect to the desired location
    echo "<script>alert('You have already Logged out. You will be redirected.'); window.location.href = 'http://localhost/GCU/home';</script>";
    
    exit; // Make sure to exit the script after a header redirect
  }
  $id = $_SESSION['session_id'];

// Log audit entry for accessing the home page
logAudit($id, 'access_profile', $id .' has accessed the profile page');
?>
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
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.full.min.js"></script>






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
                    <a href="./employee-home" class="list-link current">Home</a>
                </li>
                <li class="list-item hov">
                    <a href="./request-forms" class="list-link current1">Requested Forms</a>
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
    <h2>Student Profiles</h2>
    </div>
     <!-- Section -->
    <div class="container">
        <div class="card">
        <div class="gallery">
 <main class="table" id="customers_table">
        <section class="table-header">
            <h1>List of Students</h1>
            <div class="input-group">
                 <input type="search" id="searchInput" onkeyup="searchTable()" placeholder="Search Data... ">
                
            </div>
            <div class="export-file">
                <label for="export-file" class="export-file-btn" title="Export File"><img src="assets/images/export.png" alt=""></label>
                <input type="checkbox" id="export-file">
                <div class="export-file-options">
                    <label>Export As &nbsp; &#10140;</label>
                    <label for="export-file" id="exportToExcel" onclick="exportToExcel()">EXCEL <img src="assets/images/excel.png" alt=""></label>
                    <label for="export-file" id="exportToPDF" onclick="exportToPDF()">PDF <img src="assets/images/pdf.png" alt=""></label>

                </div>
            </div>
        </section>
       
        <section class="table-body" >

            <table id="dynamicTable">
                <thead>
                    <tr>
                        <th> Student ID # <br> <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Last Name <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> First Name <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Year Level <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Department / College<br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Course Taken <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Contact Number <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Guardian Name<br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Guardian Number <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                  
                 </tbody>
             
            </table>
        </section>
    </main>
    </div>
        </div>
    </div>
</section>
<br>
<script src="../backend/jsPDF-1.3.2/dist/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>


<!-- Script     -->
<script>
    var eID = "<?php echo $_SESSION['session_id'];?>";
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
    function logout() {
        $.ajax({
            type: 'POST',
            url: '../../backend/log_audit.php',
            data: {
              userId: eID,
              action: 'logged out',
              details: eID + ' Clicked log out'
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
    window.location.href = '../home?logout=true';
}

function archive() {
    $.ajax({
            type: 'POST',
            url: '../backend/log_audit.php',
            data: {
              userId: eID,
              action: 'archive',
              details: eID + ' Clicked archive'
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
    window.location.href = './subpage/archive.php';
        }

 $(document).ready(function() {
            // Fetch data using $.ajax
            $.ajax({
                url: '../backend/search_student.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    const table = document.getElementById('data-table');
                    const searchInput = document.getElementById('searchInput');
                    const genderImageMap = {
                    'male': './assets/images/male.jpg',
                    'female': './assets/images/female.jpg'
                };
                    
                console.log(data);
                // if (data.status===0){
                var tableBody = $("#dynamicTable tbody");
                var historyTableBody = $("#historyTableBody tbody");
                var noHistoryMessage1 = $("#noHistoryMessage1"); 
                var noHistoryMessage2 = $("#noHistoryMessage2"); 
 
                for (var i = 0; i < data.length; i++) {
                    
                    var entry = data[i];
                    var status = entry.status;
                    var tableToAppend = tableBody; 
                    // Determine which table to append to
                    // Create an image element based on gender
                    const image = document.createElement('img');
                    image.style.display = 'block'; // Display the image above the text
                            if (entry.gender === 'Male') {
                                image.src = genderImageMap['male'];
                            } else if (entry.gender === 'Female') {
                                image.src = genderImageMap['female'];
                    }
                    var row = $("<tr></tr>");
                    var cell = $("<td></td>");
                    cell.append(image); // Append the image to the table cell
                    cell.append("</br>" + entry.stud_user_id);
                    row.append(cell);
                    row.append("<td>" + entry.last_name + "</td>");
                    row.append("<td>" + entry.first_name +"</td>");
                    row.append("<td>" + entry.Year_level +"</td>");
                    row.append("<td>" + entry.Colleges + "</td>");
                    row.append("<td>" + entry.course + "</td>");
                    row.append("<td>" + entry.Contact_number + "</td>");
                    row.append("<td>" + entry.ParentGuardianNumber + "</td>");
                    row.append("<td>" + entry.ParentGuardianName + "</td>");
                    // var statusClass = status == 'pending' ? 'status delivered' : 'status cancelled';
                    // var statusText = status == 'pending' ? 'Unread' : 'Read';
                    var statusCell = $("<td></td>");
                    var statusLink = $("<button onclick='view_student(" + entry.stud_user_id + ")'>View</button>");

                    statusCell.append(statusLink);
                    row.append(statusCell);
                    tableBody.append(row);
            
                    
                 }
                 console.log("data",data);
                var dynamicTableRowCount1 = $("#dynamicTable tbody tr").length;
                    if (dynamicTableRowCount1 > 0) {
                    noHistoryMessage1.hide(); // Hide the no history message if there is data
                    } else {
                        noHistoryMessage1.show(); // Show the no history message if no data
                    }
                    // Initial table population
                    // filterData();

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
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
            });

            
        });

        function view_student(stud_id) {
            // alert(stud_id);

            // Send stud_id to the server using an AJAX request
            $.ajax({
                type: 'POST',  // You can use POST to send data securely
                url: '../backend/set_session_variable.php',  // PHP script that sets the session variable
                data: { stud_user_id: stud_id },
                success: function(response) {
                    // Handle the response from the server, if needed
                    console.log(response);
                    window.location.href = 'subpage/pfp_page.php';
                }
            });
        }


        
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
    XLSX.writeFile(workbook, "Filtered_Students.xlsx");
    
    $.ajax({
            type: 'POST',
            url: '../backend/log_audit.php',
            data: {
              userId: eID,
              action: 'clicked export',
              details: eID + 'clicked export apopinment table to excel'
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
}


//export to pdf
function exportToPDF() {
    const doc = new jsPDF();
    const table = document.getElementById('dynamicTable');
    
    const columns = [];
    const rows = [];
    
    const headerRow = table.rows[0];
    for (let i = 0; i < headerRow.cells.length; i++) {
        columns.push(headerRow.cells[i].textContent.trim());
    }
    
    for (let i = 1; i < table.rows.length; i++) {
        const currentRow = table.rows[i];
        if (currentRow.style.display !== "none") {
            const row = [];
            for (let j = 0; j < currentRow.cells.length; j++) {
                row.push(currentRow.cells[j].textContent.trim());
            }
            rows.push(row);
        }
    }
    
    const tableConfig = {
        head: [columns],
        body: rows,
    };
    
    // Create the PDF using jsPDF-AutoTable
    doc.autoTable(tableConfig);

    // Save the PDF to a file
    doc.save('Filtered_Students.pdf');
    
    $.ajax({
            type: 'POST',
            url: '../backend/log_audit.php',
            data: {
              userId: eID,
              action: 'clicked export',
              details: eID + 'clicked export apopinment table to PDF'
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
}

    //moving arrow

    </script>
<script src="./assets/main.js"></script>
 <!-- <script src="assets/js/table.js"></script>    -->
</body>
</html>