<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Filhantering</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $filnamn = "hej.txt";
        /* öppna eller skapa fil */
        $hantag = fopen($filnamn, "w");
        /* skriva i filen */
        fwrite($hantag, "bla bla bla.");
        /* Stänga anslutningen */
        fclose($hantag);

        /* läsa filen */
        $hantag = fopen($filnamn, "r");
        $texten = fread($hantag, 5);
        echo "<p>$texten</p>";
        fclose($hantag);
        /* läsa hela filen */
        $hantag = fopen($filnamn, "r");
        $texten = fread($hantag, filesize($filnamn));
        echo "<p>$texten</p>";
        fclose($hantag);

        /* alternativ 1 */
        $texten = file_get_contents("./sverige.txt");
        echo "<p>$texten</p>";

        /* alternativ 2 */
        $rader = file("./sverige.txt");
        foreach ($rader as $rad) {
            echo "<p>$rad</p>";
        }

        /* skriva ner allt i fil */
        $texten = "Norden är ett område i norra Europa som består av länderna Danmark, Finland, Island, Norge och Sverige samt de självstyrande områdena Åland (tillhör Finland), Färöarna och Grönland (tillhör Danmark). Dessa fem stater och tre självstyrande områden är alla separata medlemmar i Nordiska rådet och Nordiska ministerrådet.";
        file_put_contents("norden.txt", $texten);
        $rader = file("norden.txt");
        foreach ($rader as $rad) {
            echo "<p>$rad</p>";
        }
    ?>
</body>
</html>