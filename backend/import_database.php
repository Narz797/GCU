<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file was uploaded without errors
    if (isset($_FILES['import']) && $_FILES['import']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['import']['tmp_name'];
        $fileName = $_FILES['import']['name'];

        // Specify the directory where you want to store the uploaded database file
        $uploadDir = '../database/';
        $uploadPath = $uploadDir . $fileName;
        // Move the uploaded file to the desired directory
        if (move_uploaded_file($fileTmpPath, $uploadPath)) {
            // Process the uploaded file (e.g., import the database)
            // Note: Implement your database import logic here

            $command = "mysql -u root -p'' db_gcu < $uploadPath";
            exec($command, $output, $returnVar);
            var_dump($output);
            var_dump($returnVar);
            if ($returnVar === 1) {
                echo '<script>';

                echo 'var eID = "<?php echo $_SESSION["session_id"];?>";';
                echo 'alert("Database Import Successfully!");';
                echo 'window.location.href="../Admin_Side/exportimport.php";';
                echo' $.ajax({';
                    echo'type: "POST",';
                    echo'url: "../backend/log_audit.php",';
                    echo'data: {';
                    echo'userId: eID,';
                    echo'action: "Admin imported database",';
                    echo'details: A"dmin imported database"';
                    echo'},';
                    echo'success: function(response) {';
                    echo'console.log("logged", response);';
                    echo'     }';
                    echo'   });';
                echo '</script>';
                exit; // Terminate script execution after the alert
            } else {
                // Database import failed
                echo '<script>';
                echo 'alert("Database Import Failed!");';
                echo 'window.location.href="../Admin_Side/exportimport.php";';
                echo '</script>';
            }
        } else {
            // Failed to move the uploaded file
            echo '<script>';
            echo 'alert("Failed to move the uploaded file.!");';
            echo 'window.location.href="../Admin_Side/exportimport.php";';
            echo '</script>';
            exit; // Terminate script execution after the alert
        }
    } else {
        // No file uploaded or an error occurred during upload
        echo '<script>';
        echo 'alert("No file uploaded or an error occurred during upload.");';
        echo 'window.location.href="../Admin_Side/exportimport.php";';
        echo '</script>';
        exit; // Terminate script execution after the alert
    }
} else {
    // Invalid request method
    echo '<script>';
    echo 'alert("Invalid request method.");';
    echo 'window.location.href="../Admin_Side/exportimport.php";';
    echo '</script>';
    exit; // Terminate script execution after the alert
}
