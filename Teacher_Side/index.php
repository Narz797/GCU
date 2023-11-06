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

      <img src="sp2.jpg">
      <h6>111000111</h6>
      <h4>Monkey Dulagan Luffy</h4>
      <p>College of Information Sciences</p>
      <div class="per">
      <table>
        <tr>
        <td><span>000-000-0000</span></td>
        <td><span>strawhatluffy@pirate.com</span></td>
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
        <div class="flex">
        <div class="form">
          <label for="#">Student's First Name:</label>
          <input type="text" id="#" name="#" required>
        </div>
        <div class="form">
          <label for="#">Student's Middle Name:</label>
          <input type="text" id="#" name="#" required>
        </div>
        <div class="form">
          <label for="#">Student's Last Name:</label>
          <input type="text" id="#" name="#" required>
        </div>
        <div class="form">
          <label for="#">Year/Level:</label>
          <input type="text" id="#" name="#" required>
        </div>
        </div>
        <div class="flex">
        <div class="form1">
          <label>Gender:</label>
          <select required>
            <option disabled selected>Select gender</option>
            <option>Male</option>
            <option>Female</option>
          </select>
        </div>
        <div class="form1">
          <label for="#">College:</label>
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
        <div class="form1">
          <label>Reason:</label>
          <select required>
            <option disabled selected>Select reason for referral</option>
            <option>Academic Deficiency/ies</option>
            <option>Absent</option>
            <option>Tardy</option>
          </select>
        </div>
          <a href="#"><button>REFER</button></a>
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
          <th>Full Name</th>
          <th>College</th>
          <th>Year/Level</th>
          <th>Gender</th>
          <th>Reason</th>
          <th>Date</th>

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

  <div class="overlay" id="divOne">
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
  </div>          
</body>
<script>
  $(document).ready(function() {
    

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
                    row.append("<td>" + entry.full_name+"</td>");
                    row.append("<td>" + entry.college + "</td>");
                    row.append("<td>" + entry.year_level + "</td>");
                    row.append("<td>" + entry.gender + "</td>");
                    row.append("<td>" + entry.reason + "</td>");
                    row.append("<td>" + entry.date + "</td>");
                    var statusCell = $("<td></td>");
                    var statusLink = $("<a href='#divTwo'><button><i class='ri-delete-bin-6-line'></i></button></a>");

                    statusCell.append(statusLink);
                    row.append(statusCell);

                    tableBody.append(row);
                    // Append the row to a table (you should have a reference to the target table, e.g., tableBody or historyTableBody)
                 }
                 console.log("data",data);
                 $('#dynamicTable').DataTable();
                // var dynamicTableRowCount1 = $("#dynamicTable tbody tr").length;
                // var noHistoryMessage1 = $("#noHistoryMessage1"); 
                //     if (dynamicTableRowCount1 > 0) {
                //     noHistoryMessage1.hide(); // Hide the no history message if there is data
                //     } else {
                //         noHistoryMessage1.show(); // Show the no history message if no data
                //     }
                    // Initial table population
                    // filterData();

                    // Add Sorting Event Listeners
                // const table_rows = document.querySelectorAll('#dynamicTable tbody tr');
                // const tableHeadings = document.querySelectorAll('#dynamicTable th');
                // tableHeadings.forEach((head, i) => {
                //     let sort_asc = true;
                //     head.onclick = () => {
                //         head.classList.toggle('asc', sort_asc);
                //         sort_asc = head.classList.contains('asc') ? false : true;
                //         sortTable(i, sort_asc);
                //     };
                // });
                //     // Sorting Function
                // function sortTable(column, sort_asc) {
                //     [...table_rows].sort((a, b) => {
                //         let first_row = a.querySelectorAll('td')[column].textContent.toLowerCase();
                //         let second_row = b.querySelectorAll('td')[column].textContent.toLowerCase();
                //         return sort_asc ? (first_row < second_row ? 1 : -1) : (first_row < second_row ? -1 : 1);
                //     })
                //     .map(sorted_row => document.querySelector('tbody').appendChild(sorted_row));
                // }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
            });

            
        });

</script>
</html>
</span>