<?php
include("../backend/connect_database.php");

session_start();
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
$_SESSION['origin'] = 'Student';

$personal = $pdo->prepare("SELECT * FROM `student_user` WHERE  `stud_user_id` = :id");
$personal->bindParam(':id', $id, PDO::PARAM_INT);
$personal->execute();
$pers_info = $personal->fetchAll();

$father = $pdo->prepare("SELECT * FROM `father` WHERE  `stud_user_id` = :id");
$father->bindParam(':id', $id, PDO::PARAM_INT);
$father->execute();
$father_info = $father->fetchAll();

$mother = $pdo->prepare("SELECT * FROM `mother` WHERE  `stud_user_id` = :id");
$mother->bindParam(':id', $id, PDO::PARAM_INT);
$mother->execute();
$mother_info = $mother->fetchAll();

$guardian = $pdo->prepare("SELECT * FROM `guardian` WHERE  `stud_user_id` = :id");
$guardian->bindParam(':id', $id, PDO::PARAM_INT);
$guardian->execute();
$guardian_info = $guardian->fetchAll();

if (empty($guardian_info)) {
  echo '<style>#guardian { display: none; }</style>';
}
if (empty($father_info) && empty($mother_info)) {
  echo '<style>#parents { display: none; }</style>';
}

$senschool = $pdo->prepare("SELECT * FROM `senior_highschool` WHERE  `stud_user_id` = :id");
$senschool->bindParam(':id', $id, PDO::PARAM_INT);
$senschool->execute();
$senschool_info = $senschool->fetchAll();

$junschool = $pdo->prepare("SELECT * FROM `junior_highschool` WHERE  `stud_user_id` = :id");
$junschool->bindParam(':id', $id, PDO::PARAM_INT);
$junschool->execute();
$junschool_info = $junschool->fetchAll();

$elemschool = $pdo->prepare("SELECT * FROM `elementary_school` WHERE  `stud_user_id` = :id");
$elemschool->bindParam(':id', $id, PDO::PARAM_INT);
$elemschool->execute();
$elemschool_info = $elemschool->fetchAll();

$othschool = $pdo->prepare("SELECT * FROM `elementary_school` WHERE  `stud_user_id` = :id");
$othschool->bindParam(':id', $id, PDO::PARAM_INT);
$othschool->execute();
$othschool_info = $othschool->fetchAll();

if (empty($othschool_info)) {
  echo '<style>#otherschool { display: none; }</style>';
}

$othinfo = $pdo->prepare("SELECT * FROM `other_info` WHERE  `stud_user_id` = :id");
$othinfo->bindParam(':id', $id, PDO::PARAM_INT);
$othinfo->execute();
$oth_info = $othinfo->fetchAll();
$source = $oth_info[0]['source'];

$checkedOption1 = (in_array('Parents', explode(', ', $source))) ? 'checked' : '';
$checkedOption2 = (in_array('Self', explode(', ', $source))) ? 'checked' : '';
$checkedOption3 = (in_array('Relatives', explode(', ', $source))) ? 'checked' : '';
$checkedOption4 = (in_array('Scholarship', explode(', ', $source))) ? 'checked' : '';
$checkedOption5 = (in_array('Others', explode(', ', $source))) ? 'checked' : '';

$maritalStatus = $pers_info[0]['Marital_status_of_parents'];

$checkmarital1 = ($maritalStatus == 'married') ? 'checked' : '';
$checkmarital2 = ($maritalStatus == 'annulled') ? 'checked' : '';
$checkmarital3 = ($maritalStatus == 'livingTogether') ? 'checked' : '';
$checkmarital4 = ($maritalStatus == 'singleParent') ? 'checked' : '';
$checkmarital5 = ($maritalStatus == 'separated') ? 'checked' : '';
$checkmarital6 = ($maritalStatus == 'widowWidower') ? 'checked' : '';

$siblings = $pdo->prepare("SELECT * FROM `siblings` WHERE  `studentID` = :id");
$siblings->bindParam(':id', $id, PDO::PARAM_INT);
$siblings->execute();
$siblings = $siblings->fetchAll();

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
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Stylesheet -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="../assets/img/GCU_logo.png" rel="icon">
  <link rel="stylesheet" href="assets/css/editprofile.css">
  <link rel="stylesheet" href="assets/stud_prof.css">
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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
                    <a href="./appointment.php" class="list-link current1">Schedule an Appointment</a>
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
            <button class="icon-btn place-items-center" onclick="edit()">
              <i class="ri-edit-2-fill"></i>
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

<body>
  <div class="independent-title1">
        <h2>MY PROFILE</h2>
    </div>

 
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">

            <div class="card-body pt-0 pt-md-4">
         

              <div class="text-center">
        

                <?php

                $stmt = $pdo->prepare("SELECT * FROM photos WHERE stud_user_id = :id");
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();

                $photo = $stmt->fetch(PDO::FETCH_ASSOC);
                echo '<img src="data:' . $photo['sign_type'] . ';base64,' . base64_encode($photo['sign']) . '" alt="id" style="width: 100%; height: auto;">';

                ?>


                <br>
                <hr style=" border-width: 3px; background-color:black;">
                <br>
                <?php

                $stmt = $pdo->prepare("SELECT * FROM photos WHERE stud_user_id = :id");
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();

                $photo = $stmt->fetch(PDO::FETCH_ASSOC);
                echo '<img src="data:' . $photo['image_type'] . ';base64,' . base64_encode($photo['id']) . '" alt="id" style="width: 100%; height: auto;">';


                ?>

              </div>
            </div>
          </div>


        </div>


        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
   
            <div class="card-body" style="background-color:lightgray;">
              <form id ="myForm" style="width: 100%;">

                <h6 class="heading-small text-muted mb-4" style="color:black; font-weight:bold;">User Information </h6>
                <div class="pl-lg-4">
                 
                    <div class="col-lg-6" style="width:90px; padding:0; ">
                      <div class="form-group focused id1" >
                        <label class="form-control-label" for="input-username" id="stud_id" >ID No.</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" id="id" readonly value =  "<?php echo $pers_info[0]['stud_user_id'] ?>">
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="email">Email</label>
                        <input type="email"  class="form-control form-control-alternative" id="email" readonly value =  "<?php echo $pers_info[0]['email'] ?>">
                      </div>
                    </div>

                    <div class="col-lg-6" id="ps">
                      <div class="form-group">
                        <label class="form-control-label" for="pass">Password</label>
                        <input type="password"  class="form-control form-control-alternative" id="pass" style="border:2px solid yellow; padding: 1rem 0.75rem; height:auto;">
                        <i class="fas fa-eye" onclick="togglePasswordVisibility('pass')"></i>
                      </div>
                    </div>

                    <div class="col-lg-6" id="ps2">
                      <div class="form-group">
                        <label class="form-control-label" for="pass">Verify Password</label>
                        <input type="password"  class="form-control form-control-alternative" id="pass2"  style="border:2px solid yellow; padding: 1rem 0.75rem; height:auto;">
                        <i class="fas fa-eye" onclick="togglePasswordVisibility('pass2')"></i>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Last Name</label>
                        <input type="text" id="input-email" class="form-control form-control-alternative" id="lname" readonly value =  "<?php echo $pers_info[0]['last_name'] ?>">
                      </div>
                    </div>
      
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First Name</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" id="fname" readonly value =  "<?php echo $pers_info[0]['first_name'] ?>">
                      </div>
                    </div>
                    
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Middle Name</label>
                        <input type="text" class="form-control form-control-alternative" id="mname" readonly value =  "<?php echo $pers_info[0]['middle_name'] ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Course</label>
                        <select name='course' class="form-control form-control-alternative" id="crse" disabled>
                                <option disabled selected><?php echo $pers_info[0]['course']; ?></option>
                                <option value='BSAB'>Bachelor of Science in Agribusiness</option>
                                <option value='BSA'>Bachelor of Science in Agriculture</option>
                                <option value='BA Comm'>Bachelor of Arts in Communication</option>
                                <option value='BAEL'>Bachelor of Arts in English Language</option>
                                <option value='BAFL'>Bachelor of Arts in Filipino Language</option>
                                <option value='BSABE'>Bachelor of Science in Agriculture and Biosystems Engineering</option>
                                <option value='BSCE'>Bachelor of Science in Civil Engineering</option>
                                <option value='BSEE'>Bachelor of Science in Electrical Engineering</option>
                                <option value='BSIE'>Bachelor of Science in Industrial Engineering</option>
                                <option value='BSF'>Bachelor of Science in Forestry</option>
                                <option value='BSET'>Bachelor of Science in Entrepreneurship</option>
                                <option value='BSFT'>Bachelor of Science in Food Technology</option>
                                <option value='BSHM'>Bachelor of Science in Hospitality Management</option>
                                <option value='BSND'>Bachelor of Science in Nutrition and Dietetics</option>
                                <option value='BSTM'>Bachelor of Science in Tourism Management</option>
                                <option value='BPeD'>Bachelor of Physical Education</option>
                                <option value='BSESS'>Bachelor of Science in Exercise and Sports Sciences</option>
                                <option value='BLIS'>Bachelor in Library and Information Sciences</option>
                                <option value='BSDC'>Bachelor of Science in Development Communication</option>
                                <option value='BSIT'>Bachelor of Science in Information Technology</option>
                                <option value='BS Bio'>Bachelor of Science in Biology</option>
                                <option value='BS Chem'>Bachelor of Science in Chemistry</option>
                                <option value='BSES'>Bachelor of Science in Environmental Science</option>
                                <option value='BS Math'>Bachelor of Science in Mathematics</option>
                                <option value='BSS'>Bachelor of Science in Statistics</option>
                                <option value='BSN'>Bachelor of Science in Nursing</option>
                                <option value='BPA'>Bachelor of Public Administration</option>
                                <option value='BS Psych'>Bachelor of Science in Psychology</option>
                                <option value='BECED'>Bachelor of Early Childhood Education</option>
                                <option value='BEED'>Bachelor of Elementary Education</option>
                                <option value='BSED'>Bachelor of Secondary Education</option>
                                <option value='BTLED'>Bachelor of Technology and Livelihood Education</option>
                                <option value='DVM'>Doctor of Veterinary Medicine</option>
                                <option value='BA Hist'>Bachelor of Arts in History</option>
                            </select>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Year Level</label>
                        <select class="form-control form-control-alternative" name='year_level' id="YL" disabled>
                                <option disabled selected><?php echo $pers_info[0]['Year_level']; ?></option>
                                <option value='1'>1st</option>
                                <option value='2'>2nd</option>
                                <option value='3'>3rd</option>
                                <option value='4'>4th</option>
                                <option value='5'>5th</option>
                                <option value='6'>6th</option>
                            </select>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Section</label>
                        <input type="text" class="form-control form-control-alternative" id="sec" readonly value =  "<?php echo $pers_info[0]['Section'] ?>" oninput="limitToSingleCharacter(event)">
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Contact Number</label>
                        <input type="number" class="form-control form-control-alternative" id="CN" readonly value =  "<?php echo $pers_info[0]['Contact_number'] ?>" oninput="limitTo11Digits(event)">
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Civil Status</label>

                        <select class="form-control form-control-alternative" id="CS"  name='civil_status' disabled>
                                <option disabled selected><?php echo $pers_info[0]['Civil_status'];?></option>
                                <option>Single</option>
                                <option>Married</option>
                                <option>Divorced</option>
                                <option>Widowed</option>
                            </select>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Date of Birth</label>
                        <input type="text" class="form-control form-control-alternative" id="bday" readonly value =  "<?php echo $pers_info[0]['birth_date'] ?>">
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Birthplace</label>
                        <input type="text" class="form-control form-control-alternative" id="bplace" readonly value =  "<?php echo $pers_info[0]['Birth_place'] ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Nationality</label>
                        <input type="text" class="form-control form-control-alternative" id="nationality" readonly value =  "<?php echo $pers_info[0]['Nationality'] ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Languages/Dialects you can read, write, and understand</label>
                        <input type="text" class="form-control form-control-alternative" id="lang" readonly value =  "<?php echo $pers_info[0]['Languages_and_dialects'] ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">House#/St./Brgy./Municipality/Province/Zip Code</label>
                        <input type="text" class="form-control form-control-alternative" id="address" readonly value =  "<?php echo $pers_info[0]['Address'] ?>">
                      </div>
                    </div>

                  </div>
                </div>
                <hr class="my-4">
                <h3>FAMILY BACKGROUND</h3>
                <div id='parents'>
                  <h1 class="heading-small text-muted mb-4">FATHER</h1>



                  <div class="pl-lg-4">


                    <div class="row">

                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-city">Last Name</label>
                          <input type="text" id="flast" class="form-control form-control-alternative" id="Flname" readonly value =  "<?php echo $father_info[0]['lname'] ?>">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-country">First Name</label>
                          <input type="text" id="ffirst" class="form-control form-control-alternative" id="Fnlname" readonly value =  "<?php echo $father_info[0]['fname'] ?>">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country">Middle Name</label>
                          <input type="text" id="fmiddle" class="form-control form-control-alternative" id="Fmname" readonly value =  "<?php echo $father_info[0]['mname'] ?>">
                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-city">Age</label>

                          <input type="number"  class="form-control form-control-alternative" id="Fage" readonly value =  "<?php echo $father_info[0]['age'] ?>">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-country">Occupation</label>
   
                          <input type="text"  class="form-control form-control-alternative" id="Focc" readonly value =  "<?php echo $father_info[0]['occupation'] ?>">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country"> Highest Educational Attainment</label>
                          
                          <input type="text"  class="form-control form-control-alternative" id="Fcol" readonly value =  "<?php echo $father_info[0]['educ_background'] ?>">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country"> Contact Number</label>
      
                          <input type="number"  class="form-control form-control-alternative" id="Fcn" readonly value =  "<?php echo $father_info[0]['contact'] ?>" oninput="limitTo11Digits(event)">
                        </div>
                      </div>

                    </div>
                  </div>

                  <h1 class="heading-small text-muted mb-4">MOTHER</h1>



                  <div class="pl-lg-4">
    
                    <div class="row">

                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-city">Last Name</label>
                          <input type="text"  class="form-control form-control-alternative" id="Mlname" readonly value =  "<?php echo $mother_info[0]['lname'] ?>">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-country">First Name</label>
                          <input type="text"  class="form-control form-control-alternative" id="Mfname" readonly value =  "<?php echo $mother_info[0]['fname'] ?>">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country">Middle Name</label>
                          <input type="text" class="form-control form-control-alternative" id="Mmname" readonly value =  "<?php echo $mother_info[0]['mname'] ?>">
                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-city">Age</label>
    
                          <input type="number"  class="form-control form-control-alternative" id="Mage" readonly value =  "<?php echo $mother_info[0]['age'] ?>">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-country">Occupation</label>
                 
                          <input type="text"  class="form-control form-control-alternative" id="Mocc" readonly value = "<?php echo $mother_info[0]['occupation'] ?>">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country"> Highest Educational Attainment</label>
                          <input type="text"  class="form-control form-control-alternative" id="Mcol" readonly value = "<?php echo $mother_info[0]['educ_background'] ?>">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country"> Contact Number</label>
 
                          <input type="number" class="form-control form-control-alternative" id="Mcn" readonly value = "<?php echo $mother_info[0]['contact'] ?>" oninput="limitTo11Digits(event)">
                        </div>
                      </div>


                    </div>

                  </div>
                </div>

                <div id="guardian">
                  <h1 class="heading-small text-muted mb-4">GUARDIAN</h1>



                  <div class="pl-lg-4">

                    <div class="row">

                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-city">Last Name</label>
                          <input type="text" class="form-control form-control-alternative" id="Glname" readonly value =  "<?php echo $guardian_info[0]['lname'] ?>">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-country">First Name</label>
                          <input type="text"  class="form-control form-control-alternative" id="Gfname" readonly value =  "<?php echo $guardian_info[0]['fname'] ?>">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country">Middle Name</label>
                          <input type="text"  class="form-control form-control-alternative" id="Gmname" readonly value =  "<?php echo $guardian_info[0]['mname'] ?>">
                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-city">Age</label>

                          <input type="number" class="form-control form-control-alternative" id="Gage" readonly value =  "<?php echo $guardian_info[0]['age'] ?>">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-country">Occupation</label>

                          <input type="text"  class="form-control form-control-alternative" id="Gocc" readonly value =  "<?php echo $guardian_info[0]['occupation'] ?>">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country"> Highest Educational Attainment</label>

                          <input type="text"  class="form-control form-control-alternative" id="Gol" readonly value =  "<?php echo $guardian_info[0]['educ_background'] ?>">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country"> Contact Number</label>
       
                          <input type="number"  class="form-control form-control-alternative" id="Gcn" readonly value =  "<?php echo $guardian_info[0]['contact'] ?>" oninput="limitTo11Digits(event)">
                        </div>
                      </div>


                    </div>

                  </div>
                </div>

                <hr class="my-4">
        
                <h6 class="heading-small text-muted mb-4">SIBLINGS</h6>

                <div class="scrollable-table">
                <table id="customers">
                  <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Age</th>
                    <th>Highest Educational Attainment</th>
                    <th>Civil Status</th>

                  </tr>
                  <?php
                  foreach ($siblings as $row) {
                    echo "<tr>";
                    echo "<td>{$row['lastName']}</td>";
                    echo "<td>{$row['firstName']}</td>";
                    echo "<td>{$row['middleName']}</td>";
                    echo "<td>{$row['age']}</td>";
                    echo "<td>{$row['highEdu']}</td>";
                    echo "<td>{$row['civilStatus']}</td>";
                    echo "</tr>";
                  }
                  ?>
                </table>
                </div>

                <hr class="my-4">
              
                <h3>EDUCATIONAL BACKGROUND</h3>
                <h6 class="heading-small text-muted mb-4">SENIOR HIGHSCHOOL</h6>


                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Name of the School</label>
                        <input    type="text" id="s_name" class="form-control form-control-alternative" id="sen_school" readonly value =  "<?php echo $senschool_info[0]['school_name'] ?>">
                      </div>
                    </div>

                    <div class="col-lg-6" >
                      <div class="form-group id">
                        <label class="form-control-label" for="input-email">Year Graduated</label>
                        <input    type="text" id="y_grad" class="form-control form-control-alternative" id="sen_school_yg" readonly value =  "<?php echo $senschool_info[0]['year'] ?>">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-email">Awards Received</label>
                    <input    id="award" class="form-control form-control-alternative" id="sen_school_awards" readonly value =  "<?php echo $senschool_info[0]['awards'] ?>">

                  </div>
                </div>
                <h6 class="heading-small text-muted mb-4">JUNIOR HIGHSCHOOL</h6>


                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Name of the School</label>
                        <input    type="text" id="s_name" class="form-control form-control-alternative" id="jun_school" readonly value =  "<?php echo $junschool_info[0]['school_name'] ?>">
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group id">
                        <label class="form-control-label" for="input-email">Year Graduated</label>
                        <input    type="text" id="y_grad" class="form-control form-control-alternative" id="jun_school_yg" readonly value =  "<?php echo $junschool_info[0]['year'] ?>">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-email">Awards Received</label>
                    <input    id="award" class="form-control form-control-alternative" id="jun_school_awards" readonly value =  "<?php echo $junschool_info[0]['awards'] ?>">

                  </div>
                </div>

                <h6 class="heading-small text-muted mb-4">ELEMENTARY</h6>


                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Name of the School</label>
                        <input    type="text" id="s_name" class="form-control form-control-alternative" id="elm_school" readonly value =  "<?php echo $elemschool_info[0]['school_name'] ?>">
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group id">
                        <label class="form-control-label" for="input-email">Year Graduated</label>
                        <input    type="text" id="y_grad" class="form-control form-control-alternative" id="elm_school_yg" readonly value =  "<?php echo $elemschool_info[0]['year'] ?>">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-email">Awards Received</label>
                    <input    id="award" class="form-control form-control-alternative" id="elm_school_awards" readonly value =  "<?php echo $elemschool_info[0]['awards'] ?>">

                  </div>
                </div>
                <div id="otherschool">
                  <h6 class="heading-small text-muted mb-4">OTHER SCHOOL ATTENDED</h6>


                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-username">Name of the School</label>
                          <input    type="text" id="s_name" class="form-control form-control-alternative" id="oth_school" readonly value =  "<?php echo $othschool_info[0]['school_name'] ?>">
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group id">
                          <label class="form-control-label" for="input-email">Year Graduated</label>
                          <input    type="text" id="y_grad" class="form-control form-control-alternative" id="oth_school_yg" readonly value =  "<?php echo $othschool_info[0]['year'] ?>">
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="pl-lg-4">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-email">Awards Received</label>
                      <input    id="award" class="form-control form-control-alternative" id="oth_school_awards" readonly value =  "<?php echo $othschool_info[0]['awards'] ?>">

                    </div>
                  </div>

                </div>

                <hr class="my-4">
                <!-- Description -->
                <p style="color:black; font-weight:bold;"><b>In view of the Indigenous People's Act (RA 8371), Magna Carta for
                    Persons with Disability (RA 7277, as amended by RA 9442), the (c) Solo Parents
                    Welfare Act of 2000 (RA 8972), and CHED Memorandum Order 9 s.2013, please answer
                    the following items:</b></p>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Are you a member of an Indigenous group?</label>
                        <input type="text" id="indige" class="form-control form-control-alternative" readonly value="<?php echo $pers_info[0]['IG'] ?>  <?php echo $pers_info[0]['specificIG'] ?>">

                

                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Are you a person with a disability (PWD)?</label>
                        <input type="text" id="pwd" class="form-control form-control-alternative" id="pwd" readonly value =  "<?php echo $pers_info[0]['PWD'] ?>">
                      </div>
                    </div>
                
                

                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">Are you a student parent?</label>
                    <input type="text" id="stud_parent" class="form-control form-control-alternative" id="sp" readonly value =  "<?php echo $pers_info[0]['Student_parent'] ?>">
                  </div>
                </div>

                </div>
                </div>
                
            </div>
          </div>


          <hr class="my-4">
          <!-- Description -->

          <h3 class="heading-small " style="color:black; font-weight: bold">SOURCES OF FINANCIAL SUPPORT</h3>


          <input type="checkbox" id="FS_parent" value="Parents" disabled <?php echo $checkedOption1 ?>>

          <label for="checkbox1" class="custom-checkbox-label">Parent</label>
          <br>

          <input type="checkbox" id="FS_ss" value="Self" disabled <?php echo $checkedOption2; ?>>

          <label for="checkbox2">Self Supporting</label>
          <br>

          <input type="checkbox" id="FS_rg" value="Relatives" disabled <?php echo $checkedOption3; ?>>
    
          <label for="checkbox3">Relative and/or Guardian</label>
          <br>

          <input type="checkbox" id="FS_sch" onchange="toggleInput('FS_sch', 'FS_sch2')" value="Scholarship" disabled <?php echo $checkedOption4; ?>>
 
          <label for="checkbox4">Scholarship - <input id="FS_sch2"  readonly value="<?php if ($oth_info[0]['specific_scholar']) {
                                                                    echo $oth_info[0]['specific_scholar'];
                                                                  } ?>"></label>
          <br>

          <input type="checkbox" id="FS_oth" onchange="toggleInput('FS_oth', 'FS_oth2')" value="Others" disabled <?php echo $checkedOption5; ?>>
 
          <label for="checkbox5">Others - <input id="FS_oth2"  readonly value="<?php if ($oth_info[0]['specific_other']) {
                                                                echo $oth_info[0]['specific_other'];
                                                              } ?>"></label>


          <hr class="my-4">
   
          <h6 class="heading-small" style="color:black; font-weight: bold">MARITAL STATUS OF PARENT</h6>


          <input type="radio" name="MS" id="MS_pam" value="married" disabled <?php echo $checkmarital1; ?>>
          <label for="checkbox1" class="custom-checkbox-label">Parents are married.</label>
          <br>
          <input type="radio" name="MS" id="MS_mla" value="annulled" disabled <?php echo $checkmarital2; ?>>
          <label for="checkbox1" class="custom-checkbox-label">Marriage is legally annulled.</label>
          <br>
          <input type="radio" name="MS" id="MS_notm" value="livingTogether" disabled <?php echo $checkmarital3; ?>>
          <label for="checkbox1" class="custom-checkbox-label">Parents are not married but are living together.</label>
          <br>
          <input type="radio" name="MS" id="MS_sp" value="singleParent" disabled <?php echo $checkmarital4; ?>>
          <label for="checkbox1" class="custom-checkbox-label">Single Parent.</label>
          <br>
          <div class="checkbox-container">
          <input type="radio" name="MS" id="MS_ps" value="separated" disabled <?php echo $checkmarital5; ?>>
          <label for="checkbox1" class="custom-checkbox-label">Parents are separated (one or both have other partners).</label>
          </div>
          <input type="radio" name="MS" id="MS_wid" value="widow" disabled <?php echo $checkmarital6; ?>>
          <label for="checkbox1" class="custom-checkbox-label">Widow/widower.</label>



          <hr class="my-4">

          <h6 class="heading-small" style="color:black; font-weight: bold">More About Me</h6>
          <div class="pl-lg-4">
            <div class="form-group focused ok">

              <label>1. The three words that describe me are </label>
              <span id="MAM_ans1"><?php echo $oth_info[0]['first'] ?>, </span>
              <span id="MAM_ans2"><?php echo $oth_info[0]['second'] ?>, </span>
              <span id="MAM_ans3"><?php echo $oth_info[0]['third'] ?>.</span>


              <br>

              <label>2. My father is </label>
              <span id="MAM_fat"><?php echo $oth_info[0]['Fis'] ?>.</span>


              <br>
              <label>3. My mother is </label>
              <span id="MAM_mom"><?php echo $oth_info[0]['Mis'] ?>.</span>


              <br>
              <label>4. The sibling (kapatid) I am closest to is my </label>
              <span id="MAM_sib_ans"><?php echo $oth_info[0]['kapatid'] ?></span>
              <label id="MAM_sib_bec">because</label>
              <span id="MAM_sib_ans2"><?php echo $oth_info[0]['kap_res'] ?>.</span>

              <br>
              <label>5. When I think about my family I feel </label>
              <span id="MAM_think"><?php echo $oth_info[0]['abtFam'] ?>.</span>

              <br>
              <label>6. When I was a child, I </label>
              <span id="MAM_child"><?php echo $oth_info[0]['whenChild'] ?>.</span>

              <br>
              <label>7. In school, my teachers are </label>
              <span id="MAM_school"><?php echo $oth_info[0]['teachAre'] ?>.</span>

              <br>
              <label>8. My friends don't know that </label>
              <span id="MAM_dunno"><?php echo $oth_info[0]['friendsDuno'] ?>.</span>

              <br>
              <label>9. When I think about the future, I</label>
              <span id="MAM_future"><?php echo $oth_info[0]['future'] ?>.</span>

              <br>
              <label>10. My greatest goal is </label>
              <span id="MAM_goal"><?php echo $oth_info[0]['goal'] ?>.</span>

            </div>


            </form>




            <div id="modal" class="modal">
            <div class="modal_content">
                <div class="body">
                <div class="logo">
                    <img id="loading-spinner" style="display: none;" src="../assets/img/GCU_LOGO.gif">
                    </div>
                <div class="container1">
                    <form id="verify_code" method="post">
                    <h1>A verification code has been den to your email, please enter the code below to fully register your account</h1>
                    <div class="id">
                        <label for="email" style="color:black;">Verification Code:</label> <br>
                        <br>
                        <input type="number" id="code" name="code" oninput="validateInput(this)" required>
                        <br>
                        <a class="btn btn-sm btn-primary" style="color: white;" onclick="update()" >Verify</a>
                        <br>
                    </div>
                    </form><br>
                    <button class="btn btn-sm btn-primary" onclick="resend()">Resend Code</button>
                    <br>
                    <br>
                    <button class="btn btn-sm btn-primary" onclick="cancel()">Cancel</button>
                </div>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="amen">
    <button onclick="verify()" class="btnText1" id="Update"><span class="btnText">Update</span>&nbsp<i class="ri-edit-2-fill"></i></button>
    <button onclick="cancel()" class="btnText1" id="Cancel"><span class="btnText">Cancel</span>&nbsp<i class="ri-arrow-left-circle-line"></i></button>  
</div>
  <div id="topbar" class="topbar d-flex align-items-center" style="background-color:#008B8B; height: 50px; "> </div>

  <!-- Add this script tag to your HTML file -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    // Get the logout button element
    function faq(){
      window.location.href = '../dh_student.php';
    }
    function goback() {

      window.location.href = 'index.php';

    };
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
  </script>
  
  <script>
     var upd = $("#Update");
     var cnl = $("#Cancel");
     var pass = $("#ps");
     var pass2 = $("#ps2");
     cnl.hide();
     upd.hide();
     pass.hide();
     pass2.hide();

     function resend(){
   
          // Show loading spinner
          Swal.fire({
                title: 'Sending Email',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                    },
                    willClose: () => {
        // Set the display property of the element with ID "modal" to "block"
        document.getElementById("modal").style.display = "block";
    }
            });
        $.ajax({
      type: 'POST',
      url: '../backend/resend.php',
      success: function(data) {
                // Hide loading spinner on success
                swal.close();

                Swal.fire({
              icon: "sucess",
              title: "Code Sent!",
              text: "Go to your email to retrieve the code",
              confirmButtonText: "OK",

            }).then((result) => {
             
                if (result.isConfirmed) {
              
                } 
              });
   
  


      },
                  error: function (xhr, status, error) {
                    console.error("Error:", error);
                    alert("Error: " + error);
                  },
    });
    } 

     function togglePasswordVisibility(inputId) {
    var passwordInput = document.getElementById(inputId);
    var icon = document.querySelector('i[onclick="togglePasswordVisibility(\'' + inputId + '\')"]');
  
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      icon.className = "fas fa-eye-slash";
    } else {
      passwordInput.type = "password";
      icon.className = "fas fa-eye";
    }
  }
  function limitTo11Digits(event) {
  var input = event.target;
  var inputValue = input.value.replace(/\D/g, ''); // Remove non-numeric characters

  if (inputValue.length > 11) {
    input.value = inputValue.slice(0, 11);
  }
}
function limitToSingleCharacter(event) {
  var input = event.target;
  var inputValue = input.value.toUpperCase().replace(/[^A-Z]/g, '');

  if (inputValue.length > 1) {
    input.value = inputValue.slice(0, 1);
  }
}
function toggleInput(chk, lbl) {
    var checkbox = document.getElementById(chk);
    var input = document.getElementById(lbl);

    if (!checkbox.checked) {
      input.value = " ";
    } 
  }

  

  function addHighlight(element) {
            element.classList.add('highlight');
        }

        // Function to remove highlight class
        function removeHighlight(element) {
            element.classList.remove('highlight');
        }
        function edit() {
    // console.log("Edit btn clicked");
    cnl.show();
    upd.show();
    pass.show();
    pass2.show();
    // Get the select and input elements by their IDs
    var email = document.getElementById('email');

    var crse = document.getElementById('crse');
    var yl = document.getElementById('YL');
    var sec = document.getElementById('sec');
    var cn = document.getElementById('CN');
    var cs = document.getElementById('CS');
    var adrs = document.getElementById('address');

    // father
    var fage = document.getElementById('Fage');
    var focc = document.getElementById('Focc');
    var fcn = document.getElementById('Fcn');

    // mother
    var mage = document.getElementById('Mage');
    var mocc = document.getElementById('Mocc');
    var mcn = document.getElementById('Mcn');

    // guardian
    var gage = document.getElementById('Gage');
    var gocc = document.getElementById('Gocc');
    var gcn = document.getElementById('Gcn');

    // checkbox
    var prnt = document.getElementById('FS_parent');
    var ss = document.getElementById('FS_ss');
    var rg = document.getElementById('FS_rg');
    var sch = document.getElementById('FS_sch');
    var sch2 = document.getElementById('FS_sch2');
    var oth = document.getElementById('FS_oth');
    var oth2 = document.getElementById('FS_oth2');

    //radio
    var pam = document.getElementById('MS_pam');
    var mla = document.getElementById('MS_mla');
    var notm = document.getElementById('MS_notm');
    var sp = document.getElementById('MS_sp');
    var ps = document.getElementById('MS_ps');
    var wid = document.getElementById('MS_wid');

    crse.disabled = false;
    yl.disabled = false;
    email.removeAttribute('readonly');
    sec.removeAttribute('readonly');
    cn.removeAttribute('readonly');
    cs.disabled = false;
    adrs.removeAttribute('readonly');
    fage.removeAttribute('readonly');
    focc.removeAttribute('readonly');
    fcn.removeAttribute('readonly');
    mage.removeAttribute('readonly');
    mocc.removeAttribute('readonly');
    mcn.removeAttribute('readonly');
    gage.removeAttribute('readonly');
    gocc.removeAttribute('readonly');
    gcn.removeAttribute('readonly');

    prnt.removeAttribute('disabled');
     ss.removeAttribute('disabled');
     rg.removeAttribute('disabled');
     sch.removeAttribute('disabled');
     oth.removeAttribute('disabled');
     sch2.removeAttribute('readonly');
     oth2.removeAttribute('readonly');

     pam.removeAttribute('disabled');
     mla.removeAttribute('disabled');
     notm.removeAttribute('disabled');
     sp.removeAttribute('disabled');
     ps.removeAttribute('disabled');
     wid.removeAttribute('disabled');


    email.style.border = '2px solid yellow';
    email.style.padding = '1rem 0.75rem';
    email.style.height = 'auto';

    crse.style.border = '2px solid yellow';
    crse.style.padding = '1rem 0.75rem';
    crse.style.height = 'auto';

    yl.style.border = '2px solid yellow';
    yl.style.padding = '1rem 0.75rem';
    yl.style.height = 'auto';

    sec.style.border = '2px solid yellow';
    sec.style.padding = '1rem 0.75rem';
    sec.style.height = 'auto';

    cn.style.border = '2px solid yellow';
    cn.style.padding = '1rem 0.75rem';
    cn.style.height = 'auto';

    cs.style.border = '2px solid yellow';
    cs.style.padding = '1rem 0.75rem';
    cs.style.height = 'auto';

    adrs.style.border = '2px solid yellow';
    adrs.style.padding = '1rem 0.75rem';
    adrs.style.height = 'auto';

    fage.style.border = '2px solid yellow';
    fage.style.padding = '1rem 0.75rem';
    fage.style.height = 'auto';

    focc.style.border = '2px solid yellow';
    focc.style.padding = '1rem 0.75rem';
    focc.style.height = 'auto';

    fcn.style.border = '2px solid yellow';
    fcn.style.padding = '1rem 0.75rem';
    fcn.style.height = 'auto';

    mage.style.border = '2px solid yellow';
    mage.style.padding = '1rem 0.75rem';
    mage.style.height = 'auto';

    mocc.style.border = '2px solid yellow';
    mocc.style.padding = '1rem 0.75rem';
    mocc.style.height = 'auto';

    mcn.style.border = '2px solid yellow';
    mcn.style.padding = '1rem 0.75rem';
    mcn.style.height = 'auto';

    gage.style.border = '2px solid yellow';
    gage.style.padding = '1rem 0.75rem';
    gage.style.height = 'auto';

    gocc.style.border = '2px solid yellow';
    gocc.style.padding = '1rem 0.75rem';
    gocc.style.height = 'auto';

    gcn.style.border = '2px solid yellow';
    gcn.style.padding = '1rem 0.75rem';
    gcn.style.height = 'auto';

    // Show buttons or perform other actions as needed
  
}
function cancel(){

  location.reload();
  cnl.hide();
  upd.hide();
     pass.hide();
     pass2.hide();
}

function verify(){

// Show loading spinner
      Swal.fire({
          title: 'Sending Code',
          text: "Please check your email for the code in order to proceed with the update",
          allowOutsideClick: false,
          allowEscapeKey: false,
          didOpen: () => {
              Swal.showLoading();
          },
          willClose: () => {
        // Set the display property of the element with ID "modal" to "block"
        document.getElementById("modal").style.display = "block";
    }
      });

          
    // console.log("performing ajax");
    $.ajax({
      type: 'POST',
      url: '../backend/forgot_pass.php',
      data: {
        email: $("#email").val()
      },
      success: function(data) {
        // Hide loading spinner on success
        swal.close();
        if (data === "unregistered") {
                  
          Swal.fire({
          title: "Email Changed?",
          text: "It seems you changed your email. Do you wish to proceed?",
          icon: "question",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes"
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire({
                title: 'Sending Code',
                text: "Please check your email for the code in order to procedd with the update",
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                    },
            });
            $.ajax({
      type: 'POST',
      url: '../backend/email_verify.php',
      data: {
        email: $("#email").val()
      },
      success: function(data) {
        // Hide loading spinner on success
        swal.close();
        // console.log(data);
        if (data === "unregistered") {

          
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "This Email in already registered, please use a different email",
              confirmButtonText: "OK",

                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                      
                    } 
                  });
          // console.log(data);
          
        } else {
            Swal.fire({
              icon: "success",
              title: "Code Sent!",
              text: "Go to your email to retrieve the code",
              confirmButtonText: "OK",

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                
                } 
              });
              // console.log("Success",data)


        }

      },
      error: function(xhr, status, error) {
        // Hide loading spinner on error
       
        
        console.error("Error:", error);
        alert("Error: " + error);

        swal.close();
      },
    });
          }else{

          }
      });
          
         
          
        } else {
            Swal.fire({
              icon: "success",
              title: "Code Sent!",
              text: "Go to your email to retrieve the code",
              confirmButtonText: "OK",

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                
                } 
              });
              // console.log("Success",data)


        }

      },
      error: function(xhr, status, error) {
        // Hide loading spinner on error
       
        
        console.error("Error:", error);
        alert("Error: " + error);

        swal.close();
      },
    });
       

}
    function update(){
      // console.log("Upd btn clicked");
                    // Get the select element by its ID
                    // student_user
                    var email = document.getElementById('email').value;
                    var crse = document.getElementById('crse').value;
                    var id = "<?php echo $_SESSION['session_id']; ?>";
                    var yl = document.getElementById('YL').value;
                    var sec = document.getElementById('sec').value;
                    var cn = document.getElementById('CN').value;
                    var cs = document.getElementById('CS').value;
                    var adrs = document.getElementById('address').value;
                    var pass = document.getElementById('pass').value;
                    var pass2 = document.getElementById('pass2').value;

                    // father
                    var fage = document.getElementById('Fage').value;
                    var focc = document.getElementById('Focc').value;
                    var fcn = document.getElementById('Fcn').value;

                    // mother
                    var mage = document.getElementById('Mage').value;
                    var mocc = document.getElementById('Mocc').value;
                    var mcn = document.getElementById('Mcn').value;

                    // guardian
                    var gage = document.getElementById('Gage').value;
                    var gocc = document.getElementById('Gocc').value;
                    var gcn = document.getElementById('Gcn').value;

                    var checkboxValues = [];

                  // Check each checkbox and add its value to the array if checked
                  $("input[type='checkbox']").each(function() {
                    if ($(this).is(":checked")) {
                      checkboxValues.push($(this).val());
                    }
                  });
                  // var checkboxString = checkboxValues.join(', ');
                  var sch = document.getElementById('FS_sch2').value;
                  var oth = document.getElementById('FS_oth2').value;

                  

                  var radios = document.getElementsByName('MS');
                      var selectedValue = "";

                      for (var i = 0; i < radios.length; i++) {
                          if (radios[i].checked) {
                              selectedValue = radios[i].value;
                              break;
                          }
                      }

                    
              $.ajax({
          type: 'POST',
          url: '../backend/edit_std.php',
          data: {
            id: id,
            email:email,
            pass: pass,
            pass2: pass2,
            course: crse,
            YL: yl,
            SEC: sec,
            CN: cn,
            CS: cs,
            Adrs: adrs,
            Fage:fage,
            Focc: focc,
            Fcn: fcn,
            Mage: mage,
            Mocc: mocc,
            Mcn:mcn,
            Gage: gage,
            Gocc: gocc,
            Gcn: gcn,
            CHK: checkboxValues,
            SCH: sch,
            OTH: oth,
            RAD: selectedValue


          },
          success: function (data) {
            if (data === "no_match"){
              Swal.fire({
              icon: "error",
              title: "Password does not match",
              text: "Please Try Again",
              confirmButtonText: "OK",

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                
            }
          });
            }
            else{
            // console.log("Server Response:", data);
  
            Swal.fire({
              icon: "success",
              title: "Information Updated!",
              text: "Double Check your information if it is correct",
              confirmButtonText: "OK",

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  location.reload();
      
            $.ajax({
            type: 'POST',
            url: '../backend/log_audit.php',
            data: {
              userId: id,
              action: 'Update Info',
              details: id + ' Updated its info'
            },
            success: function(response) {
              // Handle the response if needed
            
              // console.log("logged", response);
            }
          });
            // console.log("Updated:", data);

            cnl.hide();
            upd.hide();
     pass.hide();
     pass2.hide();
          } 
              });
            }
           
          },
          error: function (xhr, status, error) {
            console.error("Error marking event as done:", error);
            Swal.fire({
              icon: "error",
              title: "Error updating",
              text: "Please try again",
            });
          },
        });
    


    }

  </script>

</body>
</html>