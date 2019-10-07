<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Strängfunktioner</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1></h1>
        <?php
        /* Dela upp en sträng i dess tecken */
        $land = "Sverige";
        $delar = str_split($land);
        /* Skriv ut en bokstav per rad */
        foreach ($delar as $bokstav) {
            echo "<p>$bokstav</p>";
        }

        /* Dela upp en mening i dess ord */
        $mening = "Sverige är ett land i norden.";
        $delar = explode(" ", $mening);

        /* Skriv ut ett ord per rad */
        foreach ($delar as $ord) {
            echo "<p>$ord</p>";
        }

        /* Rensa bord tomrum i text (början och slut) */
        $mening = "   Sverige är ett land i norden.   ";
        $trimmadMening = trim($mening);
        echo "<p>_$trimmadMening\_</p>";

        /* Hur lång är en sträng? */
        $mening = "Sverige är ett land i norden.";
        $längd = strlen($mening);
        echo "<p>Meningen $mening är $längd tecken lång</p>";

        /* Plocka ut delar i en sträng */
        $url = "https://classroom.google.com/u/0/w/Mzc1MzQyODMwNjZa/t/all";
        $start = substr($url, 0, 4);
        echo "<p>Dom fyra första tecknen är $start</p>";
        $del = substr($url, 18, 6);
        echo "<p>$del</p>";

        /* Hitta en text i en text */
        if (strstr($url, "netflix")) {
            echo "<p>Netflix hittades i texten</p>";
        } else {
            echo "<p>Netflix hittades inte texten</p>";
        }
        
        /* Var finns ordet i texten */
        $position = strpos($url, "classroom");
        echo "<p>Ordet Classroom finns på position $position</p>";

        /* Ersätt ett ord med ett annat ord i texten */
        $nyUrl = str_replace("google", "netflix", $url);
        echo "<p>$nyUrl</p>";
        ?>
    </div>
</body>
</html>