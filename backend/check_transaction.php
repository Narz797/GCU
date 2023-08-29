<?php
include '../backend/connect_database.php';

$sql = "SELECT `stud_user_id`, `first_name`, `last_name`, `college`, `course`, `service_requested`, `status` FROM student_user";
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->bind_result($stud_user_id, $first_name,  $last_name, $college, $course, $service_requested, $status); // Corrected variable names

$data = array(); // Initialize an array to store the data

while ($stmt->fetch()) {
    $data[] = array(
        "stud_user_id" => $stud_user_id,
        "service_requested" => $service_requested,
        "first_name" => $first_name,
        "last_name" => $last_name,
        "college" => $college,
        "course" => $course,
        "status" => $status
    );
}

$stmt->close();

// Close the database connection
$conn->close();

// Prepare and echo data as JSON
echo json_encode($data);
?>
