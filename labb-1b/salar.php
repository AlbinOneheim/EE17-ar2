<?php
/*
* @category     
* @author     Karim Ryde <karye.webb@gmail.com
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skolans salar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
    <h1>Skolans salar</h1>
    <?php
    /* 1. Läs in textfilen */
    $textFil = "salar.tsv";

    if (is_readable($textFil)) {
        $rader = file($textFil);
        /* 2. Visa salar i en tabell: nr, namn, bokbar */
        echo "<table>";
        echo "<tr>
        <th>Nr</th>
        <th>Namn</th>
        <th>Typ av sal</th>
        <th>Bokbar</th>
        </tr>";
        foreach ($rader as $rad) {
            /* Dela upp raden i dess delar*/
            $delar = explode("\t", $rad);

            /* Plockat ut det som vi behöver */
            $salNrNamn = $delar[1];
            $bokbar = $delar[3];

            /* Plocka ut salsnummer och salsnamn */
            if (strstr($salNrNamn, "/")) {
                $delar = explode("/", $salNrNamn);
                $salNr = $delar[0];
                $salNamn = $delar[1];

                /* Om sal nummer har ett bindestreck, dela upp igen */
                if (strstr($salNr, "-")) {
                    $delar = explode("-", $salNr);
                    $salNr = $delar[0];
                    $salTyp = $delar[1];
                } else {
                    $salTyp = "sal";    
                }
                echo "<tr>
            <td>$salNr</td>
            <td>$salNamn</td>
            <td>$salTyp</td>
            <td>$bokbar</td>
            </tr>";
            } 
        }
    }else {
        echo "<p>$textFil går inte att läsa!";
    }
    echo "</table>";
    
    
    /* 3. Visa om salen är bokad med röd färg, om ledig med grön färg *
    /* 4. Ta bara med salar  */
        

    
    ?>
    </div>
</body>
</html>