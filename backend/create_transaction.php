<?php
session_start();
include '../backend/connect_database.php';

$id = $_SESSION['session_id'];// gets stud id from session
$transact = $_SESSION['transact_type'];//gets value of transact_type

if ($transact == 'readmission') {
    $reason = $_POST['reason'];
    $motivation = $_POST['motivation'];
    $datetime = new DateTime();
    $dateCreated = $datetime->format('Y-m-d H:i:s'); // Convert DateTime to a string in MySQL DATETIME format



    $sql_1 = 'INSERT INTO transact(student_id, transact_type, date_created) VALUES (:student_id, :transact_type, :date_created)';
    $sql_2 = 'INSERT INTO readmission(transact_id, motivation, reason) VALUES (:transact_id, :motivation, :reason)';
    try {
        $code = $pdo->prepare($sql_1);
        $code->bindParam(':student_id', $id);
        $code->bindParam(':transact_type', $transact);
        $code->bindParam(':date_created',$dateCreated);
        $code->execute();

        $transact_id = $pdo->lastInsertId();

        $code = $pdo->prepare($sql_2);
        $code->bindParam(':transact_id',$transact_id);
        $code->bindParam(':motivation', $reason);
        $code->bindParam(':reason',$motivation);
        $code->execute();

        echo "Data inserted successfully";
    } catch (PDOException $e) {
        echo "Error inserting data: " . $e->getMessage();
    }

} else if ($transact == 'withdrawal') {
    $reason = $_POST['reason'];
    $statement = $_POST['statement'];
    $explain = $_POST['explain'];
    $datetime = new DateTime();
    $dateCreated = $datetime->format('Y-m-d H:i:s'); // Convert DateTime to a string in MySQL DATETIME format


    $sql_1 = 'INSERT INTO transact(student_id, transact_type, date_created) VALUES (:student_id, :transact_type, :date_created)';
    $sql_2 = 'INSERT INTO withdrawal(`transact_id`, `reason`, `statement`, `explain`) VALUES (:transact_id, :reason, :statementt, :explain)';
    try {
        $code = $pdo->prepare($sql_1);
        $code->bindParam(':student_id', $id);
        $code->bindParam(':transact_type', $transact);
        $code->bindParam(':date_created',$dateCreated);
        $code->execute();

        $transact_id = $pdo->lastInsertId();

        $code = $pdo->prepare($sql_2);
        $code->bindParam(':transact_id',$transact_id);
        $code->bindParam(':reason', $reason);
        $code->bindParam(':statementt',$statement);
        $code->bindParam(':explain',$explain);
        $code->execute();

        echo "Data inserted successfully";
    } catch (PDOException $e) {
        echo "Error inserting data: " . $e->getMessage();
    }

} else if ($transact == 'leave_of_absence') {
    $semester = $_POST['semester'];
    $start_year = $_POST['start_year'];
    $end_year = $_POST['end_year'];
    $reason_leave = $_POST['reason_leave'];
    $do_leave = $_POST['do_leave'];
    $datetime = new DateTime();
    $dateCreated = $datetime->format('Y-m-d H:i:s'); // Convert DateTime to a string in MySQL DATETIME format

    $sql_1 = 'INSERT INTO transact(student_id, transact_type, date_created) VALUES (:student_id, :transact_type, :date_created)';
    $sql_2 = 'INSERT INTO absence(`transact_id`, `semester`, `start_year`, `end_year`, `reason`, `leave`) VALUES (:transact_id, :semester, :startt, :endd, :reason, :do)';
    try {
        $code = $pdo->prepare($sql_1);
        $code->bindParam(':student_id', $id);
        $code->bindParam(':transact_type', $transact);
        $code->bindParam(':date_created',$dateCreated);
        $code->execute();

        $transact_id = $pdo->lastInsertId();

        $code = $pdo->prepare($sql_2);
        $code->bindParam(':transact_id',$transact_id);
        $code->bindParam(':semester', $semester);
        $code->bindParam(':startt', $start_year);
        $code->bindParam(':endd', $end_year);
        $code->bindParam(':reason', $reason_leave);
        $code->bindParam(':do',$do_leave);
        $code->execute();

        echo "Data inserted successfully";
    } catch (PDOException $e) {
        echo "Error inserting data: " . $e->getMessage();
    }

} else if ($transact == 'referral') {
    $reasons = $_POST['reasons'];
    $refer = $_POST['refer'];
    $datetime = new DateTime();
    $dateCreated = $datetime->format('Y-m-d H:i:s'); // Convert DateTime to a string in MySQL DATETIME format
    $reasonsString = implode(',', $reasons);// Convert the array of reasons to a comma-separated string

    $sql_1 = 'INSERT INTO transact(student_id, transact_type, date_created) VALUES (:student_id, :transact_type, :date_created)';
    $sql_2 = 'INSERT INTO referral(`transact_id`, `reason`, `referred`) VALUES (:transact_id, :reasons, :refer)';
    try {
        $code = $pdo->prepare($sql_1);
        $code->bindParam(':student_id', $id);
        $code->bindParam(':transact_type', $transact);
        $code->bindParam(':date_created',$dateCreated);
        $code->execute();

        $transact_id = $pdo->lastInsertId();

        $code = $pdo->prepare($sql_2);
        $code->bindParam(':transact_id',$transact_id);
        $code->bindParam(':reasons', $reasonsString);
        $code->bindParam(':refer', $refer);
        $code->execute();

        echo "Data inserted successfully";
    } catch (PDOException $e) {
        echo "Error inserting data: " . $e->getMessage();
    }


}
// echo "User ID: " . $id;
$pdo = null;
?>