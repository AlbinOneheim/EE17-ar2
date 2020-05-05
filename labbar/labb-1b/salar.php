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
            if ((strstr($salNrNamn, "/") || $salNrNamn == "430" || $salNrNamn == "522" || substr($salNrNamn, 0, 1) == "A" ||
            $salNrNamn == "Biblioteket" || $salNrNamn == "Dr Kristinas sal") && 
            $salNrNamn != "APL" && $salNrNamn != "Annan plats") {
                if (strstr($salNrNamn, "/")) {
                    $delar = explode("/", $salNrNamn);
                    $salNr = $delar[0]; // Dvs "410"
                    $salNamn = $delar[1]; // Dvs "Dali"
                }else {
                    $salNr = $delar[1]; // Dvs "A1"
                    $salNamn = "";
                    /* Plocka ut salsnummer och salsnamn för anexet */
                    if (strstr($salNr, "(")) { // Dvs "A1 (Mattesal)"
                        $delar = explode(" (", $salNr);
                        $salNr = $delar[0]; 
                        $salNamn = substr($delar[1], 0, -1); 
                    } 
                }
                

                /* Om sal nummer har ett bindestreck, dela upp igen */
                if (strstr($salNr, "-")) {
                    $delar = explode("-", $salNr);
                    $salNr = $delar[0];
                    $salTyp = $delar[1];
                } else {
                    $salTyp = "sal";    
                }
                if ($bokbar == "1") {
                    echo "<tr>
            <td>$salNr</td>
            <td>$salNamn</td>
            <td>$salTyp</td>
            <td class=\"grön\"></td>
            </tr>";
                }else {
                    echo "<tr>
            <td>$salNr</td>
            <td>$salNamn</td>
            <td>$salTyp</td>
            <td class=\"röd\"></td>
            </tr>";
                }
                
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