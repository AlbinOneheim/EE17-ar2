<?php
/*
* Hämta veckans horoskop från https://www.tidningennara.se/astrologi/veckans-horoskop och skriv ut den
* @category   Webbscrapping
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Veckans horoskop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <?php
        $veckonr = date("W");
        echo "<h1>Temadagar v$veckonr</h1>";
        
            /* Hämta sidan */
            $url = "https://temadagar.se/";
            $sidan = file_get_contents($url);
    
            /* Sök början på horoskoptexten */
            $start = strpos($sidan, "No hate day");
    
            if ($start !== false) {
                $slut = strpos($sidan, "</a>", $start);
                if ($slut !== false) {
    
                    /* Plocka ut horoskop */
                    $temadag = substr($sidan, $start, $slut - $start);
                    echo "<h2>$tecken</h2>";
                    echo "<p>$temadag</p>";
                } else {    
                    echo "<p>Hittade inte var horoskopet slutade!</p>";
                }
            } else {
                echo "<p>Hittade inte var horoskopet började!</p>";
            }
        ?>
    </div>
</body>
</html>