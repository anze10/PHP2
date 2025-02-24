<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
$conn = new mysqli("$servername", "$username", "$password","$dbname");

$query = "SELECT * FROM users";
$ress = $conn->query($query);


while($row in $ress){
    echo $row['id']." ".$row['firstname']." ".$row['lastname']." ".$row['email']." ".$row['reg_date']."<br>";
}


for($i= 0 ; $i <10; $i++){
    echo $i;
}






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">

        <input type="text" name="firstname" placeholder="firstname">
        <input type="text" name="lastname" placeholder="lastname">
        <input type="email" name="email" placeholder="email">
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>