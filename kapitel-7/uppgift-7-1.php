<?php
/*
* Gör ett php-skript som tar den inmatade texten ur ett formulärs "textarea" och sparar den i en fil.
* @category   Gör ett formulär där användaren ska fylla i namn, adress, postnr och postort.
              
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift-7-1</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
</head>
<body>  
    <div class="kontainer">
        <h1>Spara texten</h1><br>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <label>Texten</label>
            <textarea name="texten" id="" cols="30" rows="10" required></textarea>
    
            <button class="tertiary">Spara</button>
        </form>
        <?php 
        $texten = filter_input(INPUT_POST, "texten", FILTER_SANITIZE_STRING);

        if ($texten){
            /* Gör ett php-skript som tar den inmatade texten ur ett formulärs "textarea" och sparar den i en fil. */
            /* $hantag = fopen("text.txt", "w");
            fwrite($hantag, $texten);
            fclose($hantag); */

            file_put_contents("text2.txt", $texten);
        }
        ?>
    </div>
</body>
</html>