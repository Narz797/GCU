<?php
session_start();
include '../backend/connect_database.php';

try {
    if (isset($_POST['siblingsData'])) {
        $siblingsData = $_POST['siblingsData']; 

        // Establish a database connection (assuming $pdo is already defined in connect_database.php)
        // If not, create the connection here
        // $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert data into your database
        foreach ($siblingsData as $sibling) {
            $stmt = $pdo->prepare("INSERT INTO siblings (Last_name, First_name, Middle_name, Age, High_edu, Civil_status) 
                VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$sibling['lastName'], $sibling['firstName'], $sibling['middleName'], $sibling['age'], $sibling['education'], $sibling['civilStatus']]);
        }

        // Close the connection (assuming the connection is established here)
        // $pdo = null; 

        echo "Data inserted successfully.";
    } 
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
