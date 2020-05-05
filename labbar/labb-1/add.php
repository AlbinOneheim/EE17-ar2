<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>labb-1</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Lägg till resturang</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <label>Resturang</label>
        <input type="text" name="resturang" required>
        <label>Gata</label>
        <input type="text" name="gata" required>
        <label>Postnummer</label>
        <input type="text" name="postnummer" required>
        <label>Postort</label>
        <input type="text" name="postort" required>

        <button class="tertiary">Skicka</button>
        <?php
        $resturang = filter_input(INPUT_POST, "resturang", FILTER_SANITIZE_STRING);
        $gata = filter_input(INPUT_POST, "gata", FILTER_SANITIZE_STRING);
        $postnummer = filter_input(INPUT_POST, "postnummer", FILTER_SANITIZE_STRING);
        $postort = filter_input(INPUT_POST, "postort", FILTER_SANITIZE_STRING);

        if ($resturang && $gata && $postnummer && $postort) {
            $filnamn = "./restauranger.csv";
            $handtag = fopen($filnamn, "a");
            fwrite($handtag, "\n$resturang, $gata, $postnummer, $postort");
            fclose($handtag);
        }
        
        ?>
    </div>
</body>
</html>