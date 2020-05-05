<?php
/*
* Hämta temperaturprognos från SMHI:s öppna api JSON-format,
* och visualisera en graf.
*
* PHP version 7
* @category   Hämta JSON-dat från api
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Temperaturprognos från SMHI</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <link rel="stylesheet" href="prognos.css">
</head>
<body>
    <div class="kontainer">
        <h1>Temperaturprognos i Stockholm</h1>
        <canvas id="myChart" width="300" height="100"></canvas>
        <?php
        /* url till api:et */
        $url = "https://opendata-download-metfcst.smhi.se/api/category/pmp3g/version/2/geotype/point/lon/18/lat/59/data.json";

        /* Hämta JSNON-data */
        $json = file_get_contents($url);

        /* Avkoda JSON-data */
        $jsonData = json_decode($json);

        /* publicerings datum */
        $approvedTime = $jsonData->approvedTime;
        echo "<h3>Publicerat den $approvedTime</h3>";

        /* Plocka ut tidserien */
        $timeSeries = $jsonData->timeSeries;

        /* Samla in data: tider och temperatur */
        $tiderData = "";
        $tempData = "";

        /* Loopar igenom arrayen för att plocka ut temperaturvärderna */
        foreach ($timeSeries as $timeData) {
            $validTime = $timeData->validTime;

            /* Plocka ut parametrarna */
            $parameters = $timeData->parameters;

            /* Plocka ut parameter */
            $parameter = $parameters[11];
            $temperaturen = $parameter->values[0];

            /* Plocka ut bara datum delen */
            $datumDelen = substr($validTime, 0, 10);
            
            /* För att bara skriva datumet en första gång */
            $pos = strpos($tiderData, $datumDelen);
            echo "<p>$tiderData</p>";
            if ($pos === false) {
                $tiderData .= "'$datumDelen',";
            }else {
                $tiderData .= "'',";
            }

            $tempData .= "'$temperaturen',";

        }
    
        /* Chart.js koden */
        echo "<script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [$tiderData],
                datasets: [{
                    label: 'SMHI prognos',
                    data: [$tempData],
                    backgroundColor: [
                        'rgb(173, 123, 222, 0.4)'
                    ],
                    borderColor: [
                        'red'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        </script>";
        ?>
    </div>
</body>
</html>