<?php
include '../backend/connect_database.php';
$sql = "SELECT
admin_user.admin_user_id,
admin_user.last_name,
admin_user.first_name,
admin_user.middle_name,
admin_user.gender,
admin_user.email,
admin_user.contact,
admin_user.position
FROM
admin_user";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);

?>
