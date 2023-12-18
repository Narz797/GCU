<?php
$connection = mysqli_connect('localhost', 'root', '', 'db_gcu');

if ($_FILES['import_file']['error'] > 0) {
    die('Error uploading file!');
}

$filename = $_FILES['import_file']['tmp_name'];
$contents = file_get_contents($filename);

// Start a transaction for atomicity
mysqli_begin_transaction($connection);

// Split SQL statements by semicolon
$sqlStatements = explode(';', $contents);

foreach ($sqlStatements as $query) {
    // Skip empty statements
    if (trim($query) != "") {
        $result = mysqli_multi_query($connection, $query);

        if ($result) {
            do {
                // Consume all results to move to the next query (if any)
            } while (mysqli_next_result($connection));

            echo '<tr><td><br></td></tr>';
            echo '<tr><td>' . $query . '<b>SUCCESS</b></td></tr>';
            echo '<tr><td><br></td></tr>';
        } else {
            // Rollback the transaction on error
            mysqli_rollback($connection);
            echo '<tr><td><br></td></tr>';
            echo '<tr><td>' . $query . '<b>Error</b></td></tr>';
            echo '<tr><td><br></td></tr>';
        }
    }
}

// Commit the transaction if everything is successful
mysqli_commit($connection);

mysqli_close($connection);

echo '<script>alert("Successfully imported");</script>';
header('Location: ../Admin_Side/main.php');
?>
