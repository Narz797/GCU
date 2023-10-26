<!DOCTYPE html>
<?php
session_start();
    $_SESSION['form_type']='referral';//
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REFERRAL SLIPS</title>
     <!-- Stylesheet -->
     <link rel="stylesheet" href="slip.css">
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
</head>

<body>
    <!-- Header -->
<header class="header">
    <nav class="nav"> 
        <div class="logo">
            <a href="./index.php" ><img src="../assets/images/bsu.png" alt=""></a>
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
                <input type="search" placeholder="Search Data...">
            </div>
            <div class="export-file">
                <label for="export-file" class="export-file-btn" title="Export File"><img src="../assets/images/export.png" alt=""></label>
                <input type="checkbox" id="export-file">
                <div class="export-file-options">
                    <label>Export as&nbsp; &#10140;</label>
                    <label for="export-file" id="toEXCEL">EXCEL <img src="../assets/images/excel.png" alt=""></label>
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
                                    <th> Department / College <br><span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Contact Number <br><span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Guardian Number <br><span class="icon-arrow">&UpArrow;</span></th>
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
                    var tableToAppend = tableBody; // Determine which table to append to
                    
                    var row = $("<tr></tr>");
                    row.append("<td>" + entry.stud_user_id + "</td>");
                    row.append("<td>" + entry.last_name + "</td>");
                    row.append("<td>" + entry.first_name +"</td>");
                    row.append("<td>" + entry.Year_level +"</td>");
                    row.append("<td>" + entry.course + "</td>");
                    row.append("<td>" + entry.Colleges + "</td>");
                    row.append("<td>" + entry.Contact_number + "</td>");
                    row.append("<td>" + entry.ParentGuardianNumber + "</td>");
                    row.append("<td>" + entry.referred + "</td>");

                    var statusClass = status == 'pending' ? 'status delivered' : 'status cancelled';
                    var statusText = status == 'pending' ? 'Unread' : 'Read';

                    var statusCell = $("<td></td>");
                    var statusLink = $("<a href='../forms/read.php'><button>View</button></a>");
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
<script src="../assets/main.js"></script>
 <script src="assets/js/table.js"></script>   
</body>
</html>