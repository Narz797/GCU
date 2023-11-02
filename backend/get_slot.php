<?php
include '../backend/connect_database.php';

if (isset($_POST['event_id']) && isset($_POST['stud_id']) && isset($_POST['trans_id'])) {
    // Sanitize and validate the event_id
    $event_id = intval($_POST['event_id']);
    $stud_id = intval($_POST['stud_id']);
    $trans_id = intval($_POST['trans_id']);

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Define your SQL update query for the first table
        $sql1 = "UPDATE `appointment` SET `status` = 'taken', `student_id`= :stud_id WHERE `appointment_id` = :event_id";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(':event_id', $event_id, PDO::PARAM_INT);
        $stmt1->bindParam(':stud_id', $stud_id, PDO::PARAM_INT);

        // Execute the first SQL statement
        $stmt1->execute();

        // Define your SQL update query for the second table
        $sql2 = "UPDATE `transact` SET `status` = 'taken', `student_id`= :stud_id WHERE `transact_id` = :trans_id";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(':trans_id', $trans_id, PDO::PARAM_INT);
        $stmt2->bindParam(':stud_id', $stud_id, PDO::PARAM_INT);

        // Execute the second SQL statement
        $stmt2->execute();

        echo "Events marked as done successfully.";
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    } finally {
        $pdo = null; // Close the database connection
    }
} else {
    echo "Event ID, Student ID, or Transaction ID not provided.";
}
?>
