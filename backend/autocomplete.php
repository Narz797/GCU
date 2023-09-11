<?php
include '../backend/connect_database.php';

// Get user input from the query parameter
$userInput = $_GET['query'];

// Query the database for suggestions
$stmt = $db->prepare("SELECT `Acronym` FROM `courses` WHERE `Acronym` LIKE :input LIMIT 10");
$stmt->bindValue(':input', '%' . $userInput . '%', PDO::PARAM_STR);
$stmt->execute();

// Fetch and return suggestions as JSON
$suggestions = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($suggestions);
?>
