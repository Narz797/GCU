<?php 
    include 'connect_database.php';

    $id = $_POST['student_id'];
    $transact = $_POST['transact_type'];

    if ($transact == 'readmission'){
        $reason = $_POST['reason'];
        $motivation = $_POST['motivation'];

        

    }
    else if($transact == 'withdrawal'){
        $reason = $_POST['reason'];
        $statement = $_POST['statement'];
        $explain = $_POST['explain'];

    }
    else if($transact == 'leave_of_absence'){
        $semester = $_POST['semester'];
        $start_year = $_POST['start_year'];
        $end_year = $_POST['end_year'];
        $reason_leave = $_POST['reason_leave'];
        $do_leave = $_POST['do_leave'];

    }else if($transact == 'referral'){
        $interview = $_POST['interview'];
        $counsel = $_POST['counsel'];
        $test = $_POST['test'];
        $others = $_POST['others'];
        $content = $_POST['content'];

    }


?>