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
$_SESSION['transact_type'] = 'ca'; //asign value to transact_type
logAudit($_SESSION['session_id'], 'access_class admisison form', $_SESSION['session_id'] .' has accessed the class admission page');
?>



<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <title>Class Admission Slip</title>
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
                    <button onclick="goBack()" class="list-link current">BACK</button>
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
                <h2 class="title">Class Admission Slip</h2>
                <small>Date is <u><?php echo date('F j, Y'); ?></u></small>
            </header>
            <hr>
            <div class="info">
                 <p><b>   This document is designed for students who may be experiencing absences or tardiness.</b></p>
            </div>
        </div>

        <div class="card-group d-grid">
            <div class="card border one">
<div class="card1" >
<hr>
<h1 style="font-family: fantasy; color: black; " id="Title" >CLASS ADMISSION Slip</h1>
<hr>
 <div class="card-body1">

 <form id="form_transact" name="form1" action="../../backend/create_transaction.php" method="post" enctype="multipart/form-data">
    <p> <label>* Tardy or Absent:</label>
    <div class="semester-year-container">
    <select name="textfield" id="refer">
        <option disabled selected>Select</option>
        <option value="Tardy">Tardy</option>
        <option value="Absent">Absent</option>
    </select>
    </div>
    </p>
    <div class="date-range-container" id="dates">
        <label for="Date">* Days absent/tardy:</label>
        <div class=" date form-group" id="datepicker">
        <span class="input-group-addon" style="color:black; font-size:x-small;"><i class="glyphicon glyphicon-calendar"></i><span class="count"> </span></span>
        <input type="text" class="form-control1" id="Date" name="Date" placeholder="Select days" autocomplete="off"/>   
    </div>
    </div>

    <p id="COA"> <label for="remark">* Remarks:</label>
    <input type="radio" id="health" name="concern" value="health"> Health-related concerns
    <br>
    <input type="radio" id="personal" name="concern" value="personal"> Personal Concerns
    <br>
    <input type="radio" id="socio-cultural" name="concern" value="socio-cultural">  Socio-Cultural Concerns
    <br>
    <input type="radio" id="behavioral" name="concern" value="behavioral"> Behavioral
    <br>
    <input type="radio" id="filial" name="concern" value="filial"> Filial Responsibilities
    <br>
    <input type="radio" id="environmentalRadio" name="concern" value="environmental"> Environmental
    <br>
    <input type="radio" id="officialActivityRadio" name="concern" value="officialActivity" > Official co/extra-curricular activity
    <br>
    <input type="text" id="officialActivitySpecify" class="hidden form-control1" name="specify" style="width: 100%;" placeholder="Please Specify">
    <input type="radio" id="otherRadio" name="concern" value="others" > Others
    <input type="text" id="otherSpecify" class="hidden form-control1" name="specify" style="width: 100%;"placeholder="Please Specify">
    <br>
    </p>
    <p id="rem"> 
    <label for="remark">* Reason:</label>
    <input class="form-control1" type="text" id="remark" name="remark">
    </p>
<br>
    <div class="reminder-container">
    <p style="margin-top: 12px; font-size: 12px; font-weight: bold;">You must upload required files such as Excuse letter, Medical credentials, etc. before clicking Submit.</p>
    </div>
    <p class=""> 
    <label for="fileUpload">Upload Required Files</label>
    <input type="file" id="fileUpload" name="fileUpload[]" required>
    <br>
    </p>

<div class="reminder-container">
  <i class="fas fa-exclamation-circle icon"></i>
  <p style="margin-top: 12px; font-size: 12px; font-weight: bold; color:red;">&nbspReminder: Zip multiple files before uploading them.</p>
</div>
               <!-- Change type from submit to button and add onclick attribute to call the function to check the form before submitting -->
               <button type="submit" id ="submit" ><span class="btnText">Submit</span><i class="ri-navigation-line"></i></button>
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


      var sID = "<?php echo $_SESSION['session_id'];?>";
      var LA = $("#dates");
    var AO = $("#rem");
    var COA = $('#COA');
    var selectedConcern;
    var sID = "<?php echo $_SESSION['session_id'];?>";
    
    $(".hidden").hide();
    LA.hide();
    AO.hide();
    COA.hide();

    function validateForm() {
        var fileInput = document.getElementById('fileUpload');

        if (fileInput.files.length === 0) {
            alert('Please select a file');
            return false; // Prevent form submission
        }

        // Your additional validation logic can go here if needed

        return true; // Allow form submission
    }

    function logSelectedConcern() {
        var radioButtons = document.getElementsByName("concern");
       
    
      
        for (var i = 0; i < radioButtons.length; i++) {
          if (radioButtons[i].checked) {
            selectedConcern = radioButtons[i].value;
            console.log("Selected concern: " + selectedConcern);

            if (selectedConcern == "officialActivity"){
              $("#officialActivitySpecify").show();
              $("#otherSpecify").hide();
              $("#otherSpecify").val("");

            }else if (selectedConcern == "others"){
              $("#otherSpecify").show();
              $("#officialActivitySpecify").hide();
              $("#officialActivitySpecify").val("");
       
            }
            else{
              $(".hidden").hide();
              $("#officialActivitySpecify").val("");
              $("#otherSpecify").val("");
            }
            return;
          }
        }

        // If no radio button is checked
        console.log("No concern selected");
      }
      
      // Attach the function to the change event of the radio buttons
      var radioButtons = document.getElementsByName("concern");
      for (var i = 0; i < radioButtons.length; i++) {
        radioButtons[i].addEventListener("change", logSelectedConcern);
      }

    $("#refer").change(function() {
      
      var dateInput = document.getElementById('Date');
      var remInput = document.getElementById('remark');

      if ($(this).val() == "Absent") {
        LA.show();
        COA.show();
        AO.hide();
        $("#remark").val("");
        dateInput.setAttribute('required', 'required');
        remInput.removeAttribute('required');
      }
      else if ($(this).val() == "Tardy") {
        LA.show();
        COA.hide();
        AO.hide();
        selectedConcern = "";
        $("#officialActivitySpecify").val("");
        $("#otherSpecify").val("");
        $("#remark").val("");
        dateInput.setAttribute('required', 'required');
        remInput.removeAttribute('required');
        var radioButtons = document.getElementsByName('concern');

        for (var i = 0; i < radioButtons.length; i++) {
            radioButtons[i].checked = false;}
        
            var textInputs = document.getElementsByName('specify');

        for (var i = 0; i < textInputs.length; i++) {
            textInputs[i].value = '';
        }


      } else if ($(this).val() == "Academic Deficiency/ies") {
        LA.hide();
        COA.hide();
        AO.show();
        $("#officialActivitySpecify").val("");
        $("#otherSpecify").val("");
        $("#Date").val("");
        dateInput.removeAttribute('required');
        remInput.setAttribute('required', 'required');
      } else {
        LA.hide();
        COA.hide();
        AO.hide();
        $("#remark").val("");
        $("#officialActivitySpecify").val("");
        $("#otherSpecify").val("");
        $("#Date").val("");
      }
    });

    function myFunction() {
      var checkBox2 = document.getElementById("others");
      var text2 = document.getElementById("oth");
      if (checkBox2.checked == true) {
        text2.style.display = "block";
      } else {
        text2.style.display = "none";
      }
    }
  </script>
  <script>
     $("#refer").change(function () {
      var selectedValue = $(this).val();

      // Check if the selected value is "Absent"
      if (selectedValue === "Absent") {
        // Set "required" attribute for all radio buttons
        $("input[name='concern']").prop("required", true);
      } else {
        // Remove "required" attribute for all radio buttons
        $("input[name='concern']").prop("required", false);
      }
    });
$("#form_transact").on("submit", function (event) {
    event.preventDefault();
    
    var formData = new FormData(this);
    var date = document.getElementById("Date").value;
    var oth = selectedConcern;
    var ECspecifics = $("#officialActivitySpecify").val();
    var OTHspecifics = $("#otherSpecify").val(); 
    var specifics;



    // var lt = $("#refer").val();
    // var hlth = document.getElementById('health');
    // var prsnl = document.getElementById('personal');
    // var sc = document.getElementById('socio-cultural');
    // var bhv = document.getElementById('behavioral');
    // var fl = document.getElementById('filial');
    // var eR = document.getElementById('environmentalRadio');
    // var oa = document.getElementById('officialActivityRadio');
    // var oth = document.getElementById('otherRadio');
    
    // console.log("LT", lt);
    // if (lt === 'Absent'){
     
    //   hlth.setAttribute('required', true);
    //  prsnl.setAttribute('required', true);
    //  sc.setAttribute('required', true);
    //  bhv.setAttribute('required', true);
    //  fl.setAttribute('required', true);
    //  eR.setAttribute('required', true);
    //  oa.setAttribute('required', true);
    //  oth.setAttribute('required', true);
    // }else if (lt === 'Tardy'){
    //   hlth.setAttribute('required', false);
    //  prsnl.setAttribute('required', false);
    //  sc.setAttribute('required', false);
    //  bhv.setAttribute('required', false);
    //  fl.setAttribute('required', false);
    //  eR.setAttribute('required', false);
    //  oa.setAttribute('required', false);
    //  oth.setAttribute('required', false);
    // }


    if (ECspecifics !== undefined && ECspecifics !== null && ECspecifics.trim() !== "") {
                    // The variable 'rem' has a non-empty value
                    console.log("Variable 'rem' has a non-empty value:", ECspecifics);
                  specifics = ECspecifics
                } else if (OTHspecifics !== undefined && OTHspecifics !== null && OTHspecifics.trim() !== ""){
                    // The variable 'rem' is either undefined, null, or an empty string
                    console.log("Variable 'rem' has a non-empty value:", OTHspecifics);
                  specifics = OTHspecifics
                }
                else{
                  specifics = "";
                }

    var student_id = <?php echo $_SESSION['session_id'] ?>;
    var transact_type = "AT";
    var selectedReasons = $("#refer").val();
    var remarks = $("#remark").val();
    console.log("Specs", specifics);
    formData.append('date', date);
    formData.append('transact_type', transact_type);
    formData.append('selectedReasons', selectedReasons);
    formData.append('COA', oth);
    formData.append('specs', specifics);
    formData.append('rem', remarks);
    var files = document.getElementById('fileUpload').files;

    // Loop through the selected files to determine their types
    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const fileExtension = file.name.split('.').pop();

        // Save the file extension to the FormData object
        formData.append('file_' + i + '_extension', fileExtension);

        // Determine the file type and add it to the FormData
        let fileType;
        if (fileExtension === 'pdf') {
            fileType = 'application/pdf';
        } else if (fileExtension === 'docx') {
            fileType = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
        } else if (fileExtension === 'jpg' || fileExtension === 'jpeg') {
            fileType = 'image/jpeg';
        }else if (fileExtension === 'png') {
            fileType = 'image/png';
        } else if (fileExtension === 'rar') {
            fileType = 'rar';
        }else if (fileExtension === 'zip') {
            fileType = 'zip';
        }// Add more cases for other file types

        if (fileType) {
            formData.append('file_' + i, file, 'file_' + i + '.' + fileExtension);
        } else {
            console.log('Unsupported file:', file.name);
        }
    }
    Swal.fire({
      title: "Do you wish to proceed?",
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
        url: '../../backend/create_transaction.php',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
          $.ajax({
            type: 'POST',
            url: '../../backend/log_audit.php',
            data: {
              userId: sID,
              action: 'sent request',
              details: sID + ' sent Class Admission request' 
            },
            success: function(response) {
              // Handle the response if needed
              console.log("logged", response);
            }
          });
          // alert("Request Sent");
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

        },
        error: function (xhr, status, error) {
            console.error('Error: ' + error);
        }
    });
  }
  });
    
});
$(document).ready(function() {

  $('#datepicker').datepicker({
        startDate: new Date(2000, 0, 1), // Update this to an earlier date
        multidate: true,
        format: "dd/mm/yyyy",

        // Remove or adjust the following line if needed
        // datesDisabled: ['31/08/2017'],
        language: 'en'
    }).on('changeDate', function(e) {
        // `e` here contains the extra attributes
        $(this).find('.input-group-addon .count').text(' ' + e.dates.length);
    });
});
  </script>


</body>
</html>