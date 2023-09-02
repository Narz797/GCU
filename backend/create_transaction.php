<?php
include 'connect_database.php';

$id = $_POST['student_id'];
$transact = $_POST['transact_type'];

if ($transact == 'readmission') {
    $reason = $_POST['reason'];
    $motivation = $_POST['motivation'];
    $datetime = new DateTime();

    $sql_1 = 'INSERT INTO transact(student_id, transact_type, date_created) VALUES (:student_id, :transact_type, :date_created)';
    $sql_2 = 'INSERT INTO readmission(transact_id, motivation, reason) VALUES (:transact_id, :motivation, :reason)';
    try {
        $code = $pdo->prepare($sql_1);
        $code->bindParam(':username', $id);
        $code->bindParam(':transact_type', $transact);
        $code->bindParam(':date_created',$datetime);
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

    $sql = 'INSERT INTO withdrawal()';

} else if ($transact == 'leave_of_absence') {
    $semester = $_POST['semester'];
    $start_year = $_POST['start_year'];
    $end_year = $_POST['end_year'];
    $reason_leave = $_POST['reason_leave'];
    $do_leave = $_POST['do_leave'];

} else if ($transact == 'referral') {
    $interview = $_POST['interview'];
    $counsel = $_POST['counsel'];
    $test = $_POST['test'];
    $others = $_POST['others'];
    $content = $_POST['content'];

}

$pdo = null;
?>