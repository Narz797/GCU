<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../backend/connect_database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the stud_user_id parameter
    $studUserId = $_POST["stud_user_id"];

    // Update the status in the database
    $sql = "UPDATE `student_user` SET `status` = 1 WHERE `stud_user_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $studUserId);
    $stmt->execute();
    $stmt->close();

    // Close the database connection
    $conn->close();

    // Send  a success response
    echo json_encode(["message" => "Status updated successfully"]);
} else {
    // Send an error response
    http_response_code(400);
    echo json_encode(["error" => "Invalid request"]);
}
?>