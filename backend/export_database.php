<?php
session_start();
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database_name = "db_gcu";

$conn = mysqli_connect($host, $username, $password, $database_name);
$conn->set_charset("utf8");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$tables = array();
$sql = "SHOW TABLES";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_row($result)) {
    $tables[] = $row[0];
}

$sqlScript = "";

foreach ($tables as $table) { 
    // Prepare SQL script for creating table structure
    $query = "SHOW CREATE TABLE `$table`";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);

    $sqlScript .= "\n\n" . $row[1] . ";\n\n";

    $query = "SELECT * FROM `$table`";
    $result = mysqli_query($conn, $query);

    $columnCount = mysqli_num_fields($result);

    // Prepare SQL script for dumping data for each table
    while ($row = mysqli_fetch_assoc($result)) {
        $sqlScript .= "INSERT INTO `$table` VALUES(";
        $values = array_map(function ($value, $fieldInfo) use ($conn) {
            // Check if the column is a BLOB type
            if (strpos($fieldInfo->type, 'BLOB') !== false) {
                // Export BLOB as text using utf8_encode or base64_encode
                return "'" . mysqli_real_escape_string($conn, utf8_encode($value)) . "'";
            } else {
                return "'" . mysqli_real_escape_string($conn, $value) . "'";
            }
        }, $row, mysqli_fetch_fields($result));

        $sqlScript .= implode(', ', $values);
        $sqlScript .= ");\n";
    }

    $sqlScript .= "\n";
}

if (!empty($sqlScript)) {
    // Save the SQL script to a backup file
    $backup_file_name = $database_name . '_backup_' . time() . '.sql';
    $fileHandler = fopen($backup_file_name, 'w+');

    if (!$fileHandler) {
        die("Error opening file for writing.");
    }

    $number_of_lines = fwrite($fileHandler, $sqlScript);

    if ($number_of_lines === false) {
        die("Error writing to file.");
    }

    fclose($fileHandler);

    // Download the SQL backup file to the browser
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($backup_file_name));
    
    ob_clean();
    flush();
    
    readfile($backup_file_name);

    unlink($backup_file_name);  // Remove the file after download
    exit();  // Ensure that no other output is sent after download
}
?>
