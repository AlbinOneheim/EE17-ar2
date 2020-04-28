<?php
/*
* PHP version 7
* Hämta närmsta hållplatser från trafiklabs api
*
* @category   Hämta JSON-daata från api
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/

/* Ta emot POST-data från klienten */
$lat = filter_input(INPUT_POST, 'lat', FILTER_SANITIZE_STRING);
$lon = filter_input(INPUT_POST, 'lon', FILTER_SANITIZE_STRING);
var_dump($lat, $lon);

if ($lat && $lon) {

    /* api-nyckel */
    $api = "5a04359da47042b7837f88a5c61908c9";

    /* Sökradie i meter */
    $radie = 1000;

    /* Max antal svar, dvs antal hållplatser */
    $max = 25;

    /* Url till api:et */
    $url = "http://api.sl.se/api2/nearbystops.json?key=$api&originCoordLat=$lat&originCoordLong=$lon&maxresults=$max&radius=$radie";


    /* Hämta Json */
    $json = file_get_contents($url);

    /* Avkoda Json */
    $jsonData = json_decode($json);

    var_dump($jsonData);

} else {
    echo "Något blev fel med indata.";
}



