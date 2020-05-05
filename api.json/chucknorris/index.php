<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chuck Norris skämt</title>
<<<<<<< HEAD:api.json/chucknorris/index.php
    <link rel="stylesheet" href="../style.css">
=======
    <link rel="stylesheet" href="./style.css">
>>>>>>> 0682eef1c5d817279cfc931dc491edefaaed29d0:api/chucknorris/index.php
</head>
<body>
    <img src="" alt="">
    <div class="kontainer">
        <h1>En Chuck norris skämt</h1>
        <?php
        /* Tjänsten */
        $url = "https://api.chucknorris.io/jokes/random";
        
        $json = file_get_contents($url);
        
        /* Avkoda JSON */
        $jsonData = json_decode($json);
    
        /* plocka ut skämtet */
        $skämtet = $jsonData->value;

        /* Plocka ut bilden */
        $bilden = $jsonData->icon_url;
        
        /* Skriv ut skämtet och bilden*/
        echo "<blockquote>
            $skämtet
            <footer>Chuck Norris</footer>
            <img src=\"$bilden\" alt=\"Chuck norris\">
            </blockquote>";

        
        ?>
    </div>
</body>
</html>