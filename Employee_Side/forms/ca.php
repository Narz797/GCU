<?php
session_start();
include '../../backend/log_audit2.php';
// include '../backend/validate_user.php';
// include '../backend/connect_database.php';
  // Check if the session variable is empty
  if (empty($_SESSION['session_id'])) {
    // Redirect to the desired location
    echo "<script>alert('You have already Logged out. You will be redirected.'); window.location.href = 'http://localhost/GCU/home';</script>";
    
    exit; // Make sure to exit the script after a header redirect
  }

  
  $id = $_SESSION['stud_id'];
  $tran = $_SESSION['tran_id'];
  $form=$_SESSION['form_type'];

  logAudit($_SESSION['session_id'], 'access_'.$form=$_SESSION['form_type'].' form', $_SESSION['session_id'] .' has accessed the wds form of'. $id);

  echo '<script>
  console.log("clicked, ' . $id . '");
  console.log("clicked, ' . $tran . '");
  console.log("clicked, ' . $form . '");
  </script>';
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Slip</title>
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../assets/css/slips2.css">

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
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
                    <a href="../subpage/ca_page.php" class="list-link current1">Back</a>
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
    <!-- Management-area -->
<section class="management-area">
    <div class="management-area-container d-grid">
        <div class="card">
            <header class="card-header header-side">
                <h2 class="title">Student Information</h2>
                <small>Date is <u><?php echo date('F j, Y'); ?></u></small>
            </header>
            <hr>
            <div class="info">
                <p>Student ID No.</p><h3 id="id_no">20002213</h3>
                <p>Name of Student</p><h3 id="name">Narz Taquio</h3>
                <p>Course & Year Level</p><h3 id="ys">BSIT 4th Year</h3>
                <p>Sex</p><h3 id="gender">Male</h3>
                <p>Contact Number</p><h3 id="cn">0909-0909-090</h3>
                <p>Guardian/Parent</p><h3 id="pgname">Layla Taquio</h3>
                <p>Contact Number of Guardian/Parent</p><h3 id="pgn">0909-0909-090</h3>
            </div>
        </div>
        <div class="card-group d-grid">
            <div class="card border one">
                <div>
                    <h2 class="title"> Reason/s for being Absent/Tardy:</h2>
                </div>
                <div class="main-box">
                <div class="box">
                  <p class="card-description" id="reason">Those actually got pretty long. Not the longest, but still pretty long. I hope this one won't get lost somehow. Anyways, let's talk about WAFFLES! I like waffles. Waffles are cool. Waffles is a funny word. There's a Teen Titans Go episode called "Waffles" where the word "Waffles" is said a hundred-something times. It's pretty annoying. There's also a Teen Titans Go episode about Pig Latin. Don't know what Pig Latin is? It's a language where you take all the consonants before the first vowel, move them to the end, and add '-ay' to the end. If the word begins with a vowel, you just add '-way' to the end. For example, "Waffles" becomes "Afflesway". I've been speaking Pig Latin fluently since the fourth grade, so it surprised me when I saw the episode for the first time. I speak Pig Latin with my sister sometimes. It's pretty fun. I like speaking it in public so that everyone around us gets confused. That's never actually happened before, but if it ever does, 'twill be pretty funny. By the way, "'twill" is a word I invented recently, and it's a contraction of "it will". I really hope it gains popularity in the near future, because "'twill" is WAY more fun than saying "it'll". "It'll" is too boring. Nobody likes boring. This is nowhere near being the longest text ever, but eventually it will be! I might still be writing this a decade later, who knows? But right now, it's not very long. </p>
                  <div class="center-attached">
                  <!-- <img src="" title="No Attached Document" id="attachment1"> -->
                  <div id="attachmentContainer"></div>

                  <!-- <img src="" title="No Attached Document" id="attachment2">
                  <img src="" title="No Attached Document" id="attachment3"> -->
                  </div>
                </div>
                </div>
                <div>
                  <h2 class="title" id="DAT"> Dates Absent/Tardy:</h2>
                  <!-- <p class="card-description refer">Counseling</p>
                  <p class="card-description refer">Academic Deficiency/ies</p>
                  <p class="card-description refer">Absent on October 5 - 8, 2025</p>
                  <p class="card-description refer">Tardy on October 5, 2025</p> -->
                  <p class="card-description refer" id="dates">Counseling</p>
                  
                  <br>
                  <h2 class="title" id="cause">Couse/s of absence:</h2>
                  <h3 id="COA"><b>COA</b></h3>
                  <p class="card-description refer" id="specs">Counseling</p>
                </div>
                <div>
                  <h2 class="title" id="TR">Remarks</h2>
                  <!-- <p class="card-description refer">Counseling</p>
                  <p class="card-description refer">Academic Deficiency/ies</p>
                  <p class="card-description refer">Absent on October 5 - 8, 2025</p>
                  <p class="card-description refer">Tardy on October 5, 2025</p> -->
                  <p class="card-description refer" id="rem">Remarks</p>
                </div>
                <div class="action">
                 <button class="yes" onclick="status_update('Excused')">Excused</button>
                 <button class="no" onclick="status_update('Unexcused')">Unexcused</button>
                 <button class="pending" onclick="status_update('Lacking')">Lacking</button>
                 </div>
            </div>
        </div>
    </div>
</section>
<br>

    <!-- Script     -->
<script src="../assets/main.js"></script>
<script>
    var tid;
    var sid;
    var date;
    var rsn;
    var ext;
    var eID = "<?php echo $_SESSION['session_id'];?>";
    var frm = "<?php echo $form=$_SESSION['form_type'];?>";

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
    window.location.href = '../subpage/archive.php';
        }

        function updateValues(id, fname, lname, email, year_level, course, gender, cn, pgn, pgname, reason, coa, specs, rem, AOT) {

                $('#id_no').text(id);//
                $('#name').text(fname+ ' '+ lname);//
                $('#ys').text(course+ ' '+year_level);//
                $('#gender').text(gender);//
                $('#cn').text(cn);//
                $('#pgname').text(pgname);//
                $('#pgn').text(pgn);//
                $('#reason').text(reason);//
                $('#dates').text(AOT);
                $('#COA').text(coa);
                $('#specs').text(specs);
                $('#rem').text(rem);


                            // Function to convert date strings to Date objects with format "MM/DD/YYYY"
            function convertToDate(dateString) {
                var parts = dateString.split('/');
                return new Date(parts[2], parts[1] - 1, parts[0]);
            } 
 
                // Split the date_AT string at every comma
                var dateArray = AOT.split(',');

                // Convert the date strings to Date objects
                var dateObjects = dateArray.map(convertToDate);

                // Format the dates with month names
                var formattedDates = dateObjects.map(dateObject =>
                    dateObject.toLocaleDateString('en-US', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    })
                );

                // Join the formatted dates with <br> tags
                var formattedDateText = formattedDates.join('<br>');

                // Set the HTML content of the element with id 'dates'
                $('#dates').html(formattedDateText);



}
function fetchData() {
console.log('AJAX request started');
console.log('<?php echo $form?>');
$.ajax({
type: 'GET',
url: '../../backend/get_form.php',
dataType: 'json',
success: function (data) {
if (data.length > 0) {
    var studentData = data[0]; // Assuming you expect a single row

    // gets attachaments
    for (var key in studentData) {
                if (studentData.hasOwnProperty(key) && !key.startsWith('attachment')) {
                    var element = document.getElementById(key);
                    if (element) {
                        element.innerText = studentData[key];
                    }
                }
            }

    // 
    var id = studentData.stud_user_id;
    sid = studentData.stud_user_id;
    tid = studentData.transact_id;
    var fname = studentData.first_name;
    var lname = studentData.last_name;
    var email = studentData.email;
    var year_level = studentData.Year_level;
    var course = studentData.course;
    var gender = studentData.gender;
    var cn = studentData.Contact_number;
    var pgn = studentData.ParentGuardianNumber;
    var pgname = studentData.ParentGuardianName;
    date = studentData.date_of_AbsentOrTardy;
    var reason = studentData.reason;
    rsn = studentData.reason;
    ext =studentData.file_extension;
    var att1 = studentData.attachment1;
    var coa = studentData.COA;
    var specs = studentData.specifics;
    var rem = studentData.remarks;
    var AOT = studentData.date_of_AbsentOrTardy;
    console.log(fname);
    updateValues(id, fname, lname, email, year_level, course, gender, cn, pgn, pgname, reason, coa, specs, rem, AOT);

    // Display the blob data as images
    displayBlobFiles(studentData); // Pass the image data and an element ID

    if (rem !== undefined && rem !== null && rem.trim() !== "") {
                    // The variable 'rem' has a non-empty value
                    console.log("Variable 'rem' has a non-empty value:", rem);

                } else {
                    // The variable 'rem' is either undefined, null, or an empty string
                    console.log("Variable 'rem' is either undefined, null, or an empty string.");
                    $('#TR').hide();
                }
                if (AOT !== undefined && AOT !== null && AOT.trim() !== "") {
                    // The variable 'rem' has a non-empty value
                    console.log("Variable 'AOT' has a non-empty value:", AOT);
                } else {
                    // The variable 'rem' is either undefined, null, or an empty string
                    console.log("Variable 'AOT' is either undefined, null, or an empty string.");
                    $('#DAT').hide();
                    $('#dates').hide();
                }
                if (specs !== undefined && AOT !== null && specs.trim() !== "") {
                    // The variable 'rem' has a non-empty value
                    console.log("Variable 'Specs' has a non-empty value:", specs);
                } else {
                    // The variable 'rem' is either undefined, null, or an empty string
                    console.log("Variable 'Specs' is either undefined, null, or an empty string.");
                    $('#specs').hide();
                  
                }  if (coa !== undefined && AOT !== null && coa.trim() !== "") {
                    // The variable 'rem' has a non-empty value
                    console.log("Variable 'coa' has a non-empty value:", coa);
                } else {
                    // The variable 'rem' is either undefined, null, or an empty string
                    console.log("Variable 'coa' is either undefined, null, or an empty string.");
                    $('#cause').hide();
                  
                }
  
} else {
    // Handle the case when no results are found
    console.log('No results found', data);
}
},
error: function (xhr, status, error) {
console.error('Error: ' + error);
console.error('Status: ' + status);
console.error('Response: ' + xhr.responseText);
}
});

function displayBlobFiles(studentData) {
    const attachmentContainer = document.getElementById('attachmentContainer');

    attachmentContainer.addEventListener('click', function (event) {
        const target = event.target;

        // Check if the clicked element is a download link
        if (target.tagName === 'A') {
            // Prevent the default link behavior
            event.preventDefault();

            // Trigger the download
            const downloadLink = target;
            const clickEvent = new MouseEvent('click', {
                bubbles: false,
                cancelable: false,
                view: window
            });

            downloadLink.dispatchEvent(clickEvent);
        }
    });

    for (var key in studentData) {
        if (studentData.hasOwnProperty(key) && key.startsWith('attachment')) {
            const downloadLink = document.createElement('a');
            downloadLink.innerText = 'Download ' + key; // Text for the download link

            const fileExtension = ext; // Assuming 'ext' contains the file extension

            let contentType = 'application/octet-stream'; // Default content type

            switch (fileExtension) {
                case 'jpg':
                case 'jpeg':
                    contentType = 'image/jpeg';
                    break;
                case 'png':
                    contentType = 'image/png';
                    break;
                case 'pdf':
                    contentType = 'application/pdf';
                    break;
                case 'docx':
                    contentType = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
                    break;
                case 'zip':
                    contentType = 'application/zip';
                    break;
                case 'rar':
                    contentType = 'application/x-rar-compressed';
                    break;
                // Add more cases for other file types (e.g., docx, txt, etc.)
                default:
                    break;
            }

            // Set the content type and file content for download
            downloadLink.href = 'data:' + contentType + ';base64,' + studentData[key];
            downloadLink.download = 'file.' + fileExtension; // Set the download attribute

            attachmentContainer.appendChild(downloadLink);
            attachmentContainer.appendChild(document.createElement('br')); // Line break for better separation
        }
    }
}
                


}

function status_update(status){
    // update status to pendig here
    console.log("Updating status");
    $.ajax({
  type: 'POST',
  url: '../../backend/update_forms/update_ca.php',
  data: {
    stat: status,
    id: sid,
    tid: tid,
    dte: date,
    rsn: rsn
  },
  success: function (data) {
    console.log("Remarked:", data);
    window.location.href = "../subpage/ca_page.php";
    $.ajax({
                    type: 'POST',
                    url: '../../backend/log_audit.php',
                    data: {
                    userId: eID,
                    action: 'update '+frm +' status',
                    details: eID + ' updated '+frm +' status to ' + status
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
fetchData();
</script>   
</body>
</html>