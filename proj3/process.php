<?php


include 'connection.php';


if (isset($_POST['submit'])) {

  $product = $_POST['product'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];

  $sql = "INSERT INTO product (product, description, price, stock) VALUES (?, ?, ?, ?)";

  $stmt = mysqli_prepare($conn, $sql);

  mysqli_stmt_bind_param($stmt, "ssss", $product, $description, $price, $stock);

  if (mysqli_stmt_execute($stmt)) {
    header("Location: display.php");
  } else {
    echo "Error adding product: " . mysqli_error($conn);
  }

  mysqli_stmt_close($stmt);
} else {
 
  echo "Unauthorized access";
}

?>

