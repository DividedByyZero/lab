<?php include 'db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sql = "Update list set Product_name='" . $_REQUEST['product_name'] . "',Product_price=" . $_REQUEST['product_price'] . " where Product_name='" . $_REQUEST['old_name'] . "'";
        if (mysqli_query($conn, $sql)) {
            echo "Update Successfully";
        } else {
            echo "Not Updated !";
        }
    }
    ?>
    <div id="product-form">
        <form id="product_form" action="update.php" method="post">
            <fieldset>
                <legend>Add Products</legend>
                <label for="product_name">Product Name</label>
                <input type="text" id="product_name" name="product_name" placeholder="Product Name"
                    value="<?php echo isset($_REQUEST['name']) ? $_REQUEST['name'] : ''; ?>"><br>
                <label for="product_price">Product Price</label>
                <input type="number" id="product_price" name="product_price"
                    value="<?php echo isset($_REQUEST['price']) ? $_REQUEST['price'] : ''; ?>"><br>
                <input type="text" id="old_name" name="old_name"
                    value="<?php echo isset($_REQUEST['name']) ? $_REQUEST['name'] : ''; ?>" hidden>
                <button type="submit" style="background-color:green">Edit</button>
            </fieldset>
        </form>
    </div>
</body>

</html>