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
    
            echo "<p>Hej $förnamn $efternamn tack för att du har skickat din data.</p> <br>";
            echo "<p>Är dina uppgifter korrekta?</p> <br>";
            echo "<p>Förnamn - $förnamn</p> <br>";
            echo "<p>Efternamn - $efternamn</p> <br>";
            echo "<p>Mobilnummer - $mobil</p> <br>";
            echo "<p>Kön - $kön</p> <br>";
            echo "<p>Favorit superhjälte - $hjälte</p> <br>";
            echo "<p>Fotbollslag - $fotbollslag</p> <br>";
            echo "<p>Egen kommentar:</p> <br>";
            echo "<p>$kommentar</p>";
        ?>
    </div>
</body>
</html>