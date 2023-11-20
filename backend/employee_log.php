<?php
session_start();
include '../backend/connect_database.php';
$currentDate = date("Y-m-d");

$sql = "SELECT 
        audit_log.user_id,
        audit_log.timestamp,
        audit_log.action,
        admin_user.first_name,
        admin_user.last_name,
        admin_user.position,
        admin_user.contact

    FROM 
    audit_log
    INNER JOIN 
    admin_user ON audit_log.user_id = admin_user.admin_user_id
    WHERE DATE(timestamp) = :currentDate;
";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':currentDate', $currentDate);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare and echo data as JSON
echo json_encode($data);

?>