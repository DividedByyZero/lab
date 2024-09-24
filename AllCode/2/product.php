<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Manager</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .product_form {
            background-color: orangered;
            margin: 0;
        }

        #product-form {
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "product";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "INSERT INTO list(Product_name,Product_price) VALUES('" . $_REQUEST['product_name'] . "'," . $_REQUEST['product_price'] . ");";
            echo $sql;
            if (mysqli_query($conn, $sql)) {
                echo "<h1 style='background-color:green,color:white'>Successfully Added !</h1>";
                header("Location: productlist.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        ?>
        <div>
            <button id="add-product">Add Product</button>
            <a href="productlist.php"><button id="product-list">Show Product List</button></a>
        </div>
        <div id="product-form" style="display:none">
            <form id="product_form" action="product.php" method="post">
                <fieldset>
                    <legend>Add Products</legend>
                    <label for="product_name">Product Name</label>
                    <input type="text" id="product_name" name="product_name" placeholder="Product Name"><br>
                    <label for="product_price">Product Price</label>
                    <input type="number" id="product_price" name="product_price"><br>
                    <button type="submit">Add Product</button>
                </fieldset>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('add-product').addEventListener('click', addProduct);
        document.getElementById('product_form').addEventListener('submit', validate);
        function addProduct(event) {
            document.getElementById('product-form').style.display = 'block';
        }
        function validate(event) {
            const product_name = document.getElementById('product_name').value.trim();
            const product_price = document.getElementById('product_price').value;
            if (product_name === '') {
                alert("Must insert Product Name!");
                event.preventDefault();
                return;
            }
            if (product_price <= 0) {
                alert("Price must be greater than zero! ");
                event.preventDefault();
                return;
            }
        }
    </script>
</body>

</html>