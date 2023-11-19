<?php

include '../backend/connect_database.php';

// Set the filename for the exported SQL file
$filename = 'database_backup_' . date('YmdHis') . '.sql';
try {
    // Create a PDO connection
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Use the mysqldump command to export the database
    $command = "mysqldump --host=$servername --user=$username --password=$password $database > $filename";
    exec($command, $output, $return_var);

    // Check if the command executed successfully
    if ($return_var === 1) {
        echo '<script>';
        echo 'alert("Database Export Successfully!");';
        echo 'window.location.href="../Admin_Side/exportimport.php";';
        echo '</script>';
        exit;
    } else {
        echo '<script>';
        echo 'alert("Database Export Failed!");';
        echo 'window.location.href="../Admin_Side/exportimport.php";';
        echo '</script>';
    }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?>
