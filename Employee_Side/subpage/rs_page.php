<!DOCTYPE html>
<?php
session_start();
include '../../backend/log_audit2.php';
  // Check if the session variable is empty
  if (empty($_SESSION['session_id'])) {
    // Redirect to the desired location
    echo "<script>alert('You have already Logged out. You will be redirected.'); window.location.href = 'http://localhost/GCU/home';</script>";
    
    exit; // Make sure to exit the script after a header redirect
  }
  
    $_SESSION['form_type']='referral';//
    $id = $_SESSION['session_id'];

// Log audit entry for accessing the home page
logAudit($id, 'access_referral slip page', $id .' has accessed the referral slip page');

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REFERRAL SLIPS</title>
     <!-- Stylesheet -->
     <link rel="stylesheet" href="../assets/slip.css">
 <!-- Remix icons -->
 <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../assets/slip.css">

    <link rel="icon" href="assets/images/GCU_logo.png">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
        <img src="assets/images/bsu.png" alt="">
        </div>
        <div class="nav-mobile">
            <ul class="list">
                <li class="list-item">
                    <a href="../employee-home" class="list-link current">Home</a>
                </li>
                <li class="list-item hov">
                    <a href="../request-forms" class="list-link current1">Back</a>
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
            <img src="../assets/images/GCU_logo.png" alt="">
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
        <h2>Referral Slips</h2>
    </div>
    <!-- Start of Table -->
    <div class="container">
        <div class="card">
    <main class="table" id="customers_table">
        <section class="table-header">
            <h1>List of Referred Students</h1>
            <div class="input-group">
            <input type="search" id="searchInput" onkeyup="searchTable()" placeholder="Search Data... ">
            </div>
            <div class="export-file">
                <label for="export-file" class="export-file-btn" title="Export File"><img src="../assets/images/export.png" alt=""></label>
                <input type="checkbox" id="export-file">
                <div class="export-file-options">
                    <label>Export as&nbsp; &#10140;</label>
                    <label for="export-file" id="exportToExcel" onclick="exportToExcel()">EXCEL <img src="assets/images/excel.png" alt=""></label>
                </div>
            </div>
        </section>
        <section class="table-body">
        <table id="dynamicTable">
                    <thead>
                                <tr>
                                    <th> Student Id <br> <span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Last Name <br><span class="icon-arrow">&UpArrow;</span></th>
                                    <th> First Name <br><span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Year Level <br><span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Course Taken <br><span class="icon-arrow">&UpArrow;</span></th>
                            
                                    <th> Registered/Unregistered <br><span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Referred By <br><span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                        <tbody>
                                
                        </tbody>
                    </table>
                    <p id="noHistoryMessage1">No items available.</p>
            
                </div>
        </section>
    </main>
        </div>
    </div>


</section>
<br>
<br>

    <!-- Script     -->
<script>
    function logout() {
    window.location.href = '../../home?logout=true';
}
function archive() {
    window.location.href = 'archive.php';
        }
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


      $(document).ready(function () {
        $.ajax({
            url: "../../backend/check_transaction.php",
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
                    var tableToAppend = tableBody;
                    var reg = entry.reg; 
                    console.log("reg", reg);
                    
                    var row = $("<tr></tr>");
                    row.append("<td>" + entry.stud_user_id + "</td>");
                    row.append("<td>" + entry.last_name + "</td>");
                    row.append("<td>" + entry.first_name +"</td>");
                    row.append("<td>" + entry.Year_level +"</td>");
                    row.append("<td>" + entry.course + "</td>");
                    // row.append("<td>" + entry.RUR + "</td>");
                    if (reg == 'Registered') {
                            row.append("<td><p class='status'>Registered</p></td>");
                        } else if (reg == 'Unregistered') {
                            row.append("<td><p class='status1'>Unregistered</p></td>");
                        }
                    row.append("<td>" + entry.referred + "</td>");

                    var statusClass = status == 'pending' ? 'status delivered' : 'status cancelled';
                    var statusText = status == 'pending' ? 'Unread' : 'Read';

                    var statusCell = $("<td></td>");
                    var statusLink = $("<button onclick='view_form(" + entry.transact_id + ", "+ entry.stud_user_id +", "+ entry.teacher_id +")'>View</button>");
                    statusCell.append(statusLink);
                    row.append(statusCell);

                    // var statusCell = $("<td></td>");
                    // var statusLink = $("<a href='#'></a>").addClass(statusClass).text(statusText);
                    // statusCell.append(statusLink);
                    // row.append(statusCell);

                    // var deleteCell = $("<td></td>");
                    // var deleteLink = $("<a href='#'></a>").html('<i class="ri-delete-bin-6-line"></i>');
                    // deleteCell.append(deleteLink);
                    // row.append(deleteCell);

                    // Append the row to a table (you should have a reference to the target table, e.g., tableBody or historyTableBody)
                    
                    
                    if (status == 'pending') {
                        tableBody.append(row);
                    } else if (status == 'done') {
                        historyTableBody.append(row); // Append row to history table body
                    }

                 }

                var dynamicTableRowCount1 = $("#dynamicTable tbody tr").length;


                    if (dynamicTableRowCount1 > 0) {
                    noHistoryMessage1.hide(); // Hide the no history message if there is data
                    } else {
                        noHistoryMessage1.show(); // Show the no history message if no data
                    }


                // $("td a").click(function () {
                //     var contentElement = $(this).closest("tr");
                //     // var studUserId = contentElement.data("stud-user-id");
                //     var studUserId = contentElement.find("td:first-child").text();

                //     $.ajax({
                //         url: "../../backend/update_status.php",
                //         type: "POST",
                //         data: { stud_user_id: studUserId },
                //         success: function (response) {
                //             console.log(response);
                //             console.log("Status updated in the database");
                //         },
                //         error: function (xhr, status, error) {
                //             console.error("AJAX Error:");
                //             console.error("Status: " + status);
                //             console.error("Error: " + error);
                //             console.error("Response Text: " + xhr.responseText);
                //         }
                //     });
                    
                //     //location.reload();
                // });
                
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
    function view_form(tid, sid, teachid){
        console.log("student", sid);
        console.log("transact", tid);
        console.log("transact", teachid);

                    // Send stud_id to the server using an AJAX request
                    $.ajax({
                type: 'POST',  // You can use POST to send data securely
                url: '../../backend/session_forms/set_session_ref.php',  // PHP script that sets the session variable
                data: { stud_id: sid, tran_id: tid, teachid: teachid },
                success: function(response) {
                    // Handle the response from the server, if needed
                    console.log(response);
                    window.location.href = '../forms/ref.php';
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
    XLSX.writeFile(workbook, "List of referred students.xlsx");
}

</script>
<script src="../assets/main.js"></script>
  
</body>
</html>