<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        echo date("l");
        setlocale(LC_ALL, "sv_sv");
        $idag = strftime("%A %y %B");
        echo $idag;

        echo "<table class='kol2'>";
        echo "<tr>";
        echo "<th>Måndag</tr>";
        echo "<th>Tisdag</tr>";
        echo "<th>Onsdag</tr>";
        echo "<th>Torsdag</tr>";
        echo "<th>Fredag</tr>";
        echo "<th>Lördag</tr>";
        echo "<th>Söndag</tr>";
        echo "</tr>";
    ?>
</body>
</html>