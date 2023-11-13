<?php
session_start();
$_SESSION['origin'] = 'Student_Register'; //for register_user.php
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

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
    <title>Responsive Regisration Form </title>
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
        min-height: 2000px;
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
        margin: 4px 0;
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

    }

    .fieldset-container {

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
    #specifyBoxScholarship input[type="text"] {
        border-bottom: 1px solid black;
        /* You can adjust the color and style as needed */
    }

    .custom-file-upload input[type="file"] {
        display: none;
    }
</style>

<body>
    <!-- <div class="left-column">
        <img src="assets/img/GCU_logo.png" alt="Logo" class="logo">
    </div>
     -->
    <div class="container">
        <header>STUDENT REGISTRATION FORM</header>
        <form action="page2.php" method="POST" id="registrationForm" enctype="multipart/form-data">
            <div class="form first">
                <div class="details personal">
                    <br>
                    <hr>
                    <hr>
                    <br>
                    <br>
                    <br>
                    <div class="fields">
                        <div class="input-field">
                            <label for="idno">ID Number</label>
                            <input type="text" name='idno' id="idno" required>
                        </div>
                         <div class="input-field">
                            <label for='course'>Course</label>
                            <select name='course' id="cs">
                                <option disabled selected>Select Course</option>
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

                        <div class="input-field">
                            <label>Year Level</label>
                            <select  id="cs" name='year_level'>
                                <option disabled selected>Select</option>
                                <option value='1'>1st</option>
                                <option value='2'>2nd</option>
                                <option value='3'>3rd</option>
                                <option value='4'>4th</option>
                                <option value='5'>5th</option>
                                <option value='6'>6th</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Last Name</label>
                            <input type="text" id="lastname" name="lastname" required>
                        </div>

                        <div class="input-field">
                            <label>First Name</label>
                            <input type="text" id="firstname" name="firstname" required>
                        </div>

                        <div class="input-field">
                            <label>Middle Name</label>
                            <input type="text" id="middlename" name="middlename" required>
                        </div>
                        <div class="input-field">
                            <label>Contact Number</label>
                            <input type="text" id="cn" name="cn" required>
                        </div>
                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" id="email" name="email" required>
                        </div>
                        <div class="input-field">
                            <label>Year Enrolled</label>
                            <input type="text" id="year_enroll" name="year_enroll" required>
                        </div>
                        <div class="input-field">
                            <label>Section</label>
                            <input type="data" id="section" name="section" required>
                        </div>
                        <div class="input-field">
                            <label>Civil Status</label>
                            <select required id="civs" name='civil_status'>
                                <option disabled selected>Select</option>
                                <option>Single</option>
                                <option>Married</option>
                                <option>Others</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Sex</label>
                            <select required id="gender" name='gender'>
                                <option disabled selected>Select</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" id="dob" name="dob" required>
                        </div>
                        <div class="input-field">
                            <label>Birth Place</label>
                            <input type="text" id="bp" name="bp" required>
                        </div>
                        <div class="input-field">
                            <label>Nationality</label>
                            <input type="text" id="nationality" name="nationality" required>
                        </div>

                        <div class="input-field1">
                            <label>Languages/Dialects you can read, write, and understand:</label>
                            <input type="text" id="lang" name="lang" required>
                        </div>
                        <div class="input-field1">
                            <label>House Number/Street/Barangay/Municipality/Province/Zip Code</label>
                            <input type="text" id="address" name="address" required>
                        </div>
                        <h2>Family Background</h2>
                        <br>
                        <br>

                        <div style="width: 100%;">

                            <p><b>Whom do you live?</b></p>
                            <br>
                            <div class="radio-group">
                                <label>
                                    <input type="radio" id="yesRadio" name="whom" value="parents" onclick="showParentsInput();" required>
                                    Parents
                                </label>
                                <label>
                                    <input type="radio" id="noRadio" name="whom" value="guardian" onclick="showGuardianInput();" required>
                                    Guardian
                                </label>
                            </div>
                            <br>

                            <div id="inputContainer" style="display: none;">
                                <h3> Father</h3>

                                <fieldset style="border:none;">
                                    <div class="fields">
                                        <div class="input-field">
                                            <label>Last Name</label>
                                            <input type="text" id="Flname" name="Flname" required>
                                        </div>
                                        <div class="input-field">
                                            <label>First Name</label>
                                            <input type="text" id="Ffname" name="Ffname" required>
                                        </div>
                                        <div class="input-field">
                                            <label>Middle Name</label>
                                            <input type="text" id="Fmname" name="Fmname" required>
                                        </div>
                                        <div class="input-field">
                                            <label>Age</label>
                                            <input type="text" id="Fage" name="Fage" required>
                                        </div>
                                        <div class="input-field">
                                            <label>Occupational</label>
                                            <input type="text" id="Focc" name="Focc" required>
                                        </div>
                                        <div class="input-field">
                                            <label>Educational Attainment</label>
                                            <input type="text" id="Fedu" name="Fedu" required>
                                        </div>
                                    </div>
                                </fieldset>
                                <hr>
                                <h3> Mother</h3>

                                <fieldset style="border:none;">
                                    <div class="fields">
                                        <div class="input-field">
                                            <label>Last Name</label>
                                            <input type="text" id="Mlname" name="Mlname" required>
                                        </div>
                                        <div class="input-field">
                                            <label>First Name</label>
                                            <input type="text" id="Mfname" name="Mfname" required>
                                        </div>
                                        <div class="input-field">
                                            <label>Middle Name</label>
                                            <input type="text" id="Mmname" name="Mmname" required>
                                        </div>
                                        <div class="input-field">
                                            <label>Age</label>
                                            <input type="text" id="Mage" name="Mage" required>
                                        </div>
                                        <div class="input-field">
                                            <label>Occupational</label>
                                            <input type="text" id="Mocc" name="Mocc" required>
                                        </div>
                                        <div class="input-field">
                                            <label>Educational Attainment</label>
                                            <input type="text" id="Medu" name="Medu" required>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div id="inputContainerG" style="display: none;">
                                <h3>Guardian</h3>
                                <fieldset style="border:none;">
                                    <div class="fields">
                                        <div class="input-field">
                                            <label>Last Name</label>
                                            <input type="text" id="Glname" name="Glname" required>
                                        </div>
                                        <div class="input-field">
                                            <label>First Name</label>
                                            <input type="text" id="Gfname" name="Gfname" required>
                                        </div>
                                        <div class="input-field">
                                            <label>Middle Name</label>
                                            <input type="text" id="Gmname" name="Gmname" required>
                                        </div>
                                        <div class="input-field">
                                            <label>Age</label>
                                            <input type="text" id="Gage" name="Gage" required>
                                        </div>
                                        <div class="input-field">
                                            <label>Occupational</label>
                                            <input type="text" id="Gocc" name="Gocc" required>
                                        </div>
                                        <div class="input-field">
                                            <label>Educational Attainment</label>
                                            <input type="text" id="Gedu" name="Gedu" required>
                                        </div>
                                    </div>
                                </fieldset>
                                <hr>
                            </div>
                        </div>

                        <div style="width: 100%;">
                            <p><b><i>List the names of your siblings (brothers & sisters)
                                        including yourself, arranged from the eldest to the youngest.</i></b></p>
                            <br>
                            <label for="total_number"><b>Your total number: </b></label>
                            <select id="total_number" name="total_number" onchange="createTable()">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            <br><br>
                            <table id="siblingsTable" name='siblings' class="responsive-table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Age</th>
                                        <th>Highest Educational Attainment</th>
                                        <th>Civil Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                       

                        <button class="nextBtn" id="next" type="submit" onclick="goToPage2()">
                            <span class="btnText">Next</span>
                            <i class="uil uil-navigator"></i>
                        </button>

                    </div>
                </div>
            </div> 
        </form>

    </div>
    <script>
    let siblingsData = [];
    function createTable() {
        var totalNumber = document.getElementById("total_number").value;
        var table = document.getElementById("siblingsTable").getElementsByTagName('tbody')[0];
        table.innerHTML = ""; // Clear existing rows

        for (var i = 0; i < totalNumber; i++) {
            var row = table.insertRow(i);
            var noCell = row.insertCell(0);
            var lnameCell = row.insertCell(1);
            var fnameCell = row.insertCell(2);
            var mnameCell = row.insertCell(3);
            var ageCell = row.insertCell(4);
            var educCell = row.insertCell(5);
            var civilCell = row.insertCell(6);

            noCell.innerHTML = "" + (i + 1);
            lnameCell.innerHTML = '<input type="text" name="lname[]">';
            fnameCell.innerHTML = '<input type="text" name="fname[]">';
            mnameCell.innerHTML = '<input type="text" name="mname[]">';
            ageCell.innerHTML = '<input type="text" name="age[]">';
            educCell.innerHTML = '<input type="text" name="education[]">';
            civilCell.innerHTML = '<input type="text" name="civil[]">';

            // Store values in an array
            siblingsData.push({
                lastName: "",
                firstName: "",
                middleName: "",
                age: "",
                education: "",
                civilStatus: ""
            });
        }

        // Call logTableValues to populate the siblingsData array
        logTableValues(siblingsData);

        sessionStorage.setItem('siblings',siblingsData);
        // Return the values
        return siblingsData;
    }

    function logTableValues(siblingsData) {
        var totalNumber = siblingsData.length;
        var table = document.getElementById("siblingsTable").getElementsByTagName('tbody')[0];

        for (var i = 0; i < totalNumber; i++) {
            var row = table.rows[i];
            var inputs = row.querySelectorAll('input');

            siblingsData[i].lastName = inputs[0].value;
            siblingsData[i].firstName = inputs[1].value;
            siblingsData[i].middleName = inputs[2].value;
            siblingsData[i].age = inputs[3].value;
            siblingsData[i].education = inputs[4].value;
            siblingsData[i].civilStatus = inputs[5].value;
        }
        
    }
</script>

<script>
    function goToPage2() {
        // Redirect to the next page
        window.location.href = "page2.php";
    }
</script>

    <script>
        function showParentsInput() {
            document.getElementById("inputContainer").style.display = "block";
            document.getElementById("inputContainerG").style.display = "none"; // Hide Guardian inputs
            enableParentInputs(true); // Enable parent inputs
            enableGuardianInputs(false); // Disable Guardian inputs
        }

        function showGuardianInput() {
            document.getElementById("inputContainerG").style.display = "block";
            document.getElementById("inputContainer").style.display = "none"; // Hide Parent inputs
            enableParentInputs(false); // Disable Parent inputs
            enableGuardianInputs(true); // Enable Guardian inputs
        }

        function enableParentInputs(enable) {
            const parentInputs = document.querySelectorAll('#inputContainer input[type="text"]');
            parentInputs.forEach(input => {
                input.disabled = !enable;
            });
        }

        function enableGuardianInputs(enable) {
            const guardianInputs = document.querySelectorAll('#inputContainerG input[type="text"]');
            guardianInputs.forEach(input => {
                input.disabled = !enable;
            });
        }
    </script>
    <!-- <script>
        const form = document.querySelector("form");
        const nextBtn = form.querySelector(".nextBtn");
        const backBtn = form.querySelector(".backBtn");
        const allInput = form.querySelectorAll(".first input");
        nextBtn.addEventListener("click", () => {
            let inputFilled = false;
            allInput.forEach(input => {
                if (input.value.trim() !== "") {
                    inputFilled = true;
                }
            });
            if (inputFilled) {
                form.classList.add('secActive');
            } else {
                alert("Please fill in all required fields.");
            }
        });
        backBtn.addEventListener("click", () => {
            form.classList.remove('secActive');
        });
    </script> -->
    <script>
        // Add a click event listener to the button
        document.getElementById("total_number").addEventListener("click", function() {
            // Get the table element
            var table = document.getElementById("siblingsTable");
            // Toggle the table's display style between 'none' and 'table'
            if (table.style.display === "none") {
                table.style.display = "table";
            } else {
                table.style.display = "none";
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get references to form elements
            const form = document.getElementById("registrationForm");
            const nextButton = document.getElementById("nextButton");
            // Add a click event listener to the "Next" button
            nextButton.addEventListener("click", function(e) {
                // Check if the form is valid
                if (form.checkValidity());
            });
        });
    </script>
    <!-- course auto complete -->
    <script>
        // autcomplete
        function showSuggestions(inputId, suggestionContainerId) {
            var input = document.getElementById(inputId);
            var inputValue = input.value;
            var suggestionsDiv = document.getElementById(suggestionContainerId);
            if (inputValue.length === 0) {
                suggestionsDiv.style.display = "none";
                return;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                    var suggestions = JSON.parse(xmlhttp.responseText); // Assuming your suggestions are returned as a JSON array
                    displaySuggestions(suggestions, suggestionsDiv, input);
                }
            };
            xmlhttp.open("GET", "../../backend/autocomplete.php?input=" + inputValue, true);
            xmlhttp.send();
        }

        function displaySuggestions(suggestions, suggestionsDiv, input) {
            if (suggestions.length === 0) {
                suggestionsDiv.style.display = "none";
                return;
            }
            suggestionsDiv.innerHTML = ""; // Clear previous suggestions
            var ul = document.createElement("ul");
            suggestions.forEach(function(suggestion) {
                var li = document.createElement("li");
                li.textContent = suggestion;
                li.addEventListener("click", function() {
                    input.value = suggestion; // Fill in the input field with the selected suggestion
                    suggestionsDiv.style.display = "none"; // Hide the suggestions
                });
                ul.appendChild(li);
            });
            suggestionsDiv.appendChild(ul);
            suggestionsDiv.style.display = "block"; // Show the suggestions
        }
        var textfield4 = document.getElementById('course');
        textfield4.addEventListener('input', function() {
            this.value = this.value.toUpperCase();
        });
    </script>

    <script>
        document.getElementById("yesRadio1").addEventListener("click", function() {
            document.getElementById("indigenousInfo").style.display = "block";
            document.querySelector('label[for="indigenousInfo"]').style.display = "block";
        });
        document.getElementById("noRadio1").addEventListener("click", function() {
            document.getElementById("indigenousInfo").style.display = "none";
            document.querySelector('label[for="indigenousInfo"]').style.display = "none";
        });
    </script>
    <script>
        function toggleSpecifyBox(checkboxId, specifyBoxId) {
            var checkbox = document.getElementById(checkboxId);
            var specifyBox = document.getElementById(specifyBoxId);
            if (checkbox.checked) {
                specifyBox.style.display = "block";
            } else {
                specifyBox.style.display = "none";
            }
        }
    </script>
</body>

</html>