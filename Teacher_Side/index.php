<?php 
session_start();
  // Check if the session variable is empty
  if (empty($_SESSION['session_id'])) {
    // Redirect to the desired location
    echo "<script>alert('You have already Logged out. You will be redirected.'); window.location.href = 'http://localhost/GCU/home';</script>";
    
    exit; // Make sure to exit the script after a header redirect
  
  }
  // include 'main2.php';
$id = $_SESSION['session_id'];
$_SESSION['transact_type'] = 'referral';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Welcome, Teacher/s</title>
      <!-- JSquery -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
      <!-- Remix icons -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
      <!-- CSS sheet -->
  <link rel="stylesheet" href="style.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

</head>
<body>
<div class="container">
<section class="main">
  <div class="main-top">
    <h1>Teacher's Dashboard</h1>
  </div>
  <div class="users">
    <div class="card">

<!-- Get teacher's data with image or delete image -->

      <div id="gender" style="display: flex; justify-content: center; align-items: center;">
            <!-- The initial image source should be empty -->
            <img src="" alt="">
        </div>
      <h6 id="EId">111000111</h6>
      <h4 id="name">Monkey Dulagan Luffy</h4>
      <p  id="college">College of Information Sciences</p>
      <div class="per">
      <table>
        <tr>
        <td><span id="cn">000-000-0000</span></td>
        <td><span id="email">strawhatluffy@pirate.com</span></td>
        </tr>
        <tr>
        <td class="color">Contact Number</td>
        <td class="color">Email</td>
        </tr>
      </table>
      </div>
        <a href="#divOne"><button>EDIT</button></a>
    </div>
    <div class="slip">

<!-- Save data -->

        <h1>REFERRAL SLIP</h1>
        <div id="show">
        <form id="check_stud" name="form1" method="post">
        <div class="flex">
        <div class="form">    
          <label for="Sid">Student ID:</label>
          <input type="number" id="Sid" name="Sid" required>
        </div>
        
                <div class="form1">
          <label>Reason:</label>
          <select required id="reason">
            <option disabled selected>Select reason for referral</option>
            <option>Academic Deficiency/ies</option>
            <option>Absent</option>
            <option>Tardy</option>
          </select>
        </div>
          <!-- <a href="#"><button>REFER</button></a> -->
          <input type="submit" class="btn btn-primary" name="submit" id="submit" value="REFER">
        
        </div>
        </form>
        </div>

        <div id="hide">
        <!--  -->
        <form id="form_transact" name="form2" method="post">
        <div class="flex">
        <div class="form">    
          <label for="Sid">Student ID:</label>
          <input type="number" id="Sid" name="Sid" required>
        </div>
        <div class="form">    
          <label for="fname">Student's First Name:</label>
          <input type="text" id="fname" name="fname" required>
        </div>
        <div class="form">
          <label for="lname">Student's Last Name:</label>
          <input type="text" id="lname" name="lname" required>
        </div>
        <div class="form">
          <label for="yl">Year/Level:</label>
          <input type="text" id="yl" name="yl" required>
        </div>
        </div>
        <div class="flex">
        <div class="form1">
          <label>Gender:</label>
          <select required id="gender" name="gender">
            <option disabled selected>Select gender</option>
            <option>Male</option>
            <option>Female</option>
          </select>
        </div>
        <div class="form">
          <label for="course">Course:</label>
          <input type="text" id="crse" name="crse" required>
        </div>
        <div class="form1">
          <label for="college">College:</label>
          <select id="college" name="college" required >
            <option disabled selected>Select College</option>
            <option>College of Agriculture</option>
            <option>College of Teacher Education</option>
            <option>College of Home Economics & Technology</option>
            <option>College of Forestry</option>
            <option>College of Nursing</option>
            <option>College of Veterinary Medicine</option>
            <option>College of Human Kinetics</option>
            <option>College of Public Administration & Governance</option>
            <option>College of Information Sciences</option>
            <option>College of Arts & Humanities</option>
            <option>College of Social Sciences</option>
            <option>College of Numeracy & Applied Sciences</option>
            <option>College of Natural Sciences</option>
          </select>
        </div>
        <div class="form">
          <label for="cn">contact_number:</label>
          <input type="text" id="cn" name="cn" required>
        </div>
        <div class="form">
          <label for="gp">Parent/Guardian's Name:</label>
          <input type="text" id="gp" name="gp" required>
        </div>
        <div class="form">
          <label for="gpn">Parent/Guardian's Number:</label>
          <input type="text" id="gpn" name="gpn" required>
        </div>
        <div class="form1">
          <label>Reason:</label>
          <select required id="reason">
            <option disabled selected>Select reason for referral</option>
            <option>Academic Deficiency/ies</option>
            <option>Absent</option>
            <option>Tardy</option>
          </select>
        </div>
          <!-- <a href="#"><button>REFER</button></a> -->
          <input type="submit" class="btn btn-primary" name="submit" id="submit" value="REFER">
        </div>
        </form>
        </div>
    </div>
  </div>
  <section class="attendance">
    <div class="attendance-list">
      <h1>List of Referred Students</h1>
        <table class="table" id="dynamicTable">
        <thead>
          <tr>
          <th>ID</th>
          <th>Last Name</th>
          <th>First Name</th>
          <th>Year/Level</th>
          <th>Course</th>
          <th>College</th>
          <th>Contact Number</th>
          <th>Referred By</th>
          <th>Reason</th>
          <th>Date</th>
          <th>Status</th>

<!-- I dont know if u need action here
 but just in case or just delete it-->

          <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <!-- <tr>
          <td>010101</td>
          <td>Sam Sam </td>
          <td>Design</td>
          <td>4th Year</td>
          <td>Male</td>
          <td>Tardy</td>
          <td>03-24-22</td>
          <td><a href="#divTwo"><button><i class="ri-delete-bin-6-line"></i></button></a></td>
          </tr>
          <tr>
          <td>22222</td>
          <td>Ann Sam </td>
          <td>Architect</td>
          <td>1st Year</td>
          <td>Female</td>
          <td>Academic Defieciency</td>
          <td>03-24-22</td>
          <td><a href="#divTwo"><button><i class="ri-delete-bin-6-line"></i></button></a></td>
          </tr> -->

        </tbody>
        </table>
        <!-- <p id="noHistoryMessage1">Empty</p> -->
    </div>
  </section>
</section>
</div>

<!--This the pop-up-->

  <!-- <div class="overlay" id="divOne">
    <div class="wrapper">
    <h1>Edit Profile</h1>
    <a href="#" class="close">&times;</a>
      <div class="popup">
      <div class="popup2">
        <form>
          <div class="fields">
          <div class="input-field">
            <label for="idNumber">Employee ID Number:</label>
            <input type="text" id="idNumber" name="idNumber" required>
          </div>
          <div class="input-field">
            <label>College</label>
              <select required>
                <option disabled selected>Select College</option>
                <option>College of Agriculture</option>
                <option>College of Teacher Education</option>
                <option>College of Home Economics & Technology</option>
                <option>College of Forestry</option>
                <option>College of Nursing</option>
                <option>College of Veterinary Medicine</option>
                <option>College of Human Kinetics</option>
                <option>College of Public Administration & Governance</option>
                <option>College of Information Sciences</option>
                <option>College of Arts & Humanities</option>
                <option>College of Social Sciences</option>
                <option>College of Numeracy & Applied Sciences</option>
                <option>College of Natural Sciences</option>
              </select>
          </div>
          <div class="input-field">
            <label>Gender</label>
            <select required>
              <option disabled selected>Select gender</option>
              <option>Male</option>
              <option>Female</option>
            </select>
          </div>
          <div class="input-field">
            <label>Last Name</label>
            <input type="text" required>
          </div>
          <div class="input-field">
            <label>First Name</label>
            <input type="text" required>
          </div>
          <div class="input-field">
            <label>Middle Name</label>
            <input type="text" required>
          </div>
          <div class="input-field">
            <label>Contact Number</label>
            <input type="text" required>
          </div>
          <div class="input-field">
            <label>Email</label>
            <input type="text" required>
          </div>
          <div class="input-field">
            <label>Civil Status</label>
            <select required>
              <option disabled selected>Select</option>
              <option>Single</option>
              <option>Married</option>
              <option>Others</option>
            </select>
           </div>
         </div>
        </form>
      </div>
      </div>
      <button>EDIT</button>
    </div>
  </div>
  <div class="overlay" id="divTwo">
    <div class="delete">
    <h3>The student's data will be<u class="Two"> DELETED</u> .</h3>
    <a href="#" class="close">&times;</a>
    <div class="gg">
    <div class="ss">
      <form>
        <h1>Are you sure?</h1>
        <div class="action">
          <a href="#"><button class="yes">Yes</button></a>
          <a href="#"><button class="no">No</button></a>
        </div>
      </form>
    </div>
    </div>
    </div>
    </div>
  </div>           -->
</body>
<script>
var hide = $("#hide");
var show = $("#show");
hide.hide(); 

$(document).ready(function() {
//check if student is available in database
$("#check_stud").on("submit", function (event) {
      event.preventDefault();

      var transact_type = "referral"

      $.ajax({
        type: 'POST',
        url: '../backend/check_student.php',
        data: {
          sid: $("#Sid").val(),
          reason: $("#reason").val()
        },
        success: function (data) {
          alert(data);
          if (data === "Added") {
            // alert(data);
        } else if (data === "Not_added") {
         
          alert("It seems that this student has does not have an account. Please enter his/her details manually for referral");
          hide.show();
          show.hide(); 


          $("#form_transact").submit(function(event) {
                  event.preventDefault(); // Prevent the default form submission
                 
// Get the select element by its ID
                var collegeSelect = document.getElementById("college");

                // Get the selected value
                var selectedCollege = collegeSelect.value;

                // You can now use the selectedCollege variable to access the selected value
                console.log(selectedCollege);
                  $.ajax({
                    
                      type: 'POST',
                      url: '../backend/create_transaction.php',
                      
                      data: {
                          sid: $("#Sid").val(),
                          fname: $("#fname").val(),
                          lname: $("#lname").val(),
                          year_level: $("#yl").val(),
                          gender: $("#gender").val(),
                          course: $("#crse").val(),
                          colleges: $("#college").val(),
                          cn: $("#cn").val(),
                          gp: $("#gp").val(),
                          gpn: $("#gpn").val(),
                          reasons: $("#reason").val()
                          
                      },
                      success: function(data) {
                          alert(data);
                      },
                      error: function(xhr, status, error) {
                          alert("Error2: " + error);
                      }
                  });
              });
          
        }
        },
    error: function (xhr, status, error) {
      alert("Error: " + error);
    }
      });
    });

    function second_form(){
     
    }


    

    // Fetch data using $.ajax
    $.ajax({
        url: '../backend/referred_students.php',
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
            row.append("<td>" + entry.student_id + "</td>");
            row.append("<td>" + entry.last_name+"</td>");
            row.append("<td>" + entry.first_name+"</td>");
            row.append("<td>" + entry.year_level + "</td>");
            row.append("<td>" + entry.course + "</td>");
            row.append("<td>" + entry.college + "</td>");
            row.append("<td>" + entry.contact_number + "</td>");
            row.append("<td>" + entry.refers + "</td>");
            row.append("<td>" + entry.reason + "</td>");
            row.append("<td>" + entry.date + "</td>");
            row.append("<td>" + entry.status + "</td>");
            var statusCell = $("<td></td>");
            var statusLink = $("<a href='#divTwo'><button><i class='ri-delete-bin-6-line'></i></button></a>");

            statusCell.append(statusLink);
            row.append(statusCell);

            tableBody.append(row);
            // Append the row to a table (you should have a reference to the target table, e.g., tableBody or historyTableBody)
         }
         console.log("data",data);
         $('#dynamicTable').DataTable();

    },
    error: function(xhr, status, error) {
        console.error('Error fetching data:', error);
    }
    });

    


    // Function to update the HTML elements
    function updateValues(EmployeeId, college, name, cn, email , gender) {

      const genderImageMap = {
          'Male': 'sp.jpg',
          'Female': 'sp2.jpg'
      };
      const image = document.createElement('img');
        image.style.display = 'block'; // Display the image above the text

        if (gender === 'Male') {
          image.src = genderImageMap['Male'];
        } else if (gender === 'Female') {
          image.src = genderImageMap['Female'];
        }

        $('#EId').text(EmployeeId);
        $('#college').text(college);
        $('#name').text(name);
        $('#cn').text(cn);
        $('#email').text(email);
      
        // Replace the content of the #gender div with the created image
        const genderElement = document.getElementById('gender');
        genderElement.innerHTML = ''; // Clear existing content
        genderElement.appendChild(image);
    }

// Function to fetch data from get_transaction.php
function fetchData() {
console.log('AJAX request started');
$.ajax({
    type: 'GET',
    url: '../backend/get_teacher.php',
    dataType: 'json',
    
        // ...
        success: function (data) {
            if (data.length > 0) {
                  var EmployeeData = data[0]; // Assuming you expect a single row
                    var EmployeeId = EmployeeData.employee_id;
                    var college = EmployeeData.college;
                    var gender = EmployeeData.gender;
                    var name = EmployeeData.last_name + ', '+ EmployeeData.first_name;
                    var cn = EmployeeData.contact_number;
                    var email = EmployeeData.email;
                    // var cs = EmployeeData.civil_status;
                    console.log("ID: ", gender);

                    updateValues(EmployeeId, college, name, cn, email, gender);

                } else {
                // Handle the case when no results are found
                // You can update the UI as needed
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
fetchData();


  });

</script>
</html>
</span>