<?php
// Fetch notes from the database
// Example code, replace this with your database connection and query logic
session_start();
include '../backend/connect_database.php';

$stmt = $pdo->prepare("SELECT id, title, description, date FROM notes WHERE stud_id = :sid");
$stmt->bindParam(':sid', $_SESSION['stud_user_id']);
$stmt->execute();
$notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($notes);
?>
