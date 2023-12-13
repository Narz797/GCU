<?php 

session_start();
include '../backend/log_audit2.php';
// include '../backend/validate_user.php';
// include '../backend/connect_database.php';
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
logAudit($id, 'access_transaction', $id .' has accessed the transaction page');
  echo "<script>console.log('$id');</script>";
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT</title>
    
    <!-- Your Custom CSS -->
    <link rel="stylesheet" href="assets/css/students.css"/>
    <link rel="stylesheet" href="assets/css/stud.css"/>
       <!-- Remix icons -->
       <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
   
    <!-- Bootstrap CSS and JS -->
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

</head>

<body>
 <!-- Header -->
 <header class="header">
    <nav class="nav">
        <div class="logo">
        <img src="GCU_logo.png" alt="">
        <!-- <img src="assets/images/bsu.png" alt=""> -->
        </div>
    </nav>
</header>

    <!-- Welcome-message -->
    <section> <?php include '../includes/banner.php' ?>
<div class="title independent-title ">
        <h2 > Home </h2>
    </div>
    <div class="card">
        <header class="card-header">
            <small>Greetings!</small>
<!-- call employee id 
    number or 
    profession = "Admin"-->
            <h2 class="title">Welcome back, <span> Dear Student!</span></h2>
        </header>
        <hr>
    </div>
</section>
<br>
    <!-- Management-area -->
 
<div class="management-area-container d-grid">
    <div class="card">
        <header class="card-header header-side">
            <h2 class="title">ACTIONS</h2>
            <small>Choose what task to do today.</small>
        </header>
            <hr>
            <div>
                <a href="./trans.php" class="card-body-link">
                <i class="ri-folder-line"></i>Request a Form
                </a>
                <a href="./appointment.php" class="card-body-link">
                <i class="ri-calendar-line"></i>Schedule an Appointment
                </a>
                <a href="./student-profile2.php" class="card-body-link">
                <i class="ri-profile-line"></i>Edit your Profile
                </a>
                <a href="../dh_student.php" class="card-body-link"> 
                <i class="ri-question-mark"></i>Need Help?
                </a>
                <a onclick="logout()" class="card-body-link">
                <i class="ri-user-3-line"></i>Log-Out
                </a>
            </div>
    </div>
    <div class="container1 ">
        <section class="main  border">
        <section class="attendance ">
        <div class="attendance-list">
            <h1>List of Transaction with the GCU</h1>
        <table class="table" id="dynamicTable" style="color:black;">
        <thead>
          <tr></tr>
          <th>Confirmed Requests</th>
          <th>Date Requested</th>
          <th>Date Confirmed</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
        </table>
        </div>
        </section>
        </section>
    </div>
</div>
<br>
  <?php include 'includes/footer.php' ?>    

</body>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  var eID = "<?php echo $_SESSION['session_id'];?>";
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
    window.location.href = '../home';

}
  });
}

    $(document).ready(function () {
        // Function to load data from the database via Ajax
        // function loadDataFromDatabase() {
        //     $.ajax({
        //         url: '../backend/stud_history.php',
        //         method: 'GET',
        //         dataType: 'json', // Set the expected data type to JSON
        //         success: function (data) {
        //             // Store the data in a variable accessible to the search function
        //             window.originalData = data;

        //             // Display the data
        //             displayData(data);
        //         },
        //         error: function (error) {
        //             console.error('Error fetching data: ' + error);
        //         }
        //     });
        // }

        // Function to display data in the scrollable container
        function displayData() {
            // Clear the existing content
            // $('#scrollable-container').empty();

            // // Iterate through the JSON data and append it to the scrollable container
            // data.forEach(function (item) {
            //     // Create the HTML structure for each data item
            //     var content = '<div class="post-item mt-3">';
            //     content += '<img src="assets/img/form.png" alt="" style="height:60px; ">';
            //     content += '<div>';
            //     content += '<h4><p>' + item.transact_type + '</p></h4>';
            //     content += '<time datetime="2020-01-01">' + item.date_completed + '</time>';
            //     content += '</div>';
            //     content += '</div>';
            //     content += '<br>';
            //     content += '<hr>';
            //     $('#scrollable-container').append(content);
            // });


            $.ajax({
      
      url: '../backend/stud_history.php',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
         // const table = document.getElementById('data-table');
         // const searchInput = document.getElementById('searchInput');
          
      console.log(data);
      // if (data.status===0){
      var tableBody = $("#dynamicTable tbody");

      for (var i = 0; i < data.length; i++) {
          
          var entry = data[i];
          
          var tableToAppend = tableBody; // Determine which table to append to
          var row = $("<tr></tr>");
          row.append("<td>" + entry.transact_type + "</td>");
          row.append("<td>" + formatDateString(entry.date_created) + "</td>");
        row.append("<td>" + formatDateString(entry.date_completed) + "</td>");

          tableBody.append(row);
          // Append the row to a table (you should have a reference to the target table, e.g., tableBody or historyTableBody)
       }
       console.log("data",data);
       $('#dynamicTable').DataTable();



  },
  error: function(xhr, status, error) {
  console.error('Error fetching data:', error);
  console.log('Server response:', xhr.responseText);
}
  });

  function formatDateString(dateString) {
  const date = new Date(dateString);
  const options = { year: 'numeric', month: 'short', day: 'numeric' };
  return date.toLocaleDateString('en-US', options);
}

        }

        // Function to search the table based on user input
        // window.searchTable = function () {
        //     // Get the search input value
        //     var searchInput = $('#searchInput').val().toLowerCase();

        //     // Filter the original data based on the search input
        //     var filteredData = window.originalData.filter(function (item) {
        //         return item.transact_type.toLowerCase().includes(searchInput);
        //     });

        //     // Display the filtered data
        //     displayData(filteredData);
        // };
        // // Function to search the table based on user input
        // window.searchTable = function () {
        //     var searchInput = $('#searchInput').val().toLowerCase();
        //     var filteredData = originalData.filter(function (item) {
        //         return item.transact_type.toLowerCase().includes(searchInput);
        //     });
        //     displayData(filteredData);
        // };

        // // Function to clear search results
        // window.clearSearchResults = function () {
        //     $('#searchInput').val('');
        //     displayData(originalData);
        // };
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

        // Call the function to load data when the page loads
        // loadDataFromDatabase();
         displayData();
    });

    
</script>
</html>
</span>