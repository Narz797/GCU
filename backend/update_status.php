<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../backend/connect_database.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the stud_user_id parameter
    $studUserId = $_POST["stud_user_id"];

    try {
        // Update the status in the database using a prepared statement
        $sql = "UPDATE `transact` SET `status` = 'recieved' WHERE `student_id` = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$studUserId]);

        // Close the database connection (optional as PDO closes automatically)
        // $pdo = null;

        // Send a success response
        echo json_encode(["message" => "Status updated successfully"]);
    } catch (PDOException $e) {
        // Handle any errors that occur during the process
        http_response_code(500);
        echo json_encode(["error" => "Database error: " . $e->getMessage()]);
    }
} else {
    // Send an error response
    http_response_code(400);
    echo json_encode(["error" => "Invalid request"]);
}
?>
