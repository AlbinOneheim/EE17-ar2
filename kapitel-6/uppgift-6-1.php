    <?php
/*
* Skriv en webbapp som tar ett tal mellan 1 och 9 och sedan returnerar det        svenska namnet för talet (ett, två, tre osv). Om talet är större än 9 så        returnerar du i stället talet som vanligt (tex. 11).
* PHP version 7
* @category   Gör ett formulär där användaren ska fylla i namn, adress, postnr och postort.
              Gör ett formulär där användaren ska fylla i ett domännamn. Kontrollera sedan att domännamnet slutar på .com, .net eller .org. Du ska också kontrollera att de övriga tecknen endast består av bokstäver a-z, siffror 0-9 eller bindestreck (-). Första tecknet måste vara en bokstav. Domännamnet ska vara minst sex tecken och högst 200 tecken långt.
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
    <div class="kontainer">
    <h1>Domännamn kontroll</h1><br>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <label>Domän</label>
            <input type="text" name="domain" required>
    
            <button class="tertiary">Skicka</button>
        </form>
        <?php 
        $domain = filter_input(INPUT_POST, "domain", FILTER_SANITIZE_STRING);

        if ($domain){
            /* Kontrollera sedan att domännamnet slutar på .com, .net, .org, .se */
            if (preg_match("/.com|.net|.org|.se$/", $domain)) {
                echo "<p>Domännamnet slutar på .com, .net, .org, .se</p>";
            }else {
                echo "<p>Domännamnet slutar INTE på .com, .net, .org, .se</p>";
            }

            /* Du ska också kontrollera att de övriga tecknen endast består av bokstäver a-z, siffror 0-9 eller bindestreck (-). */
            if (preg_match("/[a-z0-9\-]+.(com|net|org)$/", $domain)) {
                echo "<p>Domännamnet innehåller .com, .net, .org, .se eller -</p>";
            }else {
                echo "<p>Domännamnet slutar INTE på .com, .net, .org, .se eller -</p>";
            }

            /* Första tecknet måste vara en bokstav */
            if (preg_match("/[a-z][a-z0-9\-]+.(com|net|org)$/")) {
                echo "<p></p>";
            }else {
                echo "<p></p>";
            }

            /* Domännamnet ska vara minst sex tecken och högst 200 tecken långt. */
            if (preg_match("/^[a-z][a-z0-9\-]{3,195}.(com|net|org)$/")) {
                echo "<p></p>";
            }else {
                echo "<p></p>";
            }
        }   
        ?>
    </div>
</body>
</html>