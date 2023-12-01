<?php
session_start();
// Include the log_audit.php file
include '../backend/log_audit2.php';
include '../backend/connect_database.php';
// Check if the session variable is empty
if (empty($_SESSION['session_id'])) {
  // Redirect to the desired location
  echo "<script>alert('You have already Logged out. You will be redirected.'); window.location.href = 'http://localhost/GCU/home';</script>";

  exit; // Make sure to exit the script after a header redirect
}
$id = $_SESSION['session_id'];

// Log audit entry for accessing the home page
logAudit($id, 'access_edit student',  'Admin has accessed the edit student page');

$id = $_SESSION['user_id'];
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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Employee Account</title>
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
  <link rel="stylesheet" href="assets/css/sub.css">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

  <!-- Export -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
  <link href="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js" />
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

</head>
<style>

</style>

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
        <button class="icon-btn place-items-center">
          <i class="ri-user-3-line"></i>
        </button>
      </div>
    </nav>
  </header>
  <!-- Welcome-message -->

  <section>


    <div class="title independent-title">
      <h2>Edit Student Account</h2>
    </div>
    <!-- Section -->

    <section class="table-body">
      <section id="table">

        <form id="edit_stud" name="edit_stud" method="post">
          <h6 class="heading-small text-muted mb-4" style="color:black; font-weight:bold;">User information </h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group focused">
                  <label class="form-control-label">ID No.</label>
                  <input type="text" class="form-control form-control-alternative" id="id" value="<?php echo $pers_info[0]['stud_user_id'] ?>" readonly>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Last Name</label>
                  <input type="text" class="form-control form-control-alternative" id="lname" value="<?php echo $pers_info[0]['last_name'] ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group focused">
                  <label class="form-control-label">First name</label>
                  <input type="text" class="form-control form-control-alternative" id="fname" value="<?php echo $pers_info[0]['first_name'] ?>">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group focused">
                  <label class="form-control-label">Middle Name</label>
                  <input type="text" class="form-control form-control-alternative" id="mname" value="<?php echo $pers_info[0]['middle_name'] ?>">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group focused">
                  <label class="form-control-label">Course</label>
                  <input type="text" class="form-control form-control-alternative" id="course" value="<?php echo $pers_info[0]['course'] ?>">
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group focused">
                  <label class="form-control-label">Year Level</label>
                  <input type="text" class="form-control form-control-alternative" id="YL" value="<?php echo $pers_info[0]['Year_level'] ?>">
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group focused">
                  <label class="form-control-label">Section</label>
                  <input type="text" class="form-control form-control-alternative" id="sec" value="<?php echo $pers_info[0]['Section'] ?>">
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group focused">
                  <label class="form-control-label">Contact Number</label>
                  <input type="text" class="form-control form-control-alternative" id="CN" value="<?php echo $pers_info[0]['Contact_number'] ?>">
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group focused">
                  <label class="form-control-label">Civil Status</label>
                  <input type="text" class="form-control form-control-alternative" id="CS" value="<?php echo $pers_info[0]['Civil_status'] ?>">
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group focused">
                  <label class="form-control-label">Date of Birth</label>
                  <input type="text" class="form-control form-control-alternative" id="bday" value="<?php echo $pers_info[0]['birth_date'] ?>">
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group focused">
                  <label class="form-control-label">Birthplace</label>
                  <input type="text" class="form-control form-control-alternative" id="bplace" value="<?php echo $pers_info[0]['Birth_place'] ?>">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group focused">
                  <label class="form-control-label">Nationality</label>
                  <input type="text" class="form-control form-control-alternative" id="nation" value="<?php echo $pers_info[0]['Nationality'] ?>">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group focused">
                  <label class="form-control-label">Languages/Dialects you can read, write, and understand</label>
                  <input type="text" class="form-control form-control-alternative" id="lang" value="<?php echo $pers_info[0]['Languages_and_dialects'] ?>">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group focused">
                  <label class="form-control-label">House Number/Street/Barangay/Municipality/Province/Zip Code</label>
                  <input type="text" class="form-control form-control-alternative" id="address" value="<?php echo $pers_info[0]['Address'] ?>">
                </div>
              </div>

            </div>
          </div>
          <hr class="my-4">
          <!-- Family Bacground -->
          <h3>FAMILY BACKGROUND</h3>
          <div id='parents'>
            <h1 class="heading-small text-muted mb-4">FATHER</h1>



            <div class="pl-lg-4">
              <!-- <div class="row">
<div class="col-md-12">
<div class="form-group focused">
<label class="form-control-label" for="input-address">Parents (Father)</label>
<input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">

</div>
</div>
</div> -->

              <div class="row">

                <div class="col-lg-4">
                  <div class="form-group focused">
                    <label class="form-control-label">Lastname</label>
                    <input type="text" class="form-control form-control-alternative" id="Flname" value="<?php echo $father_info[0]['lname'] ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group focused">
                    <label class="form-control-label">Firstname</label>
                    <input type="text" class="form-control form-control-alternative" id="Ffname" value="<?php echo $father_info[0]['fname'] ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Middlename</label>
                    <input type="number" class="form-control form-control-alternative" id="Fmname" value="<?php echo $father_info[0]['mname'] ?>">
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group focused">
                    <label class="form-control-label">Age</label>
                    <input type="number" class="form-control form-control-alternative" id="Fage" value="<?php echo $father_info[0]['age'] ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group focused">
                    <label class="form-control-label">Occupational</label>
                    <input type="number" class="form-control form-control-alternative" id="Focc" value="<?php echo $father_info[0]['occupation'] ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label"> Highest Educational Attainment</label>
                    <input type="number" class="form-control form-control-alternative" id="Fcol" value="<?php echo $father_info[0]['educ_background'] ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label"> Contact Number</label>
                    <input type="number" class="form-control form-control-alternative" id="Fcn" value="<?php echo $father_info[0]['contact'] ?>">
                  </div>
                </div>

              </div>
            </div>

            <h1 class="heading-small text-muted mb-4">MOTHER</h1>



            <div class="pl-lg-4">
              <!-- <div class="row">
    <div class="col-md-12">
      <div class="form-group focused">
        <label class="form-control-label" for="input-address">Parents (Father)</label>
        <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
      
      </div>
    </div>
  </div> -->
              <div class="row">

                <div class="col-lg-4">
                  <div class="form-group focused">
                    <label class="form-control-label">Lastname</label>
                    <input type="text" class="form-control form-control-alternative" id="Mlname" value="<?php echo $mother_info[0]['lname'] ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group focused">
                    <label class="form-control-label">Firstname</label>
                    <input type="text" class="form-control form-control-alternative" id="Mfname" value="<?php echo $mother_info[0]['fname'] ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Middlename</label>
                    <input type="number" class="form-control form-control-alternative" id="Mmname" value="<?php echo $mother_info[0]['mname'] ?>">
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-city">Age</label>
                    <input type="number" class="form-control form-control-alternative" id="Mage" value="<?php echo $mother_info[0]['age'] ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group focused">
                    <label class="form-control-label">Occupational</label>
                    <input type="number" class="form-control form-control-alternative" id="Mocc" value="<?php echo $mother_info[0]['occupation'] ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label"> Highest Educational Attainment</label>
                    <input type="number" class="form-control form-control-alternative" id="Mcol" value="<?php echo $mother_info[0]['educ_background'] ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label"> Contact Number</label>
                    <input type="number" class="form-control form-control-alternative" id="Mcn" value="<?php echo $mother_info[0]['contact'] ?>">
                  </div>
                </div>


              </div>

            </div>
          </div>

          <div id="guardian">
            <h1 class="heading-small text-muted mb-4">GUARDIAN</h1>



            <div class="pl-lg-4">
              <!-- <div class="row">
<div class="col-md-12">
<div class="form-group focused">
<label class="form-control-label" for="input-address">Parents (Father)</label>
<input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">

</div>
</div>
</div> -->
              <div class="row">

                <div class="col-lg-4">
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-city">Lastname</label>
                    <input type="text" class="form-control form-control-alternative" id="Glname" value="<?php echo $guardian_info[0]['lname'] ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group focused">
                    <label class="form-control-label">Firstname</label>
                    <input type="text" class="form-control form-control-alternative" id="Gfname" value="<?php echo $guardian_info[0]['fname'] ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Middlename</label>
                    <input type="text" class="form-control form-control-alternative" id="Gmname" value="<?php echo $guardian_info[0]['mname'] ?>">
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-city">Age</label>
                    <input type="text" class="form-control form-control-alternative" id="Gage" value="<?php echo $guardian_info[0]['age'] ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group focused">
                    <label class="form-control-label">Occupational</label>
                    <input type="text" class="form-control form-control-alternative" id="Gocc" value="<?php echo $guardian_info[0]['occupation'] ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label"> Highest Educational Attainment</label>
                    <input type="text" class="form-control form-control-alternative" id="Gcol" value="<?php echo $guardian_info[0]['educ_background'] ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label"> Contact Number</label>
                    <input type="text" class="form-control form-control-alternative" id="Gcn" value="<?php echo $guardian_info[0]['contact'] ?>">
                  </div>
                </div>


              </div>

            </div>
          </div>

          <hr class="my-4">
          <!-- Description -->
          <h6 class="heading-small text-muted mb-4">SIBLINGS</h6>

          <table id="customers">
            <tr>
              <th>Lastname</th>
              <th>Firstname</th>
              <th>Middlename</th>
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

          <hr class="my-4">
          <!-- Description -->
          <h3>EDUCATIONAL BACKGROUND</h3>
          <h6 class="heading-small text-muted mb-4">SENIOR HIGHSCHOOL</h6>


          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group focused">
                  <label class="form-control-label">Name of the School</label>
                  <input style="height:auto;" type="text" class="form-control form-control-alternative" id="sen_school" value="<?php echo $senschool_info[0]['school_name'] ?>">
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Year Graduated</label>
                  <input style="height:auto;" type="text" class="form-control form-control-alternative" id="sen_school_yg" value="<?php echo $senschool_info[0]['year'] ?>">
                </div>
              </div>
            </div>
          </div>

          <div class="pl-lg-4">
            <div class="form-group focused">
              <label class="form-control-label">Awards Received</label>
              <input style="height:auto;" class="form-control form-control-alternative" id="sen_school_awards" value="<?php echo $senschool_info[0]['awards'] ?>">

            </div>
          </div>
          <h6 class="heading-small text-muted mb-4">JUNIOR HIGHSCHOOL</h6>


          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group focused">
                  <label class="form-control-label">Name of the School</label>
                  <input style="height:auto;" type="text" class="form-control form-control-alternative" id="jun_school" value="<?php echo $junschool_info[0]['school_name'] ?>">
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Year Graduated</label>
                  <input style="height:auto;" type="text" class="form-control form-control-alternative" id="jun_school_yg" value="<?php echo $junschool_info[0]['year'] ?>">
                </div>
              </div>
            </div>
          </div>

          <div class="pl-lg-4">
            <div class="form-group focused">
              <label class="form-control-label">Awards Received</label>
              <input style="height:auto;" class="form-control form-control-alternative" id="jun_school_awards" value="<?php echo $junschool_info[0]['awards'] ?>">

            </div>
          </div>

          <h6 class="heading-small text-muted mb-4">ELEMENTARY</h6>


          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group focused">
                  <label class="form-control-label">Name of the School</label>
                  <input style="height:auto;" type="text" class="form-control form-control-alternative" id="elm_school" value="<?php echo $elemschool_info[0]['school_name'] ?>">
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Year Graduated</label>
                  <input style="height:auto;" type="text" class="form-control form-control-alternative" id="elm_school_yg" value="<?php echo $elemschool_info[0]['year'] ?>">
                </div>
              </div>
            </div>
          </div>

          <div class="pl-lg-4">
            <div class="form-group focused">
              <label class="form-control-label">Awards Received</label>
              <input style="height:auto;" class="form-control form-control-alternative" id="elem_school_awards" value="<?php echo $elemschool_info[0]['awards'] ?>">

            </div>
          </div>
          <div id="otherschool">
            <h6 class="heading-small text-muted mb-4">OTHER SCHOOL ATTENDED</h6>


            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group focused">
                    <label class="form-control-label">Name of the School</label>
                    <input style="height:auto;" type="text" class="form-control form-control-alternative" id="oth_school" value="<?php echo $othschool_info[0]['school_name'] ?>">
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label">Year Graduated</label>
                    <input style="height:auto;" type="text" class="form-control form-control-alternative" id="oth_school_yg" value="<?php echo $othschool_info[0]['year'] ?>">
                  </div>
                </div>
              </div>

            </div>

            <div class="pl-lg-4">
              <div class="form-group focused">
                <label class="form-control-label">Awards Received</label>
                <input style="height:auto;" class="form-control form-control-alternative" id="oth_school_awards" value="<?php echo $othschool_info[0]['awards'] ?>">

              </div>
            </div>

          </div>



          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group focused">
                  <label class="form-control-label">Are you a member of an Indigenous group?</label>
                  <input type="text" id="indige" class="form-control form-control-alternative">
                  <span id="ip"><?php echo $pers_info[0]['IG'] ?></span> - <span id="ip2"><?php echo $pers_info[0]['specificIG'] ?></span>
                  <!-- If yes, specify ilagay mo nalang beside yes example (Yes-Tas anong indigenous group belong) -->
                  <!-- <br>
          <input type="text" class="form-control form-control-alternative">Yes -->
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Are you a person with a disability (PWD)?</label>
                  <input type="text" class="form-control form-control-alternative" id="pwd"><?php echo $pers_info[0]['PWD'] ?>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Are you a student parent ?</label>
              <input type="text" class="form-control form-control-alternative" id="sp"><?php echo $pers_info[0]['Student_parent'] ?>
            </div>
          </div>
          </div>
          </div>

          <!-- <div class="pl-lg-4">
  <div class="form-group focused">
  <label >Are you a student parent?</label>
    <section class="form-control form-control-alternative" >No
  </div>
</div> -->

          <hr class="my-4">
          <!-- Description -->
          <h3 class="heading-small " style="color:black; font-weight: bold">SOURCES OF FINANCIAL SUPPORT</h3>


          <input type="checkbox" id="FS_parent" <?php echo $checkedOption1 ?>>
          <!-- <i class="fa fa-check"></i> -->
          <label for="checkbox1" class="custom-radio-label">Parent</label>
          <br>

          <input type="checkbox" id="FS_ss" <?php echo $checkedOption2; ?>>
          <!-- <i class="fa fa-check"></i> -->
          <label for="checkbox2">Self Supporting</label>
          <br>

          <input type="checkbox" id="FS_rg" <?php echo $checkedOption3; ?>>
          <!-- <i class="fa fa-check"></i> -->
          <label for="checkbox3">Relative and/or Guardian</label>
          <br>

          <input type="checkbox" id="FS_sch" <?php echo $checkedOption4; ?>>
          <!-- <i class="fa fa-check"></i> -->
          <label for="checkbox4">Scholarship - <span id="FS_sch2"><?php if ($oth_info[0]['specific_scholar']) {
                                                                    echo $oth_info[0]['specific_scholar'];
                                                                  } ?></span></label>
          <br>

          <input type="checkbox" id="FS_oth" <?php echo $checkedOption5; ?>>
          <!-- <i class="fa fa-check"></i> -->
          <label for="checkbox5">Others - <span id="FS_oth2"><?php if ($oth_info[0]['specific_other']) {
                                                                echo $oth_info[0]['specific_other'];
                                                              } ?></span></label>


          <hr class="my-4">
          <!-- Description -->
          <h6 class="heading-small" style="color:black; font-weight: bold">MARITAL STATUS OF PARENT</h6>


          <input type="radio" id="MS_pam" name='sample' value='Married' <?php echo $checkmarital1; ?>>
          <label for="checkbox1" class="custom-radio-label">Parents are married.</label>
          <br>
          <input type="radio" id="MS_mla" name='sample' value='Annulled' <?php echo $checkmarital2; ?>>
          <label for="checkbox1" class="custom-radio-label">Marriage is legally annulled.</label>
          <br>
          <input type="radio" id="MS_notm" name='sample' value='Living-Together' <?php echo $checkmarital3; ?>>
          <label for="checkbox1" class="custom-radio-label">Parents are not married but are living together.</label>
          <br>
          <input type="radio" id="MS_sp" name='sample' value="Single" <?php echo $checkmarital4; ?>>
          <label for="checkbox1" class="custom-radio-label">Single Parent.</label>
          <br>
          <input type="radio" id="MS_ps" name='sample' value="separated" <?php echo $checkmarital5; ?>>
          <label for="checkbox1" class="custom-radio-label">Parents are separated (one or both have other partners).</label>
          <br>
          <input type="radio" id="MS_wid" name='sample' value="widow" <?php echo $checkmarital6; ?>>
          <label for="checkbox1" class="custom-radio-label">Widow/widower.</label>

          <!-- </div> -->
          <!-- </div> -->

          <hr class="my-4">
          <!-- Description -->
          <h6 class="heading-small" style="color:black; font-weight: bold">More About me</h6>
          <div class="pl-lg-4">
            <div class="form-group focused">

              <label>1. The three words that describe me are - </label>
              <span id="MAM_ans1"><?php echo $oth_info[0]['first'] ?>, </span>
              <span id="MAM_ans2"><?php echo $oth_info[0]['second'] ?>, </span>
              <span id="MAM_ans3"><?php echo $oth_info[0]['third'] ?>.</span>


              <br>

              <label>2. My father is </label>
              <label id="MAM_fat"><?php echo $oth_info[0]['Fis'] ?>.</label>


              <br>
              <label>3. My mother is </label>
              <label id="MAM_mom"><?php echo $oth_info[0]['Mis'] ?>.</label>


              <br>
              <label>4. The sibling (kapatid) I am closest to is my </label>
              <label id="MAM_sib_ans"><?php echo $oth_info[0]['kapatid'] ?></label>
              <label id="MAM_sib_bec">because</label>
              <label id="MAM_sib_ans2"><?php echo $oth_info[0]['kap_res'] ?>.</label>

              <br>
              <label>5. When I think about my family I feel </label>
              <label id="MAM_think"><?php echo $oth_info[0]['abtFam'] ?>.</label>

              <br>
              <label>6. When I was a child, I </label>
              <label id="MAM_child"><?php echo $oth_info[0]['whenChild'] ?>.</label>

              <br>
              <label>7. In school, my teachers are </label>
              <label id="MAM_school"><?php echo $oth_info[0]['teachAre'] ?>.</label>

              <br>
              <label>8. My friends don't know that </label>
              <label id="MAM_dunno"><?php echo $oth_info[0]['friendsDuno'] ?>.</label>

              <br>
              <label>9. When I think about the future, I</label>
              <label id="MAM_future"><?php echo $oth_info[0]['future'] ?>.</label>

              <br>
              <label>10. My greatest goal is </label>
              <label id="MAM_goal"><?php echo $oth_info[0]['goal'] ?>.</label>

            </div>
          </div>
          <hr class="my-4">
          <!-- Description -->
          <h6 class="heading-small" style="color:black; font-weight: bold">Email & Password</h6>
          <div class="pl-lg-4 center-block">
            <div class="col-lg-4 center-block">
              <div class="form-group focused">
                <label class="form-control-label" for="input-city">Email</label>
                <input type="text" class="form-control form-control-alternative" id="email" value="<?php echo $pers_info[0]['email'] ?>">
              </div>
            </div>
            <div class="col-lg-4 center-block">
              <div class="form-group focused">
                <label class="form-control-label" for="input-city">Password</label>
                <input type="text" class="form-control form-control-alternative" id="pass">
              </div>
            </div>
          </div>



          <br>
          <button class="yes1" type="submit" value="Edit Employee">Edit Student Account</button>
        </form>
      </section>

    </section>
    <br>
    </div>

    <style>
      .table-body {
        background-color: darkolivegreen;

      }
    </style>


    <!-- Script     -->

    <script>
      var eID = "<?php echo $_SESSION['session_id']; ?>";
      $("#edit_stud").on("submit", function(event) {
        console.log($("#email").val());
        console.log($("#pass").val());
        $.ajax({
          type: 'POST',
          url: '../backend/edit_std.php',
          data: {
            id: $("#id").val(),
            fname: $("#fname").val(),
            mname: $("#mname").val(),
            lname: $("#lname").val(),
            course: $("#course").val(),
            YL: $("#YL").val(),
            sec: $("#sec").val(),
            CN: $("#CN").val(),
            CS: $("#CS").val(),
            bday: $("#bday").val(),
            bplace: $("#bplace").val(),
            nation: $("#nation").val(),
            lang: $("#lang").val(),
            address: $("#address").val(),
            Flname: $("#Flname").val(),
            Ffname: $("#Ffname").val(),
            Fmname: $("#Fmname").val(),
            Fage: $("#Fage").val(),
            Focc: $("#Focc").val(),
            Fcol: $("#Fcol").val(),
            Fcn: $("#Fcn").val(),
            Mlname: $("#Mlname").val(),
            Mfname: $("#Mfname").val(),
            Mmname: $("#Mmname").val(),
            Mage: $("#Mage").val(),
            Mocc: $("#Mocc").val(),
            Mcol: $("#Mcol").val(),
            Mcn: $("#Mcn").val(),
            Glname: $("#Glname").val(),
            Gfname: $("#Gfname").val(),
            Gmname: $("#Gmname").val(),
            Gage: $("#Gage").val(),
            Gocc: $("#Gocc").val(),
            Gcol: $("#Gcol").val(),
            Gcn: $("#Gcn").val(),
            sen_school: $("#sen_school").val(),
            sen_school_yg: $("#sen_school_yg").val(),
            sen_school_awards: $("#sen_school_awards").val(),
            jun_school: $("#jun_school").val(),
            jun_school_yg: $("#jun_school_yg").val(),
            jun_school_awards: $("#jun_school_awards").val(),
            elem_school: $("#elem_school").val(),
            elem_school_yg: $("#elem_school_yg").val(),
            elem_school_awards: $("#elem_school_awards").val(),
            oth_school: $("#oth_school").val(),
            oth_school_yg: $("#oth_school_yg").val(),
            oth_school_awards: $("#oth_school_awards").val(),
            indige: $("#indege").val(),
            pwd: $("#pwd").val(),
            sp: $("#sp").val(),
            FS_parent: $("#FS_parent").val(),
            FS_ss: $("#FS_ss").val(),
            FS_rg: $("#FS_rg").val(),
            FS_sch: $("#FS_sch").val(),
            FS_oth: $("#FS_oth").val(),
            MS_pam: $("#MS_pam").val(),
            MS_mla: $("#MS_mla").val(),
            MS_notm: $("#MS_notm").val(),
            MS_sp: $("#MS_sp").val(),
            MS_ps: $("#MS_ps").val(),
            MS_wid: $("#MS_wid").val(),
            email: $("#email").val(),
            password: $("#pass").val()
          },
          success: function(data) {
            console.log('Success!');
            console.log(data);
            alert("Edited Successfully");

            window.location.href = "studentprofile.php";
            $.ajax({
              type: 'POST',
              url: '../backend/log_audit.php',
              data: {
                userId: eID,
                action: 'Admin edited employee',
                details: 'Admin edited employee'.$("#id").val()
              },
              success: function(response) {
                // Handle the response if needed
                console.log("logged", response);
              }
            });

          },
          error: function(xhr, status, error) {
            alert("Error: " + error);
          }
        });
      });
    </script>
    <script src="./assets/main.js"></script>
</body>

</html>