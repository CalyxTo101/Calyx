<?php
include 'connection.php';
session_start();
$errorMsg = "";

if(isset($_POST["signupBtn"])){
    $Name = $_POST["Name"];
    $Course = $_POST["Course"];
    $StudentID = $_POST["StudentID"];
    $Password = $_POST["Password"];
    $Password2 = $_POST["Password2"];
    $checkQuery = "SELECT StudentID FROM student WHERE StudentID = {$StudentID}";
    $checkQueryResult = $conn->query($checkQuery);
    if($checkQueryResult->num_rows > 0){
        $errorMsg = "Student ID already existed";
    }else{
        if($Password == $Password2){
            $siqnupQuery = "INSERT INTO student VALUES ({$StudentID}, '{$Name}', '{$Course}', '{$Password}')";
            $siqnupQueryResult = $conn->query($siqnupQuery);
            header("Location: login.php");
        }
        else{
            $errorMsg = "Password do not match";
        }
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
    <h1>Signup</h1>
    <h2><?php echo $errorMsg ?></h2>
    <form method="POST">
        <input type="text" name="Name" placeholder="Enter Name" required><br>
        <input type="text" name="Course" placeholder="Enter Course" required><br>
        <input type="number" name="StudentID" placeholder="Enter Student ID" required><br>
        <input type="password" name="Password" placeholder="Enter Password" required><br>
        <input type="password" name="Password2" placeholder="Re-enter Password" required><br>
        <input type="submit" name="signupBtn" value="Signup"><br>
    </form>
</body>
</html>
