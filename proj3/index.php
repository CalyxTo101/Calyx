<?php

include 'connection.php';

session_start();

if (isset($_POST['submit'])) {

  $product = $_POST['product'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];

 
  $query = "INSERT INTO produt (product, description, price, stock) VALUES (?, ?, ?, ?)";

  $stmt = $conn->prepare($query);

  if (!$stmt) {
    echo "Error preparing statement: " . mysqli_error($conn);
    exit();
  }

  $stmt->bind_param("ssii", $product, $description, $price, $stock);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="form-container">
        <form method="post" action="process.php">
            <h1>Product Listing</h1>
            <div class="form-group">
                <label for="product">Product name:</label>
                <input type="text" id="product" name="product">
            </div>
            <div class="form-group">
                <label for="description">Product description:</label>
                <textarea id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Product price:</label>
                <input type="number" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="stock">Product stock:</label>
                <input type="number" id="stock" name="stock">
            </div>
            <button type="submit" name="submit">Add Product</button>
        </form>
    </div>
</body>
</html>


