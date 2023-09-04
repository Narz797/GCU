<?php
$servername = "localhost";
$database = "db_gcu";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Do not echo "Connected successfully" here; it can interfere with response headers
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
