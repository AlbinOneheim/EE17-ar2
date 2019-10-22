<?php
/*
* Skriv en webbapp som tar ett tal mellan 1 och 9 och sedan returnerar det        svenska namnet för talet (ett, två, tre osv). Om talet är större än 9 så        returnerar du i stället talet som vanligt (tex. 11).
* PHP version 7
* @category   Gör ett formulär där användaren ska fylla i namn, adress, postnr och postort.
              Gör ett webbapp som i en textruta frågar efter ett filnamn på servern. Kontrollera sedan filnamnet så att det endast innehåller bokstäver, siffror och punkt. Om kontrollen ger OK, så öppna filen och skriv ut filinnehållet på skärmen.
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift-7-2</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
</head>
<body>  
    <div class="kontainer">
        <h1>Läsa textfil</h1><br>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <label>Filnamn</label>
            <input type="text" name="filnamn" required>

            <label>Texten</label>
            <textarea name="texten" id="" cols="30" rows="10" required></textarea>

            <button class="tertiary">Skicka</button>
        </form>
        <?php 
        $filnamn = filter_input(INPUT_POST, "filnamn", FILTER_SANITIZE_STRING);
        $texten = filter_input(INPUT_POST, "texten", FILTER_SANITIZE_STRING);
        
        if ($filnamn && $texten){

            /* Kontrollera sedan filnamnet så att det endast innehåller bokstäver, siffror och punkt */
            if (preg_match("/[a-zåäö0-9.]+/", $filnamn)) {
                echo "<p>Filnamnet är korrket</p>";
                file_put_contents($filnamn, $texten);
            }else {
                echo "<p>Filnamnet är INTE korrekt</p>";
            }
        }
        ?>
    </div>
</body>
</html>