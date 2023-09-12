<?php
include '../backend/connect_database.php';

$input = $_GET['input'];

try {
    $sql = "SELECT `Acronym` FROM `courses` WHERE `Acronym` LIKE :input";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':input', '%' . $input . '%', PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div>" . htmlspecialchars($row['Acronym']) . "</div>";
        }
    } else {
        echo "No suggestions found";
    }
} catch (PDOException $e) {
    // Handle database errors here
    echo "Error: " . $e->getMessage();
}
?>
