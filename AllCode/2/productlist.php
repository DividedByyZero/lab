<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    echo "Connection Faild!" . $mysqli_connect_error();
} else {
    echo "Successs!";
}
$val = "Nabeel";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        table,
        td,
        th,
        tr {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        $sql = "select * from list";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['Product_name'] . "</td>";
                echo "<td>" . $row['Product_price'] . "</td>";
                echo "<td><a href='delete.php?name=" . $row['Product_name'] . "'>X</a>";
                echo "<td><a href='update.php?name=" . $row['Product_name'] . "&price=" . $row['Product_price'] . "'>Edit</a>";
                echo "</tr>";
            }
        } else {
            echo "<h1>No Data Found</h1>";
        }
        ?>
    </table>
</body>

</html>