<?php
/*
* Skriv en webbapp som tar ett tal mellan 1 och 9 och sedan returnerar det        svenska namnet för talet (ett, två, tre osv). Om talet är större än 9 så        returnerar du i stället talet som vanligt (tex. 11).
* PHP version 7
* @category   Gör ett formulär där användaren ska fylla i namn, adress, postnr och postort.
              Kontrollera att alla fälten är ifyllda, och innehåller minst 3 tecken.
              Kontrollera att postnumret innehåller 5 tecken och att de tecknen endast är siffror.
              Bygg på formuläret så att användaren också ska fylla i en e-postadress.
              Kontrollera sedan att e-postadressen innehåller ett @, och minst en punkt.
              Kontrollera också att e-postadressen är minst sex tecken lång.
              Utveckla skriptet i uppgift 5.2 så att det tar bort mellanslag i postnumret och därmed tillåter postnummer inskrivna enligt formen "415 22".
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
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
</head>
<body>  
    <div>
    <h2>Kontrollera inmatning</h2><br>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <label>Epost</label>
            <input type="email" name="epost" required>
    
            <button class="tertiary">Skicka</button>
        </form>
        <?php 
            $epost = filter_input(INPUT_POST, "epost", FILTER_SANITIZE_STRING);
            if ($epost) { 
                /* Ur epostadressen plocka ut namnet och domönen, enligt formen "namn@domän"*/

                /* Lösning med explode */
                $delar = explode("@", $epost);
                echo "<p>Namnet är $delar[0]</p>";
                echo "<p>Domänen är $delar[1]</p>";

                /* Lösning med strstr */
                echo "<p>Namnet är " . strstr($epost, "@", true);           
                echo "<p>Domaänen är " . strstr($epost, "@") . "</p>";           
            }
        ?>
    </div>
</body>
</html>