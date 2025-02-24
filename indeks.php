<?php
$conn = mysqli_connect('localhost', 'root', '', 'test_rakose_ravbar');

if (!$conn) {
    die("Povezava ni uspela: " . mysqli_connect_error());
}

// Vnos podatkov
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["ime"])) {
    $ime = $_POST["ime"];
    $priimek = $_POST["priimek"];
    $ocena = $_POST["ocena"];
    $spol = $_POST["spol"];

    $sql = "INSERT INTO vaja (ime, priimek, ocena, spol) 
            VALUES ('$ime', '$priimek', '$ocena', '$spol')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<p>Podatki uspešno dodani.</p>";
    } else {
        echo "<p>Napaka pri dodajanju podatkov: " . mysqli_error($conn) . "</p>";
    }
}

// Posodobitev podatkov
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["old_ime"]) && isset($_POST["new_ime"])) {
    $old_ime =$_POST["old_ime"];
    $new_ime =$_POST["new_ime"];

    $sql_update = "UPDATE vaja SET ime = '$new_ime' WHERE ime = '$old_ime'";
    if (mysqli_query($conn, $sql_update)) {
        echo "<p>Podatki uspešno posodobljeni.</p>";
    } else {
        echo "<p>Napaka pri posodabljanju podatkov: " . mysqli_error($conn) . "</p>";
    }
}
// Brisanje podatkov
if ($_SERVER ["REQUEST_METHOD"] === "POST" && isset($_POST["brisanje"])){
    $delete_name=$_POST["brisanje"];
    $sql_delete= "DELETE from vaja  where ime='$delete_name'";
    if(mysqli_query($conn,$sql_delete)){
        echo "<p> Podatki izbrisani</p> ";
    }
    else{
        echo "<p> Podatki niso izbrisani </p>";
    }

}

// Prikaz podatkov
$sql = "SELECT * FROM vaja";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Podatki iz tabele:</h2>";
    echo "<table>";
    echo "<tr><th>Ime</th><th>Priimek</th><th>Ocena</th><th>Spol</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . htmlspecialchars($row["ime"]) . "</td><td>" . htmlspecialchars($row["priimek"]) . "</td><td>" . htmlspecialchars($row["ocena"]) . "</td><td>" . htmlspecialchars($row["spol"]) . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "<p>Ni podatkov za prikaz.</p>";
}

// Zapiranje povezave
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vnos podatkov</title>
    <style>
        table, td, tr, th {
            width: 300px;
            border-collapse: collapse;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h2>Vnesite podatke</h2>
    <form action="index.php" method="post">
        <label>Ime:</label><br>
        <input type="text" name="ime" required><br>
        <label>Priimek:</label><br>
        <input type="text" name="priimek" required><br>
        <label>Ocena:</label><br>
        <input type="number" min="1" max="5" name="ocena" required><br>
        <label>Spol:</label><br>
        <input type="text" name="spol" required><br><br>
        <button type="submit">Pošlji</button>
    </form>

    <h2>Posodobite podatke</h2>
    <form action="index.php" method="post">
        <label>Trenutno ime:</label><br>
        <input type="text" name="old_ime" required><br>
        <label>Novo ime:</label><br>
        <input type="text" name="new_ime" required><br><br>
        <button type="submit">Posodobi</button>
    </form>
    <h2>Brisanje podatkov</h2>
    <form action="index.php" method="post">
        <label for=""> Ime:</label><br>
        <input type="text" name="brisanje" required><br>
        <button type="submit">Briši</button>
    </form>
</body>
</html>