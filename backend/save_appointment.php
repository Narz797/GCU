<?php

include '../backend/connect_database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST['data'];

    

    echo "Appointment saved successfully.";
}
?>