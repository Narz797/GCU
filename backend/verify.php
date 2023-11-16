<?php
// Start the session
session_start();
include '../backend/connect_database.php';
$Session_Code = $_SESSION['random_number'];

if (isset($_POST['code'])) 
{


    $code = $_POST['code'];

    try {
        if ($code == $Session_Code)
        {
            echo 'Code Verified';
        }else
        {
            echo 'Code Invalid';
        }
 
            

   

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
