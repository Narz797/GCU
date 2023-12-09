<?php
// process_registration.php

// Your form processing logic goes here

// Redirect to a success page
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

header("Location: page3.php");
exit();
?>
