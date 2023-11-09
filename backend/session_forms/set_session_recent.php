<?php
session_start();

if (isset($_POST['stud_id']) && isset($_POST['tran_id']) && isset($_POST['ttype']) ) {

    $_SESSION['stud_id'] = $_POST['stud_id'];
    $_SESSION['tran_id'] = $_POST['tran_id'];
    $_SESSION['form_type'] = $_POST['ttype'];
    echo 'Session variable set successfully.';
} else {
    echo 'Failed to set session variable.';
}
?>
