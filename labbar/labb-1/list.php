<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>labb-1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <?php
        /* is_readable kolla om filen är läsbar */
        if (is_readable("./restauranger.csv")) {
            /* plockar ut filen och skirver den */
            $rader = file("./restauranger.csv");
            /* dela upp filen i */
            echo "<table>";
            echo "<tr>
                <th>Namn</th>
                <th>Gata</th>
                <th>Postnummer</th>
                <th>Postort</th>
                </tr>";
            foreach ($rader as $rad) {
                $delar = explode(", ", $rad);
                echo "<tr>
                <td>$delar[0]</td>
                <td>$delar[1]</td>
                <td>$delar[2]</td>
                <td>$delar[3]</td>
                </tr>";
            }
        } else {
            /* om inte filen är läsbar skriv ut */
            echo "<p>Kan ej läsa filen.</p>";
        }
        echo "</table>";
        
        ?>
    </div>
</body>
</html>