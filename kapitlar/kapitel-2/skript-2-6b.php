<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift-2-6</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <?php
            $temp = $_REQUEST["temp"];
            $riktning = $_REQUEST["riktning"];

            echo "<h2>Uträkning</h2>"; 
            switch ($riktning) {
                case "GF":
                    $fahrenheit = (9 / 5) * $temp + 32;
                    echo "<p>$temp&deg är $fahrenheit&deg fahrenheit</p>";
                    break;
                case "GK":
                    $kelvin = ($temp - 273);
                    echo "<p>$temp&deg celsius är $kelvin&deg kelvin</p>";
                    break;
                case "FG":
                    $grader = ($temp - 32) * (5 / 9);
                    echo "<p>$temp&deg fahrenheit är $grader&deg celsius</p>";
                    break;
                
            }
        ?>
    </div>
</body>
</html>