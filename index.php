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





<?php
$izbrano = isset($_POST["razmerje"]) ? $_POST["razmerje"] : "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<p>Izbrali ste: <strong>$izbrano</strong></p>";
}
?>

<form method="post">
    <label for="razmerje">Izberi razmerje:</label>
    <select name="razmerje" id="razmerje" onchange="this.form.submit()">
        <option value="" disabled selected>Izberi...</option>
        <option value="samski" <?= ($izbrano == 'samski') ? 'selected' : '' ?>>samski</option>
        <option value="v zvezi" <?= ($izbrano == 'v zvezi') ? 'selected' : '' ?>>v zvezi</option>
        <option value="komplicirano je" <?= ($izbrano == 'komplicirano je') ? 'selected' : '' ?>>komplicirano je</option>
    </select>
</form>