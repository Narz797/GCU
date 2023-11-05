<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

   <title>Teacher Regisration Form </title>
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
        min-height: 450px;
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
</style>
<body>
    <!-- <div class="left-column">
        <img src="assets/img/GCU_logo.png" alt="Logo" class="logo">
    </div>
     -->
    <div class="container">
        <header>TEACHER REGISTRATION FORM</header>
        <form action="#" id="registrationForm">
            <div class="form first">
                <div class="details personal">
                    <br>
                    <hr>
                    <hr>
                    <br>
                    <!-- <h2>Personal Details</h2>
            <hr> -->
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
                                <obtion>College of Veterinary Medicine</option>
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
                            <label>Sex</label>
                            <select required>
                                <option disabled selected>Select Sex</option>
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
                        <!-- <div class="input-field">
                    <label>Date of Birth</label>
                    <input type="date" required >
                </div> -->
                        <!-- <div class="input-field">
                    <label>Birth Place</label>
                    <input type="text" required >
                </div> -->
                        <!-- <div class="input-field">
                    <label>Nationality</label>
                    <input type="text"  required >
                </div> -->
                        <!-- <div class="input-field1">
                    <label>Languages/Dialects youu can read, write, and understand:</label>
                    <input type="text" required >
                </div> -->
                        <!--
                <div class="input-field1">
                    <label>House Number/Street/Barangay/Municipality/Province/Zip Code</label>
                    <input type="text" required >
                </div> -->
                        <button class="submit" id="submitButton" type="button">
                            <span class="btnText">SUBMIT</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>