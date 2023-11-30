<?php
include '../backend/connect_database.php';

if (isset($_POST['user_id'])) {
    // Sanitize user input
    $tID = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);
    
    try {
        $sql = "DELETE FROM `teachers` WHERE `employee_id` = :tid";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':tid', $tID, PDO::PARAM_INT);
      

        if ($stmt->execute()) {
            echo "Teaher deleted successfully.";
        } else {
            echo "No Teaher found with the provided ID.";
        }

    } catch (PDOException $e) {
        // Log the error instead of exposing it to users
        error_log("Error: " . $e->getMessage());
        echo "An error occurred, please try again later.";
    }
} else {
    echo "Missing or invalid data in the POST request.";
}
?>
