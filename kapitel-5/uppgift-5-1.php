<?php
/*
* Skriv en webbapp som tar ett tal mellan 1 och 9 och sedan returnerar det        svenska namnet för talet (ett, två, tre osv). Om talet är större än 9 så        returnerar du i stället talet som vanligt (tex. 11).
* PHP version 7
* @category   Gör ett formulär där användaren ska fylla i namn, adress, postnr och postort.
              Kontrollera att alla fälten är ifyllda, och innehåller minst 3 tecken.
              Kontrollera att postnumret innehåller 5 tecken och att de tecknen endast är siffror.
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
</head>
<body>  
    <div>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <h2>Kontrollera inmatning</h2><br>  
            <label>Namn</label>
            <input type="text" name="namn" required>
            <label>Adress</label>
            <input type="text" name="adress" required>
            <label >Postnr</label>
            <input type="text" name="postnr" required>
            <label>Postort</label>
            <input type="text" name="postort" required>
    
            <button class="tertiary">Skicka</button>
        </form>
        <?php 
            $namn = filter_input(INPUT_POST, "namn", FILTER_SANITIZE_STRING);
            $adress = filter_input(INPUT_POST, "adress", FILTER_SANITIZE_STRING);
            $postnr = filter_input(INPUT_POST, "postnr", FILTER_SANITIZE_STRING);
            $postort = filter_input(INPUT_POST, "postort", FILTER_SANITIZE_STRING);
            if ($namn && $adress && $postnr && $postort){

                /* Kontrollera att alla fälten innehåller minst 3 tecken */
                if (strlen($namn) < 3) {
                    echo "<p>Namnet är för kort, vg försök igen!</p>";
                }
                if (strlen($adress) < 3) {
                    echo "<p>Adressen är för kort, vg försök igen!</p>";
                }
                if (strlen($postnr) < 3) {
                    echo "<p>Postnummret är för kort, vg försök igen!</p>";
                }
                if (strlen($postort) < 3) {
                    echo "<p>Postorten är för kort, vg försök igen!</p>";
                }
                /* Kontrollera att postnummret innehåller 5 tecken */
                if (strlen($postnr) != 5) {
                    echo "<p>Postnummret är fel längd. Postnummer ska vara 5 siffror</p>";
                }
                /* Kontrollera att postnummret innehåller endast siffror */
                if(!is_numeric($postnr)){
                    echo "<p>Postnummret ska bara innehålla siffror</p>";
                }
            }
        ?>
    </div>
</body>
</html>