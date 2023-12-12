<?php 
session_start();
// Include the log_audit.php file
include '../backend/log_audit2.php';
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

// Log audit entry for accessing the home page
logAudit($id, 'access_empoyee profile',  'Admin has accessed the empoyee profile page');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile</title>
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
    <link rel="stylesheet" href="assets/css/logreport.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- Export -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <link href="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js" />
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

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
<style>
</style>

<body style="background:white;">
    <!-- Header -->
    <header class="header" >
        <nav class="nav">
            <div class="logo">
            <img src="assets/images/GCU_logo.png" alt="">
            </div>
            <div class="nav-mobile">
                <ul class="list">
                    <li class="list-item">
                        <a href="main.php" class="list-link current">Home</a>
                    </li>
                    <li class="list-item hov">
                        <a href="studentprofile.php" class="list-link current1">Student Accounts</a>
                    </li>
                    <li class="list-item hov">
                    <a href="teacherprofiles.php" class="list-link current1">Teacher Accounts</a>
                    </li>
                    <li class="list-item hov">
                        <a href="logreport.php" class="list-link current1">Log Report</a>
                    </li>
                    <li class="list-item hov">
                <a href="admin_profile.php" class="list-link current1">Edit Profile</a>
                </li>
                    <li class="list-item hov">
                        <a href="exportimport.php" class="list-link current1">Export/Import of Database</a>
                    </li>
                </ul>
                <button class="icon-btn menu-toggle-btn menu-toggle-close place-items-center">
                    <i class="ri-close-line"></i>
                </button>
            </div>
            <div class="align-right">
                <button class="icon-btn place-items-center" onclick="logout()">
                    <i class="ri-user-3-line"></i>
                </button>
            </div>
        </nav>
    </header>
    <!-- Welcome-message -->

    <section>
   
        <!-- <div class="block">
        </div> -->
        <div class="title independent-title" style="background:#008374;">
            <h2 style="color:black;">Employee Profiles</h2>
            <br>
            <div class="container"  style="display: flex; justify-content: flex-end;">
            
            <a href="addemployee.php"><button type=submit class="button">Add Employee Account</button></a>
            </div>
                       
        </div>
       
        <!-- Section -->
        <div class="container">
            <div class="card" style=" background: white;">
                <div class="gallery">
                    <main class="table" id="customers_table">
                        <section class="table-header">
                            <h1>List of Employees</h1>
                            <div class="input-group">
                            <input type="search" id="searchInput" onkeyup="searchTable()" onblur="clearSearchResults()" onsearch="clearSearchResults2()" placeholder="Search Data...">

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

                
                        <section class="table-body">

                        <table id="dynamicTable">
                                <thead>
                                    <tr>
                                        <th> Employee ID # <br> <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Last Name <br><span class="icon-arrow">&UpArrow;</span></th>
                                        <th> First Name <br><span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Middle Name <br><span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Sex <br><span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Email Address <br><span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Contact Number <br><span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Position <br><span class="icon-arrow">&UpArrow;</span></th>
                                        <th>Action</th>
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
    
    <!-- Script     -->
    <script src="assets/main.js"></script>
    <!-- <script src="assets/js/table.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>var eID = "<?php echo $_SESSION['session_id'];?>";
function searchTable() {
    var input, filter, table, tr, th, td, i, j, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("dynamicTable");
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
function clearSearchResults() {
    var table = document.getElementById("dynamicTable");
    var tr = table.getElementsByTagName("tr");
    var input = document.getElementById("searchInput");

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
function clearSearchResults2() {
    var table = document.getElementById("dynamicTable");
    var tr = table.getElementsByTagName("tr");

    // Show all rows, excluding header rows
    for (var i = 0; i < tr.length; i++) {
        if (tr[i].getElementsByTagName("th").length === 0) {
            // Exclude header rows
            tr[i].style.display = "";
        }
    }
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
            url: '../backend/log_audit.php',
            data: {
              userId: eID,
              action: 'logged out',
              details: eID + 'Admin Clicked log out'
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
            window.location.href = '../home';
        }
  });
        }


        $(document).ready(function() {
            function get_data(){
            // Fetch data using $.ajax
            $.ajax({
                url: "../backend/search_employee.php",
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
                        cell.append(image); 
                        cell.append("</br>" + entry.admin_user_id);
                        row.append(cell);
                        row.append("<td>" + entry.last_name + "</td>");
                        row.append("<td>" + entry.first_name + "</td>");
                        row.append("<td>" + entry.middle_name + "</td>");
                        row.append("<td>" + entry.gender + "</td>");
                        row.append("<td>" + entry.email + "</td>");
                        row.append("<td>" + entry.contact + "</td>");
                        row.append("<td>" + entry.position + "</td>");
                        // var statusClass = status == 'pending' ? 'status delivered' : 'status cancelled';
                        // var statusText = status == 'pending' ? 'Unread' : 'Read';
                        var statusCell = $("<td></td>");
                        var statusLink = $("<button class ='yes' onclick='view_student(" + entry.admin_user_id + ")'>Edit</button> <button class='no' onclick='del_emp(" + entry.admin_user_id + ")'>Delete</button>");
                        statusCell.append(statusLink);
                        row.append(statusCell);
                        tableBody.append(row);


                    }
                                      console.log("data", data);      // Initialize DataTables for pagination
                            $('#dynamicTable').DataTable({
                                paging: true,
                                searching: false,
                                ordering: false,
                                lengthMenu: [5, 10, 15, 20], // Customize the number of rows per page
                                pageLength: 5, // Initial number of rows per page
                            });
    
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
        }
        get_data()
      

    });
    function del_emp(id) {
        Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
                    $.ajax({
                    type: 'POST',
                    url: '../backend/del_employee.php',
                    data: {
                        user_id: id
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "The account has been deleted.",
                            icon: "success",
                            confirmButtonText: "OK",

                            }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                    location.reload();
                                } 
                            });
                        console.log(response);
                       

                        
                            $.ajax({
                            type: 'POST',
                            url: '../backend/log_audit.php',
                            data: {
                            userId: eID,
                            action: 'Admin deleted employee account',
                            details: 'Admin deleted employee account'
                            },
                            success: function(response) {
                            // Handle the response if needed
                            console.log("logged", response);
                            }
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX Error: " + textStatus, errorThrown);
                        alert("An error occurred during the deletion. Please try again.");
                    }
                });
            }
  });
     

            }

        function view_student(stud_id) {
            // alert(stud_id);

            // Send stud_id to the server using an AJAX request
            $.ajax({
                type: 'POST', // You can use POST to send data securely
                url: '../backend/session_employee.php', // PHP script that sets the session variable
                data: {
                    user_id: stud_id
                },
                success: function(response) {
                    // Handle the response from the server, if needed
                    console.log(response);
                    window.location.href = 'editemployee.php';
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
            XLSX.writeFile(workbook, "Filtered_Employees.xlsx");


            $.ajax({
            type: 'POST',
            url: '../backend/log_audit.php',
            data: {
              userId: eID,
              action: 'Admin exported employee list to excel',
              details: 'Admin exported employee list to excel'
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
            doc.save('Filtered_Employees.pdf');

            $.ajax({
            type: 'POST',
            url: '../backend/log_audit.php',
            data: {
              userId: eID,
              action: 'Admin exported employee list to pdf',
              details: 'Admin exported employee list to pdf'
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
        }

        //moving arrow
    </script>


<style>
        
        .container{
           font-size:17px;
           

        }
        .button{
           
           text-align: center;
           
           border:none;
           color:white;
           padding:12px 32px;
           text-decoration: none;
           margin:2px 2px;
           cursor:pointer;
           height:60px;
           width:300px;
           border-style: outset;
           background-color: darkgreen;
           border-radius:50px;

       }
       
        .button:hover{
            text-align: center;
           background-color: green;
           border:none;
           color:black;
           padding:12px 32px;
           text-decoration: none;
           margin:2px 2px;
           cursor:pointer;
           height:60px;
           width:300px;
           border-style: outset;
           border-radius:50px;
           
        }
        
    </style>
    <?php include 'includes/footer.php' ?>
</body>

</html>