<?php
include '../backend/connect_database.php';

$input = $_GET['input'];
// Query the database for suggestions
$sql = "SELECT `Acronym` FROM `courses` WHERE `Acronym` LIKE :input";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':input', '%' . $input . '%', PDO::PARAM_STR);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div>" . $row['Acronym'] . "</div>";
    }
} else {
    echo "No suggestions found";
}
?>
