<?php
include '../backend/connect_database.php';

if (
    isset($_FILES['sign']) && $_FILES['sign']['error'] === UPLOAD_ERR_OK &&
    isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK
) {

    $studUserId = 1; // replace with the actual user ID

    // Save the signature file
    $signContent = file_get_contents($_FILES['sign']['tmp_name']);
    $signType = $_FILES['sign']['type'];
    $signFileName = "uploads/signature_" . $studUserId . "." . pathinfo($_FILES['sign']['name'], PATHINFO_EXTENSION);
    file_put_contents($signFileName, $signContent);

    // Save the ID picture file
    $imageContent = file_get_contents($_FILES['image']['tmp_name']);
    $imageType = $_FILES['image']['type'];
    $imageFileName = "uploads/id_picture_" . $studUserId . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    file_put_contents($imageFileName, $imageContent);

    // Save file paths to the database
    // $stmtsave = $conn->prepare("INSERT INTO `photos`(`stud_user_id`, `signature`, `sign_type`, `id_picture`, `image_type`) VALUES (?, ?, ?, ?, ?)");
    // $stmtsave->bind_param("issss", $studUserId, $signFileName, $signType, $imageFileName, $imageType);

    // if ($stmtsave->execute()) {
    //     echo "Files uploaded and saved to the database.";
    // } else {
    //     echo "Error: " . $stmtsave->error;
    // }

    // $stmtsave->close();
} else {
    echo "Error uploading files.";
}
