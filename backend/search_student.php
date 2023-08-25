<?php

include '../backend/connect_database.php';
$sql = "SELECT `stud_user_id`, `first_name`, `last_name`,  `year_enrolled`, `course`, `gender`,`contact_no`, `GuardianParents_no`, `service_requested` FROM student_user";


$result = $conn->query($sql);



$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();

// Return data as JSON
echo json_encode($data);


?>