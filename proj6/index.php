<?php
include 'connection.php';
session_start();
$errorMsg = "";

if(isset($_POST["submitBtn"])){
    $SubjectName = $_POST["SubjectName"];
    $Grades = $_POST["Grades"];
    $checkQuery = "SELECT SubjectName FROM grades WHERE SubjectName = {$SubjectName}";
    $checkQueryResult = $conn->query($checkQuery);
    if($checkQueryResult->num_rows > 0){
        $errorMsg = "Invalid input";
    }
    else{
        $siqnupQuery = "INSERT INTO grades VALUES ({$SubjectName}, '{$Grades}')";
        $siqnupQueryResult = $conn->query($siqnupQuery);
        
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
    <h1>Submit Grades</h1>
    <h2><?php echo $errorMsg ?></h2>
   <form method="POST">
        <input type="text" name="SubjectName" placeholder="Enter Subject" required><br>
        <input type="number" name="Grades" placeholder="Enter Grade" required><br>
        <input type="submit" name="submitBtn" value="Submit">
    </form>
</body>
</html>