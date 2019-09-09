<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulär</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">   
</head>
<body>
    <div class="kontainer">
        <?php 
            $Namn = $_REQUEST["namn"];
            $Kommentar = $_REQUEST["kommentar"];

            echo "<p>Hej $Namn!<br>";
            echo "$Kommentar</p>";
        ?>
    </div>
</body>
</html>