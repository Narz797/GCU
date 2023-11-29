<?php
include("../backend/connect_database.php");

session_start();
// Check if the session variable is empty
if (empty($_SESSION['session_id'])) {
  // Redirect to the desired location
  echo "<script>alert('You have already Logged out. You will be redirected.'); window.location.href = 'http://localhost/GCU/home';</script>";

  exit; // Make sure to exit the script after a header redirect
}

$id = $_SESSION['session_id'];

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

  html {
    font-family: sans-serif;
    line-height: 1.15;
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;
    -ms-overflow-style: scrollbar;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
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
    color: #32325d;
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
    color: #8898aa !important;
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
  <!-- <section id="topbar" class="topbar d-flex align-items-center" style="background-color:#20B2AA; height: 50px; "><i class="fa fa-sign-out" style="font-size:48px;color:black; margin-left:1650px" ></i> -->
  <!-- </section>  -->

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
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(../assets/img/bsubg.jpg); background-size: cover; background-position: center top;">
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
                <a href="#" class="btn btn-sm btn-default float-right" onclick="logout()">Logout</a>
              </div>
            </div>
            <br>
            <br>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <!-- <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    
                   
                   
                   
                  </div> -->
                </div>
              </div>
              <br>
              <br>
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
                
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  // $filename = $row['filename'];
                  $id_type = $row['sign_type'];
                  $id_data = $row['sign'];

                  // Display the image
                  echo '<img src="data:' . $id_type . ';base64,' . base64_encode($id_data) . '" alt="id">';
                }
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

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  // $filename = $row['filename'];
                  $id_type = $row['image_type'];
                  $id_data = $row['id'];

                  // Display the image
                  echo '<img src="data:' . $id_type . ';base64,' . base64_encode($id_data) . '" alt="id">';
                }


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
                <!-- <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">
                    <i class="fa fa-pencil"></i> Edit Account
                  </a>
                </div> -->

              </div>
            </div>
            <div class="card-body" style="background-color:lightgray;">
              <form>

                <h6 class="heading-small text-muted mb-4" style="color:black; font-weight:bold;">User information </h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">ID No.</label>
                        <section type="text" id="input-username" class="form-control form-control-alternative" id="id"><?php echo $pers_info[0]['stud_user_id'] ?></section>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Last Name</label>
                        <section type="email" id="input-email" class="form-control form-control-alternative" id="lname"><?php echo $pers_info[0]['last_name'] ?><section>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <section type="text" id="input-first-name" class="form-control form-control-alternative" id="fname"><?php echo $pers_info[0]['first_name'] ?></section>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Middle Name</label>
                        <section type="text" id="input-last-name" class="form-control form-control-alternative" id="mname"><?php echo $pers_info[0]['middle_name'] ?></section>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Course</label>
                        <section type="text" id="input-last-name" class="form-control form-control-alternative" id="crse"><?php echo $pers_info[0]['course'] ?></section>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Year Level</label>
                        <section type="text" id="input-last-name" class="form-control form-control-alternative" id="YL"><?php echo $pers_info[0]['Year_level'] ?></section>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Section</label>
                        <section type="text" id="input-last-name" class="form-control form-control-alternative" id="sec"><?php echo $pers_info[0]['Section'] ?></section>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Contact Number</label>
                        <section type="text" id="input-last-name" class="form-control form-control-alternative" id="CN"><?php echo $pers_info[0]['Contact_number'] ?></section>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Civil Status</label>
                        <section type="text" id="input-last-name" class="form-control form-control-alternative" id="CS"><?php echo $pers_info[0]['Civil_status'] ?></section>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Date of Birth</label>
                        <section type="text" id="input-last-name" class="form-control form-control-alternative" id="bday"><?php echo $pers_info[0]['birth_date'] ?></section>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Birthplace</label>
                        <section type="text" id="input-last-name" class="form-control form-control-alternative" id="bplace"><?php echo $pers_info[0]['Birth_place'] ?></section>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Nationality</label>
                        <section type="text" id="input-last-name" class="form-control form-control-alternative" id="nationality"><?php echo $pers_info[0]['Nationality'] ?></section>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Languages/Dialects you can read, write, and understand</label>
                        <section type="text" id="input-last-name" class="form-control form-control-alternative" id="lang"><?php echo $pers_info[0]['Languages_and_dialects'] ?></section>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">House Number/Street/Barangay/Municipality/Province/Zip Code</label>
                        <section type="text" id="input-last-name" class="form-control form-control-alternative" id="address"><?php echo $pers_info[0]['Address'] ?></section>
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
                          <label class="form-control-label" for="input-city">Lastname</label>
                          <section type="text" id="flast" class="form-control form-control-alternative" id="Flname"><?php echo $father_info[0]['lname'] ?></section>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-country">Firstname</label>
                          <section type="text" id="ffirst" class="form-control form-control-alternative" id="Fnlname"><?php echo $father_info[0]['fname'] ?></section>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country">Middlename</label>
                          <section type="number" id="fmiddle" class="form-control form-control-alternative" id="Fmname"><?php echo $father_info[0]['mname'] ?></section>
                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-city">Age</label>
                          <section type="number" id="fage" class="form-control form-control-alternative" id="Fage"> <?php echo $father_info[0]['age'] ?></section>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-country">Occupational</label>
                          <section type="number" id="foccupational" class="form-control form-control-alternative" id="Focc"> <?php echo $father_info[0]['occupation'] ?> </section>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country"> Highest Educational Attainment</label>
                          <section type="number" id="feducation" class="form-control form-control-alternative" id="Fcol"> <?php echo $father_info[0]['educ_background'] ?> </section>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country"> Contact Number</label>
                          <section type="number" id="feducation" class="form-control form-control-alternative" id="Fcn"> <?php echo $father_info[0]['contact'] ?> </section>
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
                          <label class="form-control-label" for="input-city">Lastname</label>
                          <section type="text" id="flast" class="form-control form-control-alternative" id="Mlname"><?php echo $mother_info[0]['lname'] ?></section>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-country">Firstname</label>
                          <section type="text" id="ffirst" class="form-control form-control-alternative" id="Mfname"><?php echo $mother_info[0]['fname'] ?></section>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country">Middlename</label>
                          <section type="number" id="fmiddle" class="form-control form-control-alternative" id="Mmname"><?php echo $mother_info[0]['mname'] ?></section>
                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-city">Age</label>
                          <section type="number" id="fage" class="form-control form-control-alternative" id="Mage"><?php echo $mother_info[0]['age'] ?></section>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-country">Occupational</label>
                          <section type="number" id="foccupational" class="form-control form-control-alternative" id="Mocc"><?php echo $mother_info[0]['occupation'] ?></section>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country"> Highest Educational Attainment</label>
                          <section type="number" id="feducation" class="form-control form-control-alternative" id="Mcol"><?php echo $mother_info[0]['educ_background'] ?></section>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country"> Contact Number</label>
                          <section type="number" id="feducation" class="form-control form-control-alternative" id="Mcn"><?php echo $mother_info[0]['contact'] ?></section>
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
                          <section type="text" id="flast" class="form-control form-control-alternative" id="Glname"><?php echo $guardian_info[0]['lname'] ?></section>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-country">Firstname</label>
                          <section type="text" id="ffirst" class="form-control form-control-alternative" id="Gfname"><?php echo $guardian_info[0]['fname'] ?></section>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country">Middlename</label>
                          <section type="number" id="fmiddle" class="form-control form-control-alternative" id="Gmname"><?php echo $guardian_info[0]['mname'] ?></section>
                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-city">Age</label>
                          <section type="number" id="fage" class="form-control form-control-alternative" id="Gage"> <?php echo $guardian_info[0]['age'] ?> </section>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-country">Occupational</label>
                          <section type="number" id="foccupational" class="form-control form-control-alternative" id="Gocc"> <?php echo $guardian_info[0]['occupation'] ?></section>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country"> Highest Educational Attainment</label>
                          <section type="number" id="feducation" class="form-control form-control-alternative" id="Gol"><?php echo $guardian_info[0]['educ_background'] ?></section>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country"> Contact Number</label>
                          <section type="number" id="feducation" class="form-control form-control-alternative" id="Gcn"><?php echo $guardian_info[0]['contact'] ?></section>
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
                        <label class="form-control-label" for="input-username">Name of the School</label>
                        <section style="height:auto;" type="text" id="s_name" class="form-control form-control-alternative" id="sen_school"><?php echo $senschool_info[0]['school_name'] ?></section>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Year Graduated</label>
                        <section style="height:auto;" type="text" id="y_grad" class="form-control form-control-alternative" id="sen_school_yg"><?php echo $senschool_info[0]['year'] ?><section>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-email">Awards Received</label>
                    <section style="height:auto;" id="award" class="form-control form-control-alternative" id="sen_school_awards"><?php echo $senschool_info[0]['awards'] ?></section>

                  </div>
                </div>
                <h6 class="heading-small text-muted mb-4">JUNIOR HIGHSCHOOL</h6>


                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Name of the School</label>
                        <section style="height:auto;" type="text" id="s_name" class="form-control form-control-alternative" id="jun_school"><?php echo $junschool_info[0]['school_name'] ?></section>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Year Graduated</label>
                        <section style="height:auto;" type="text" id="y_grad" class="form-control form-control-alternative" id="jun_school_yg"><?php echo $junschool_info[0]['year'] ?><section>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-email">Awards Received</label>
                    <section style="height:auto;" id="award" class="form-control form-control-alternative" id="jun_school_awards"><?php echo $junschool_info[0]['awards'] ?></section>

                  </div>
                </div>

                <h6 class="heading-small text-muted mb-4">ELEMENTARY</h6>


                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Name of the School</label>
                        <section style="height:auto;" type="text" id="s_name" class="form-control form-control-alternative" id="elm_school"><?php echo $elemschool_info[0]['school_name'] ?></section>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Year Graduated</label>
                        <section style="height:auto;" type="text" id="y_grad" class="form-control form-control-alternative" id="elm_school_yg"><?php echo $elemschool_info[0]['year'] ?><section>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-email">Awards Received</label>
                    <section style="height:auto;" id="award" class="form-control form-control-alternative" id="elm_school_awards"><?php echo $elemschool_info[0]['awards'] ?></section>

                  </div>
                </div>
                <div id="otherschool">
                  <h6 class="heading-small text-muted mb-4">OTHER SCHOOL ATTENDED</h6>


                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-username">Name of the School</label>
                          <section style="height:auto;" type="text" id="s_name" class="form-control form-control-alternative" id="oth_school"><?php echo $othschool_info[0]['school_name'] ?></section>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Year Graduated</label>
                          <section style="height:auto;" type="text" id="y_grad" class="form-control form-control-alternative" id="oth_school_yg"><?php echo $othschool_info[0]['year'] ?><section>
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="pl-lg-4">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-email">Awards Received</label>
                      <section style="height:auto;" id="award" class="form-control form-control-alternative" id="oth_school_awards"><?php echo $othschool_info[0]['awards'] ?></section>

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
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Are you a member of an Indigenous group?</label>
                        <section type="text" id="indige" class="form-control form-control-alternative"><span id="ip"><?php echo $pers_info[0]['IG'] ?></span> - <span id="ip2"><?php echo $pers_info[0]['specificIG'] ?></span></section>
                        <!-- If yes, specify ilagay mo nalang beside yes example (Yes-Tas anong indigenous group belong) -->
                        <!-- <br>
                          <section type="text" id="s_name" class="form-control form-control-alternative">Yes</section> -->


                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Are you a person with a disability (PWD)?</label>
                        <section type="text" id="pwd" class="form-control form-control-alternative" id="pwd"><?php echo $pers_info[0]['PWD'] ?><section>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">Are you a student parent ?</label>
                    <section type="text" id="stud_parent" class="form-control form-control-alternative" id="sp"><?php echo $pers_info[0]['Student_parent'] ?><section>
                  </div>
                </div>
            </div>
          </div>

          <!-- <div class="pl-lg-4">
                  <div class="form-group focused">
                  <label >Are you a student parent?</label>
                    <section class="form-control form-control-alternative" >No</section>
                  </div>
                </div> -->

          <hr class="my-4">
          <!-- Description -->
          <h3 class="heading-small " style="color:black; font-weight: bold">SOURCES OF FINANCIAL SUPPORT</h3>


          <input type="checkbox" id="FS_parent" disabled <?php echo $checkedOption1 ?>>
          <!-- <i class="fa fa-check"></i> -->
          <label for="checkbox1" class="custom-checkbox-label">Parent</label>
          <br>

          <input type="checkbox" id="FS_ss" disabled <?php echo $checkedOption2; ?>>
          <!-- <i class="fa fa-check"></i> -->
          <label for="checkbox2">Self Supporting</label>
          <br>

          <input type="checkbox" id="FS_rg" disabled <?php echo $checkedOption3; ?>>
          <!-- <i class="fa fa-check"></i> -->
          <label for="checkbox3">Relative and/or Guardian</label>
          <br>

          <input type="checkbox" id="FS_sch" disabled <?php echo $checkedOption4; ?>>
          <!-- <i class="fa fa-check"></i> -->
          <label for="checkbox4">Scholarship - <span id="FS_sch2"><?php if ($oth_info[0]['specific_scholar']) {
                                                                    echo $oth_info[0]['specific_scholar'];
                                                                  } ?></span></label>
          <br>

          <input type="checkbox" id="FS_oth" disabled <?php echo $checkedOption5; ?>>
          <!-- <i class="fa fa-check"></i> -->
          <label for="checkbox5">Others - <span id="FS_oth2"><?php if ($oth_info[0]['specific_other']) {
                                                                echo $oth_info[0]['specific_other'];
                                                              } ?></span></label>


          <hr class="my-4">
          <!-- Description -->
          <h6 class="heading-small" style="color:black; font-weight: bold">MARITAL STATUS OF PARENT</h6>


          <input type="checkbox" id="MS_pam" disabled <?php echo $checkmarital1; ?>>
          <label for="checkbox1" class="custom-checkbox-label">Parents are married.</label>
          <br>
          <input type="checkbox" id="MS_mla" disabled <?php echo $checkmarital2; ?>>
          <label for="checkbox1" class="custom-checkbox-label">Marriage is legally annulled.</label>
          <br>
          <input type="checkbox" id="MS_notm" disabled <?php echo $checkmarital3; ?>>
          <label for="checkbox1" class="custom-checkbox-label">Parents are not married but are living together.</label>
          <br>
          <input type="checkbox" id="MS_sp" disabled <?php echo $checkmarital4; ?>>
          <label for="checkbox1" class="custom-checkbox-label">Single Parent.</label>
          <br>
          <input type="checkbox" id="MS_ps" disabled <?php echo $checkmarital5; ?>>
          <label for="checkbox1" class="custom-checkbox-label">Parents are separated (one or both have other partners).</label>
          <br>
          <input type="checkbox" id="MS_wid" disabled <?php echo $checkmarital6; ?>>
          <label for="checkbox1" class="custom-checkbox-label">Widow/widower.</label>

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

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
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
    // Function to update the HTML elements
    function updateValues(fname, lname, transactType, total, totalAppointments, employee_email, employee_position, employee_date_joined, eFname, eLname, ePosition, gender) {

      const genderImageMap = {
        'Male': 'assets/images/sp.jpg',
        'Female': 'assets/images/sp2.jpg'
      };
      const image = document.createElement('img');
      image.style.display = 'block'; // Display the image above the text

      if (gender === 'Male') {
        image.src = genderImageMap['Male'];
      } else if (gender === 'Female') {
        image.src = genderImageMap['Female'];
      }

      $('#studentId').text(fname + " " + lname);
      $('#transactType').text(transactType);
      $('#total').text(total);
      $('#employee_email').text(employee_email);
      $('#employee_position').text(employee_position);
      $('#date_joined').text(employee_date_joined);
      $('#totalAppointments').text(totalAppointments);
      $('#position').text(ePosition);
      $('#fname').text(eFname);
      $('#lname').text(eLname);

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
        url: '../backend/get_transaction.php',
        dataType: 'json',

        // ...
        success: function(data) {
          console.log(data.latest_data);
          if (data.latest_data && data.latest_data.length > 0) {
            sid = data.latest_data[0].student_id;
            var fname = data.latest_data[0].first_name;
            var lname = data.latest_data[0].last_name;
            var transactType = data.latest_data[0].transact_type;
            tt = data.latest_data[0].transact_type;
            tid = data.latest_data[0].transact_id;
            var total = data.total_pending_transactions;
            var totalAppointments = data.total_appointments; // Define total here
            var employee_email = data.adminUserData[0].email;
            var employee_position = data.adminUserData[0].position;
            var employee_date_joined = data.adminUserData[0].date_joined;
            var eFname = data.adminUserData[0].first_name;
            var eLname = data.adminUserData[0].last_name;
            var ePosition = data.adminUserData[0].position;
            var eGender = data.adminUserData[0].gender;
            console.log(totalAppointments);
            updateValues(fname, lname, transactType, total, totalAppointments, employee_email, employee_position, employee_date_joined, eFname, eLname, ePosition, eGender);
            console.log(total);
            // Start both counting animations
            countAppointments(totalAppointments);
            countForms(total);
          } else {
            // Handle the case when no results are found
            // You can update the UI as needed
            var studentId = "None";
            var total = 0;
            var totalAppointments = 0; // Define total here
            var employee_email = data.adminUserData[0].email;
            var employee_position = data.adminUserData[0].position;
            var employee_date_joined = data.adminUserData[0].date_joined;
            var eFname = data.adminUserData[0].first_name;
            var eLname = data.adminUserData[0].last_name;
            var ePosition = data.adminUserData[0].position;
            var eGender = data.adminUserData[0].gender;
            console.log(totalAppointments);
            updateValues(studentId, transactType, total, totalAppointments, employee_email, employee_position, employee_date_joined, eFname, eLname, ePosition, eGender);
            console.log(total);
            // Start both counting animations
            countAppointments(totalAppointments);
            countForms(total);
            console.log('No results found');
          }
        },
        error: function(xhr, status, error) {
          console.error('Error: ' + error);
          console.error('Status: ' + status);
          console.error('Response: ' + xhr.responseText);
        }
      });
    }
  </script>

<!-- <section id="topbar" class="topbar d-flex align-items-center" style="background-color: #008B8B; height: auto;">
    
    <footer class="d-flex justify-content-center" style="width: 100%;">
    
     

        <p style="text-align: center; margin: 0; display: block;">BENGUET STATE UNIVERSITY <br> &copy; <?php echo date("Y"); ?>. Guidance and Counseling Unit. All rights reserved.</p>
        
        <br>
        <br>
        <br>
    </footer>
 
</section> -->



  <section id="topbar" class="topbar d-flex align-items-center" style="background-color:#008B8B; height: 50px; "></section>



</body>