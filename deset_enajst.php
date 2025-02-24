<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $width = $_POST['width'] ;
    $height = $_POST['height'] ;

} else {
    $width = 100;
    $height = 100;
}
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izris pravokotnika</title>
    <style>
        .rectangle {
            width: <?= $width ?>px;
            height: <?= $height ?>px;
            background-color: blue;
            border: 3px solid black;
        }
    </style>
</head>
<body>
    <form method="POST">
        <label for="width">Izberi širino:</label>
        <input type="number" name="width" id="width" value="<?= htmlspecialchars($width) ?>" min="1" />
        
        <label for="height">Izberi višino:</label>
        <input type="number" name="height" id="height" value="<?= htmlspecialchars($height) ?>" min="1" />
        
        <button type="submit">Izriši pravokotnik</button>
    </form>

    <div class="rectangle"></div>
</body>
</html>
