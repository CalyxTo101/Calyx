<?php
include 'connection.php';
session_start();
$errorMsg = "";

if(isset($_POST["loginBtn"])){
    $StudentID = $_POST["StudentID"];
    $Password = $_POST["Password"];
    $loginQuery = "SELECT StudentID, Name, Password
    FROM student
    WHERE StudentID = {$StudentID} AND Password = '{$Password}'";
    $loginQueryResult = $conn->query($loginQuery);
    if($loginQueryResult->num_rows > 0){
        while($row = $loginQueryResult->fetch_assoc()){
            $_SESSION["StudentIDSession"] = $row["StudentID"];
        }
        header("Location: index.php");
    }else{
        $errorMsg = "Incorrect Student/Password";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>login</h1>
    <h2><?php echo $errorMsg ?></h2>
    <form method="POST">
        <input type="number" name="StudentID" placeholder="Enter Student ID" required><br>
        <input type="password" name="Password" placeholder="Enter Password" required><br>
        <input type="submit" name="loginBtn" value="Login">
    </form>
</body>
</html>