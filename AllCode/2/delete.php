<?php
echo $_REQUEST['name'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("failed!" . mysqli_connect_error());
} else {
    echo "Success!";
    $sql = "Delete from list where Product_name='" . $_REQUEST['name'] . "'";
    if (mysqli_query($conn, $sql)) {
        echo "Successfully Deleted!";
    } else {
        echo "Not Deleted !";
    }
}
?>