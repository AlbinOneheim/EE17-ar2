<?php
    $title = "Dagens lunch: " . date('l \v.W'); 
    /* skapar en array av några resturanger */
    $matStälleLista = ["Taco Bar", "Subway", "La Grande", "Falafelkungen", "Kebabkungen", "Mamma Mia", "Fafas"];

    /* slumpar fram ett tal i $matStälleLista */
    $antal = count($matStälleLista);
    $slumptal = rand(0, $antal - 1);
    $matStälle = $matStälleLista[$slumptal];
    $betyg = "Grymt gott varje dag!";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Bästa matstället</h1>
        <div class="mat">
            <h2><?php echo $matStälle; ?></h2>
            <p><?php echo $betyg;?></p>
        </div>
    </div>
</body>
</html>