<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vädret</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="kontainer">
        <?php
        /* Api-nyckel */
        $api = "22ee1d58f7adae08ee71fa7c0bd24481";

        /* Stad */
        $stad = "Stockholm";

        echo "<h1>Vädret idag i $stad</h1>";

        /* Tjänsten */
        $url = "https://api.openweathermap.org/data/2.5/weather?q=$stad&appid=$api&units=metric";
        
        $json = file_get_contents($url);
        
        /* Avkoda JSON */
        $jsonData = json_decode($json);
        
        /* Plocka ut koordinaterna */
        $koordinater = $jsonData->coord;
        $lon = $koordinater->lon;
        $lat = $koordinater->lat;

        echo "<p>Koordinater (lat, lon): $lat, $lon</p>";

        /* Plocka ut vädret */
        $väder = $jsonData->weather;
        $himlen = $väder[0]->description;
        $ikon = $väder[0]->icon;

        echo "<p>Himlen är: $himlen</p>";
        echo "<p><img src=\"http://openweathermap.org/img/wn/$ikon@2x.png\"></p>";

        /* Plocka ut temperaturen i celsius*/
        $temp = $jsonData->main->temp;
        echo "<p>Temperaturen just nu är: $temp&deg</p>";

        /* Plocka ut vindhastigeten */
        $vind = $jsonData->wind->speed;
        echo "<p>Vindhastigeten just nu är: $vind m/s</p>";
        ?>
    </div>
</body>
</html>