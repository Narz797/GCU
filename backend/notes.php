<?php
session_start();
include '../backend/connect_database.php';
$student = $_SESSION['stud_user_id'];

// Add Note
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sid = $student;
    $title = $_POST['title'];
    $description = $_POST['description'];
    $datetime = new DateTime();
    $date = $datetime->format('Y-m-d H:i:s');

    $stmt = $pdo->prepare("INSERT INTO notes (stud_id, title, description, date) VALUES (:sid, :title, :description, :date)");
    $stmt->bindParam(':sid', $sid);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':date', $date);

    $stmt->execute();
    echo "Note added successfully";
}

// Delete Note
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $sid = $student; // or $_GET['sid'] depending on how you're sending the datassssss

    $stmt = $pdo->prepare("DELETE FROM notes WHERE stud_id = :sid");
    $stmt->bindParam(':sid', $sid);
    // $stmt->bindParam(':id', $id);
    $stmt->execute();
    echo "Note deleted successfully";
}


// Update Note
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);
    $id = $student;
    $title = $_PUT['title'];
    $description = $_PUT['description'];

    $stmt = $pdo->prepare("UPDATE notes SET title = :title, description = :description WHERE id = :id");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    echo "Note updated successfully";
}
