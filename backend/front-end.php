<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>

<form action="testing.php" method="post" enctype="multipart/form-data">
    <h2>Upload Signature</h2>
    <input type="file" name="sign" accept="image/*">
    
    <h2>Upload ID</h2>
    <input type="file" name="image" accept="image/*">

    <br><br>
    <input type="submit" value="Upload Files">
</form>

</body>
</html>
