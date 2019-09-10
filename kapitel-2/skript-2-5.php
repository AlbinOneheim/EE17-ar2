<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift-2-5</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <?php
            $temp = $_REQUEST["temp"];
            $riktning = $_REQUEST["riktning"];

            if ($riktning == "GF") {
                $fahrenheit = (9 / 5) * $temp + 32;
                echo $fahrenheit;
            }else {
                $grader = ($temp - 32) * (5 / 9);
                echo $grader;   
            }
        ?>
    </div>
</body>
</html>