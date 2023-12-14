<!DOCTYPE html>
<?php
session_start();
include '../../backend/log_audit2.php';
  // Check if the session variable is empty
  if (empty($_SESSION['session_id'])) {
    // Redirect to the desired location
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'You already logged out',
                text: 'Please tlogin again'
            }).then(function () {
                window.location.href = '../../home';
            });
        });
    </script>
    <?php
    exit;
}
  
    $_SESSION['form_type']='withdrawal';//
    $id = $_SESSION['session_id'];

// Log audit entry for accessing the home page
logAudit($id, 'access_wds page', $id .' has accessed the wds page');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WITHDRAWAL/DROPPING/SHIFTING SLIPS</title>
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

            <!-- pagination -->
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
</head>

<body>
    <!-- Header -->
<header class="header">
    <nav class="nav"> 
        <div class="logo">
        <img src="assets/images/GCU_logo.png" alt="">
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
        <button class="icon-btn place-items-center" onclick="faq()">
                <i class="ri-question-mark"></i>
                </button>
        </div>
    </nav>
</header>
    <!-- Welcome-message -->
<section>
<?php include '../../includes/banner.php' ?>
    <div class="block"> 
    </div>
    <div class="title independent-title">
        <h2>Withdrawal/Dropping/Shifting Slips</h2>
    </div>
    <!-- Withdraw and Drop-->
    <div class="container">
        <div class="card">
        <main class="table" id="customers_table">
                    <section class="table-header">
                        <h1>List of<u>Withdrawing</u>/<u>Dropping</u>students</h1>
                        <div class="input-group">
                            <!-- <input type="search" id="searchInput1" placeholder="Search Here..." onkeyup="searchTable('dynamicTable1', 'searchInput1')"> -->
                            <input type="search" id="searchInput1" onkeyup="searchTable('dynamicTable1', 'searchInput1')" onblur="clearSearchResults('dynamicTable1', 'searchInput1')" onsearch="clearSearchResults2('dynamicTable1', 'searchInput1')" placeholder="Search Data...">
                        </div>
                        <div class="export-file">
                            <label for="export-file" class="export-file-btn" title="Export File"><img src="../assets/images/export.png" alt=""></label>
                            <input type="checkbox" id="export-file">
                            <div class="export-file-options">
                                <label>Export as&nbsp; &#10140;</label>
                                <label for="export-file" id="exportToExcel1" onclick="exportToExcel('dynamicTable1')">EXCEL <img src="../assets/images/excel.png" alt=""></label>
                            </div>
                        </div>
                    </section>
                    <section class="table-body">
                    <table id="dynamicTable1">
                    <thead>
                                <tr>
                                    <th> Student ID <br> <span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Last Name <br><span class="icon-arrow">&UpArrow;</span></th>
                                    <th> First Name <br><span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Year Level <br><span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Course Taken <br><span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Contact Number <br><span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Guardian Number <br><span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Requested Slip <br><span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Action</th>
                                </tr>
                            </thead>
                        <tbody>
                                
                        </tbody>
                    </table>
                    <p id="noHistoryMessage1">No items available.</p>
            
                   
                    </section>
                </main>
        </div>
    </div>
    <br>
    <!-- Shift -->

    <div class="container">
        <div class="card">
 <main class="table" id="customers_table">
        <section class="table-header">
            <h1>List of<u>Shifting</u>Students</h1>
            <div class="input-group">
                <!-- <input type="search" id="searchInput2" placeholder="Search Here..." onkeyup="searchTable('dynamicTable2', 'searchInput2')"> -->
                <input type="search" id="searchInput2" onkeyup="searchTable('dynamicTable2', 'searchInput2')" onblur="clearSearchResults('dynamicTable2', 'searchInput2')" onsearch="clearSearchResults2('dynamicTable2', 'searchInput2')" placeholder="Search Data...">
            </div>
            <div class="export-file2">
                <label for="export-file2" class="export-file-btn2" title="Export File"><img src="../assets/images/export.png" alt=""></label>
                <input type="checkbox" id="export-file2">
                <div class="export-file-options2">
                    <label>Export as&nbsp; &#10140;</label>
                    <label for="export-file2" id="exportToExcel2" onclick="exportToExcel('dynamicTable2')">EXCEL <img src="../assets/images/excel.png" alt=""></label>
                </div>
            </div>
        </section>
        <section class="table-body">
            <table id="dynamicTable2">
                <thead>
                    <tr>
                        <th> Student ID <br> <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Last Name <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> First Name <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Year Level <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Department / College <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Shifting From <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Shifting To <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Contact Number <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Guardian Number <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <p id="noHistoryMessage2">No items available.</p>
        </section>
    </main>
        </div>
    </div>

</section>
<br>
<br>

    <!-- Script     -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var eID = "<?php echo $_SESSION['session_id'];?>";
        function faq(){
        window.location.href="../FAQ.php"
    }
    function logout() {
        Swal.fire({
      title: "Are you sure you want to logout?",
      // text: "Do you wish to proceed?",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes"
    }).then((result) => {
      if (result.isConfirmed) {
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
    window.location.href = '../../home';

}
  });
}
function archive() {
    window.location.href = 'archive.php';
        }
        function searchTable(table1, srchinput) {
    var input, filter, table, tr, th, td, i, j, txtValue;
    input = document.getElementById(srchinput);
    filter = input.value.toUpperCase();
    table = document.getElementById(table1);
    tr = table.getElementsByTagName("tr");

    // Hide all rows initially, excluding header rows
    for (i = 0; i < tr.length; i++) {
        if (tr[i].getElementsByTagName("th").length === 0) {
            // Exclude header rows
            tr[i].style.display = "none";
        }
    }

    // Display the header row ("th") if the search term is found
    th = table.getElementsByTagName("th");
    for (i = 0; i < th.length; i++) {
        txtValue = th[i].textContent || th[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            for (j = 0; j < tr.length; j++) {
                tr[j].style.display = "";
            }
            break;
        }
    }

    // Display data rows if any column matches the search criteria
    for (i = 0; i < tr.length; i++) {
        if (tr[i].getElementsByTagName("th").length === 0) {
            // Exclude header rows
            for (j = 0; j < tr[i].getElementsByTagName("td").length; j++) {
                td = tr[i].getElementsByTagName("td")[j];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    }
                }
            }
        }
    }
}

function clearSearchResults(table1, srchinput) {
    var table = document.getElementById(table1);
    var tr = table.getElementsByTagName("tr");
    var input = document.getElementById(srchinput);

    // Show all rows, excluding header rows
    for (var i = 0; i < tr.length; i++) {
        if (tr[i].getElementsByTagName("th").length === 0) {
            // Exclude header rows
            tr[i].style.display = "";
        }
    }
    input.value = "";
    // Check if the input value is empty (either on blur or "x" button click)
    if (input.value === "") {
        // Clear the search input value
        input.value = "";
    }
}
function clearSearchResults2(table1, srchinput) {
    var table = document.getElementById(table1);
    var tr = table.getElementsByTagName("tr");

    // Show all rows, excluding header rows
    for (var i = 0; i < tr.length; i++) {
        if (tr[i].getElementsByTagName("th").length === 0) {
            // Exclude header rows
            tr[i].style.display = "";
        }
    }
}

function exportToExcel(tableId) {
    const table = document.getElementById(tableId);
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
    XLSX.writeFile(workbook, "WDS.xlsx");

}


      $(document).ready(function () {
        $.ajax({
            url: "../../backend/check_transaction.php",
            type: "GET",
            dataType: "json",
            success: function (data) {

                console.log(data);
                // if (data.status===0){
                var tableBody = $("#dynamicTable1 tbody");
                var tableBody2 = $("#dynamicTable2 tbody");
                var historyTableBody = $("#historyTableBody tbody");
                var noHistoryMessage1 = $("#noHistoryMessage1"); 
                var noHistoryMessage2 = $("#noHistoryMessage2"); 
 

                for (var i = 0; i < data.length; i++) {
                    var entry = data[i];
                    var status = entry.status;
                    var reason = entry.reason;
                    
                    if(entry.reason ==="Shifting")
                    {
                        
                        var tableToAppend = tableBody2; // Determine which table to append to
                        var row = $("<tr></tr>");
                    row.append("<td>" + entry.stud_user_id + "</td>");
                    row.append("<td>" + entry.last_name + "</td>");
                    row.append("<td>" + entry.first_name + "</td>");
                    row.append("<td>" + entry.Year_level + "</td>");
                    row.append("<td>" + entry.Colleges + "</td>");
                    row.append("<td>" + entry.shift_from + "</td>");
                    row.append("<td>" + entry.shift_to + "</td>");
                    row.append("<td>" + entry.Contact_number + "</td>");
                    row.append("<td>" + entry.ParentGuardianNumber + "</td>");

                    var statusClass = status == 'pending' ? 'status delivered' : 'status cancelled';
                    var statusText = status == 'pending' ? 'Unread' : 'Read';

                    var statusCell = $("<td></td>");
                    var statusLink = $("<button onclick='view_form(" + entry.transact_id + ", " + entry.stud_user_id + ", \"" + entry.reason + "\")'>View</button>");
//reason, id, trans id
                    statusCell.append(statusLink);
                    row.append(statusCell);
                    if (status == 'pending') {
                        tableBody2.append(row);
                     } else if (status == 'recieved') {
                         historyTableBody.append(row); // Append row to history table body
                     }
                     
                    // Add Sorting Event Listeners
                const table_rows2 = document.querySelectorAll('#dynamicTable2 tbody tr');
                const tableHeadings2 = document.querySelectorAll('#dynamicTable2 th');
                tableHeadings2.forEach((head, i) => {
                    let sort_asc = true;
                    head.onclick = () => {
                        head.classList.toggle('asc', sort_asc);
                        sort_asc = head.classList.contains('asc') ? false : true;
                        sortTable(i, sort_asc);
                    };
                });
                    // Sorting Function
                function sortTable(column, sort_asc) {
                    [...table_rows2].sort((a, b) => {
                        let first_row = a.querySelectorAll('td')[column].textContent.toLowerCase();
                        let second_row = b.querySelectorAll('td')[column].textContent.toLowerCase();
                        return sort_asc ? (first_row < second_row ? 1 : -1) : (first_row < second_row ? -1 : 1);
                    })
                    .map(sorted_row => document.querySelector('#dynamicTable2 tbody').appendChild(sorted_row));
                }


                    }else{
                        var tableToAppend = tableBody; // Determine which table to append to
                        var row = $("<tr></tr>");
                    row.append("<td>" + entry.stud_user_id + "</td>");
                    row.append("<td>" + entry.last_name + "</td>");
                    row.append("<td>" + entry.first_name + "</td>");
                    row.append("<td>" + entry.Year_level + "</td>");
                    row.append("<td>" + entry.course + "</td>");
                    row.append("<td>" + entry.Contact_number + "</td>");
                    row.append("<td>" + entry.ParentGuardianNumber + "</td>");
                    // row.append("<td>" + entry.reason + "</td>");
                    if (reason == 'Withdrawing Enrollment') {
                            row.append("<td><p class='status'>Withdrawing</p></td>");
                        } else if (reason == 'Dropping Subjects') {
                            row.append("<td><p class='status1'>Dropping</p></td>");
                        }

                    var statusClass = status == 'pending' ? 'status delivered' : 'status cancelled';
                    var statusText = status == 'pending' ? 'Unread' : 'Read';

                    var statusCell = $("<td></td>");
                    var statusLink = $("<button class='yes'onclick='view_form(" + entry.transact_id + ", " + entry.stud_user_id + ", \"" + entry.reason + "\")'><i class='ri-eye-fill'></i></button>");

                    statusCell.append(statusLink);
                    row.append(statusCell);
                    
                     if (status == 'pending') {
                        tableBody.append(row);
                     } else if (status == 'recieved') {
                         historyTableBody.append(row); // Append row to history table body
                     }
                    
                    // Add Sorting Event Listeners
                const table_rows = document.querySelectorAll('#dynamicTable1 tbody tr');
                const tableHeadings = document.querySelectorAll('#dynamicTable1 th');
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
                                                             // Initialize DataTables for pagination

                    }

                 }

                 $('#dynamicTable1').DataTable({
                                paging: true,
                                searching: false,
                                ordering: false,
                                lengthMenu: [5, 10, 15, 20], // Customize the number of rows per page
                                pageLength: 5, // Initial number of rows per page
                            });

                            $('#dynamicTable2').DataTable({
                                paging: true,
                                searching: false,
                                ordering: false,
                                lengthMenu: [5, 10, 15, 20], // Customize the number of rows per page
                                pageLength: 5, // Initial number of rows per page
                            });

                var dynamicTableRowCount1 = $("#dynamicTable1 tbody tr").length;
                var dynamicTableRowCount2 = $("#dynamicTable2 tbody tr").length;

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

                // $("td a").click(function () {
                //     var contentElement = $(this).closest("tr");
                //     // var studUserId = contentElement.data("stud-user-id");
                //     var studUserId = contentElement.find("td:first-child").text();

                //     $.ajax({
                //         url: "../backend/update_status.php",
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
        },
        error: function (xhr, status, error) {
    console.error("AJAX Error:");
    console.error("Status: " + status);
    console.error("Error: " + error);
    console.error("Response Text: " + xhr.responseText);
}

        });
    });
    
    function view_form(tid, sid, type){
        console.log("student", sid);
        console.log("transact", tid);
        console.log("type", type);

                    // Send stud_id to the server using an AJAX request
        if (type == 'Withdrawing Enrollment'){
                    $.ajax({
                type: 'POST',  // You can use POST to send data securely
                url: '../../backend/session_forms/set_session_w.php',  // PHP script that sets the session variable
                data: { stud_id: sid, tran_id: tid },
                success: function(response) {
                    // Handle the response from the server, if needed
                    console.log(response);
                    window.location.href = '../forms/w.php';
                }
            });
        }else if (type == 'Dropping Subjects'){
                    $.ajax({
                type: 'POST',  // You can use POST to send data securely
                url: '../../backend/session_forms/set_session_d.php',  // PHP script that sets the session variable
                data: { stud_id: sid, tran_id: tid },
                success: function(response) {
                    // Handle the response from the server, if needed
                    console.log(response);
                    window.location.href = '../forms/d.php';
                }
            });
        }else if (type == 'Shifting'){
                    $.ajax({
                type: 'POST',  // You can use POST to send data securely
                url: '../../backend/session_forms/set_session_s.php',  // PHP script that sets the session variable
                data: { stud_id: sid, tran_id: tid },
                success: function(response) {
                    // Handle the response from the server, if needed
                    console.log(response);
                    window.location.href = '../forms/s.php';
                }
            });
        }
    }
</script>
<script src="../assets/main.js"></script>
<?php include '../includes/footer1.php' ?>
</body>

</html>