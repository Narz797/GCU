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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Profile</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Remix icons -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
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

</head>

<style>
  :root {
    --blue: #5e72e4;
    --indigo: #5603ad;
    --purple: #8965e0;
    --pink: #f3a4b5;
    --red: #f5365c;
    --orange: #fb6340;
    --yellow: #ffd600;
    --green: #2dce89;
    --teal: #11cdef;
    --cyan: #2bffc6;
    --white: #fff;
    --gray: #8898aa;
    --gray-dark: #32325d;
    --light: #ced4da;
    --lighter: #e9ecef;
    --primary: #5e72e4;
    --secondary: #f7fafc;
    --success: #2dce89;
    --info: #11cdef;
    --warning: #fb6340;
    --danger: #f5365c;
    --light: #adb5bd;
    --dark: #212529;
    --default: #172b4d;
    --white: #fff;
    --neutral: #fff;
    --darker: black;
    --breakpoint-xs: 0;
    --breakpoint-sm: 576px;
    --breakpoint-md: 768px;
    --breakpoint-lg: 992px;
    --breakpoint-xl: 1200px;
    --font-family-sans-serif: Open Sans, sans-serif;
    --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace;
  }

  *,
  *::before,
  *::after {
    box-sizing: border-box;
  }
  .id input{
   
    width: 90px;
  }
  .id1 input{
   
    color:#072bf4;
 }
 
  html {
    font-family: sans-serif;
    line-height: 1.15;
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;
    -ms-overflow-style: scrollbar;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  }
  .fa-eye {
  position: absolute;
  /* right: 10px; */
  top: 40%;
  right:1%;
  transform: translateY(-50%);
  cursor: pointer;
  color: #ccc; /* Set the initial color of the eye icon */
}

 .fa-eye {
  color: black; /* Change color on focus to match the border color */
}

.fixed-buttons {
    /* position: fixed;
    bottom: 0; */
    width: 100%;
    padding: 10px;
    display: flex;
    /* justify-content: center; Align buttons to the right and left */
  /* Add a background color for better visibility */
  }

  .fixed-buttons .btn {
    color: white;
  }

.fa-eye, .fa-eye-slash {
    position: absolute;
    right: 10px;
    top: 10px;
    cursor: pointer;
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


    .container1 {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    text-align: center;
    background-color: #f9f9f9;
}

  @-ms-viewport {
    width: device-width;
  }

  figcaption,
  footer,
  header,
  main,
  nav,
  section {
    display: block;
  }

  body {
    font-family: Open Sans, sans-serif;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    margin: 0;
    text-align: left;
    color: #525f7f;
    background-color: #f8f9fe;
  }

  [tabindex='-1']:focus {
    outline: 0 !important;
  }

  hr {
    overflow: visible;
    box-sizing: content-box;
    height: 0;
  }

  h1,
  h3,
  h4,
  h5,
  h6 {
    margin-top: 0;
    margin-bottom: .5rem;
  }

  p {
    margin-top: 0;
    margin-bottom: 1rem;
  }

  address {
    font-style: normal;
    line-height: inherit;
    margin-bottom: 1rem;
  }

  ul {
    margin-top: 0;
    margin-bottom: 1rem;
  }

  ul ul {
    margin-bottom: 0;
  }

  dfn {
    font-style: italic;
  }

  strong {
    font-weight: bolder;
  }

  a {
    text-decoration: none;
    color: #5e72e4;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
  }

  a:hover {
    text-decoration: none;
    color: #233dd2;
  }

  a:not([href]):not([tabindex]) {
    text-decoration: none;
    color: inherit;
  }

  a:not([href]):not([tabindex]):hover,
  a:not([href]):not([tabindex]):focus {
    text-decoration: none;
    color: inherit;
  }

  a:not([href]):not([tabindex]):focus {
    outline: 0;
  }

  code {
    font-family: SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace;
    font-size: 1em;
  }

  img {
    vertical-align: middle;
    border-style: none;
  }

  caption {
    padding-top: 1rem;
    padding-bottom: 1rem;
    caption-side: bottom;
    text-align: left;
    color: #8898aa;
  }

  label {
    display: inline-block;
    margin-bottom: .5rem;
  }

  button {
    border-radius: 0;
  }

  button:focus {
    outline: 1px dotted;
    outline: 5px auto -webkit-focus-ring-color;
  }

  input,
  button,
  textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    margin: 0;
  }
.ok span{
  color: #04aa6d;
}
  button,
  input {
    overflow: visible;
  }

  button {
    text-transform: none;
  }

  button,
  html [type='button'],
  [type='reset'],
  [type='submit'] {
    -webkit-appearance: button;
  }

  button::-moz-focus-inner,
  [type='button']::-moz-focus-inner,
  [type='reset']::-moz-focus-inner,
  [type='submit']::-moz-focus-inner {
    padding: 0;
    border-style: none;
  }

  input[type='radio'],
  input[type='checkbox'] {
    box-sizing: border-box;
    padding: 0;
  }

  input[type='date'],
  input[type='time'],
  input[type='datetime-local'],
  input[type='month'] {
    -webkit-appearance: listbox;
  }

  textarea {
    overflow: auto;
    resize: vertical;
  }

  legend {
    font-size: 1.5rem;
    line-height: inherit;
    display: block;
    width: 100%;
    max-width: 100%;
    margin-bottom: .5rem;
    padding: 0;
    white-space: normal;
    color: inherit;
  }

  progress {
    vertical-align: baseline;
  }

  [type='number']::-webkit-inner-spin-button,
  [type='number']::-webkit-outer-spin-button {
    height: auto;
  }

  [type='search'] {
    outline-offset: -2px;
    -webkit-appearance: none;
  }

  [type='search']::-webkit-search-cancel-button,
  [type='search']::-webkit-search-decoration {
    -webkit-appearance: none;
  }

  ::-webkit-file-upload-button {
    font: inherit;
    -webkit-appearance: button;
  }

  [hidden] {
    display: none !important;
  }

  h1,
  h3,
  h4,
  h5,
  h6,
  .h1,
  .h3,
  .h4,
  .h5,
  .h6 {
    font-family: inherit;
    font-weight: 600;
    line-height: 1.5;
    margin-bottom: .5rem;
    color: #008B8B;
  }

  h1,
  .h1 {
    font-size: 1.625rem;
  }

  h3,
  .h3 {
    font-size: 1.0625rem;
  }

  h4,
  .h4 {
    font-size: .9375rem;
  }

  h5,
  .h5 {
    font-size: .8125rem;
  }

  h6,
  .h6 {
    font-size: .625rem;
  }

  .display-2 {
    font-size: 2.75rem;
    font-weight: 600;
    line-height: 1.5;
  }

  hr {
    margin-top: 2rem;
    margin-bottom: 2rem;
    border: 0;
    border-top: 1px solid rgba(0, 0, 0, .1);
  }

  code {
    font-size: 87.5%;
    word-break: break-word;
    color: #f3a4b5;
  }

  a>code {
    color: inherit;
  }
  @media (max-width: 768px) {
    .scrollable-table {
    max-height: 300px; /* Adjust the height as needed */
    overflow-y: auto; /* Enable vertical scrolling */
    border: 1px solid #ccc; /* Optional: Add a border for visual separation */
  }

  /* Optional: Style the table for better appearance */
  #customers {
    border-collapse: collapse;
    width: 100%;
  }

  #customers th, #customers td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }

  #customers th {
    background-color: #f2f2f2;
  }

  .checkbox-container {
  display: flex;
  align-items: center;
}

.custom-checkbox-label {
  margin-left: 10px; /* Adjust the margin as needed for spacing between checkbox and label */
}
  }
  .container {
    width: 100%;
    margin-right: auto;
    margin-left: auto;
    padding-right: 15px;
    padding-left: 15px;

  }

  @media (min-width: 576px) {
    .container {
      max-width: 540px;
    }
  }

  @media (min-width: 768px) {
    .container {
      max-width: 720px;
    }
  }

  @media (min-width: 992px) {
    .container {
      max-width: 960px;
    }
  }

  @media (min-width: 1200px) {
    .container {
      max-width: 1140px;
    }
  }

  .container-fluid {
    width: 100%;
    margin-right: auto;
    margin-left: auto;
    padding-right: 15px;
    padding-left: 15px;
  }

  .row {
    display: flex;
    margin-right: -15px;
    margin-left: -15px;
    flex-wrap: wrap;
  }

  .col-4,
  .col-8,
  .col,
  .col-md-10,
  .col-md-12,
  .col-lg-3,
  .col-lg-4,
  .col-lg-6,
  .col-lg-7,
  .col-xl-4,
  .col-xl-6,
  .col-xl-8 {
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
  }

  .col {
    max-width: 100%;
    flex-basis: 0;
    flex-grow: 1;
  }

  .col-4 {
    max-width: 33.33333%;
    flex: 0 0 33.33333%;
  }

  .col-8 {
    max-width: 66.66667%;
    flex: 0 0 66.66667%;
  }

  @media (min-width: 768px) {

    .col-md-10 {
      max-width: 83.33333%;
      flex: 0 0 83.33333%;
    }

    .col-md-12 {
      max-width: 100%;
      flex: 0 0 100%;
    }
  }

  @media (min-width: 992px) {

    .col-lg-3 {
      max-width: 25%;
      flex: 0 0 25%;
    }

    .col-lg-4 {
      max-width: 33.33333%;
      flex: 0 0 33.33333%;
    }

    .col-lg-6 {
      max-width: 50%;
      flex: 0 0 50%;
    }

    .col-lg-7 {
      max-width: 58.33333%;
      flex: 0 0 58.33333%;
    }

    .order-lg-2 {
      order: 2;
    }
  }

  @media (min-width: 1200px) {

    .col-xl-4 {
      max-width: 33.33333%;
      flex: 0 0 33.33333%;
    }

    .col-xl-6 {
      max-width: 50%;
      flex: 0 0 50%;
    }

    .col-xl-8 {
      max-width: 66.66667%;
      flex: 0 0 66.66667%;
    }

    .order-xl-1 {
      order: 1;
    }

    .order-xl-2 {
      order: 2;
    }
  }

  .form-control {
    font-size: 1rem;
    line-height: 1.5;
    display: block;
    width: 100%;
    height: calc(2.75rem + 2px);
    padding: .625rem .75rem;
    transition: all .2s cubic-bezier(.68, -.55, .265, 1.55);
    color: #8898aa;
    border: 1px solid #cad1d7;
    border-radius: .375rem;
    background-color: #fff;
    background-clip: padding-box;
    box-shadow: none;
  }

  @media screen and (prefers-reduced-motion: reduce) {
    .form-control {
      transition: none;
    }
  }

  .form-control::-ms-expand {
    border: 0;
    background-color: transparent;
  }

  .form-control:focus {
    color: #8898aa;
    border-color: rgba(50, 151, 211, .25);
    outline: 0;
    background-color: #fff;
    box-shadow: none, none;
  }

  .form-control:-ms-input-placeholder {
    opacity: 1;
    color: #adb5bd;
  }

  .form-control::-ms-input-placeholder {
    opacity: 1;
    color: #adb5bd;
  }

  .form-control::placeholder {
    opacity: 1;
    color: #adb5bd;
  }

  .form-control:disabled,
  .form-control[readonly] {
    opacity: 1;
    background-color: #e9ecef;
  }

  textarea.form-control {
    height: auto;
  }

  .form-group {
    margin-bottom: 1.5rem;
  }

  .form-inline {
    display: flex;
    flex-flow: row wrap;
    align-items: center;
  }

  @media (min-width: 576px) {
    .form-inline label {
      display: flex;
      margin-bottom: 0;
      align-items: center;
      justify-content: center;
    }

    .form-inline .form-group {
      display: flex;
      margin-bottom: 0;
      flex: 0 0 auto;
      flex-flow: row wrap;
      align-items: center;
    }

    .form-inline .form-control {
      display: inline-block;
      width: auto;
      vertical-align: middle;
    }

    .form-inline .input-group {
      width: auto;
    }
  }

  .btn {
    font-size: 1rem;
    font-weight: 600;
    line-height: 1.5;
    display: inline-block;
    padding: .625rem 1.25rem;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    text-align: center;
    vertical-align: middle;
    white-space: nowrap;
    border: 1px solid transparent;
    border-radius: .375rem;
  }

  @media screen and (prefers-reduced-motion: reduce) {
    .btn {
      transition: none;
    }
  }

  .btn:hover,
  .btn:focus {
    text-decoration: none;
  }

  .btn:focus {
    outline: 0;
    box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
  }

  .btn:disabled {
    opacity: .65;
    box-shadow: none;
  }

  .btn:not(:disabled):not(.disabled) {
    cursor: pointer;
  }

  .btn:not(:disabled):not(.disabled):active {
    box-shadow: none;
  }

  .btn:not(:disabled):not(.disabled):active:focus {
    box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08), none;
  }

  .btn-primary {
    color: #fff;
    border-color: #5e72e4;
    background-color: #5e72e4;
    box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
  }

  .btn-primary:hover {
    color: #fff;
    border-color: #5e72e4;
    background-color: #5e72e4;
  }

  .btn-primary:focus {
    box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 0 rgba(94, 114, 228, .5);
  }

  .btn-primary:disabled {
    color: #fff;
    border-color: #5e72e4;
    background-color: #5e72e4;
  }

  .btn-primary:not(:disabled):not(.disabled):active {
    color: #fff;
    border-color: #5e72e4;
    background-color: #324cdd;
  }

  .btn-primary:not(:disabled):not(.disabled):active:focus {
    box-shadow: none, 0 0 0 0 rgba(94, 114, 228, .5);
  }

  .btn-info {
    color: #fff;
    border-color: #11cdef;
    background-color: #11cdef;
    box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
  }

  .btn-info:hover {
    color: #fff;
    border-color: #11cdef;
    background-color: #11cdef;
  }

  .btn-info:focus {
    box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 0 rgba(17, 205, 239, .5);
  }

  .btn-info:disabled {
    color: #fff;
    border-color: #11cdef;
    background-color: #11cdef;
  }

  .btn-info:not(:disabled):not(.disabled):active {
    color: #fff;
    border-color: #11cdef;
    background-color: #0da5c0;
  }

  .btn-info:not(:disabled):not(.disabled):active:focus {
    box-shadow: none, 0 0 0 0 rgba(17, 205, 239, .5);
  }

  .btn-default {
    color: #fff;
    border-color: #172b4d;
    background-color: #172b4d;
    box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
  }

  .btn-default:hover {
    color: #fff;
    border-color: #172b4d;
    background-color: #172b4d;
  }

  .btn-default:focus {
    box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 0 rgba(23, 43, 77, .5);
  }

  .btn-default:disabled {
    color: #fff;
    border-color: #172b4d;
    background-color: #172b4d;
  }

  .btn-default:not(:disabled):not(.disabled):active {
    color: #fff;
    border-color: #172b4d;
    background-color: #0b1526;
  }

  .btn-default:not(:disabled):not(.disabled):active:focus {
    box-shadow: none, 0 0 0 0 rgba(23, 43, 77, .5);
  }

  .btn-sm {
    font-size: .875rem;
    line-height: 1.5;
    padding: .25rem .5rem;
    border-radius: .375rem;
  }

  .dropdown {
    position: relative;
  }

  .dropdown-menu {
    font-size: 1rem;
    position: absolute;
    z-index: 1000;
    top: 100%;
    left: 0;
    display: none;
    float: left;
    min-width: 10rem;
    margin: .125rem 0 0;
    padding: .5rem 0;
    list-style: none;
    text-align: left;
    color: #525f7f;
    border: 0 solid rgba(0, 0, 0, .15);
    border-radius: .4375rem;
    background-color: #fff;
    background-clip: padding-box;
    box-shadow: 0 50px 100px rgba(50, 50, 93, .1), 0 15px 35px rgba(50, 50, 93, .15), 0 5px 15px rgba(0, 0, 0, .1);
  }

  .dropdown-menu.show {
    display: block;
    opacity: 1;
  }

  .dropdown-menu-right {
    right: 0;
    left: auto;
  }

  .dropdown-menu[x-placement^='top'],
  .dropdown-menu[x-placement^='right'],
  .dropdown-menu[x-placement^='bottom'],
  .dropdown-menu[x-placement^='left'] {
    right: auto;
    bottom: auto;
  }

  .dropdown-divider {
    overflow: hidden;
    height: 0;
    margin: .5rem 0;
    border-top: 1px solid #e9ecef;
  }

  .dropdown-item {
    font-weight: 400;
    display: block;
    clear: both;
    width: 100%;
    padding: .25rem 1.5rem;
    text-align: inherit;
    white-space: nowrap;
    color: #212529;
    border: 0;
    background-color: transparent;
  }

  .dropdown-item:hover,
  .dropdown-item:focus {
    text-decoration: none;
    color: #16181b;
    background-color: #f6f9fc;
  }

  .dropdown-item:active {
    text-decoration: none;
    color: #fff;
    background-color: #5e72e4;
  }

  .dropdown-item:disabled {
    color: #8898aa;
    background-color: transparent;
  }

  .dropdown-header {
    font-size: .875rem;
    display: block;
    margin-bottom: 0;
    padding: .5rem 1.5rem;
    white-space: nowrap;
    color: #8898aa;
  }

  .input-group {
    position: relative;
    display: flex;
    width: 100%;
    flex-wrap: wrap;
    align-items: stretch;
  }

  .input-group>.form-control {
    position: relative;
    width: 1%;
    margin-bottom: 0;
    flex: 1 1 auto;
  }

  .input-group>.form-control+.form-control {
    margin-left: -1px;
  }

  .input-group>.form-control:focus {
    z-index: 3;
  }

  .input-group>.form-control:not(:last-child) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
  }

  .input-group>.form-control:not(:first-child) {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }

  .input-group-prepend {
    display: flex;
  }

  .input-group-prepend .btn {
    position: relative;
    z-index: 2;
  }

  .input-group-prepend .btn+.btn,
  .input-group-prepend .btn+.input-group-text,
  .input-group-prepend .input-group-text+.input-group-text,
  .input-group-prepend .input-group-text+.btn {
    margin-left: -1px;
  }

  .input-group-prepend {
    margin-right: -1px;
  }

  .input-group-text {
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    display: flex;
    margin-bottom: 0;
    padding: .625rem .75rem;
    text-align: center;
    white-space: nowrap;
    color: #adb5bd;
    border: 1px solid #cad1d7;
    border-radius: .375rem;
    background-color: #fff;
    align-items: center;
  }

  .input-group-text input[type='radio'],
  .input-group-text input[type='checkbox'] {
    margin-top: 0;
  }

  .input-group>.input-group-prepend>.btn,
  .input-group>.input-group-prepend>.input-group-text {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
  }

  .input-group>.input-group-prepend:not(:first-child)>.btn,
  .input-group>.input-group-prepend:not(:first-child)>.input-group-text,
  .input-group>.input-group-prepend:first-child>.btn:not(:first-child),
  .input-group>.input-group-prepend:first-child>.input-group-text:not(:first-child) {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }

  .nav {
    display: flex;
    margin-bottom: 0;
    padding-left: 0;
    list-style: none;
    flex-wrap: wrap;
  }

  .nav-link {
    display: block;
    padding: .25rem .75rem;
  }

  .nav-link:hover,
  .nav-link:focus {
    text-decoration: none;
  }

  .navbar {
    position: relative;
    display: flex;
    padding: 1rem 1rem;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
  }

  .navbar>.container,
  .navbar>.container-fluid {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
  }

  .navbar-nav {
    display: flex;
    flex-direction: column;
    margin-bottom: 0;
    padding-left: 0;
    list-style: none;
  }

  .navbar-nav .nav-link {
    padding-right: 0;
    padding-left: 0;
  }

  .navbar-nav .dropdown-menu {
    position: static;
    float: none;
  }

  @media (max-width: 767.98px) {

    .navbar-expand-md>.container,
    .navbar-expand-md>.container-fluid {
      padding-right: 0;
      padding-left: 0;
    }
  }

  @media (min-width: 768px) {
    .navbar-expand-md {
      flex-flow: row nowrap;
      justify-content: flex-start;
    }

    .navbar-expand-md .navbar-nav {
      flex-direction: row;
    }

    .navbar-expand-md .navbar-nav .dropdown-menu {
      position: absolute;
    }

    .navbar-expand-md .navbar-nav .nav-link {
      padding-right: 1rem;
      padding-left: 1rem;
    }

    .navbar-expand-md>.container,
    .navbar-expand-md>.container-fluid {
      flex-wrap: nowrap;
    }
  }

  .navbar-dark .navbar-nav .nav-link {
    color: rgba(255, 255, 255, .95);
  }

  .navbar-dark .navbar-nav .nav-link:hover,
  .navbar-dark .navbar-nav .nav-link:focus {
    color: rgba(255, 255, 255, .65);
  }

  .card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    border: 1px solid rgba(0, 0, 0, .05);
    border-radius: .375rem;
    background-color: #fff;
    background-clip: border-box;
  }

  .card>hr {
    margin-right: 0;
    margin-left: 0;
  }

  .card-body {
    padding: 1.5rem;
    flex: 1 1 auto;
  }

  .card-header {
    margin-bottom: 0;
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid rgba(0, 0, 0, .05);
    background-color: #fff;
  }

  .card-header:first-child {
    border-radius: calc(.375rem - 1px) calc(.375rem - 1px) 0 0;
  }

  @keyframes progress-bar-stripes {
    from {
      background-position: 1rem 0;
    }

    to {
      background-position: 0 0;
    }
  }

  .progress {
    font-size: .75rem;
    display: flex;
    overflow: hidden;
    height: 1rem;
    border-radius: .375rem;
    background-color: #e9ecef;
    box-shadow: inset 0 .1rem .1rem rgba(0, 0, 0, .1);
  }

  .media {
    display: flex;
    align-items: flex-start;
  }

  .media-body {
    flex: 1 1;
  }

  .bg-secondary {
    background-color: #f7fafc !important;
  }

  a.bg-secondary:hover,
  a.bg-secondary:focus,
  button.bg-secondary:hover,
  button.bg-secondary:focus {
    background-color: #d2e3ee !important;
  }

  .bg-default {
    background-color: #172b4d !important;
  }

  a.bg-default:hover,
  a.bg-default:focus,
  button.bg-default:hover,
  button.bg-default:focus {
    background-color: #0b1526 !important;
  }

  .bg-white {
    background-color: #fff !important;
  }

  a.bg-white:hover,
  a.bg-white:focus,
  button.bg-white:hover,
  button.bg-white:focus {
    background-color: #e6e6e6 !important;
  }

  .bg-white {
    background-color: #fff !important;
  }

  .border-0 {
    border: 0 !important;
  }

  .rounded-circle {
    border-radius: 50% !important;
  }

  .d-none {
    display: none !important;
  }

  .d-flex {
    display: flex !important;
  }

  @media (min-width: 768px) {

    .d-md-flex {
      display: flex !important;
    }
  }

  @media (min-width: 992px) {

    .d-lg-inline-block {
      display: inline-block !important;
    }

    .d-lg-block {
      display: block !important;
    }
  }

  .justify-content-center {
    justify-content: center !important;
  }

  .justify-content-between {
    justify-content: space-between !important;
  }

  .align-items-center {
    align-items: center !important;
  }

  @media (min-width: 1200px) {

    .justify-content-xl-between {
      justify-content: space-between !important;
    }
  }

  .float-right {
    float: right !important;
  }

  .shadow,
  .card-profile-image img {
    box-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15) !important;
  }

  .m-0 {
    margin: 0 !important;
  }

  .mt-0 {
    margin-top: 0 !important;
  }

  .mb-0 {
    margin-bottom: 0 !important;
  }

  .mr-2 {
    margin-right: .5rem !important;
  }

  .ml-2 {
    margin-left: .5rem !important;
  }

  .mr-3 {
    margin-right: 1rem !important;
  }

  .mt-4,
  .my-4 {
    margin-top: 1.5rem !important;
  }

  .mr-4 {
    margin-right: 1.5rem !important;
  }

  .mb-4,
  .my-4 {
    margin-bottom: 1.5rem !important;
  }

  .mb-5 {
    margin-bottom: 3rem !important;
  }

  .mt--7 {
    margin-top: -6rem !important;
  }

  .pt-0 {
    padding-top: 0 !important;
  }

  .pr-0 {
    padding-right: 0 !important;
  }

  .pb-0 {
    padding-bottom: 0 !important;
  }

  .pt-5 {
    padding-top: 3rem !important;
  }

  .pt-8 {
    padding-top: 8rem !important;
  }

  .pb-8 {
    padding-bottom: 8rem !important;
  }

  .m-auto {
    margin: auto !important;
  }

  @media (min-width: 768px) {

    .mt-md-5 {
      margin-top: 3rem !important;
    }

    .pt-md-4 {
      padding-top: 1.5rem !important;
    }

    .pb-md-4 {
      padding-bottom: 1.5rem !important;
    }
  }

  @media (min-width: 992px) {

    .pl-lg-4 {
      padding-left: 1.5rem !important;
    }

    .pt-lg-8 {
      padding-top: 8rem !important;
    }

    .ml-lg-auto {
      margin-left: auto !important;
    }
  }

  @media (min-width: 1200px) {

    .mb-xl-0 {
      margin-bottom: 0 !important;
    }
  }

  .text-right {
    text-align: right !important;
  }

  .text-center {
    text-align: center !important;
  }

  .text-uppercase {
    text-transform: uppercase !important;
  }

  .font-weight-light {
    font-weight: 300 !important;
  }

  .font-weight-bold {
    font-weight: 600 !important;
  }

  .text-white {
    color: black !important;
  }

  .text-white {
    color: black !important;
  }

  a.text-white:hover,
  a.text-white:focus {
    color: #e6e6e6 !important;
  }

  .text-muted {
    color: #32325d !important;
  }

  @media print {

    *,
    *::before,
    *::after {
      box-shadow: none !important;
      text-shadow: none !important;
    }

    a:not(.btn) {
      text-decoration: underline;
    }

    img {
      page-break-inside: avoid;
    }

    p,
    h3 {
      orphans: 3;
      widows: 3;
    }

    h3 {
      page-break-after: avoid;
    }

    @page {
      size: a3;
    }

    body {
      min-width: 992px !important;


    }

    .container {
      min-width: 992px !important;

    }

    .navbar {
      display: none;
    }
  }

  figcaption,
  main {
    display: block;
  }

  main {
    overflow: hidden;
  }

  .bg-white {
    background-color: #fff !important;
  }

  a.bg-white:hover,
  a.bg-white:focus,
  button.bg-white:hover,
  button.bg-white:focus {
    background-color: #e6e6e6 !important;
  }

  .bg-gradient-default {
    background: linear-gradient(87deg, #172b4d 0, #1a174d 100%) !important;
  }

  .bg-gradient-default {
    background: linear-gradient(87deg, #172b4d 0, #1a174d 100%) !important;
  }

  @keyframes floating-lg {
    0% {
      transform: translateY(0px);
    }

    50% {
      transform: translateY(15px);
    }

    100% {
      transform: translateY(0px);
    }
  }

  @keyframes floating {
    0% {
      transform: translateY(0px);
    }

    50% {
      transform: translateY(10px);
    }

    100% {
      transform: translateY(0px);
    }
  }

  @keyframes floating-sm {
    0% {
      transform: translateY(0px);
    }

    50% {
      transform: translateY(5px);
    }

    100% {
      transform: translateY(0px);
    }
  }

  .opacity-8 {
    opacity: .8 !important;
  }

  .opacity-8 {
    opacity: .9 !important;
  }

  .center {
    left: 50%;
    transform: translateX(-50%);
  }

  [class*='shadow'] {
    transition: all .15s ease;
  }

  .font-weight-300 {
    font-weight: 300 !important;
  }

  .text-sm {
    font-size: .875rem !important;
  }

  .text-white {
    color: #fff !important;
  }

  a.text-white:hover,
  a.text-white:focus {
    color: #e6e6e6 !important;
  }

  .avatar {
    font-size: 1rem;
    display: inline-flex;
    width: 48px;
    height: 48px;
    color: #fff;
    border-radius: 50%;
    background-color: #adb5bd;
    align-items: center;
    justify-content: center;
  }

  .avatar img {
    width: 100%;
    border-radius: 50%;
  }

  .avatar-sm {
    font-size: .875rem;
    width: 36px;
    height: 36px;
  }

  .btn {
    font-size: .875rem;
    position: relative;
    transition: all .15s ease;
    letter-spacing: .025em;
    text-transform: none;
    will-change: transform;
  }

  .btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
  }

  .btn:not(:last-child) {
    margin-right: .5rem;
  }

  .btn i:not(:first-child) {
    margin-left: .5rem;
  }

  .btn i:not(:last-child) {
    margin-right: .5rem;
  }

  .input-group .btn {
    margin-right: 0;
    transform: translateY(0);
  }

  .btn-sm {
    font-size: .75rem;
  }

  [class*='btn-outline-'] {
    border-width: 1px;
  }

  .card-profile-image {
    position: relative;
  }

  .card-profile-image img {
    position: absolute;
    left: 50%;
    max-width: 180px;
    transition: all .15s ease;
    transform: translate(-50%, -30%);
    border-radius: .375rem;
  }

  .card-profile-image img:hover {
    transform: translate(-50%, -33%);
  }

  .card-profile-stats {
    padding: 1rem 0;
  }

  .card-profile-stats>div {
    margin-right: 1rem;
    padding: .875rem;
    text-align: center;
  }

  .card-profile-stats>div:last-child {
    margin-right: 0;
  }

  .card-profile-stats>div .heading {
    font-size: 1.1rem;
    font-weight: bold;
    display: block;
  }

  .card-profile-stats>div .description {
    font-size: .875rem;
    color: #adb5bd;
  }

  .main-content {
    position: relative;
  }

  .main-content .navbar-top {
    position: absolute;
    z-index: 1;
    top: 0;
    left: 0;
    width: 100%;
    padding-right: 0 !important;
    padding-left: 0 !important;
    background-color: transparent;
  }

  @media (min-width: 768px) {
    .main-content .container-fluid {
      padding-right: 39px !important;
      padding-left: 39px !important;
    }
  }

  .dropdown {
    display: inline-block;
  }

  .dropdown-menu {
    min-width: 12rem;
  }

  .dropdown-menu .dropdown-item {
    font-size: .875rem;
    padding: .5rem 1rem;
  }

  .dropdown-menu .dropdown-item>i {
    font-size: 1rem;
    margin-right: 1rem;
    vertical-align: -17%;
  }

  .dropdown-header {
    font-size: .625rem;
    font-weight: 700;
    padding-right: 1rem;
    padding-left: 1rem;
    text-transform: uppercase;
    color: #f6f9fc;
  }

  .dropdown-menu a.media>div:first-child {
    line-height: 1;
  }

  .dropdown-menu a.media p {
    color: #8898aa;
  }

  .dropdown-menu a.media:hover .heading,
  .dropdown-menu a.media:hover p {
    color: #172b4d !important;
  }

  .footer {
    padding: 2.5rem 0;
    background: #f7fafc;
  }

  .footer .nav .nav-item .nav-link {
    color: #8898aa !important;
  }

  .footer .nav .nav-item .nav-link:hover {
    color: #525f7f !important;
  }

  .footer .copyright {
    font-size: .875rem;
  }

  .form-control-label {
    font-size: .875rem;
    font-weight: 600;
    color: #525f7f;
  }

  .form-control {
    font-size: .875rem;
  }

  .form-control:focus:-ms-input-placeholder {
    color: #adb5bd;
  }

  .form-control:focus::-ms-input-placeholder {
    color: #adb5bd;
  }

  .form-control:focus::placeholder {
    color: #adb5bd;
  }

  textarea[resize='none'] {
    resize: none !important;
  }

  textarea[resize='both'] {
    resize: both !important;
  }

  textarea[resize='vertical'] {
    resize: vertical !important;
  }

  textarea[resize='horizontal'] {
    resize: horizontal !important;
  }

  .form-control-alternative {
    transition: box-shadow .15s ease;
    border: 0;
    box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
  }

  .form-control-alternative:focus {
    box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
  }

  .input-group {
    transition: all .15s ease;
    border-radius: .375rem;
    box-shadow: none;
  }

  .input-group .form-control {
    box-shadow: none;
  }

  .input-group .form-control:not(:first-child) {
    padding-left: 0;
    border-left: 0;
  }

  .input-group .form-control:not(:last-child) {
    padding-right: 0;
    border-right: 0;
  }

  .input-group .form-control:focus {
    box-shadow: none;
  }

  .input-group-text {
    transition: all .2s cubic-bezier(.68, -.55, .265, 1.55);
  }

  .input-group-alternative {
    transition: box-shadow .15s ease;
    border: 0;
    box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
  }

  .input-group-alternative .form-control,
  .input-group-alternative .input-group-text {
    border: 0;
    box-shadow: none;
  }

  .focused .input-group-alternative {
    box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08) !important;
  }

  .focused .input-group {
    box-shadow: none;
  }

  .focused .input-group-text {
    color: #8898aa;
    border-color: rgba(50, 151, 211, .25);
    background-color: #fff;
  }

  .focused .form-control {
    border-color: rgba(50, 151, 211, .25);
  }

  .header {
    position: relative;
  }

  .input-group {
    transition: all .15s ease;
    border-radius: .375rem;
    box-shadow: none;
  }

  .input-group .form-control {
    box-shadow: none;
  }

  .input-group .form-control:not(:first-child) {
    padding-left: 0;
    border-left: 0;
  }

  .input-group .form-control:not(:last-child) {
    padding-right: 0;
    border-right: 0;
  }

  .input-group .form-control:focus {
    box-shadow: none;
  }

  .input-group-text {
    transition: all .2s cubic-bezier(.68, -.55, .265, 1.55);
  }

  .input-group-alternative {
    transition: box-shadow .15s ease;
    border: 0;
    box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
  }

  .input-group-alternative .form-control,
  .input-group-alternative .input-group-text {
    border: 0;
    box-shadow: none;
  }

  .focused .input-group-alternative {
    box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08) !important;
  }

  .focused .input-group {
    box-shadow: none;
  }

  .focused .input-group-text {
    color: #8898aa;
    border-color: rgba(50, 151, 211, .25);
    background-color: #fff;
  }

  .focused .form-control {
    border-color: rgba(50, 151, 211, .25);
  }

  .mask {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    transition: all .15s ease;
  }

  @media screen and (prefers-reduced-motion: reduce) {
    .mask {
      transition: none;
    }
  }

  .nav-link {
    color: #525f7f;
  }

  .nav-link:hover {
    color: #5e72e4;
  }

  .nav-link i.ni {
    position: relative;
    top: 2px;
  }

  .navbar-search .input-group {
    border: 2px solid;
    border-radius: 2rem;
    background-color: transparent;
  }

  .navbar-search .input-group .input-group-text {
    padding-left: 1rem;
    background-color: transparent;
  }

  .navbar-search .form-control {
    width: 270px;
    background-color: transparent;
  }

  .navbar-search-dark .input-group {
    border-color: rgba(255, 255, 255, .6);
  }

  .navbar-search-dark .input-group-text {
    color: rgba(255, 255, 255, .6);
  }

  .navbar-search-dark .form-control {
    color: rgba(255, 255, 255, .9);
  }

  .navbar-search-dark .form-control:-ms-input-placeholder {
    color: rgba(255, 255, 255, .6);
  }

  .navbar-search-dark .form-control::-ms-input-placeholder {
    color: rgba(255, 255, 255, .6);
  }

  .navbar-search-dark .form-control::placeholder {
    color: rgba(255, 255, 255, .6);
  }

  .navbar-search-dark .focused .input-group {
    border-color: rgba(255, 255, 255, .9);
  }

  @media (min-width: 768px) {
    .navbar .dropdown-menu {
      margin: 0;
      pointer-events: none;
      opacity: 0;
    }

    .navbar .dropdown-menu-arrow:before {
      position: absolute;
      z-index: -5;
      bottom: 100%;
      left: 20px;
      display: block;
      width: 12px;
      height: 12px;
      content: '';
      transform: rotate(-45deg) translateY(12px);
      border-radius: 2px;
      background: #fff;
      box-shadow: none;
    }

    .navbar .dropdown-menu-right:before {
      right: 20px;
      left: auto;
    }

    @keyframes show-navbar-dropdown {
      0% {
        transition: visibility .25s, opacity .25s, transform .25s;
        transform: translate(0, 10px) perspective(200px) rotateX(-2deg);
        opacity: 0;
      }

      100% {
        transform: translate(0, 0);
        opacity: 1;
      }
    }

    @keyframes hide-navbar-dropdown {
      from {
        opacity: 1;
      }

      to {
        transform: translate(0, 10px);
        opacity: 0;
      }
    }
  }

  @media (max-width: 767.98px) {
    .navbar-nav .nav-link {
      padding: .625rem 0;
      color: #172b4d !important;
    }

    .navbar-nav .dropdown-menu {
      min-width: auto;
      box-shadow: none;
    }
  }

  @keyframes show-navbar-collapse {
    0% {
      transform: scale(.95);
      transform-origin: 100% 0;
      opacity: 0;
    }

    100% {
      transform: scale(1);
      opacity: 1;
    }
  }

  @keyframes hide-navbar-collapse {
    from {
      transform: scale(1);
      transform-origin: 100% 0;
      opacity: 1;
    }

    to {
      transform: scale(.95);
      opacity: 0;
    }
  }

  .progress {
    overflow: hidden;
    height: 8px;
    margin-bottom: 1rem;
    border-radius: .25rem;
    background-color: #e9ecef;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
  }

  p {
    font-size: 1rem;
    font-weight: 300;
    line-height: 1.7;
  }

  .description {
    font-size: .875rem;
  }

  .heading {
    font-size: .95rem;
    font-weight: 600;
    letter-spacing: .025em;
    text-transform: uppercase;
    color: black;
  }

  .heading-small {
    font-size: .75rem;
    padding-top: .25rem;
    padding-bottom: .25rem;
    letter-spacing: .04em;
    text-transform: uppercase;

  }

  .display-2 span {
    font-weight: 300;
    display: block;
  }

  @media (max-width: 768px) {
    .btn {
      margin-bottom: 10px;
    }
  }

  #navbar .navbar {
    margin-bottom: 20px;
  }

  #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #customers td,
  #customers th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #customers tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  #customers tr:hover {
    background-color: #ddd;
  }

  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;


  }

  .outline-image {
    width: 450px;
    /* Set your desired width */
    height: 700px;
    /* Set your desired height */
    border: 4px solid #333;
    /* Set your desired border color and width */
    box-shadow: 0 0 10px 10px rgba(0, 0, 0, 0.3);
    /* Add a gray shadow effect */
    border-radius: 10px;
    /* Set your desired border radius */
  }
</style>

<body>
  <!-- <input id="topbar" class="topbar d-flex align-items-center" style="background-color:#20B2AA; height: 50px; "><i class="fa fa-sign-out" style="font-size:48px;color:black; margin-left:1650px" ></i> -->
  <!--   -->

  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <!-- <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="https://www.creative-tim.com/product/argon-dashboard" target="_blank">User profile</a> -->
        <!-- Form -->
        <!-- <form id="logoutForm" class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <a class="btn btn-outline-light" style="background-color:white;" onclick="logout()">Back</a>
          </div>
        </form> -->

        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <!-- <span class="avatar avatar-sm rounded-circle"> -->
                <!-- <i class="fa fa-sign-out" style="font-size:48px;color:white; margin-left:1600px" ></i> -->
                </span>
                <!-- <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">Jessica Jones</span>
                </div> -->
              </div>
            </a>
            <!-- <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div> -->
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 400px; background-image: url(../assets/img/bsubg.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <!-- <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello</h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
            <a href="#!" class="btn btn-info">Edit profile</a>
          </div>
        </div>
      </div> -->
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="../assets/img/GCU_logo.png" alt="" width="450px" height="180px" class="rounded-circle">
                    <!-- <img class="image"src="../assets/img/ab.jpg" alt="Logo" class="logo" style="height: 100%; width: 20%; border-radius: 50%;"> -->

                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
              <a href="#" ></a>
                <!-- <a href="#" class="btn btn-sm btn-info mr-4">Connect</a> -->
                <a href="#" class="btn btn-sm btn-default float-right" onclick="logout()">Back</a>
              </div>
            </div>

            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <!-- <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    
                   
                   
                   
                  </div> -->
                </div>
              </div>
              <br>

              <div class="text-center">
                <h3>
                  WELCOME TO
                </h3>


                <div>
                  <i class="ni education_hat mr-2"></i>Benguet State University-Guidance and Counseling Unit
                </div>
                <hr style=" border-width: 3px; background-color:black;">
                <!-- <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.</p> -->
                <?php
                // $filePath_jpg = '../backend/uploads/id_' . $id . '_' . $pers_info[0]['last_name'] . '.jpg';
                // $filePath_png = '../backend/uploads/id_' . $id . '_' . $pers_info[0]['last_name'] . '.png';
                // $filePath_jpeg = '../backend/uploads/id_' . $id . '_' . $pers_info[0]['last_name'] . '.jpeg';
                // if (file_exists($filePath_jpg)) {
                //   // Display the image
                //   echo '<img src="' . $filePath_jpg . '" alt="Photo" style="width: 50%; height: 50% ">';
                // } elseif (file_exists($filePath_jpg)) {
                //   // Display the image
                //   echo '<img src="' . $filePath_png . '" alt="Photo" style="width: 50%; height: 50%">';
                // } elseif (file_exists($filePath_jpeg)) {
                //   // Display the image
                //   echo '<img src="' . $filePath_jpeg . '" alt="Photo" style="width: 50%; height: 50%">';
                // } else {
                //   echo 'File not found.';
                // }

                $stmt = $pdo->prepare("SELECT * FROM photos WHERE stud_user_id = :id");
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();
                
                // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                //   // $filename = $row['filename'];
                //   $id_type = $row['sign_type'];
                //   $id_data = $row['sign'];

                //   // Display the image
                //   echo '<img src="data:' . $id_type . ';base64,' . base64_encode($id_data) . '" alt="id">';
                // }
                $photo = $stmt->fetch(PDO::FETCH_ASSOC);
                // echo '<img src="data:' . $photo['sign_type'] . ';base64,' . base64_encode($photo['sign']) . '" alt="id">';
                echo '<img src="data:' . $photo['sign_type'] . ';base64,' . base64_encode($photo['sign']) . '" alt="id" style="width: 100%; height: auto;">';

                ?>


                <br>
                <hr style=" border-width: 3px; background-color:black;">
                <br>
                <?php
                // $filePath_jpg = '../backend/uploads/id_' . $id . '_' . $pers_info[0]['last_name'] . '.jpg';
                // $filePath_png = '../backend/uploads/id_' . $id . '_' . $pers_info[0]['last_name'] . '.png';
                // $filePath_jpeg = '../backend/uploads/id_' . $id . '_' . $pers_info[0]['last_name'] . '.jpeg';
                // if (file_exists($filePath_jpg)) {
                //   // Display the image
                //   echo '<img src="' . $filePath_jpg . '" alt="Photo" style="width: 50%; height: 50%">';
                // }
                // elseif(file_exists($filePath_jpg)) {
                //   // Display the image
                //   echo '<img src="' . $filePath_png . '" alt="Photo" style="width: 50%; height: 50%">';
                // }
                // elseif(file_exists($filePath_jpeg)) {
                //   // Display the image
                //   echo '<img src="' . $filePath_jpeg . '" alt="Photo" style="width: 50%; height: 50%">';
                // }
                // else {
                //   echo 'File not found.';                      
                // }
                $stmt = $pdo->prepare("SELECT * FROM photos WHERE stud_user_id = :id");
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();

                // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                //   // $filename = $row['filename'];
                //   $id_type = $row['image_type'];
                //   $id_data = $row['id'];

                //   // Display the image
                //   echo '<img src="data:' . $id_type . ';base64,' . base64_encode($id_data) . '" alt="id">';
                // }
                $photo = $stmt->fetch(PDO::FETCH_ASSOC);
                echo '<img src="data:' . $photo['image_type'] . ';base64,' . base64_encode($photo['id']) . '" alt="id" style="width: 100%; height: auto;">';


                ?>

              </div>
            </div>
          </div>


        </div>


        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">MY ACCOUNT</h3>
                </div>
                <div class="col-4 text-right">
                  <button class="btn btn-sm btn-primary" onclick="edit()">
                    <i class="fa fa-pencil"></i> Edit Account
                  </button>
                </div>

              </div>
            </div>
            <div class="card-body" style="background-color:lightgray;">
              <form id ="myForm">

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
                        <input type="password"  class="form-control form-control-alternative" id="pass" style="border:2px solid yellow;">
                        <i class="fas fa-eye" onclick="togglePasswordVisibility('pass')"></i>
                      </div>
                    </div>

                    <div class="col-lg-6" id="ps2">
                      <div class="form-group">
                        <label class="form-control-label" for="pass">Verify Password</label>
                        <input type="password"  class="form-control form-control-alternative" id="pass2" style="border:2px solid yellow;">
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
                        <!-- Editable -->
                        <!-- <input type="text" class="form-control form-control-alternative" id="crse" readonly value =  "<?php echo $pers_info[0]['course'] ?>"> -->
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
                        <!-- Editable -->
                        <!-- <input type="text" class="form-control form-control-alternative" id="YL" readonly value =  ""> -->
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
                        <!-- Editable -->
                        <input type="text" class="form-control form-control-alternative" id="sec" readonly value =  "<?php echo $pers_info[0]['Section'] ?>" oninput="limitToSingleCharacter(event)">
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Contact Number</label>
                        <!-- Editable -->
                        <input type="text" class="form-control form-control-alternative" id="CN" readonly value =  "<?php echo $pers_info[0]['Contact_number'] ?>" oninput="limitTo11Digits(event)">
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Civil Status</label>
                        <!-- Editable -->
                        <!-- <input type="text" class="form-control form-control-alternative" id="CS" readonly value =  "<?php echo $pers_info[0]['Civil_status'] ?>"> -->
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
                        <label class="form-control-label" for="input-last-name">House#/Street/Barangay/Municipality/Province/Zip Code</label>
                        <!-- Editable -->
                        <input type="text" class="form-control form-control-alternative" id="address" readonly value =  "<?php echo $pers_info[0]['Address'] ?>">
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
                          <!-- Editable -->
                          <input type="number"  class="form-control form-control-alternative" id="Fage" readonly value =  "<?php echo $father_info[0]['age'] ?>">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-country">Occupation</label>
                          <!-- Editable -->
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
                          <!-- Editable -->
                          <input type="number"  class="form-control form-control-alternative" id="Fcn" readonly value =  "<?php echo $father_info[0]['contact'] ?>" oninput="limitTo11Digits(event)">
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
                          <!-- Editable -->
                          <input type="number"  class="form-control form-control-alternative" id="Mage" readonly value =  "<?php echo $mother_info[0]['age'] ?>">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-country">Occupation</label>
                          <!-- Editable -->
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
                          <!-- Editable -->
                          <input type="number" class="form-control form-control-alternative" id="Mcn" readonly value = "<?php echo $mother_info[0]['contact'] ?>" oninput="limitTo11Digits(event)">
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
                          <!-- Editable -->
                          <input type="number" class="form-control form-control-alternative" id="Gage" readonly value =  "<?php echo $guardian_info[0]['age'] ?>">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-country">Occupation</label>
                          <!-- Editable -->
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
                          <!-- Editable -->
                          <input type="number"  class="form-control form-control-alternative" id="Gcn" readonly value =  "<?php echo $guardian_info[0]['contact'] ?>" oninput="limitTo11Digits(event)">
                        </div>
                      </div>


                    </div>

                  </div>
                </div>

                <hr class="my-4">
                <!-- Description -->
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
                <!-- Description -->
                <h3>EDUCATIONAL BACKGROUND</h3>
                <h6 class="heading-small text-muted mb-4">SENIOR HIGHSCHOOL</h6>


                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Name of the School</label>
                        <input style="height:auto;" type="text" id="s_name" class="form-control form-control-alternative" id="sen_school" readonly value =  "<?php echo $senschool_info[0]['school_name'] ?>">
                      </div>
                    </div>

                    <div class="col-lg-6" >
                      <div class="form-group id">
                        <label class="form-control-label" for="input-email">Year Graduated</label>
                        <input style="height:auto;" type="text" id="y_grad" class="form-control form-control-alternative" id="sen_school_yg" readonly value =  "<?php echo $senschool_info[0]['year'] ?>">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-email">Awards Received</label>
                    <input style="height:auto;" id="award" class="form-control form-control-alternative" id="sen_school_awards" readonly value =  "<?php echo $senschool_info[0]['awards'] ?>">

                  </div>
                </div>
                <h6 class="heading-small text-muted mb-4">JUNIOR HIGHSCHOOL</h6>


                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Name of the School</label>
                        <input style="height:auto;" type="text" id="s_name" class="form-control form-control-alternative" id="jun_school" readonly value =  "<?php echo $junschool_info[0]['school_name'] ?>">
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group id">
                        <label class="form-control-label" for="input-email">Year Graduated</label>
                        <input style="height:auto;" type="text" id="y_grad" class="form-control form-control-alternative" id="jun_school_yg" readonly value =  "<?php echo $junschool_info[0]['year'] ?>">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-email">Awards Received</label>
                    <input style="height:auto;" id="award" class="form-control form-control-alternative" id="jun_school_awards" readonly value =  "<?php echo $junschool_info[0]['awards'] ?>">

                  </div>
                </div>

                <h6 class="heading-small text-muted mb-4">ELEMENTARY</h6>


                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Name of the School</label>
                        <input style="height:auto;" type="text" id="s_name" class="form-control form-control-alternative" id="elm_school" readonly value =  "<?php echo $elemschool_info[0]['school_name'] ?>">
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group id">
                        <label class="form-control-label" for="input-email">Year Graduated</label>
                        <input style="height:auto;" type="text" id="y_grad" class="form-control form-control-alternative" id="elm_school_yg" readonly value =  "<?php echo $elemschool_info[0]['year'] ?>">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-email">Awards Received</label>
                    <input style="height:auto;" id="award" class="form-control form-control-alternative" id="elm_school_awards" readonly value =  "<?php echo $elemschool_info[0]['awards'] ?>">

                  </div>
                </div>
                <div id="otherschool">
                  <h6 class="heading-small text-muted mb-4">OTHER SCHOOL ATTENDED</h6>


                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-username">Name of the School</label>
                          <input style="height:auto;" type="text" id="s_name" class="form-control form-control-alternative" id="oth_school" readonly value =  "<?php echo $othschool_info[0]['school_name'] ?>">
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group id">
                          <label class="form-control-label" for="input-email">Year Graduated</label>
                          <input style="height:auto;" type="text" id="y_grad" class="form-control form-control-alternative" id="oth_school_yg" readonly value =  "<?php echo $othschool_info[0]['year'] ?>">
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="pl-lg-4">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-email">Awards Received</label>
                      <input style="height:auto;" id="award" class="form-control form-control-alternative" id="oth_school_awards" readonly value =  "<?php echo $othschool_info[0]['awards'] ?>">

                    </div>
                  </div>

                </div>

                <hr class="my-4">
                <!-- Description -->
                <p style="color:black; font-weight:bold;"><i>In view of the Indigenous People's Act (RA 8371), Magna Carta for
                    Persons with Disability (RA 7277, as amended by RA 9442), the (c) Solo Parents
                    Welfare Act of 2000 (RA 8972), and CHED Memorandum Order 9 s.2013, please answer
                    the following items:</i></p>


                 
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Are you a member of an Indigenous group?</label>
                        <input type="text" id="indige" class="form-control form-control-alternative" readonly value="<?php echo $pers_info[0]['IG'] ?>  <?php echo $pers_info[0]['specificIG'] ?>">

                        <!-- If yes, specify ilagay mo nalang beside yes example (Yes-Tas anong indigenous group belong) -->
                        <!-- <br>
                          <input type="text" id="s_name" class="form-control form-control-alternative">Yes -->


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

          <!-- <div class="pl-lg-4">
                  <div class="form-group focused">
                  <label >Are you a student parent?</label>
                    <input class="form-control form-control-alternative" >No
                  </div>
                </div> -->

          <hr class="my-4">
          <!-- Description -->
          <!-- Editable -->
          <h3 class="heading-small " style="color:black; font-weight: bold">SOURCES OF FINANCIAL SUPPORT</h3>


          <input type="checkbox" id="FS_parent" disabled value="<?php echo $checkedOption1 ?>">
          <!-- <i class="fa fa-check"></i> -->
          <label for="checkbox1" class="custom-checkbox-label">Parent</label>
          <br>

          <input type="checkbox" id="FS_ss" disabled value="<?php echo $checkedOption2; ?>">
          <!-- <i class="fa fa-check"></i> -->
          <label for="checkbox2">Self Supporting</label>
          <br>

          <input type="checkbox" id="FS_rg" disabled value="<?php echo $checkedOption3; ?>">
          <!-- <i class="fa fa-check"></i> -->
          <label for="checkbox3">Relative and/or Guardian</label>
          <br>

          <input type="checkbox" id="FS_sch" disabled value="<?php echo $checkedOption4; ?>">
          <!-- <i class="fa fa-check"></i> -->
          <label for="checkbox4">Scholarship - <input id="FS_sch2"  readonly value="<?php if ($oth_info[0]['specific_scholar']) {
                                                                    echo $oth_info[0]['specific_scholar'];
                                                                  } ?>"></label>
          <br>

          <input type="checkbox" id="FS_oth" disabled <?php echo $checkedOption5; ?>>
          <!-- <i class="fa fa-check"></i> -->
          <label for="checkbox5">Others - <input id="FS_oth2"  readonly value="<?php if ($oth_info[0]['specific_other']) {
                                                                echo $oth_info[0]['specific_other'];
                                                              } ?>"></label>


          <hr class="my-4">
          <!-- Description -->
          <!-- Editable -->
          <h6 class="heading-small" style="color:black; font-weight: bold">MARITAL STATUS OF PARENT</h6>


          <input type="radio" name="MS" id="MS_pam" disabled value="<?php echo $checkmarital1; ?>">
          <label for="checkbox1" class="custom-checkbox-label">Parents are married.</label>
          <br>
          <input type="radio" name="MS" id="MS_mla" disabled value="<?php echo $checkmarital2; ?>">
          <label for="checkbox1" class="custom-checkbox-label">Marriage is legally annulled.</label>
          <br>
          <input type="radio" name="MS" id="MS_notm" disabled value="<?php echo $checkmarital3; ?>">
          <label for="checkbox1" class="custom-checkbox-label">Parents are not married but are living together.</label>
          <br>
          <input type="radio" name="MS" id="MS_sp" disabled value="<?php echo $checkmarital4; ?>">
          <label for="checkbox1" class="custom-checkbox-label">Single Parent.</label>
          <br>
          <div class="checkbox-container">
          <input type="radio" name="MS" id="MS_ps" disabled value="<?php echo $checkmarital5; ?>">
          <label for="checkbox1" class="custom-checkbox-label">Parents are separated (one or both have other partners).</label>
          </div>
          <br>
          <input type="radio" name="MS" id="MS_wid" disabled value="<?php echo $checkmarital6; ?>">
          <label for="checkbox1" class="custom-checkbox-label">Widow/widower.</label>

          <!-- </div> -->
          <!-- </div> -->

          <hr class="my-4">
          <!-- Description -->
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
            <div class="fixed-buttons">
            <div class="col-4 text-right">
                  <a class="btn btn-sm btn-primary" id="Update" style="color: white;" onclick="verify()">
                    <i class="fa fa-pencil"></i> Update
                  </a>
                </div>

                <div class="col-4 text-right">
                  <a class="btn btn-sm btn-primary" id="Cancel" style="color: white;" onclick="cancel()">
                    <i class="fa fa-pencil"></i> Cancel
                  </a>
                </div>
                                                            </div>
            <!-- <button id="Update" onclick="upd()">Update</button> -->

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
                        <label for="email" style="color:black;">Verification Code:</label>
                        <input type="number" id="code" name="code" oninput="validateInput(this)" required>
                        <button onclick="update()" >Verify</button>
                    </div>
                    <!-- fasdfas -->
                    </form>
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
  <div id="topbar" class="topbar d-flex align-items-center" style="background-color:#008B8B; height: 50px; ">

  </div>
  <!-- <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6 m-auto text-center">
        <div class="copyright">
          <p>Made with <a href="https://www.creative-tim.com/product/argon-dashboard" target="_blank">Argon Dashboard</a> by Creative Tim</p>
        </div>
      </div>
    </div>
  </footer> -->

  <!-- Add this script tag to your HTML file -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    // Get the logout button element
    function logout() {

      // Display a confirmation prompt
      // var confirmation = confirm('Are you sure you want to log out?');

      // // Check if the user clicked "Yes"
      // if (confirmation) {
      // Redirect to appointment.php
      window.location.href = '../Student_Side/student-home';
      // } else {
      //   // The user clicked "No," you can add additional handling if needed
      //   console.log('Logout canceled');
      // }
    };
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
  function addHighlight(element) {
            element.classList.add('highlight');
        }

        // Function to remove highlight class
        function removeHighlight(element) {
            element.classList.remove('highlight');
        }
        function edit() {
    console.log("Edit btn clicked");
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

    // Add event listeners for focus and blur events
    // email.addEventListener('focus', function () {
    //     addHighlight(email);
    // });

    email.style.border = '2px solid yellow';

    // pass.style.border = '2px solid yellow';

    // pass2.style.border = '2px solid yellow';

    crse.style.border = '2px solid yellow';

    yl.style.border = '2px solid yellow';

    sec.style.border = '2px solid yellow';

    cn.style.border = '2px solid yellow';

    cs.style.border = '2px solid yellow';

    adrs.style.border = '2px solid yellow';

    fage.style.border = '2px solid yellow';

    focc.style.border = '2px solid yellow';

    fcn.style.border = '2px solid yellow';

    mage.style.border = '2px solid yellow';

    mocc.style.border = '2px solid yellow';

    mcn.style.border = '2px solid yellow';

    gage.style.border = '2px solid yellow';

    gocc.style.border = '2px solid yellow';

    gcn.style.border = '2px solid yellow';

    // Show buttons or perform other actions as needed
  
}
function cancel(){

  // email.style.border = '';

  //       crse.style.border = '';

  //       yl.style.border = '';

        
  //       sec.style.border = '';

  //       cn.style.border = '';

  //       cs.style.border = '';

  //       adrs.style.border = '';

  //       fage.style.border = '';

  //       focc.style.border = '';

  //       fcn.style.border = '';

  //       mage.style.border = '';

  //       mocc.style.border = '';

  //       mcn.style.border = '';

  //       gage.style.border = '';

  //       gocc.style.border = '';

  //       gcn.style.border = '';



  location.reload();
  cnl.hide();
  upd.hide();
     pass.hide();
     pass2.hide();
}

function verify(){
  document.getElementById("modal").style.display = "block";
                // Show loading spinner
                Swal.fire({
                title: 'Sending Code',
                text: "Please check your email for the code in order to procedd with the update",
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                    },
            });
    
    console.log("performing ajax");
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
          console.log(data);
          
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
              console.log("Success",data)


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
              console.log("Success",data)


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
      console.log("Upd btn clicked");
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


                    console.log("id: ", id);
                    console.log("crse: ", crse);

                    
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
            Gcn: gcn

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
            console.log("Server Response:", data);
            // Swal.fire({
            //   icon: "success",
            //   title: "Information Updated!"
            // });
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
            
              console.log("logged", response);
            }
          });
            console.log("Updated:", data);
            // crse.disabled = true;

            // 
            // yl.setAttribute('readonly', true);
            //   sec.setAttribute('readonly', true);
            //   cn.setAttribute('readonly', true);
            //   cs.setAttribute('readonly', true);
            //   adrs.setAttribute('readonly', true);
            //   fage.setAttribute('readonly', true);
            //   focc.setAttribute('readonly', true);
            //   fcn.setAttribute('readonly', true);
            //   mage.setAttribute('readonly', true);
            //   mocc.setAttribute('readonly', true);
            //   mcn.setAttribute('readonly', true);
            //   gage.setAttribute('readonly', true);
            //   gocc.setAttribute('readonly', true);
            //   gcn.setAttribute('readonly', true);

            // 
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
    

                      // Remove the 'disabled' attribute
      //                 crse.disabled = true;

      // upd.hide();

    }

  </script>








</body>