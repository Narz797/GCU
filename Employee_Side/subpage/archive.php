<?php
session_start();
  // Check if the session variable is empty
  if (empty($_SESSION['session_id'])) {
    // Redirect to the desired location
    echo "<script>alert('You have already Logged out. You will be redirected.'); window.location.href = 'http://localhost/GCU/home';</script>";
    
    exit; // Make sure to exit the script after a header redirect
  }
    $_SESSION['form_type']='done';//
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARCHIVE</title>
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../assets/css/forms.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.full.min.js"></script>


</head>

<body>
    <!-- Header -->
<header class="header">
    <nav class="nav"> 
        <div class="logo">
            <a href="../index.php" ><img src="../assets/images/bsu.png" alt=""></a>
        </div>
        <div class="nav-mobile">
            <ul class="list">
                <li class="list-item">

<!-- Back function once click goes back 
    to whatever page it opened before clicking archive -->

                    <a href="#" class="list-link current">Back</a>
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
        </div>
    </nav>
</header>
    <!-- Banner -->
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
    <div class="container">
        <br>
        <h2 class="title"></h2>
        <div class="card">
            <header class="card-header">
                <h1 style="text-align: center;">ARCHIVED</h1>
                <p style="text-align: center;">&nbsp&nbsp The following are all the finished transactions.</p>
            </header>
            <hr>
            <div class=" gallery">
            <main class="table" id="customers_table">
            <section class="table-header">
                <h1>List of <b>All Transactions</b></h1>
                <div class="input-group">
                    <input type="search" placeholder="Search Data..." id="searchInput" onkeyup="searchTable()">
                </div>
                <div class="export-file">
                    <label for="export-file" class="export-file-btn" title="Export File"><img src="../assets/images/file-transfer-line.png" alt=""></label>
                    <input type="checkbox" id="export-file">
                    <div class="export-file-options">
                        <p>Export as&nbsp; &#10140;</p>
                        <label for="export-file" id="exportToExcel" onclick="exportToExcel()">EXCEL <img src="../assets/images/excel.png" alt=""></label>
                    </div>
                </div>
            </section>
            <section class="table-body">
                <table id="dynamicTable">
                    <thead>
                        <tr>

<!-- Do add even the appointment/calendar transaction-->

                            <th> Id <br><span class="icon-arrow">&UpArrow;</span></th>
                            <th> Student <br><span class="icon-arrow">&UpArrow;</span></th>
                            <th> Date Requested / Appointment<br><span class="icon-arrow">&UpArrow;</span></th>
                            <th> Transaction<br> <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Status<br> <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Last Edited<br><span class="icon-arrow">&UpArrow;</span></th>
                        </tr>
                    </thead>
                    <tbody  id="data-table">
                        <!-- <tr>
                            <td> 2 </td>
                            <td> Jeet, Saru </td>
                            <td> 27 Aug, 2023 </td>
                            <td> Readmission </td>
                            <td>
                                <p class="status delivered">Done</p>
                            </td>
                            <td> 28 Aug, 2023 </td>
                        </tr>
                        <tr>
                            <td> 3 </td>
                            <td> Sarita, Limbu </td>
                            <td> 23 Apr, 2023 </td>
                            <td> Absent/Tardy </td>
                            <td>
                                <p class="status delivered">Done</p>
                            </td>
                            <td> 24 Apr, 2023 </td>
                        </tr>
                        <tr>
                            <td> 4 </td>
                            <td> Zinzu, Chan Lee</td>
                            <td> 17 Dec, 2022 </td>
                            <td> Dropping </td>
                            <td>
                                <p class="status delivered">Done</p>
                            </td>
                            <td> 17 Dec, 2022 </td>
                        </tr>
                        <tr>
                            <td> 6 </td>
                            <td> Zinzu, Chan Lee</td>
                            <td> 17 Dec, 2022 </td>
                            <td> Shifting </td>
                            <td>
                                <p class="status delivered">Done</p>
                            </td>
                            <td> 17 Dec, 2022 </td>
                        </tr>
                        <tr>
                            <td> 7 </td>
                            <td> Jeet, Saru </td>
                            <td> 27 Aug, 2023 </td>
                            <td> Academic Deficiency </td>
                            <td>
                                <p class="status delivered">Cattered</p>
                            </td>
                            <td> 27 Aug, 2023 </td>
                        </tr>
                        <tr>
                            <td> 8 </td>
                            <td> Jeet, Saru </td>
                            <td> 27 Aug, 2023 </td>
                            <td> Counseling </td>
                            <td>
                                <p class="status delivered">Cattered</p>
                            </td>
                            <td> 27 Aug, 2023 </td>
                        </tr> -->
                    </tbody>
                </table>
                <p id="noHistoryMessage2">Empty</p>
            </section>
            </main>
            </div>
            </main>
            </div>
        </div>
    </div>
</section>
<br>
    <!-- Script     -->
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

        function logout() {
    window.location.href = '../home?logout=true';
        }
        function archive() {
    window.location.href = './subpage/archive.php';
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
                var noHistoryMessage2 = $("#noHistoryMessage2"); 
 
                for (var i = 0; i < data.length; i++) {
                    
                    var entry = data[i];
                    var status = entry.status;
                    var tableToAppend = tableBody; // Determine which table to append to
                    var row = $("<tr></tr>");
                    row.append("<td>" + entry.stud_user_id + "</td>");
                    row.append("<td>" + entry.first_name + "" + entry.last_name +"</td>");
                    row.append("<td>" + entry.date_created + "</td>");
                    row.append("<td>" + entry.reason + "</td>");
                    if (status == 'done') {
                            row.append("<td><p class='status delivered'>Done</p></td>");
                        }
                    row.append("<td>" + entry.last_edited + "</td>");

                    // row.append("<td>" + entry.status + "</td>");
                     // Check the value of entry.status and set the class and text accordingly

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
    XLSX.writeFile(workbook, "Archive.xlsx");
}


    </script>
<script src="../assets/main.js"></script>
<script src="../assets/js/count.js"></script>   
  
</body>
</html>