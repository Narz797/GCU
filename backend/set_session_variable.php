<?php
session_start();

if (isset($_POST['stud_user_id'])) {
    $_SESSION['stud_user_id'] = $_POST['stud_user_id'];
    echo 'Session variable set successfully.';
} else {
    echo 'Failed to set session variable.';
}
?>
