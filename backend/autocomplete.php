<?php
include '../backend/connect_database.php';

$input = $_GET['input'];

$suggestions = array(); // Initialize an empty array for suggestions

try {
    $sql = "SELECT `Acronym` FROM `courses` WHERE `Acronym` LIKE :input";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':input', '%' . $input . '%', PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Add each suggestion to the array
            $suggestions[] = htmlspecialchars($row['Acronym']);
        }
    } else {
        $suggestions[] = "No suggestions found";
    }

    // Convert the array to JSON format and send it as the response
    echo json_encode($suggestions);
} catch (PDOException $e) {
    // Handle database errors here
    echo json_encode(array("error" => "Database error: " . $e->getMessage()));
}
?>
