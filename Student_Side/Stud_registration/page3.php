<?php
session_start();

if (isset($_POST['senschool'])) {
    $_SESSION['senschool'] = $_POST['senschool'];
}
if (isset($_POST['senyear'])) {
    $_SESSION['senyear'] = $_POST['senyear'];
}
if (isset($_POST['senawards'])) {
    $_SESSION['senawards'] = $_POST['senawards'];
}
if (isset($_POST['junschool'])) {
    $_SESSION['junschool'] = $_POST['junschool'];
}
if (isset($_POST['junyear'])) {
    $_SESSION['junyear'] = $_POST['junyear'];
}
if (isset($_POST['junawards'])) {
    $_SESSION['junawards'] = $_POST['junawards'];
}
if (isset($_POST['elemname'])) {
    $_SESSION['elemname'] = $_POST['elemname'];
}
if (isset($_POST['elemyear'])) {
    $_SESSION['elemyear'] = $_POST['elemyear'];
}
if (isset($_POST['elemawards'])) {
    $_SESSION['elemawards'] = $_POST['elemawards'];
}
if (isset($_POST['othname'])) {
    $_SESSION['othname'] = $_POST['othname'];
}
if (isset($_POST['othyear'])) {
    $_SESSION['othyear'] = $_POST['othyear'];
}
if (isset($_POST['othawards'])) {
    $_SESSION['othawards'] = $_POST['othawards'];
}
if (isset($_POST['otherSchool'])) {
    $_SESSION['otherSchool'] = $_POST['otherSchool'];

  


}

$_SESSION['origin'] = 'Student';
// echo var_dump($_SESSION);
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
    <title>Student Regisration Form </title>
    <link href="../assets/img/GCU_logo.png" rel="icon">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
    #specifyBoxScholarship input[type="text"] {
        border-bottom: 1px solid black;
        /* You can adjust the color and style as needed */
    }

    .custom-file-upload input[type="file"] {
        display: none;
    }



    #textBox {
        border: none;
        /* Remove the default border */
        border-bottom: 1px solid #000;
        /* Add a bottom border for the underline effect */
        outline: none;
        /* Remove the default focus outline */
        width: 80%;
    }

    .container1 {
        display: block;
        position: relative;
        padding-left: 30px;
        /* Adjust the padding as needed */
        margin-bottom: 12px;
        /* Adjust the margin as needed */
        cursor: pointer;
        user-select: none;
    }

    /* Style for the checkbox input */
    #parentsCheckbox {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    /* Style for the checkmark */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 20px;
        /* Adjust the size of the checkmark as needed */
        width: 20px;
        /* Adjust the size of the checkmark as needed */
        background-color: transparent;
        border: 2px solid #000;
        /* Outline color */
    }

    .file-input-container {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .file-input {
            position: absolute;
            font-size: 100px;
            opacity: 0;
            right: 0;
            top: 0;
        }

        .file-label {
            display: inline-block;
            padding: 8px 16px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }


        /* popup */
        
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
.container2 label{
    display: block;
    margin-bottom: 5px;
    color: #333;
}


</style>

<body>
    <script>
        var session = eval('(<?php echo json_encode($_SESSION) ?>)');
        console.log(session);
    </script>
    <!-- <div class="left-column">
        <img src="assets/img/GCU_logo.png" alt="Logo" class="logo">
    </div>
     -->
    <div class="container">
        <header>STUDENT REGISTRATION FORM</header>
        <form action="../../backend/register_user.php" method="POST" id="registrationForm" enctype="multipart/form-data">
            <div class="form first">
                <div class="details personal">
                    <br>
                    <hr>
                    <hr>
                    <br>
                    <div>
                        <br>
                        <p><b><i>In view of the Indigenous People's Act (RA 8371), Magna Carta for
                                    Persons with Disability (RA 7277, as amended by RA 9442), the (c) Solo Parents
                                    Welfare Act of 2000 (RA 8972), and CHED Memorandum Order 9 s.2013, please answer
                                    the following items:</i></b></p>
                        <br>
                        <p><b>
                                <p>Are you a member of an Indigenous group?</p>
                                <div class="radio-group">
                                    <label>
                                        <input type="radio" id="yesRadio" name="membership" value="yes" required onclick="showSpecifyInput()">
                                        Yes
                                    </label>
                                    <label>
                                        <input type="radio" id="noRadio" name="membership" value="no" required onclick="hideSpecifyInput()">
                                        No
                                    </label>
                                </div>
                                <div class="underline-input" id="indigenousInput" style="display:none;">
                                    <br>
                                    <label for="indigenousInfo">If yes, please specify:</label>
                                    <input type="text" id="indigenousInfo" name="indigenousInfo">
                                </div>
                                <br>
                                <p><b>
                                        Are you a person with a disability (PWD)?</b>
                                <div class="radio-group">
                                    <label>
                                        <input type="radio" id="yesRadio2" name="pwd" value="yes" />
                                        Yes
                                    </label>
                                    <label>
                                        <input type="radio" id="noRadio2" name="pwd" value="no" />
                                        No
                                    </label>
                                </div>
                        </p>
                        <br>
                        <p><b>
                                Are you a student parent?</b>
                        <div class="radio-group">
                            <label>
                                <input type="radio" id="yesRadio3" name="studpar" value="yes" />
                                Yes
                            </label>
                            <label>
                                <input type="radio" id="noRadio3" name="studpar" value="no" />
                                No
                            </label>
                        </div>
                        </p>
                        <br>

                        <legend>
                            <h3><b>Sources of Financial Support</b></h3>
                        </legend>
                        <div class="checkbox-group">
                            <label class="container1">Parents
                                <input type="checkbox" name="src[]" value="Parents" id="parentsCheckbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container1">Self-supporting
                                <input type="checkbox" name="src[]" value="Self" id="selfCheckbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container1">Relatives and/or Guardian
                                <input type="checkbox" name="src[]" value="Relatives" id="relativesCheckbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container1">
                                Scholarship
                                <input type="checkbox" name="src[]" value="Scholarship" id="scholarshipCheckbox" onclick="toggleSpecifyBox('scholarshipCheckbox', 'specifyBoxScholarship')">
                                <span class="checkmark"></span>
                            </label>
                            <!-- Specify box for Scholarship -->
                            <div id="specifyBoxScholarship" style="display: none"> Specify:
                                <input type="text" name='specificScholar' id="textBox">
                            </div>

                            <label class="container1">
                                Others:
                                <input type="checkbox" id="otherCheckbox" name='src[]' value="Others" onclick="toggleSpecifyBox('otherCheckbox', 'specifyBoxOther')">
                                <span class="checkmark"></span>
                            </label>

                            <!-- Specify box for Others -->
                            <div id="specifyBoxOther" style="display: none"> Specify:
                                <input type="text" name="specificOther" id="textBox">
                            </div>
                        </div>
                        <br>

                        <!-- Your submit button and other form sections here -->
                        <fieldset>
                            <legend>
                                <h3><b>Marital Status of Parents</b></h3>
                            </legend>
                            <!-- <legend><b>Marital Status of Parents</b></legend> -->
                            <div class="fieldset-container">
                                <div class="fieldset-column">
                                    <div class="radio-group">
                                        <div class="radio-item">
                                            <input type="radio" id="contactChoice1" name="maritalStatus" value="married" />
                                            <label for="contactChoice1">Parents are married</label>
                                        </div>
                                        <div class="radio-item">
                                            <input type="radio" id="contactChoice2" name="maritalStatus" value="annulled" />
                                            <label for="contactChoice2">Marriage is legally annulled</label>
                                        </div>
                                        <div class="radio-item">
                                            <input type="radio" id="contactChoice3" name="maritalStatus" value="livingTogether" />
                                            <label for="contactChoice3">Parents are not married but are living together</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="fieldset-column">
                                    <div class="radio-group">
                                        <div class="radio-item">
                                            <input type="radio" id="contactChoice4" name="maritalStatus" value="singleParent" />
                                            <label for="contactChoice4">Single Parent</label>
                                        </div>
                                        <div class="radio-item">
                                            <input type="radio" id="contactChoice5" name="maritalStatus" value="separated" />
                                            <label for="contactChoice5">Parents are separated (one or both have other partners)</label>
                                        </div>
                                        <div class="radio-item">
                                            <input type="radio" id="contactChoice6" name="maritalStatus" value="widowWidower" />
                                            <label for="contactChoice6">Widow/widower</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <div class="aboutme">
                            <h2>More about Me:</h2>
                            <p>1. The three words that describe me are
                                <input type="text" id="first" name="first">
                                <input type="text" id="second" name="second">
                                <input type="text" id="third" name="third">
                            </p>
                            <p>2. My father is
                                <input type="text" id="Fis" name="Fis">
                            </p>
                            <p>3. My mother is
                                <input type="text" id="Mis" name="Mis">
                            </p>
                            <p>4. The sibling (kapatid) I am closest to is my
                                <input type="text" id='kapatid' name='kapatid'>
                                because<input type="text" id='kap_res' name='kap_res'>
                            </p>
                            <p>5. When I think about my family I feel
                                <input type="text" id="abtFam" name="abtFam">
                            </p>
                            <p>6. When I was a child, I
                                <input type="text" id="whenChild" name="whenChild">
                            </p>
                            <p>7. In school, my teachers are
                                <input type="text" id="teachAre" name="teachAre">
                            </p>
                            <p>8. My friends don't know that
                                <input type="text" id="friendsDunno" name="friendsDunno">
                            </p>
                            <p>9. When I think about the future, I
                                <input type="text" id="future" name="future">
                            </p>
                            <p>10. My greatest goal is
                                <input type="text" id="goal" name="goal">
                            </p>
                            <br>
                        </div>

                        <h2>Create Account</h2>
                        
                        <div class="fields">
                            <div class="input-field">
                                <label>Username</label>
                                <input type="text" id="eu" name="eu" required>
                            </div>
                     <div class="input-field">
                            <label>Email</label>
                            <input type="text" id="email" name="email" required>
                        </div>
                            <div class="input-field">
                                <label>Password</label>
                                <input type="text" id="pass" name="pass" required>
                            </div>
                            <div class="input-field">
                                <label>Confirm Password</label>
                                <input type="text" id="conpass" name="conpass" required>
                            </div>
                        </div>
                        <br>

                   

                        <h2>Upload Signature</h2>
                       
                        <!-- <input type="file" name="sign" accept="image/*" required> -->
                        <div class="file-input-container">
                            <label for="file" class="file-label">Choose File</label>
                            <input type="file" name="sign" id="file" class="file-input" accept="image/*" required>
                        </div>
                        <br>
                        <br>
                        <!-- <h2>Upload ID</h2>
                        <input type="file" name="image" accept="image/*" required> -->
                        <h2>Upload ID</h2>
                        
                            <div class="file-input-container">
                                <label for="image" class="file-label">Choose File</label>
                                <input type="file" name="image" id="image" class="file-input" accept="image/*" required>
                            </div>

                        <br><br>

                        <div class="buttons">
                            <div class="backBtn" onclick="goToPage2()">
                                <i class="uil uil-navigator"></i>
                                <span class="btnText">Back</span>
                            </div>

                            <!-- <button class="nextBtn" id="next" type="submit" value="Submit"> -->
                            <button class="nextBtn" onclick="add_remarks()">
                                <span class="btnText">Submit</span>
                                <i class="uil uil-navigator"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

                    <!-- verrify popup -->

                    <div id="modal" class="modal">
    <div class="modal_content">
        <div class="body">
            <div class="logo">
                <img id="loading-spinner" style="display: none;" src="../assets/img/GCU_LOGO.gif">
            </div>
            <div class="container2">
                <form id="verify_code" method="post">
                    <h1>A verification code has been sent to your email. Please enter the code below to fully register your account</h1>
                    <div class="id">
                        <label for="code" style="color: black;">Verification Code:</label>
                        <input type="number" id="code" name="code" class="code" required>
                        <button onclick="verify()">Verify</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

        </form>
    </div>


    <!-- <script>
        function goToPage2() {
            window.location.href = "page2.php";
        }
    </script> -->
    <!-- <script>
    function goToPage2() {
      
        var requiredFields = ['field1', 'field2', 'field3'];

       
        for (var i = 0; i < requiredFields.length; i++) {
            var field = document.getElementById(requiredFields[i]);
            if (field.value.trim() === '') {
                alert('Please fill out all required fields before proceeding to page2.php');
                proceed = false;
                break;
            }
        }

       
        if (proceed) {
            window.location.href = 'page2.php';
        }
    }
</script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // --------------FOR EMAIL VERIFICATION--------------------
    function add_remarks(){
console.log("Email", $("#email").val())

            document.getElementById("modal").style.display = "block";
                // Show loading spinner
                Swal.fire({
                title: 'Sending Email',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                    },
            });
    
    console.log("performing ajax");
    $.ajax({
      type: 'POST',
      url: '../../backend/email_verify.php',
      data: {
        email: $("#email").val()
      },
      success: function(data) {
        // Hide loading spinner on success
        swal.close();
        if (data === "unregistered") {
        //   alert("This Email is already registered")
        Swal.fire({
              icon: "error",
              title: "This Email is already registered",
              text: "Please use another",
            });
          console.log(data);
          
        } else {
        //   alert("The verification code has sent to your email.")
        Swal.fire({
              icon: "success",
              title: "Code Sent",
              text: "Please Check your email",
            });
        console.log("Success",data)

                // verify();

                    // --------------------------------------------
        }

        // add location to enter code
      },
      error: function(xhr, status, error) {
        // Hide loading spinner on error
       
        
        console.error("Error:", error);
        alert("Error: " + error);

        swal.close();
      },
    });
       


}

                   // Send code verificaion
                    // ----------------------------------------------
                    function verify() {
                    event.preventDefault();
                    console.log("performing ajax for code verify");
                    $.ajax({
                    type: 'POST',
                    url: '../../backend/verify.php',
                    data: {
                        code: $("#code").val()
                    },
                    success: function(data) {
                        console.log("code received", data);
                        if (data === "Code Verified") {
                            Swal.fire({
                                icon: "success",
                                title: "Code Verified"
                            });
                            console.log("verified", data);

                            // code to fully register
                            // --------------------------------------
                            console.log("Before form submission");
                            $("#registrationForm").submit();
                            console.log("After form submission");
                            // --------------------------------------
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Invalid Code",
                                text: "Please try again",
                            });
                            console.log(data);
                        }

                        // add location to enter code
                    },
                                error: function (xhr, status, error) {
                                    console.error("Error:", error);
                                    alert("Error: " + error);
                                },
                    });

                };
    
</script>

    <script>
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
            }
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
    <script>
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
                // alert("Please fill in all required fields.");
                Swal.fire({
              icon: "error",
              title: "Please fill in all required fields.",
            });
            }
        });
        backBtn.addEventListener("click", () => {
            form.classList.remove('secActive');
        });
    </script>
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

    <!-- <script>
        document.getElementById("yesRadio1").addEventListener("click", function() {
            document.getElementById("indigenousInfo").style.display = "block";
            document.querySelector('label[for="indigenousInfo"]').style.display = "block";
        });
        document.getElementById("noRadio1").addEventListener("click", function() {
            document.getElementById("indigenousInfo").style.display = "none";
            document.querySelector('label[for="indigenousInfo"]').style.display = "none";
        });
    </script> -->
    <script>
        function showSpecifyInput() {
            document.getElementById('indigenousInput').style.display = 'block';
        }

        function hideSpecifyInput() {
            document.getElementById('indigenousInput').style.display = 'none';
        }
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

</body>

</html>