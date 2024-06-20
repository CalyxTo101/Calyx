<?php
include 'connection.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <h2>Available Products</h2>

  <?php
    $sql = "SELECT product, description, price, stock FROM product";

  $result = mysqli_query($conn, $sql);


  if ($result) {

    if (mysqli_num_rows($result) > 0) {
      echo "<table>
        <tr>
          <th> Product Name </th>
          <th> Product Description </th>
          <th> Product Price </th>
          <th> Product Stock </th>
        </tr>";

      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
          <td>" . $row["product"] . "</td>
          <td>" . $row["description"] . "</td>
          <td>" . $row["price"] . "</td>
          <td>" . $row["stock"] . "</td>
        </tr>";
      }
      echo "</table>";
    } else {
      echo "No products found.";
    }
    
  } 

  mysqli_close($conn);
  
  ?>

</body>
</html>
