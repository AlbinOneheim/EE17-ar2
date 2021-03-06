<?php
/*
* Skriv en webbapp som tar en text och omvandlar den till morsekod. Se https://    onlinetexttools.com/convert-text-to-morse och https://morsealfabetet.se.        Lägg till ljudspelare se https://codepen.io/cople/pen/zZLJOz
* PHP version 7
* @category   Omvandla text till morsekod
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift-1-2</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="./morse.js" defer></script>
</head>
<body>
    <div class="kontainer">
        <form action="./uppgift-4-5.php" method="POST">
            <h2>Omvandla text till morsekod</h2><br>
            <label>Texten</label><br>
            <textarea name="texten" cols="30" rows="10" required></textarea><br>

            <button class="tertiary">Skicka</button>
        </form>
        <?php 
            $texten = filter_input(INPUT_POST, 'texten', FILTER_SANITIZE_STRING);

            if ($texten) {
                $morse['A'] = '.-';
                $morse['B'] = '-...';
                $morse['C'] = '-.-.';
                $morse['D'] = '-..';
                $morse['E'] = '.';
                $morse['F'] = '..-.';
                $morse['G'] = '--.';
                $morse['H'] = '....';
                $morse['I'] = '..';
                $morse['J'] = '.---';
                $morse['K'] = '-.-';
                $morse['L'] = '.-..';
                $morse['M'] = '--';
                $morse['N'] = '-.';
                $morse['O'] = '---';
                $morse['P'] = '.--.';
                $morse['Q'] = '--.-';
                $morse['R'] = '.-.';
                $morse['S'] = '...';
                $morse['T'] = '-';
                $morse['U'] = '..-';
                $morse['V'] = '...-';
                $morse['W'] = '.--';
                $morse['X'] = '-..-';
                $morse['Y'] = '-.--';
                $morse['Z'] = '--..';
                $morse['Å'] = '.--.-';
                $morse['Ä'] = '.-.-';
                $morse['Ö'] = '---.';
                $morse[' '] = ' ';
                
                /* Dela upp texten i Bokstäver */
                $texten = mb_strtoupper($texten);
                $delar = str_split($texten);
                
                /* Skriv ut texten i morsekod */
                echo  "<form id=\"demo\"><label>$texten</label><input type=\"text\" pattern=\"[.\- ]+\" name=\"code\" value=\"";
                foreach ($delar as $bokstav) {
                    /* Om tecknet finns i morseallfabetet skriv ut morsekoden */
                    if (array_key_exists($bokstav, $morse)) {
                        echo "$morse[$bokstav] ";
                    }
                }
                echo "\"><button>Play</button></form>"; 
            }   
        ?>
    </div>
</body>
</html>