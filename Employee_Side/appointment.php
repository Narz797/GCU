<?php
  session_start();
  include '../backend/log_audit2.php';
  // Check if the session variable is empty
  if (empty($_SESSION['session_id'])) {
    // Redirect to the desired location
    echo "<script>alert('You have already Logged out. You will be redirected.'); window.location.href = 'http://localhost/GCU/home';</script>";
    
    exit; // Make sure to exit the script after a header redirect
  }

  $_SESSION['transact_type']='appointment';//asign value to transact_type/
  $_SESSION['form_type']='appointment';//
  $eid = $_SESSION['session_id'];
  $id = $_SESSION['session_id'];

// Log audit entry for accessing the home page
logAudit($id, 'access_appointment', $id .' has accessed the appointment page');
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Schedule</title>
    <!-- icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
          <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/apmt.css">
    <link rel="icon" href="assets/images/GCU_logo.png">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/css/slips2.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.full.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  
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
                    <a href="./employee-home" class="list-link1 current">Home</a>
                </li>
                <li class="list-item hov">
                    <a href="./request-forms" class="list-link1 current1">Requested Forms</a>
                </li>
                <li class="list-item hov">
                    <a href="./student-profile" class="list-link1 current1">Student Profiles</a>
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
            <button class="icon-btn place-items-center" onclick="archive()">
              <i class="ri-archive-drawer-line"></i>
            </button>
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
            <!-- <div class="add-event-input">
              <input type="text" placeholder="Event Name" class="event-name" />
            </div> -->
            <!-- <div class="add-event-input">
              <input type="text" placeholder="Student Name" class="event-student-name"/>
            </div> -->
            <label for="from">From: </label>
            <div class="add-event-input">
              <input
                type="time"
                placeholder="Event Time From: 00:00"
                class="event-time-from"
                name="from"
              />
            </div>
            <label for="to">To: </label>
            <div class="add-event-input">
              <input
                type="time"
                placeholder="Event Time To: 00:00"
                class="event-time-to"
                name="to"
              />
            </div>
          </div>
          <div class="add-event-footer">
            <button class="add-event-btn">Add Event</button>
          </div>
        </div>
        <!-- for edit -->
        <!-- <div class="edit-event-wrapper">
          <div class="edit-event-header">
            <div class="title">Add Event</div>
            <i class="fas fa-times close"></i>
          </div>
          <div class="edit-event-body">
            <div class="edit-event-input">
              <input type="text" placeholder="Event Name" class="edit-event-name" />
            </div>
            <div class="edit-event-input">
              <input type="text" placeholder="Student Name" class="edit-event-student-name"/>
            </div>
            <div class="edit-event-input">
              <input
                type="text"
                placeholder="Event Time From: 00:00"
                class="edit-event-time-from"
              />
            </div>
            <div class="edit-event-input">
              <input
                type="text"
                placeholder="Event Time To: 00:00"
                class="edit-event-time-to"
              />
            </div>
          </div>
        </div> -->
        <!--  -->
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
<div class="container">
        <br>
        <h2 class="title"></h2>
        <div class="card">
            <header class="card-header">
                <h1>Appointments</h1>
                <p>&nbsp&nbsp The following are the requested appointments.</p>
            </header>
            <hr>
            <div class=" gallery">
            <main class="table" id="customers_table">
            <section class="table-header">
                <h1>List of <b>All Requested Appointments</b></h1>
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
                            <th> Date of Appointment<br><span class="icon-arrow">&UpArrow;</span></th>
                            <th> Time of Appointment<br><span class="icon-arrow">&UpArrow;</span></th>
                            <th> Reason<br> <span class="icon-arrow">&UpArrow;</span></th>
                            <th> View<br><span class="icon-arrow">&UpArrow;</span></th>
                            <th> Done<br><span class="icon-arrow">&UpArrow;</span></th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>
                <p id="noHistoryMessage2">Empty</p>
            </section>
            </main>
            
            </div>
        </div>
    </div>
    <br>
<!-- popup -->
<div class="overlay" id="divOne">
                    <div class="wrapper">
                        <a href="#" class="close">&times;</a>
                        <div class="popup">
                            <div class="popup2">
                                <form>
                                    <h1>This Appointment is marked as done</h1>
                                    <br>
                                    <textarea placeholder="Type here if you have remarks..." id="remarksTextarea"></textarea>
                                    <br>
                                    <hr>
                                    <div class="tsk">
                                    <button class="yes" onclick ="app_remarks ()">Yes</button>
                                    <button class="no">No</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                 </div>
            <!--  -->
<!-- Script     -->
<script>
  var trans_id
var app_id
var sid
var res
var eid = "<?php echo $eid; ?>";
var eID = "<?php echo $_SESSION['session_id'];?>";
console.log(eid);
  var sessionID = <?php echo json_encode($_SESSION['session_id']); ?>;
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

        // export to excel
    function exportToExcel() {
    const table = document.getElementById("dynamicTable");
    const rows = table.getElementsByTagName("tr");
    const data = [];

    // Iterate through the table rows and collect cell values
    for (let i = 0; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName("td");
        const rowData = [];
        for (let j = 0; j < cells.length; j++) {
            rowData.push(cells[j].textContent.trim());
        }
        data.push(rowData);
    }

    // Create a worksheet
    const worksheet = XLSX.utils.aoa_to_sheet(data);

    // Create a workbook with the worksheet
    const workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, "Table Data");

    // Export the workbook to an Excel file
    XLSX.writeFile(workbook, "List of All Requested Appointments.xlsx");

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

$(document).ready(function () {
        $.ajax({
            url: "../backend/taken_slot.php",
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
                    row.append("<td>" + entry.student_id + "</td>");
                    row.append("<td>" + entry.first_name + "" + entry.last_name +"</td>");
                    row.append("<td>" + entry.Colleges + "</td>");
                    row.append("<td>" + entry.course + "</td>");
                    row.append("<td>" + entry.Contact_number + "</td>");
                    row.append("<td>" + entry.date + "</td>");
                    row.append("<td>" + entry.start_time + " - "+ entry.end_time + "</td>");
                    row.append("<td>" + entry.Reason + "</td>");
                    res = entry.Reason;
                    var statusCell = $("<td></td>");
                    var statusLink = $("<button onclick='view_form(" + entry.transact_id + ", "+ entry.student_id +")'><i class='ri-eye-fill'></i></button>");//page
                    
                    var statusCell2 = $("<td></td>");
                    var statusLink2 = $("<a href='#divOne'><button onclick='openModal("+entry.transact_id+", "+entry.appointment_id+", "+ entry.student_id +")'><i class='ri-check-double-line'></i></button></a>");//poppu
                    statusCell2.append(statusLink2);
                    statusCell.append(statusLink);
                    row.append(statusCell)
                    row.append(statusCell2)
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
    function view_form(tid, sid){
        console.log("student", sid);
        console.log("transact", tid);

                    // Send stud_id to the server using an AJAX request
                    $.ajax({
                type: 'POST',  // You can use POST to send data securely
                url: '../backend/session_forms/set_session_app.php',  // PHP script that sets the session variable
                data: { stud_id: sid, tran_id: tid },
                success: function(response) {
                    // Handle the response from the server, if needed
                    console.log(response);
                    window.location.href = 'forms/appt.php';
                }
            });
    }

    function openModal(tid, aid, sidd) {
    //document.getElementById("divOne").style.display = "block";

    trans_id = tid;
    app_id = aid;
    sid = sidd
  }

  function closeModal() {
  //  document.getElementById("divOne").style.display = "none";
  }

    
    function app_remarks() {
  var textareaValue = document.getElementById("remarksTextarea").value;
  console.log("TID:", trans_id);
  console.log("AID:", app_id);
  console.log("Remarks:", textareaValue);
    $.ajax({
      type: 'POST',
      url: '../backend/mad.php',
      data: {
        event_id: app_id,
        trans_id: trans_id,
        S_id: sid,
        Res: res,
        remark: textareaValue
      },
      success: function (data) {
        console.log("Event marked as done:", data);
        document.getElementById("divOne").style.display = "none";
        $.ajax({
            type: 'POST',
            url: '../backend/log_audit.php',
            data: {
              userId: eID,
              action: 'remarked',
              details: eID + ' remarked appointment' 
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });

      },
      error: function (xhr, status, error) {
        console.error("Error marking event as done:", error);
        alert("Error marking event as done: " + error);
      },
    });
      }
</script>
<script src="assets/main.js"></script>   
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/js/calendar.js"></script> 
<!-- <script src="./assets/js/table.js"></script>    -->
<style>
  
</style>
</body>
</html>