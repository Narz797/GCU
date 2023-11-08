<?php 

session_start();
// include '../backend/validate_user.php';
// include '../backend/connect_database.php';
  // Check if the session variable is empty
  if (empty($_SESSION['session_id'])) {
    // Redirect to the desired location
    echo "<script>alert('You have already Logged out. You will be redirected.'); window.location.href = 'http://localhost/GCU/home';</script>";
    
    exit; // Make sure to exit the script after a header redirect
  }
$id = $_SESSION['session_id'];
echo "<script>console.log('$id');</script>";

include 'includes/main2.php';
 ?>
<head>
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
    <link rel="stylesheet" href="./assets/apmt.css">
    <!-- <link rel="stylesheet" href="./assets/css/forms.css"> -->
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../Employee_Side/assets/css/slips2.css">
  
</head>
<style>
    .column {
  float: left;
  /* width: 40%; */
  padding: 10px;
  height: auto; /* Should be removed. Only for demonstration */
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}


    </style>
  <body>
       
</div>
<section id="topbar" class="topbar d-flex align-items-center" style="background-color: black; height: 50px; "></section> 
<section id="topbar" class="topbar d-flex align-items-center" style="background-color: primary; height: 80px; ">
<p style="margin-left: 2%; font-size: 30px; font-weight: bold;">APPOINTMENT SCHEDULE</p>
</section> 
<div class="row">
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
<br>
<div>
  </div>
    <div  >
    <!-- <div class="container" > -->
        <br>
        <h2 class="title"></h2>
        <div >
            <header class="card-header" >
                <p style="margin-left: 10%; font-size: 30px; font-weight: bold; color:yellowgreen;" > YOUR SCHEDULE OF APPOINTMENT </p>
               
            </header>
            <hr>
            <div class="gallery">
            <main class="table" id="customers_table"  style=" height: auto; ">
    
            <section class="table-body">
                <table style="color:black;" id="dynamicTable">
                    <thead>
                        <tr>
                            <th> No. <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Title of appointment <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Date <span class="icon-arrow">&UpArrow;</span></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td> 1 </td>
                            <td> Counseling</td>
                            <td> 17 Dec, 2022 </td>

                        </tr>
                        <tr>
                            <td> 2 </td>
                            <td> Readmission</td>
                            <td> 27 Aug, 2023 </td>

                        </tr>
                  -->
                    </tbody>
                </table>
                <p id="noHistoryMessage">Empty</p>
            </section>
    </div>
    <!-- History of transaction -->
    <div  >
        <br>
        <h2 class="title"></h2>
        <div class="card" >
         
            <hr>
            <div class=" gallery" >
            <main class="table" id="customers_table" style=" height: auto; ">
            <section class="table-header">
                <p style="margin-left: 2%; font-size: 25px; font-weight: bold; color:white;" >HISTORY OF APPOINTMENT</p>
                <!-- <div class="input-group">
                    <input type="search" placeholder="Search...">
                </div> -->
             
            </section>
            <section class="table-body" >
                <table style="color:black;" id="dynamicTable2">
                    <thead>
                        <tr>
                            <th  > No. <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Title of appointment <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Date <span class="icon-arrow">&UpArrow;</span></th>
                            
                        </tr>
                    </thead>
                    <tbody >
                        <!-- <tr>
                            <td> 1 </td>
                            <td> Counseling</td>
                            <td> 17 Dec, 2022 </td>
                        </tr>
                        <tr>
                            <td> 2 </td>
                            <td> Readmission</td>
                            <td> 27 Aug, 2023 </td>
                        </tr>
                  -->
                    </tbody>
                </table>
                <p id="noHistoryMessage2">Empty</p>
            </section>
            </main>
            </div>
        </div>
    </div>
</section>
<section id="topbar" class="topbar d-flex align-items-center" style="background-color: primary; height: 50px; "></section> 
<!-- popup -->
<div class="overlay" id="divOne">
                    <div class="wrapper">
                        <a href="#" class="close">&times;</a>
                        <div class="popup">
                            <div class="popup2">
                                <form>
                                    <h1>Reason for Appointment?</h1>
                                    <br>
                                    <textarea placeholder="Type here your reason" id="reason"></textarea>
                                    <br>
                                    <hr>
                                    <div class="tsk">
                                    <a class="yes" onclick="reason()">Submit</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                 </div>
<!-- 
                 <div class="overlay" id="divThree">
                    <div class="wrapper">
                        <h1>Reason</h1>
                        <a href="#" class="close">&times;</a>
                        <div class="popup">
                            <div class="popup2">
                                <form>
                                    <label>Attending Personnel</label>
                                    <input type="text" placeholder="Your Name">
                                    <label>Remarks</label>
                                    <textarea placeholder="Type here if you have remarks..."></textarea>
                                    <div class="tsk"> 

                                    <input type="submit" value="send">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                 </div> -->
           
  </body>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/js/calendar.js"></script>   
<script>
        var id = "<?php echo $id; ?>";
        var aid;
        var reasons;
        var tid;
        
          function reason()
          {
            reasons = document.getElementById("reason").value;

            if (window.confirm("Do you want to proceed?")) {

                $.ajax({
                  type: 'POST',
                  url: '../backend/get_slot.php',
                  data: {
                    event_id: aid,
                    stud_id: id,
                    trans_id: tid,
                    reason: reasons
                  },
                  success: function (data) {
                    console.log("slot taken:", data);
                    alert("Slot taken for: ",aid);
                    document.getElementById("divOne").style.display = "none";
                    window.location.reload();
                  },
                  error: function (xhr, status, error) {
                    console.error("Error marking event as done:", error);
                    alert("Error in taking slot: " + error);
                  },
                });
              }
            
          }

          $(document).ready(function () {
        $.ajax({
            url: "../backend/stud_taken_appt.php",
            type: "GET",
            dataType: "json",
            success: function (data) {
                console.log(data);
                // if (data.status===0){
                var tableBody = $("#dynamicTable tbody");
                var tableBody2 = $("#dynamicTable2 tbody");
                var historyTableBody = $("#historyTableBody tbody");
                var noHistoryMessage = $("#noHistoryMessage"); 
                var noHistoryMessage2 = $("#noHistoryMessage2"); 
 
                for (var i = 0; i < data.length; i++) {
                    
                    var entry = data[i];
                    
                    if(entry.status === "taken"){
                    var tableToAppend = tableBody; // Determine which table to append to
                    var row = $("<tr></tr>");
                    row.append("<td>" + entry.appointment_id+ "</td>");
                    row.append("<td>" + entry.Reason + "</td>");
                    row.append("<td>" + entry.date+"</td>");

                    tableBody.append(row);
                    // Append the row to a table (you should have a reference to the target table, e.g., tableBody or historyTableBody)
                    console.log("data",data);
                var dynamicTableRowCount1 = $("#dynamicTable tbody tr").length;
                    if (dynamicTableRowCount1 > 0) {
                    noHistoryMessage.hide(); // Hide the no history message if there is data
                    } else {
                        noHistoryMessage.show(); // Show the no history message if no data
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
              } else if (entry.status === "done")
              {
                var tableToAppend2 = tableBody2; // Determine which table to append to
                   var row = $("<tr></tr>");
                    row.append("<td>" + entry.appointment_id+ "</td>");
                    row.append("<td>" + entry.Reason + "</td>");
                    row.append("<td>" + entry.date+"</td>");

                    tableBody2.append(row);

                    var dynamicTableRowCount2 = $("#dynamicTable2 tbody tr").length;
                    if (dynamicTableRowCount2 > 0) {
                    noHistoryMessage2.hide(); // Hide the no history message if there is data
                    } else {
                        noHistoryMessage2.show(); // Show the no history message if no data
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
              }
                
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
    </script> 