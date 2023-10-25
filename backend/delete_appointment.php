<?php
include '../backend/connect_database.php';


if (isset($_POST['appointment_id'])) { // Change key to "appointment_id"
    $appointmentId = $_POST['appointment_id'];
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute a SQL query to delete the event based on multiple criteria.
    $sql = "DELETE FROM `appointment` WHERE 
            `appointment_id` = :appointment_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':appointment_id', $appointmentId, PDO::PARAM_INT);

    $stmt->execute();

    // Check if the event was deleted successfully.
    if ($stmt->rowCount() > 0) {
        // The event was successfully deleted.
        echo "Event deleted successfully.";
    } else {
        // The event with the specified criteria was not found.
        echo "Event not found or already deleted.";
    }
} catch (PDOException $e) {
    // Handle any database connection or query errors here.
    echo "Error: " . $e->getMessage();
} 

finally {
    // Close the database connection.
    $pdo = null;
}
} else {
    // Handle missing or invalid data
    echo "Missing or invalid data in the POST request.";
}
?>
