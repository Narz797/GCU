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
// Retrieve stud_id from the session
$id = $_SESSION['session_id'];

// Log audit entry for accessing the home page
logAudit($id, 'access_sudent_profile', $id .' has accessed the sudent_profile page');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <!-- Remix icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/css/view.css">
</head>


<!-- for remarks popup -->
<style>
  .body {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .container {
    width: 500px;
    background-color: black;
    box-shadow: 0 0 8px rgba(250, 250, 250, 0.6);
  }
  .container form {
    width: 100%;
    text-align: center;
    padding: 25px 20px;
  }
  form h1 {
    padding: 10px 0;
  }
  form .id {
    position: relative;
  }
  form input{
		width: 100%;
		height: 50px;
		margin: 4px 0;
		border-radius: 3px;
		border: 1px solid gray;
		background-color: black;
		padding: 0 15px;
		font-size: 20px;
	}
  form textarea {
    padding: 5px 15px;
    border-radius: 3px;
    border: 1px solid gray;
    background-color: black;
    font-size: 20px;
    width: 100%;
    margin: 4px 0;
  }
  form button {
    margin-top: 5px;
    border-radius: none;
    background-color: #568203;
    color: white;
    padding: 10px 0;
    width: 100%;
    font-size: 20px;
    font-weight: 800;
    cursor: pointer;
    border-radius: 3px;
  }
  form button:hover {
    background-color: green;
  }
  form input:focus,
  form textarea:focus {
    border: 1px solid green;
    color: white;
    transition: all 0.3s ease;
  }
  form input:focus::placeholder,
  form textarea:focus::placeholder {
    padding-left: 4px;
    color: green;
    transition: all 0.3s ease;
  }

  .modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 1;
  }

  .modal_content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

</style>
<!--  -->
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
                    <a href="main.php" class="list-link current">Home</a>
                </li>
                <li class="list-item hov">
                    <a href="studentprofile.php" class="list-link current1">Back</a>
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
    <!-- Banner -->
<section>
    
   <div class="block"> 
    </div>
    <div class="title independent-title">
        <h2> STUDENT PROFILE</h2>
    </div>
    <div class="card">
        <div class="card-body">
        <div class="card-image" id="gender">
            <!-- The initial image source should be empty -->
            <img src="" alt="">
        </div>
            <div class="card-information">

<!-- call student 
    registered data -->

                <h2><p id="college"></p><p id="course"></p></h2>
                <h1 class="title main-title"><span class="title-lastname main-title" id="lname">, </span><p id="fname" style="display: inline;"></p></h1>
                <p class="card-description1"> <span id="year_level">1st</span> Year Student<br><br></p>
                <p class="card-description">
                    <span>Email:</span id="email"> chad123@gmail.com<br>
                    <span>Contact Number:</span id="number">&nbsp0987-6543-211
                    <hr>
					<b>Guardian:</b> <p style="display: inline;" id="guardian">Jihyo Rizzler</p><br>
					<b>Relation:</b><p style="display: inline;" id="relation"> Sister</p><br>
                    <b>Contact Number:</b><p style="display: inline;" id="guardian_number">&nbsp0912-3456-789</p><br>
                </p>
            </div>
            <div class="card-image1">

<!-- get student 
	real-time signature
 	or ID picture-->

            <img src="assets/images/formtemp.png" alt="ID">
            </div>
            <div class="card-image1">

<!-- get student 
    real-time signature
    or ID picture-->

            <img src="assets/images/formtemp.png" alt="Signature">
            </div>
        </div>
    </div>
</section>
    <!-- Management-area -->
<section class="management-area">
    <div class="management-area-container d-grid">
        <div class="card">
            <header class="card-header header-side">
                <h2 class="title">Notes</h2>
                <small>Type what to take note about the student.</small>
            </header>
            <hr>
        <div class="popup-box">
        <div class="popup">
        <div class="content">
            <header class="header1"><p></p>
            <i class="uil uil-times"></i>
            </header>
            <form action="#">
                <div class="row title">
                    <label>Title</label>
                    <input type="text" spellcheck="false">
                </div>
                <div class="row description">
                    <label>Content</label>
                    <textarea spellcheck="false"></textarea>
                </div>
                <button></button>
            </form>
        </div>
        </div>
        </div>
        <div class="wrapper">
            <li class="add-box">
            <div class="icon"><i class="uil uil-plus"></i></div>
            <p>Add new note</p>
            </li>
        </div>
        </div>

        <div class="card-group d-grid">
            <div class="card border one">
                <div>
                    <h2 class="title">ALL Transacted Forms/Slips</h2>
                <hr>
                    <p class="card-description">

<!-- the table header(thead) are the general 
    sortable script-->

        <table class="table-sortable" id="dynamicTable">
        <thead>
            <tr>
                <th>Date of Transaction</th>
                <th>Form / Slip</th>
                <th>Reason/s</th>
                <th>Action Taken</th>
                <th>Last Updated</th>
                <th>Remarks</th>

<!-- you can find the design on the subpage
titled: remark_design.php-->

                <th>Add Remarks</th>
            </tr>
        </thead>
        <tbody>
        

        </tbody>
        </table> 

        <!-- Remarks popup -->
        <div id="modal" class="modal">
            <div class="modal_content">
                <div class="body">
                <div class="container">
                    <form>
                    <h1>Add Remarks</h1>
                    <div class="id">
                        <textarea cols="20" rows="7" placeholder="Enter your remarks here..." id="remarksTextarea"></textarea>
                        <button onclick="add_remarks()"> Add </button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
                    <!--  -->
        </p>
                </div>
            </div>
            <div class="card border one">
                <div>
                    <h2 class="title">ALL &nbspAppointed Counseling</h2>
                    <hr>
                    <p class="card-description">
        <table class="table-sortable" id="dynamicTable2">
        <thead>
            <tr>
                <th>Date of Appointment</th>
                <th>Reason of Appointment</th>
                <th>Inscribed/Remarks About the Appointment</th>
                <th>Action Taken</th>
                <th>Latest Update</th>

<!-- you can find the design on the subpage
titled: edit_design.php-->

                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        
        </tbody>
        </table>
        <!-- Edit popup -->

        <div class="modal" id="modal2">
            <div class="modal_content">
                <div class="body">
                <div class="container">
                    <form>
                    <h1>Edit Data</h1>
                    <div class="id">
                        <input type="text" placeholder="Action Taken" id="editTextarea">
                    </div>
                    <div class="id">
                        <textarea cols="20" rows="7" placeholder="Remarks about the appointment..." id="editTextarea2"></textarea>
                        <button onclick="edit_remarks()"> Edit </button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        <!--  -->
                </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
<?php 
// Retrieve stud_id from the session
$student = $_SESSION['stud_user_id'];

// $student_transacts = $_SESSION['ST_id'];

// echo "<script>alert('$student_transacts')</script>";
?>
    <!-- Script -->
    <script>

var trans_id
var stud_name
var app_id
var eID = '<?php echo $id;?>';
            function logout() {
                $.ajax({
            type: 'POST',
            url: '../backend/log_audit.php',
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
    window.location.href = '../../home?logout=true';
}
function archive() {
    $.ajax({
            type: 'POST',
            url: '../../backend/log_audit.php',
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
    window.location.href = 'archive.php';
        }
// remarks
function openModal(id) {
    document.getElementById("modal").style.display = "block";
    console.log(id);
    trans_id = id;
  }

  function closeModal() {
    document.getElementById("modal").style.display = "none";
  }

  // Add an event listener to close the modal when clicking outside of it
  window.addEventListener("click", function (event) {
    var modal = document.getElementById("modal");
    if (event.target === modal) {
      closeModal();
    }
  });


//Edit

function openModal2(id) {
    document.getElementById("modal2").style.display = "block";
    console.log(id);
    app_id=id;

  }

  function closeModal2() {
    document.getElementById("modal2").style.display = "none";
  }

  // Add an event listener to close the modal when clicking outside of it
  window.addEventListener("click", function (event) {
    var modal2 = document.getElementById("modal2");
    if (event.target === modal2) {
      closeModal2();
    }
  });


    //appointment
    function edit_remarks(){
        var textareaValue = document.getElementById("editTextarea").value;
        var textareaValue2 = document.getElementById("editTextarea2").value;
        console.log("ID:", app_id);
        console.log("Remarks:", textareaValue);
        console.log("Remarks:", textareaValue2);
        $.ajax({
          type: 'POST',
          url: '../../backend/appointment_remark.php',
          data: {
            id: app_id,
            action: textareaValue,
            remark: textareaValue2
          },
          success: function (data) {
            $.ajax({
            type: 'POST',
            url: '../../backend/log_audit.php',
            data: {
              userId: eID,
              action: 'edit remark',
              details: eID + ' edited remark of ' + stud_name
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
            console.log("Remarked:", data);
          },
          error: function (xhr, status, error) {
            console.error("Error marking event as done:", error);
            alert("Error marking event as done: " + error);
          },
        });
        
    }
  //transact
  function add_remarks() {
    var textareaValue = document.getElementById("remarksTextarea").value;
    console.log("ID:", trans_id);
    console.log("Remarks:", textareaValue);
            $.ajax({
          type: 'POST',
          url: '../../backend/student_remark.php',
          data: {
            id: trans_id,
            remark: textareaValue
          },
          success: function (data) {
            $.ajax({
            type: 'POST',
            url: '../../backend/log_audit.php',
            data: {
              userId: eID,
              action: 'add remark',
              details: eID + ' added remark for ' + stud_name
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
            console.log("Remarked:", data);
          },
          error: function (xhr, status, error) {
            console.error("Error marking event as done:", error);
            alert("Error marking event as done: " + error);
          },
        });
        }

    // Function to update the HTML elements
    function updateValues(fname, lname, email, year_level, course, gender, college, cn, pgn, pgname, relation) {

        const genderImageMap = {
            'male': 'assets/images/male.jpg',
            'female': 'assets/images/female.jpg'
        };

        const image = document.createElement('img');
        image.style.display = 'block'; // Display the image above the text

        if (gender === 'Male') {
            image.src = genderImageMap['male'];
        } else if (gender === 'Female') {
            image.src = genderImageMap['female'];
        }

        $('#lname').text(lname+ ', ');
        $('#fname').text(fname);
        $('#year_level').text(year_level+ ' ');
        $('#email').text(' '+email);
        $('#number').text(' '+cn);
        $('#guardian').text(' '+pgname);
        $('#relation').text(' '+relation);
        $('#guardian_number').text(' '+pgn);
        $('#college').text(college+ ' ');
        $('#course').text(course);
        // Replace the content of the #gender div with the created image
        const genderElement = document.getElementById('gender');
        genderElement.innerHTML = ''; // Clear existing content
        genderElement.appendChild(image);
   
    }
    function fetchData() {
    console.log('AJAX request started');
    $.ajax({
        type: 'GET',
        url: '../backend/get_student.php',
        dataType: 'json',
        success: function (data) {
            if (data.length > 0) {
                var studentData = data[0]; // Assuming you expect a single row
                var fname = studentData.first_name;
                stud_name = studentData.first_name + ' ' + studentData.last_name;
                var lname = studentData.last_name;
                var email = studentData.email;
                var year_level = studentData.Year_level;
                var course = studentData.course;
                var gender = studentData.gender;
                var college = studentData.Colleges;
                var cn = studentData.Contact_number;
                var pgn = studentData.ParentGuardianNumber;
                var pgname = studentData.ParentGuardianName;
                var relation = studentData.Relation;
                console.log(fname);
                updateValues(fname, lname, email, year_level, course, gender, college, cn, pgn, pgname, relation);
                            
            } else {
                // Handle the case when no results are found
                console.log('No results found');
            }
        },
        error: function (xhr, status, error) {
            console.error('Error: ' + error);
            console.error('Status: ' + status);
            console.error('Response: ' + xhr.responseText);
        }
    });
}


    
    $(document).ready(function() {
            // Fetch data using $.ajax
            $.ajax({
                url: '../backend/student_transacts.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    const table = document.getElementById('data-table');
                    const searchInput = document.getElementById('searchInput');
                    
                    
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

                    // console.log("transact", S_transact);
                    var row = $("<tr></tr>");
                    row.append("<td>" + entry.date_created + "</td>");
                    row.append("<td>" + entry.transact_type +"</td>");
                    row.append("<td>" + entry.reason +"</td>");
                    row.append("<td>" + entry.status + "</td>");
                    row.append("<td>" + entry.date_edited + "</td>");
                    row.append("<td>" + entry.remarks + "</td>");
                    // var statusClass = status == 'pending' ? 'status delivered' : 'status cancelled';
                    // var statusText = status == 'pending' ? 'Unread' : 'Read';
                    var statusCell = $("<td></td>");
                    var statusLink = $("<button class='add' onclick='openModal("+entry.transact_id+")'><i class='ri-menu-add-line'></i></button>");
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

            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
            });


        });

        $(document).ready(function() {
            // Fetch data using $.ajax
            $.ajax({
                url: '../backend/student_slot.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    const table = document.getElementById('data-table');
                    const searchInput = document.getElementById('searchInput');
                    
                    
                console.log(data);
                // if (data.status===0){
                var tableBody = $("#dynamicTable2 tbody");
                var historyTableBody = $("#historyTableBody tbody");
                var noHistoryMessage1 = $("#noHistoryMessage1"); 
                var noHistoryMessage2 = $("#noHistoryMessage2"); 
 
                for (var i = 0; i < data.length; i++) {
                    
                    var entry = data[i];
                    var status = entry.status;
                    var tableToAppend = tableBody; 
                    var row = $("<tr></tr>");
                    row.append("<td>" + entry.date + "</td>");
                    row.append("<td>" + entry.reason +"</td>");
                    row.append("<td>" + entry.remarks +"</td>");
                    row.append("<td>" + entry.action_taken+ "</td>");
                    row.append("<td>" + entry.latest_update + "</td>");
                    // var statusClass = status == 'pending' ? 'status delivered' : 'status cancelled';
                    // var statusText = status == 'pending' ? 'Unread' : 'Read';
                    var statusCell = $("<td></td>");
                    var statusLink = $("<button class='edit' onclick='openModal2("+entry.appointment_id+")'><i class='ri-pencil-line'></i></button>");

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

            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
            });

            
        });
    fetchData();
</script>
<script src="./assets/main.js"></script>
<script src="./assets/js/tablesort.js"></script>
<script src="./assets/js/notes.js"></script>
</body>
</html>