<?php
$taget_folder = 'uploads/';
if (!is_dir($taget_folder)) {
    mkdir($taget_folder, 0755, true);
}
$target_file = $taget_folder . basename($_FILES['image']['name']);
// echo $target_file;
$file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// echo $file_type;
$uploadOk = 1;
if (isset($_FILES['image'])) {
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check !== false) {
        echo "file type is" . $check['mime'];
    } else {
        echo "File is not an image";
        $uploadOk = 0;
    }
    if ($_FILES['image']['size'] > 2000000) {
        echo 'too large';
        $uploadOk = 0;
    }
    $supported_format = array('jpg', 'jpeg', 'png', 'gif');
    if (!in_array($file_type, $supported_format)) {
        echo "Not supported format!";
    }
    if ($uploadOk == 0) {
        echo "Your file is not uploaded";
    } else {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            echo "Successfully Uploaded!";
        } else {
            echo "Error Occured!";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>

<body>
    <form action="upload_image.php" method="post" enctype="multipart/form-data">
        <label for="image">Choose an image :</label>
        <input type="file" id="image" name="image"><br><br>
        <button type="submit" name="submit">Upload Image</button>
    </form>
</body>

</html>