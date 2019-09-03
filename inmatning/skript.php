<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulär</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">   
</head>
<body>
    <div class="kontainer">
        <?php 
            $förnamn = $_REQUEST["förnamn"];
            $efternamn = $_REQUEST["efternamn"];
            $mobil = $_REQUEST["mobil"];
            $kön = $_REQUEST["kon"];
            $hjälte = $_REQUEST["hjälte"];
            $fotbollslag = $_REQUEST["fotbollslag"];
            $kommentar = $_REQUEST["kommentar"];
    
            /* skriv ut en snygg bekräftelse */
    
            echo "<p>Hej $förnamn $efternamn tack för att du haskickat din data. <br>";
            echo "Är dina uppgifter korrekta? <br>";
            echo "Förnamn - $förnamn <br>";
            echo "Efternamn - $efternamn <br>";
            echo "Mobilnummer - $mobil <br>";
            echo "Kön - $kön <br>";
            echo "Favorit superhjälte - $hjälte <br>";
            echo "Fotbollslag - $fotbollslag <br>";
            echo "Egen kommentar <br>";
            echo "$kommentar</p>";
        ?>
    </div>
</body>
</html>