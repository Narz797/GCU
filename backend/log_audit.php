<?php
include 'connect_database.php';

function logAudit($userId, $action, $details) {
    global $pdo;

    try {
        $query = "INSERT INTO audit_log (user_id, action, details) VALUES (:user_id, :action, :details)";
        $stmt = $pdo->prepare($query);
        
        if (!$stmt) {
            die('Error preparing statement: ' . $pdo->errorInfo()[2]);
        }

        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':action', $action, PDO::PARAM_STR);
        $stmt->bindParam(':details', $details, PDO::PARAM_STR);

        if (!$stmt->execute()) {
            die('Error executing statement: ' . $stmt->errorInfo()[2]);
        }

        $stmt->closeCursor();
    } catch (PDOException $e) {
        die('PDO Exception: ' . $e->getMessage());
    }
}

// Get values from the AJAX request
$userId = $_POST['userId'];
$action = $_POST['action'];
$details = $_POST['details'];

// Call the logAudit function
logAudit($userId, $action, $details);
?>
