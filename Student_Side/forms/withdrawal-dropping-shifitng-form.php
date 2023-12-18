<!doctype html>
<?php
session_start();
include '../../backend/log_audit2.php';
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
      window.location.href = '../../home';
  });
  });
    </script>
    <?php
    exit;
}
$_SESSION['transact_type']='WDS';//asign value to transact_type
logAudit($_SESSION['session_id'], 'access_wds form', $_SESSION['session_id'] .' has accessed the WDS page');
?>



<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <title>Withdrawal/Dropping/Shifting Slip</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="../assets/img/GCU_logo.png" rel="icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS and JS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- jQuery UI and Bootstrap Datepicker -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <!-- DataTables CSS and JS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <!-- Font Awesome and Remix Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&family=Rock+Salt&display=swap');
:root{
    --light-color: #fff;
    --dark-color: black; 
    --accent-color: #ecad00;
    --body-background-color: #eef0f8;
    --hover-color: #fde7b4;
    --banner-color: #F5F5DC;
    --shadow-color: lightblue;
    --font-color: #568203;
    --title-color: #FEBE10;
    --positive-color: #86e49d; 
    --negative-color: #d893a3 ;
    --pending-color: #ebc474;
    --transparent-button-color: var(--accent-color);
    --font-size-small: 1.4rem;
    --font-size-normal: 1.6rem;
    --font-size-medium: 2rem;
    --font-size-large: 2.4rem;
    --font-family: 'Poppins', sans-serif;
    --font-primary:  "Montserrat", sans-serif;
    --margin-small: 1rem;
    --margin-medium: 1.5rem;
    --gap-small: 1rem;
    --gap-medium: 2.5rem;
}
.theme-light{
    --light-color: black;
    --dark-color: #fff;
    --body-background-color: #eef0f8;
    --shadow-color: lightblue;
    --font-color:#32CD32;
    --title-color: darkgreen;
    --transparent-button-color: var(--accent-color);
}

/* Base styles */
*,
*::before,
*::after{
    margin: 0;
    padding: 0;
    box-sizing: border-box;}
html{
    font-size: 10px;}
body{
    font-family: var(--font-family);
    font-size: var(--font-size-normal);
    color: var(--light-color);
    line-height: 1.5;
    background-color: var(--body-background-color);}
.hidden {
    display: none;}
ul{
    list-style: none;}
.info p{
    padding: 10px;
    font-weight: 200;
    font-size:18px;
    color: black;
    text-align: justify;}
a{
    text-decoration: none;
    color: var(--light-color);}
img{
    max-width: 100%;
    display: block;}
button{
    font: inherit;
    color: inherit;
    background-color: transparent;
    border: none;
    border-radius: .4rem;
    cursor: pointer;}
.form-control1{
    width: 25%;
    padding: 16px;
    display: block;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.375rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;}

/* Reusable classes */
.container{
    margin: 0 auto;
    padding: 0 1.5rem;}
.place-items-center{
    display: inline-flex !important;
    align-items: center;
    justify-content: center;}

/* Header */
.header{
    transition: all 0.5s;
    background-color:#008374;}
.nav{
    height: 7rem;
    display: flex;
    align-items: center;}
 .logo img{
    display: flex;
    margin-left: 10px;
    width: 50px; 
    height:50px; 
    padding:2px;}
.nav-mobile{
    width: 100%;
    height: 100vh;
    background-color: var(--dark-color);
    position: fixed;
    top: 0;
    left: 0;
    padding: 2.5rem;
    z-index: 999;
    transition: transform .5s;
    transform: translateX(-105%);}
.list{
    display: flex;
    flex-direction: column;
    gap: var(--gap-small);} 
  .list-link{
      display: inline-block;
      font-size: var(--font-size-small);
      padding: 1rem 1.5rem;}
.current{
    background-color: var(--accent-color);}
.current:hover{
    color: var(--dark-color);
    background-color: var(--hover-color);}
.menu-toggle-close{
    background-color: var(--accent-color);
    position: absolute;
    top: 2.5rem;
    right: 2.5rem;}
.current1:hover{
    background-color: var(--hover-color);
    color: var(--light-color);}
.icon-btn{
    width: 3.5rem;
    height: 3.5rem;
    color: white;}
.icon-btn i{
    font-size: var(--font-size-large);
    line-height: 0; }
.icon-btn:hover{
    padding:10px;
    background-color: var(--hover-color);
    color: black;}
.hov:hover{
    background-color: var(--hover-color);
    color: var(--dark-color);}
.align-right{
    margin-left: auto;
    background-color: var(--accent-color);
    border-radius: .4rem;}
.theme-dark-icon{
    display: none;}
  
/* Banner */
.banner{
    background-color: var(--banner-color); 
    color:black;}
.banner-container{
    display:flex; 
    justify-content:center; 
    padding-top:2%; 
    padding-bottom: 2%;}
.banner-container img{
    display: inline-block; 
    vertical-align: middle;  
    width:10%; 
    height:auto;}
.banner-text{
    display: inline-block; 
    vertical-align: middle;}
.banner-text h5{
    font-size: 1vw;
    font-family: 'Georgia', serif;}
.banner-line{
    width: 100%; 
    border-color: black; 
    margin-bottom: 0;}
.banner-text h2{
    font-size: 1.8vw;
    font-family: 'Times New Roman', serif;}
.banner-text h1{
    font-size: 2vw;
    font-family: 'Garamond', serif;
    font-weight: bold;}
.block{
    background-color: #008374; 
    height:50px;}

/* First Section */
.title{
    font-size: var(--font-size-normal);
    margin-bottom: var(--margin-small);}
.independent-title{
    font-size: var(--font-size-medium);
    color: var(--dark-color);
    padding: 2.5rem 0 1.25rem;
    background-color: #008374;}
.independent-title h2{
    font-size: 25px;
    font-weight: bold;
    margin-left: 40px;}
.independent-title1 {
    font-size: var(--font-size-medium);
    color: var(--light-color);
    padding: 2.5rem 0 1.25rem;
    background-color: #008374; }
.independent-title1 h2 {
    font-size: 25px;
    font-weight: bold;
    margin-left: 40px;}
.card{
    background-color: var(--light-color);
    padding: 2.5rem;
    border-radius: .5rem;
    box-shadow:.5rem .5rem 1rem rgba(82, 63, 105, .0.5);}
.card-header{
    padding-block: 1rem;
    background-color: var(--body-background-color);}
.card-header small{
    font-size: 1.2rem;
    color: var(--font-color);
    font-weight: bold;
    font-family: 'Georgia', serif;}
.card-header .title{
    color:black;
    margin-bottom: 0;
    font-size: 20px;}
.card hr{
    margin: 2rem;}
.card-body{
    display: flex;}
.card-image{
    padding: 0 2rem;}
.card-image img{
    width: 200px;
    height: 200px;
    border-radius: 50%;
    box-shadow: 10px 4px 5px var(--shadow-color);}
.card-information{
    max-width: 100%;
    display: block;
    margin-left: 2%;}
.title-lastname{
    font-weight: bold;
    text-transform: uppercase;}
.main-title{
    font-size: 30px;
    font-family: 'Arial', serif;
    color: #e86100;}
.card-description1{
    font-size: 12px;}
.card-description1 span{
    color: var(--font-color);}
.card-description1 b{
    color: var(--accent-color);}
.card-description{
    font-size: 17px;
    margin-bottom: var(--margin-small);}
.card-description span{
    color: #8c8c8c;}
.card-image1 img{
    max-width: 100%;
    height: 200px;
    border-radius: 1%;
    margin-left: 0px;}

/* Management area */
.management-area {
    padding-block: 2.5rem;}
.management-area-container {
    gap: var(--gap-medium);}
.card-group .card{
    position: relative;
    display: flex;
    flex-direction: column;
    min-height: 17.5rem;
    border-radius: .4rem;}
.card-group .card::after {
    content: '';
    position: absolute;
    width: 10rem;
    height: 10rem;
    top: -2px;
    right: -2px;
    z-index: -1;
    border-radius: inherit;}
.header-side{
    text-align: center;}
.header-side small{
    font-family: 'Garamond', serif;
    font-size: 15px;}
.card-body-link{
    font-size: var(--font-size-small);
    background-color: #ecad00;
    margin-bottom: var(--margin-medium);
    padding: 1.5rem;
    border-radius: 4rem;
    display: flex;
    align-items: center;
    gap: var(--gap-small);
    color: white;}
.card-body-link:hover{
    background-color: var(--hover-color);
    color: black;}
.border {
    background-image: linear-gradient(225deg, var(--accent-color), transparent, var(--light-color));}
.two, .three{
    box-shadow: 10px 10px 4px var(--shadow-color);}
.card-group .title{
    font-family:var(--font-primary);
    color: var(--title-color);
    font-weight: bold;}
.card-group .card-description{
    margin-bottom: var(--margin-medium);}
.card-description b{
    font-family:var(--font-primary);
    font-size: 18px;}
.list-link{
    margin: 10px;
    font-size: var(--font-size-small);
    background-color: var(--accent-color);
    padding: 1rem 1.5rem;
    color: white;}
.list-link:hover{
    color: black;
    background-color: var(--hover-color);}
.card-group .list-link:hover{
    background-color: var(--hover-color);}
.wrapper{
    position: absolute;
    width: 25vw;
    transition: translate(-50%, -50%);
    display: flex;
    left: 8%;}
.count{
    width: 15vmin; 
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    padding: 0.5em 0;
    position: relative;}
.count i{
    color: var(--title-color);
    text-align: center;
    margin-bottom: 2rem;}
.num{
    display: grid;
    place-items: center;
    font-size: 3rem;
    font-weight: 600;}
.text{
    font-size: 1.5rem;
    text-align: center;
    pad: 0.7em 0;
    padding-bottom: 5px;
    font-weight: 400;
    line-height: 0;}

#dynamicTable_paginate .paginate_button:hover {
    background-color: #34af6d;
    border-radius: 10%;
    color: black !important;}
#dynamicTable_paginate .paginate_button {
    color: black ;}
.btn1{
    width: 50%;
    margin-top: 8px;
    padding: 7px;
    cursor: pointer;
    border-radius: 10px;
    background: #34af6d;
    border: 1px solid #4AD489;
    font-size: 18px;}
.btn1:hover{
    background: #008000;
    color: white;
    transition: 0.5s;}
.delivered{
    background-color: #86e49d;
    color: #006b21;}
.cancelled{
    background-color: #d893a3;
    color: #b30021;}
.pending {
    background-color: #ebc474;}
.card1{
    color: black;}
 .card-body1{
    padding: 20px;}
label{
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    font-size:18px;
   font-family: "Century Gothic", sans-serif;}
textarea {
    box-shadow: 0 5px 10px rgba(0, 0, 0, 1); /* Solid black box shadow */
    width: 100%;
    padding: 8px;
    height:200px;
    margin-bottom: 16px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    font-family: "Century Gothic", sans-serif;
    font-size:18px;}
 .btnText {
    padding-right: 4px;
    font-size: 14px;
    font-weight: 400;}
.amen{
    display: flex;
    margin-right: 4.2rem;
    margin-left: 4.2rem;
    align-items: center;
    justify-content: space-between;}
.btnText1:hover{
    background-color: #265df2; }
.btnText1{
    font-size: 14px;
    align-items: center;
    justify-content: center;
    height: 45px;
    max-width: 200px;
    width: 100%;
    border: none;
    outline: none;
    color: #fff;
    border-radius: 5px;
    margin: 25px 0;
    background-color: #4070f4;
    transition: all 0.3s linear;
    cursor: pointer;}
card1 button:hover {
    background-color: #265df2;}
.card1 button {
    font-size: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 45px;
    max-width: 200px;
    width: 100%;
    border: none;
    outline: none;
    color: #fff;
    border-radius: 5px;
    margin: 25px 0;
    background-color: #4070f4;
    transition: all 0.3s linear;
    cursor: pointer; }

/* Define the fadeInUp animation */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);}
  to {
    opacity: 1;
    transform: translateY(0);}
}
.card1 h1{
    margin-left:10px;
    text-align: center;
    font-family: "Century Gothic", sans-serif;}
.semester-year-container {
  display: flex;
  gap: 10px;
  align-items: center;}
      
/* Style for the semester dropdown */
select {
  color: black;
    padding: 12px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  width: 275px;
  box-sizing: border-box;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 1);}
option{
  font-family: "Century Gothic", sans-serif;
  font-size: 16px; }
.year-input-container {
  display: flex;
  align-items: center;
  margin-bottom: 10px;}
.year-input-group {
  display: flex;
  align-items: center;}
 label {
  margin-right: 5px;}
  .year-input {
  padding: 8px;
  font-size: 14px;
  border: 1px solid #ccc;
  border-radius: 4px;
  width: 80px; 
  box-sizing: border-box;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 1); }
.year-input:focus {
  outline: none;
  border-color: #007bff;
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);}
.reminder-container {
    display: flex;
      align-items: center;}
input[type="file"] {
  display: none;}
label[for="fileUpload"] {
  background-color:#009000;
  color: white;
  padding: 10px 15px;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bold;
  display: inline-block;
  font-size: 18px;}
label[for="fileUpload"]:hover {
  background-color:#008080;
  font-size: 18px;}

/* Scrollbar */
::-webkit-scrollbar {
    width: 1rem;}
::-webkit-scrollbar-track {
    background-color: transparent;}
::-webkit-scrollbar-thumb {
    background-color: var(--accent-color);}
::-webkit-scrollbar-thumb:hover {
    background-color: var(--accent-color);}

/* Media queries */
@media screen and (min-width: 769px) {
.nav{
  height: 7rem;}
.independent-title{
  font-size: var(--font-size-large);
  padding: 4rem 0 2rem;}
    .card-body{
  grid-template-columns: repeat(2, 1fr);
  align-items: center;
  gap: var(--gap-medium);
  padding-block: 2.5rem;}
    .card-image{
  padding: 0;}
    .card-image img{
  max-width: 80%;
  margin: auto;}
    .card-image1 img{
  margin-left: 1%;}
    .card-body-link:hover{
  background-color: var(--hover-color);}
    .d-grid{
  display: grid;}
    .management-area-container{
  grid-template-columns: 35rem 1fr;}
    .card-group .list-link:hover{
  background-color: var(--hover-color);}
    .footer-container{
  flex-direction: row;
  align-items: center;}
    .copyright-information{
  order: 0}
    .footer .list{
  flex-direction: row;
  margin-left: auto;}
    .footer .list-link{
  padding-left: 1.5rem;}
    .footer .list-item:hover{
  color: var(--accent-color);}
}

@media screen and (min-width: 1025px) {
    .menu-toggle-btn{
  display: none !important;}
    .nav-mobile{
  width: initial;
  height: initial;
  background-color: initial;
  position: initial;
  padding: initial;
  transform: initial;
  transition: initial;}
    .nav-mobile > .list{
  flex-direction: row;
  margin-left: 3rem;}
    .list-link,
    .card-body-link{
  transition: color .25s; 
  background-color: .25s;}
    .nav-mobile .list-link{
  border-radius: .4rem;}
    .card-image1 img{
  margin-left: 1%;}
.card-body-link:hover{
  background-color: var(--hover-color);}
.current:hover{
  color: var(--dark-color);
  background-color: var(--hover-color);}
    .card-group{
  grid-template-columns: repeat(2, 1fr);}
    .one{
  grid-column: 1/-1;}
    .two,
    .three{
  grid-column: 1/2;
  box-shadow: 10px 10px 4px var(--shadow-color);}
    .four{
  grid-column: 2/-1;
  grid-row: 2/4;}
    .card-group .list-link:hover{
  background-color: var(--hover-color);}
    .footer .list-item:hover{
  color: var(--accent-color);}}
</style>

<body>

<header class="header">
    <nav class="nav"> 
  <div class="logo">
  <img src="../GCU_logo.png" alt="">
  </div>
  <div class="nav-mobile">
  <div class="list">
      <div class="list-item">
    <button onclick="window.history.back();" class="list-link current">BACK</button>
      </div>
  </div>
  </div>
  <div class="align-right">
  <button class="icon-btn menu-toggle-btn menu-toggle-open place-items-center" onclick="goBack()" class="list-link current">
  <i class="ri-arrow-left-circle-line"></i>
  </button>
  <button class="icon-btn place-items-center" onclick="logout()">
      <i class="ri-user-3-line"></i>
  </button>
  </div>
    </nav>
</header>

<section>
    <section> <?php include '../../includes/banner.php' ?>

    <section class="management-area">
    <div class="management-area-container d-grid">
  <div class="card">
  <header class="card-header header-side">
      <h2 class="title">WITHDRAWAL/DROPPING/SHIFTING Slip</h2>
      <small>Date is <u><?php echo date('F j, Y'); ?></u></small>
  </header>
  <hr>
  <div class="info">
      <p><b>This document is for withdrawal of enrollment, modify or transition of subject selections.</b> </p>
  </div>
  </div>


<div class="card-group d-grid">
<div class="card border one">
<div class="card1" >
<hr>
  <h1 style="font-family: fantasy; color: black; " id="Title" >Withdrawal / Dropping / Shifting Slip</h1>
<hr>
 <div class="card-body1">

 <form id="form_transact" name="form1" method="post">
  
 <p><label>Select your concern:</label>
    <div class="semester-year-container">
    <select name="select2" id="action" style="height:auto;">
  <option value="Withdrawing Enrollment">Withdrawing Enrollment</option>
  <option value="Dropping Subjects">Dropping Subjects</option>
  <option value="Shifting">Shifting</option>
    </select>
    </div>
    </p>
    <p>
     <label for="textarea">Reason/s:</label>
     </p>
     <p>
     <textarea name="textarea" class="textarea" id="reason_explain" required></textarea>
     </p>
    <p><div class="hidden" id="for-shift">
  <label for="textfield4">Shifting from:</label>
  <div class="semester-year-container">
      <select name="courseSelect" id="courseSelect" style="height:auto;"  autcomplete="off" >
      <option value="" disabled selected>Select Course</option>
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
  <br>
  <label for="textfield5">to:</label>
  <div class="semester-year-container">
      <select type="text" name="textfield5" id="textfield5" style="height:auto;" autocomplete="off" >
      <option value="" disabled selected>Select Course</option>
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
</p>
     <button type="submit" id="submit"><span class="btnText">Submit</span><i class="ri-navigation-line"></i></button>
   </form>
 </div>

    
</div>
 </div>
  </div>
  </div>
    </div>
</section>     


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
       function goBack() {
            window.history.back();
        }
       
function faq(){
        window.location.href="../dh_student.php"
    }

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
    var sID = "<?php echo $_SESSION['session_id'];?>";
    const dropdown = document.getElementById('action');
    const textfield = document.getElementById('for-shift');
    dropdown.addEventListener('change', function () {
  if (dropdown.value === 'Shifting') {
    textfield.classList.remove('hidden');
  } else {
    textfield.classList.add('hidden');
  }
});


$("#action").change(function () {
    var selectedValue = $(this).val();
    var courseSelect = $("#courseSelect");
    var courseSelect2 = $("#textfield5");

    // Check if the selected value is "Shifting"
    if (selectedValue === "Shifting") {
  // Set "required" attribute for the elements
  courseSelect.prop("required", true);
  courseSelect2.prop("required", true);
    } else {
  // Remove "required" attribute for the elements
  courseSelect.prop("required", false);
  courseSelect2.prop("required", false);
    }
});
$("#form_transact").on("submit", function (event) {
  event.preventDefault();
  var student_id = <?php echo $_SESSION['session_id']?>;
  var transact_type = "withdrawal";
 
  Swal.fire({
      title: "Are you sure?",
      text: "Do you wish to proceed?",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes"
    }).then((result) => {
      if (result.isConfirmed) {
  $.ajax({
    type: 'POST',
    url: '../../backend/create_transaction.php',
    data: {
      reason: $('#action').find(":selected").val(),

      explain: $("#reason_explain").val(),
      course_frm: $("#courseSelect").val(),
      course_to: $("#textfield5").val()
    },
    success: function (data) {
      $.ajax({
  type: 'POST',
  url: '../../backend/log_audit.php',
  data: {
    userId: sID,
    action: 'sent request',
    details: sID + ' sent WDS request' 
  },
  success: function(response) {
    // Handle the response if needed
    // console.log("logged", response);
  }
    });
    Swal.fire({
    title: "Request Sent!",
    icon: "success",
    text: "Your request has been sent successfully.",
    showConfirmButton: true,
    confirmButtonText: "OK",
}).then((result) => {
    if (result.isConfirmed) {
  // Redirect to the specified URL
  window.location.href = "../trans.php";
    }
});

    }
  });
}
  });
});
   
  </script>


</body>
</html>