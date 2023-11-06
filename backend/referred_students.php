<?php
include '../backend/connect_database.php';
$sql = "SELECT
`student_id`, `full_name`, `college`, `year_level`, `gender`, `reason`, `date`, `status`
FROM
tstable
";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);

?>