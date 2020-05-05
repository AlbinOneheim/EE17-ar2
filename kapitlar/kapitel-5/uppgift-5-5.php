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
    <div class="kontainer">
    <h2>Passwordmeter</h2><br>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <label>Lösenord</label>
            <input type="text" name="losen" required>
    
            <button class="tertiary">Skicka</button>
        </form>
        <?php 
            $losen = filter_input(INPUT_POST, "losen", FILTER_SANITIZE_STRING);
            $poäng = 0;
            $vPoäng = 0;
            $gPoäng = 0;
            $sPoäng = 0;
            $spPoäng = 0;
            $lPoäng = 0;

            if ($losen) { 
                /* Ska innehålla mins en stor boksatav */
                $versaler = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W","X", "Y", "Z", "Å", "Ä", "Ö"];
                foreach ($versaler as $tecken){
                    $pos = strpos($losen, $tecken);
                    if ($pos !== false){
                        $vPoäng += 1;    
                    }
                }

                /* Ska innehålla minst en liten bokstav */
                $gemener = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "å", "ä", "ö"];
                foreach ($gemener as $tecken){
                    $pos = strpos($losen, $tecken);
                    if ($pos !== false){
                        $gPoäng += 1;    
                    }
                }
                   
                /* Ska innehålla minst en siffra */
                $siffror = ["0", "2", "3", "4", "5", "6", "7", "8", "9"];
                foreach ($siffror as $tecken) {
                    $pos = strpos($losen, $tecken);
                    if ($pos !== false){
                        $sPoäng += 1;   
                    }
                }
                
                /* Ska innehålla minst 8 tecken: strlen */
                if (strlen($losen) > 8){
                    $lPoäng += 1;
                }

                /* Ska innehålla minst ett specialtecken: #%&¤_*-+@!?()[]$£€ */
                $special = ["#", "%", "&", "¤", "_", "*", "-", "+", "@", "!", "?", "(", ")", "[", "]", "$", "£", "€"];
                foreach ($special as $tecken){
                    $pos = strpos($losen, $tecken);
                    if ($pos !== false){
                        $spPoäng += 1;
                    }
                }

                
                echo "<p>Ditt lösenord är: $losen</p>";
                echo "<p>Poängen är: $vPoäng + $gPoäng + $sPoäng + $lPoäng + $spPoäng</p>";

                /* Skriv ut poängen */
                if ($vPoäng == 0 or $gPoäng == 0 or $sPoäng == 0 or $spPoäng == 0 or $lPoäng == 0){
                    echo "<p>Lösenordet uppfyller inte alla kriterier.</p>";
                }else {
                    $poäng = $vPoäng + $gPoäng + $sPoäng + $lPoäng + $spPoäng;
                    echo "<p>Lösenordet fick $poäng poäng</p>"; 
                }
            }
        ?>
    </div>
</body>
</html>