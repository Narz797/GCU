<?php 

session_start();
include '../backend/log_audit2.php';

  if (empty($_SESSION['session_id'])) {
    // Redirect to the desired location
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'You already logged out',
                text: 'Please login again'
            }).then(function () {
                window.location.href = '../home';
            });
        });
    </script>
    <?php
    exit;
}
$id = $_SESSION['session_id'];
logAudit($id, 'access_appointment', $id .' has accessed the appointment page');

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/apmt.css">
    <link rel="stylesheet" href="assets/css/popup.css">
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

</head>

<style>
  /* Add hover effect to DataTables pagination buttons */
#dynamicTable_paginate .paginate_button:hover {
    background-color: white; /* Change this to the desired hover color */
    cursor: pointer;
    border-radius: 10%;
}
#dynamicTable2_paginate .paginate_button:hover {
    background-color: white; /* Change this to the desired hover color */
    cursor: pointer;
    border-radius: 10%;
}
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
  <!-- Header -->
<header class="header">
    <nav class="nav"> 
        <div class="logo">
        <img src="assets/images/GCU_logo.png" alt="">
        </div>
        <div class="nav-mobile">
            <ul class="list">
                <li class="list-item">
                    <a href="./index.php" class="list-link current">Home</a>
                </li>
                <li class="list-item hov">
                    <a href="./trans.php" class="list-link current1">Request a Form</a>
                </li>
                <li class="list-item hov">
                    <a href="./student-profile2.php" class="list-link current1">Edit your Profiles</a>
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
            <button class="icon-btn place-items-center" onclick="logout()">
                <i class="ri-user-3-line"></i>
            </button>
                <button class="icon-btn place-items-center" onclick="faq()">
                <i class="ri-question-mark"></i>
                </button>
        </div>
    </nav>
</header>

<?php include '../includes/banner.php' ?>

<div class="title independent-title">
  <h2>APPOINTMENT</h2>
</div>
<br>
      <div class="card" style= "background:white; color:black;">
          <hr>
      <div class="body-calendar">
       <div class="container-calendar">
    <div class="left">
  
      <div class="calendar">
 
        <div class="month">
          <i class="fas fa-angle-left prev"></i>
          <div class="date" style="font-size: 30px; font-weight: bold; color:#008374; text-align: center;">month,year</div>
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
    <div>

        <br>
        <h2 class="title"></h2>
        <div >
            <header class="card-header"style="background:none" >
                <p style="margin-left: 10%; font-size: 30px; font-weight: bold; color:black;" > PROCEEDING APPOINTMENT/S </p>
               
            </header>
            <hr>
            <div class="gallery" >
            <main class="table" id="customers_table"  style=" height: auto; " >
    
            <section class="table-body" style=" background: linear-gradient(to right,#ede0d4,#ffc971  );">
                <table style="color:black;" id="dynamicTable">
                    <thead>
                        <tr>
                            <th> Councelor <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Title of appointment <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Date <span class="icon-arrow">&UpArrow;</span></th>
                            
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
              
            </section>
    </div>
    <!-- History of transaction -->
    <div  >
        <br>
        <h2 class="title"></h2>
        <div class="card" style="background:none;">
         
            <hr>
            <div class=" gallery"  >
            <main class="table" id="customers_table" style=" height: auto; ">
            <section >
                <p style="margin-left: 2%; font-size: 25px; font-weight: bold; color:black;" >SETTLED APPOINMENT/S</p>
               
             
            </section>
            <section class="table-body"  style=" background: linear-gradient(to right,#ede0d4,#ffc971  );" >
                <table style="color:black;" id="dynamicTable2" >
                    <thead>
                        <tr>
                            <th  > Councelor <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Title of appointment <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Date <span class="icon-arrow">&UpArrow;</span></th>
                            
                        </tr>
                    </thead>
                    <tbody >

                    </tbody>
                </table>
    
            </section>
            </main>
            </div>
        </div>
    </div>
</section>

<div class="overlay" id="divOne">
                    <div class="wrapper">
                        <a href="#" class="close">&times;</a>
                        <div class="popup">
                            <div class="popup2">
                                <form class="former">
                                    <h1>Reason for Appointment?</h1>
                                    <br>
                                    <select class="selection" name="textfield" id="refer">
                                      <option disabled selected>Select</option>
                                        <option value="Academic Deficiency/ies">Academic Deficiency/ies</option>
                                        <option value="Others">Counseling</option>
                                        <option value="Others">Others</option>
                                      
                                      </select>
                                      <br>
                                      <hr>
                                      <div >
                                      <input type="checkbox" id="chkbx" name="referred" value="yes"> <label> Referred</label>
                                      </div>
                                    <br>
                                    
                                    <div class="tsk">
                                    <a class="yes" onclick="reason()">Submit&nbsp<i class="ri-navigation-line"></i></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                 </div>         
</section>
<br>

    <?php include 'includes/footer1.php' ?>
           
</body>

<script src="assets/js/calendar.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

<script>
      function faq(){
        window.location.href="../dh_student.php"
    }

     var eID = "<?php echo $_SESSION['session_id'];?>";



    function logout() {
        Swal.fire({
      title: "Are you sure you want to logout?",
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
              // console.log("logged", response);
            }
          });
    window.location.href = '../home';

}
  });
}
        var id = "<?php echo $id; ?>";
        var aid;
        var reasons;
        var tid;
        function faq(){
        window.location.href="../dh_student.php"
    }

        var eID = "<?php echo $_SESSION['session_id'];?>";
function logout() {
        Swal.fire({
      title: "Are you sure you want to logout?",
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
              // console.log("logged", response);
            }
          });
    window.location.href = '../home';

}
  });
} 
          function reason()
          {
            var selectInput = document.getElementById('refer').value;

            // console.log('selected: ', selectInput);
        
        // Check if the select input has a value
        if (selectInput !== "Select") {
            // Your additional logic here, e.g., submit the form or perform other actions
           
        } else {
            // Display an error message or take appropriate action if the select input doesn't have a value
            alert('Please select a reason before submitting.');
            return false;
        }



            var ref
            var checkbox = document.getElementById("chkbx");
              // Check if the checkbox is checked
              if (checkbox.checked) {
                // If checked, get the value
               ref = checkbox.value;
                // console.log("Checkbox is checked. Value: " + ref);
              } else {
                ref = checkbox.value;
                // console.log("Checkbox is not checked.");
              }
            reasons = document.getElementById("refer").value;

            Swal.fire({
      title: "Do you wish to proceed?",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes"
    }).then((result) => {
      if (result.isConfirmed) {

                $.ajax({
                  type: 'POST',
                  url: '../backend/get_slot.php',
                  data: {
                    event_id: aid,
                    stud_id: id,
                    trans_id: tid,
                    reason: reasons,
                    reffered: ref
                  },
                  success: function (data) {
                    // console.log("slot taken:", data);
       
                    document.getElementById("divOne").style.display = "none";
                    $.ajax({
                        type: 'POST',
                        url: '../../backend/log_audit.php',
                        data: {
                          userId: id,
                          action: 'get appointment slot',
                          details: id + ' accuired appointment slot'
                        },
                        success: function(response) {
                          // Handle the response if needed
                          // console.log("logged", response);
                          
                        }
                      });
                      Swal.fire({
                            title: "Slot taken",
                            text: "You now have set an appointment request on the said scheduel, please wait for further notice",
                            icon: "success",
                            confirmButtonText: "OK",

                            }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                  window.location.href = "appointment.php";
                                } 
                            });
                    
            

                  },
                  error: function (xhr, status, error) {
                    console.error("Error marking event as done:", error);
                    Swal.fire({
                            title: "Error",
                            text: "Something happened, please try again",
                            icon: "error",
                            confirmButtonText: "OK",

                            }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                    location.reload();
                                } 
                            });
                  },
                });
              }
  });
            
          }

          $(document).ready(function () {
        $.ajax({
            url: "../backend/stud_taken_appt.php",
            type: "GET",
            dataType: "json",
            success: function (data) {
                // console.log(data);
                // if (data.status===0){
                var tableBody = $("#dynamicTable tbody");
                var tableBody2 = $("#dynamicTable2 tbody");
                var historyTableBody = $("#historyTableBody tbody");
                var noHistoryMessage = $("#noHistoryMessage"); 
                var noHistoryMessage2 = $("#noHistoryMessage2"); 
 
                for (var i = 0; i < data.length; i++) {
                    
                    var entry = data[i];
                    
                    if(entry.status !== "done"){
                    var tableToAppend = tableBody; // Determine which table to append to
                    var row = $("<tr></tr>");
                    row.append("<td>" + entry.first_name+ " " + entry.last_name+ "</td>");
                    row.append("<td>" + entry.Reason + "</td>");
                    row.append("<td>" + entry.date+"</td>");

                    tableBody.append(row);
                    // Append the row to a table (you should have a reference to the target table, e.g., tableBody or historyTableBody)
                    // console.log("data",data);
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
                   row.append("<td>" + entry.first_name+ " " + entry.last_name+ "</td>");
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
                  $('#dynamicTable').DataTable({
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
    </html>