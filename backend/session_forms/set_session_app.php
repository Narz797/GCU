<?php
session_start();

if (isset($_POST['stud_id']) && isset($_POST['tran_id']) ) {

    $_SESSION['stud_id'] = $_POST['stud_id'];
    $_SESSION['tran_id'] = $_POST['tran_id'];
    echo 'Session variable set successfully.';
} else {
    echo 'Failed to set session variable.';
}
?>
