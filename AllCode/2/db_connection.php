<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Failled!" . mysqli_connect_error());
}
?>