<?php
session_start();

include '../backend/connect_database.php';

// Set the filename for the exported SQL file
$filename = 'database_backup_' . date('YmdHis') . '.sql';
try {
    // Create a PDO connection
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Use the mysqldump command to export the database
    $command = "mysqldump --host=$servername --user=$username --password=$password $database > $filename";
    exec($command, $output, $return_var);

    // Check if the command executed successfully
    if ($return_var === 1) {
        $session_id = $_SESSION["session_id"];
        echo <<<HTML
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    var eID = "$session_id";
    $.ajax({
        type: "POST",
        url: "../backend/log_audit.php",
        data: {
            userId: eID,
            action: "Admin exported database",
            details: "Admin exported database"
        },
        success: function(response) {
            console.log("logged", response);
        }
    });
    alert("Database Export Successfully!");
    window.location.href="../Admin_Side/exportimport.php";
</script>
HTML;
        exit;
    } else {
        echo <<<HTML
<script>
    alert("Database Export Failed!");
    window.location.href="../Admin_Side/exportimport.php";
</script>
HTML;
    }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
