<!DOCTYPE html>
<html lang="en">

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming 'myData' is the key used in the JavaScript AJAX request
    if (isset($_POST['sib_lname'])) {
        $_SESSION['sib_lname'] = $_POST['sib_lname'];
    }
    if (isset($_POST['sib_fname'])) {
        $_SESSION['sib_fname'] = $_POST['sib_fname'];
    }
    if (isset($_POST['sib_mname'])) {
        $_SESSION['sib_mname'] = $_POST['sib_mname'];
    }
    if (isset($_POST['sib_age'])) {
        $_SESSION['sib_age'] = $_POST['sib_age'];
    }
    if (isset($_POST['sib_educ_attainment'])) {
        $_SESSION['sib_educ_attainment'] = $_POST['sib_educ_attainment'];
    }
    if (isset($_POST['sib_civil_status'])) {
        $_SESSION['sib_civil_status'] = $_POST['sib_civil_status'];
    }
}
if (isset($_POST['idno'])) {
    $_SESSION['idno'] = $_POST['idno'];
}
if (isset($_POST['course'])) {
    $_SESSION['course'] = $_POST['course'];
}
if (isset($_POST['year_level'])) {
    $_SESSION['year_level'] = $_POST['year_level'];
}
if (isset($_POST['lastname'])) {
    $_SESSION['lastname'] = $_POST['lastname'];
}
if (isset($_POST['firstname'])) {
    $_SESSION['firstname'] = $_POST['firstname'];
}
if (isset($_POST['middlename'])) {
    $_SESSION['middlename'] = $_POST['middlename'];
}
if (isset($_POST['cn'])) {
    $_SESSION['cn'] = $_POST['cn'];
}
// if (isset($_POST['email'])){
//     $_SESSION['email'] = $_POST['email'];
// }
if (isset($_POST['year_enroll'])) {
    $_SESSION['year_enroll'] = $_POST['year_enroll'];
}
if (isset($_POST['section'])) {
    $_SESSION['section'] = $_POST['section'];
}
if (isset($_POST['civil_status'])) {
    $_SESSION['civil_status'] = $_POST['civil_status'];
}
if (isset($_POST['gender'])) {
    $_SESSION['gender'] = $_POST['gender'];
}
if (isset($_POST['dob'])) {
    $_SESSION['dob'] = $_POST['dob'];
}
if (isset($_POST['bp'])) {
    $_SESSION['bp'] = $_POST['bp'];
}
if (isset($_POST['nationality'])) {
    $_SESSION['nationality'] = $_POST['nationality'];
}
if (isset($_POST['lang'])) {
    $_SESSION['lang'] = $_POST['lang'];
}
if (isset($_POST['address'])) {
    $_SESSION['address'] = $_POST['address'];
}
if (isset($_POST['whom'])) {
    $_SESSION['whom'] = $_POST['whom'];
}
if (isset($_POST['Flname'])) {
    $_SESSION['Flname'] = $_POST['Flname'];
}
if (isset($_POST['Ffname'])) {
    $_SESSION['Ffname'] = $_POST['Ffname'];
}
if (isset($_POST['Fmname'])) {
    $_SESSION['Fmname'] = $_POST['Fmname'];
}
if (isset($_POST['Fage'])) {
    $_SESSION['Fage'] = $_POST['Fage'];
}
if (isset($_POST['Focc'])) {
    $_SESSION['Focc'] = $_POST['Focc'];
}
if (isset($_POST['Fedu'])) {
    $_SESSION['Fedu'] = $_POST['Fedu'];
}
if (isset($_POST['Fcontact'])) {
    $_SESSION['Fcontact'] = $_POST['Fcontact'];
}
if (isset($_POST['Mlname'])) {
    $_SESSION['Mlname'] = $_POST['Mlname'];
}
if (isset($_POST['Mfname'])) {
    $_SESSION['Mfname'] = $_POST['Mfname'];
}
if (isset($_POST['Mmname'])) {
    $_SESSION['Mmname'] = $_POST['Mmname'];
}
if (isset($_POST['Mage'])) {
    $_SESSION['Mage'] = $_POST['Mage'];
}
if (isset($_POST['Mocc'])) {
    $_SESSION['Mocc'] = $_POST['Mocc'];
}
if (isset($_POST['Medu'])) {
    $_SESSION['Medu'] = $_POST['Medu'];
}
if (isset($_POST['Mcontact'])) {
    $_SESSION['Mcontact'] = $_POST['Mcontact'];
}
if (isset($_POST['Glname'])) {
    $_SESSION['Glname'] = $_POST['Glname'];
}
if (isset($_POST['Gfname'])) {
    $_SESSION['Gfname'] = $_POST['Gfname'];
}
if (isset($_POST['Gmname'])) {
    $_SESSION['Gmname'] = $_POST['Gmname'];
}
if (isset($_POST['Gage'])) {
    $_SESSION['Gage'] = $_POST['Gage'];
}
if (isset($_POST['Gocc'])) {
    $_SESSION['Gocc'] = $_POST['Gocc'];
}
if (isset($_POST['Gedu'])) {
    $_SESSION['Gedu'] = $_POST['Gedu'];
}
if (isset($_POST['Gcontact'])) {
    $_SESSION['Gcontact'] = $_POST['Gcontact'];
}
if (isset($_POST['total_number'])) {
    $_SESSION['total_number'] = $_POST['total_number'];
}

// if (isset($_POST['siblings'])) {
//     $siblingsDataJSON = $_SESSION['siblings'];

//     // Decode the JSON string into a PHP associative array
//     $siblingsData = json_decode($siblingsDataJSON, true);
//     $sessionDataJSON = json_encode($_SESSION);
// }


?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Student Regisration Form </title>
    <link href="../assets/img/GCU_logo.png" rel="icon">

    <link href="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

</head>
<style>
    /* ===== Google Font Import - Poppins ===== */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    .autocomplete-container {
        position: relative;
    }

    .autocomplete-popup {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1;
        background-color: #fff;
        border: 1px solid #ccc;
        max-height: 150px;
        overflow-y: auto;
        display: none;
    }

    .autocomplete-popup ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .autocomplete-popup li {
        padding: 5px 10px;
        cursor: pointer;
    }

    .autocomplete-popup li:hover {
        background-color: #f0f0f0;
    }

    body {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #fafffe;
    }

    .container {
        position: relative;
        max-width: 900px;
        width: 100%;
        /* border-radius: 0px;  */
        padding: 10px;
        margin: 0 15px;
        /* background-color: #fff; */
        /* box-shadow: 0 5px 10px rgba(0,0,0,0.1); */
    }

    .container header {
        position: relative;
        font-size: 20px;
        font-weight: 600;
        color: #333;
    }

    .container header::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: -2px;
        height: 3px;
        width: 27px;
        border-radius: 8px;
        background-color: #4070f4;
    }

    .container form {
        position: relative;
        margin-top: 16px;
        min-height: 1500px;
        /* background-color: #fff; */
        overflow: hidden;
    }

    .container form .form {
        position: absolute;
        /* background-color: #fff; */
        transition: 0.3s ease;
    }

    .container form .form.second {
        opacity: 0;
        pointer-events: none;
        transform: translateX(100%);
    }

    form.secActive .form.second {
        opacity: 1;
        pointer-events: auto;
        transform: translateX(0);
    }

    form.secActive .form.first {
        opacity: 0;
        pointer-events: none;
        transform: translateX(-100%);
    }

    .container form .title {
        display: block;
        margin-bottom: 8px;
        font-size: 16px;
        font-weight: 500;
        margin: 6px 0;
        color: #333;
    }

    .container form .fields {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    form .fields .input-field {
        display: flex;
        width: calc(100% / 3 - 15px);
        flex-direction: column;
        margin: 4px 0;
    }

    form .fields .input-field1 {
        display: flex;
        width: 100%;
        /* width: calc(100% / 3 - 15px); */
        flex-direction: column;

    }

    .input-field1 label {
        font-size: 16px;
        font-weight: 500;
        color: #2e2e2e;
    }

    form .fields .input-field2 {
        display: flex;
        width: 100%;
        /* width: calc(100% / 3 - 15px); */
        flex-direction: column;
        margin: 4px 0;
    }

    .input-field2 label {
        font-size: 16px;
        font-weight: 500;
        color: #2e2e2e;
    }

    .input-field2 input,
    select {
        outline: none;
        font-size: 14px;
        /* font-style: italic; */
        font-weight: 400;
        color: #333;
        border-radius: 5px;
        border: 1px solid #aaa;
        padding: 0 15px;
        height: 90px;
        margin: 8px 0;
    }

    .input-field label {
        font-size: 16px;
        font-weight: 500;
        color: #2e2e2e;
    }

    .input-field1 input,
    select {
        outline: none;
        font-size: 14px;
        /* font-style: italic; */
        font-weight: 400;
        color: #333;
        border-radius: 5px;
        border: 1px solid #aaa;
        padding: 0 15px;
        height: 42px;
        margin: 8px 0;
    }

    .input-field input,
    select {
        outline: none;
        font-size: 14px;
        /* font-style: italic; */
        font-weight: 400;
        color: #333;
        border-radius: 5px;
        border: 1px solid #aaa;
        padding: 0 15px;
        height: 42px;
        margin: 8px 0;
    }

    .input-field input :focus,
    .input-field select:focus {
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.13);
    }

    .input-field select,
    .input-field input[type="date"] {
        color: #707070;
    }

    .input-field input[type="date"]:valid {
        color: #333;
    }

    .container form button,
    .backBtn {
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
        cursor: pointer;
    }

    .container form .btnText {
        font-size: 14px;
        font-weight: 400;
    }

    form button:hover {
        background-color: #265df2;
    }

    form button i,
    form .backBtn i {
        margin: 0 6px;
    }

    form .backBtn i {
        transform: rotate(180deg);
    }

    form .buttons {
        display: flex;
        align-items: center;
    }

    form .buttons button,
    .backBtn {
        margin-right: 14px;
    }

    @media (max-width: 750px) {
        .container form {
            overflow-y: scroll;
        }

        .container form::-webkit-scrollbar {
            display: none;
        }

        form .fields .input-field {
            width: calc(100% / 2 - 15px);
        }
    }

    @media (max-width: 550px) {
        form .fields .input-field {
            width: 100%;
        }
    }

    /* .left-column img {
             
            
            margin-left: 20%;
            width: 50%;
            -webkit-animation: mover 2s infinite alternate;
            animation: mover 1s infinite alternate;
        }
    .logo {
            width: 80%;
            height: 80%;
        } */

    @-webkit-keyframes mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-20px);
        }
    }

    @keyframes mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-20px);
        }
    }

    /* .fieldset-column {
            flex: 1;
            margin-right: 20px; 
        } */
    fieldset {
        flex: 1;
        /* Equal size for all fieldsets */
        /* border: 1px solid #000000; */
        /* padding: 10px; */
        /* margin-right: 10px; */
        /* Add some spacing between fieldsets */
    }

    .fieldset-container {
        /* display: flex; */
        /* flex-wrap: wrap; */
        /* justify-content: space-between; */
        /* Distribute fieldsets evenly */
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 16px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .container1 {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 16px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .container1 input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 22px;
        width: 22px;
        background-color: #eee;
    }

    /* On mouse-over, add a grey background color */
    .container1:hover input~.checkmark {
        background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .container1 input:checked~.checkmark {
        background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .container1 input:checked~.checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .container1 .checkmark:after {
        left: 9px;
        top: 5px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .check-group label {
        /* display: block; */
        margin-right: 30px;
    }

    .radio-group label {
        /* display: block; */
        margin-right: 30px;
    }

    .radio-group input[type="radio"] {
        margin-right: 5px;
    }

    #specifyInput {
        display: none;
    }

    .underline-input1 {
        width: 50%;
        outline: none;
    }

    .responsive-table {
        width: 100%;
        border-collapse: collapse;
    }

    .responsive-table th,
    .responsive-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .responsive-table th {
        background-color: #f2f2f2;
    }

    .responsive-table input[type="text"] {
        width: 100%;
        box-sizing: border-box;
        border: none;
        /* border-bottom: 1px solid #000; */
        padding: 0;
        margin: 0;
        background-color: transparent;
        outline: none;
        /* Remove outline */
    }

    .aboutme input[type="text"] {
        border: none;
        border-bottom: 1px solid #000;
        padding: 0;
        margin: 0;
        background-color: transparent;
        outline: none;
        font-size: 14px;
        text-decoration: none;
    }

    .hidden {
        display: none;
    }

    .visible {
        display: block;
    }

    .indigenousInfo {
        outline: none;
        font-size: 14px;
        /* font-style: italic; */
        font-weight: 400;
        color: #333;
        border-radius: 5px;
        padding: 0 15px;
        height: 42px;
        margin: 8px 0
    }

    .underline-input {
        position: relative;
        width: 50%;
        margin: 8px 0;
    }

    .underline-input input {
        border: none;
        border-bottom: 1px solid #000;
        /* Add a bottom border for the underline effect */
        background: none;
        outline: none;
        width: 100%;
    }

    /* Initially hide the table */
    #siblingsTable {
        display: none;
    }

    /* .input-field input:required {
    border: 1px solid red;
} */
    #textBox {
        width: 200px;
        /* Adjust the width as needed */
        height: 30px;
        /* Adjust the height as needed */
        font-size: 16px;
        /* Adjust the font size as needed */
        padding: 5px;
        /* Adjust the padding as needed */
        border: 1px solid #ccc;
        /* Adjust the border style as needed */
        border-radius: 5px;
        /* Adjust the border radius as needed */
    }

    .custom-file-upload input[type="file"] {
        display: none;
    }

    #otherSchoolCheckbox {
        display: inline-block;
        vertical-align: middle;
        margin-top:1%;
    }

    #otherSchoolLabel {
        display: inline-block;
        vertical-align: middle;
        margin-top:2%;
        margin-left:1%;
    }
</style>



<body>
    <!-- <div class="left-column">
        <img src="assets/img/GCU_logo.png" alt="Logo" class="logo">
    </div>
     -->
    <div class="container">
        <header>STUDENT REGISTRATION FORM - EDUCATIONAL BACKGROUND</header>
        <br>
        <h3>SENIOR HIGHSCHOOL</h3>
        <hr>

        <form action="page3.php" method="POST" id="registrationForm" enctype="multipart/form-data">
            <div class="fields">
                <div class="input-field1">
                    <label>Name of School:*</label>
                    <input style="width:100%; " type="text" id="lang" name="senschool" required>
                </div>
                <div class="input-field1">
                    <label>Year Graduated:* </label>
                    <input  style="width:100%;" type="text" class="form-control" name="senyear" id="senyear"  required autocomplete="off"/>

                    <!-- <input type="text" id="address" name="datepicker" id="datepicker" required> -->
                </div>
                <div class="input-field1">
                    <label for="awards">Awards Received:</label>
                    <input  style="width:100%;" type="text" id="awards" name="senawards">
                </div>
            </div>
            <br>
            <h3>JUNIOR HIGHSCHOOL</h3>
            <hr>

            <br>

            <div class="fields" >
                <div class="input-field1">
                    <label>Name of School:*</label>
                    <input style="width:100%; " type="text" id="lang" name="junschool" required>
                </div>
                <div class="input-field1">
                    <label>Year Graduated:* </label>
                    <!-- <input style="width:100%;" type="text" id="address" name="junyear" required> -->
                    <input  style="width:100%;" type="text" class="form-control" name="junyear" id="junyear"  required autocomplete="off"/>

                </div>
                <div class="input-field1">
                    <label for="awards">Awards Received:</label>
                    <input  style="width:100%;" type="text" id="awards" name="junawards" >
                </div>
            </div>
            <br>
            <h3>ELEMENTARY</h3>
            <hr>

            <br>

            <div class="fields">
                <div class="input-field1">
                    <label>Name of School:*</label>
                    <input style="width:100%; " type="text" id="lang" name="elemname" required>
                </div>
                <div class="input-field1">
                    <label>Year Graduated:* </label>
                    <!-- <input type="text" id="address" name="elemyear" required> -->
                    <input  style="width:100%;" type="text" class="form-control" name="elemyear" id="elemyear"  required autocomplete="off"/>

                </div>
                <div class="input-field1">
                    <label for="awards">Awards Received:</label>
                    <input style="width:100%;" type="text" id="awards" name="elemawards">
                </div>
            </div>
            <br>
            <!-- <input type="checkbox" id="otherSchoolCheckbox" name='otherSchool'>
            <label for="otherSchoolCheckbox">Other School Attended</label> -->
            <input type="checkbox" id="otherSchoolCheckbox" name='otherSchool'>
            <label for="otherSchoolCheckbox" id="otherSchoolLabel">Other School Attended</label>
            <br>
            <br>
            <div id="otherSchoolSection" style="display: none;">
                <h3>OTHER SCHOOL ATTENDED</h3>
                <hr>
                <div class="fields">
                    <div class="input-field1">
                        <label>Name of School:</label>
                        <input style="width: 100%;" type="text" id="lang" name="othname">
                    </div>
                    <div class="input-field1">
                        <label>Year Graduated: </label>
                        <!-- <input type="text" id="address" name="othyear"> -->
                        <input  style="width:100%;" type="text" class="form-control" name="othyear" id="othyear" autocomplete="off" />

                    </div>
                    <div class="input-field1">
                        <label for="awards">Awards Received:</label>
                        <input style="width:100%; vertical-align: top;" type="text" id="awards" name="othawards">
                    </div>
                </div>
            </div>


            <div class="buttons">
                <div class="backBtn" onclick="goToPage1()">
                    <i class="uil uil-navigator"></i>
                    <span class="btnText">Back</span>
                </div>

                <button class="nextBtn" id="next" type="submit" onclick="goToPage3()">
                    <span class="btnText">Next</span>
                    <i class="uil uil-navigator"></i>
                </button>
            </div>

        </form>
</body>

<script>
            // Retrieve insertStatements from sessionStorage
            // const storedInsertStatements = JSON.parse(sessionStorage.getItem('insertStatements'));

            // // Now you can use storedInsertStatements on this page
            // console.log(storedInsertStatements);
            //         // Now you can use storedInsertStatements in your AJAX call or anywhere else in this page
            //         if (storedInsertStatements) {
            //             // Your AJAX call
            //             $.ajax({
            //                 url: '../backend/sibling.php', // Replace with your endpoint URL
            //                 type: 'POST', // Or 'GET' based on your requirements
            //                 data: { insertStatements: storedInsertStatements },
            //                 success: function(response) {
            //                     // Handle the response here
            //                 },
            //                 error: function(error) {
            //                     // Handle any errors
            //                 }
            //             });
            //         }

    // function goToPage1() {
    //     window.location.href = "page1.php";
    // }

    // function goToPage3() {
    //     window.location.href = "page3.php";
    // }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function goToPage1() {
        window.location.replace(document.referrer);
    }

    function goToPage3() {
        // Check if there are empty inputs before redirecting
        // If no empty inputs, redirect to page3.php
        window.location.href = "page3.php";
    }
</script>


<script>
    const otherSchoolCheckbox = document.getElementById("otherSchoolCheckbox");
    const otherSchoolSection = document.getElementById("otherSchoolSection");
    otherSchoolCheckbox.addEventListener("change", function() {
        if (otherSchoolCheckbox.checked) {
            otherSchoolSection.style.display = "block";
        } else {
            otherSchoolSection.style.display = "none";
        }
    });
</script>
<script>

$("#senyear").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years",
    autoclose:true //to close picker once year is selected
});
    </script>

<script>

$("#junyear").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years",
    autoclose:true //to close picker once year is selected
});
    </script>

<script>

$("#senyear").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years",
    autoclose:true //to close picker once year is selected
});
    </script>

<script>

$("#elemyear").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years",
    autoclose:true //to close picker once year is selected
});
    </script>

<script>

$("#othyear").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years",
    autoclose:true //to close picker once year is selected
});
    </script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- <script>
alert

          swal({
                    title: 'pag error',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1500
                })
          swal({
                    title: 'Page success',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                })
    

</script> -->