<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <?php
            $grader = $_REQUEST["grader"];
            $fahrenheit = 9/5 * $grader + 32;
            
            echo "<h2>Uträkning</h2>";
            echo "<p> $grader&deg celsius är $fahrenheit&deg fahrenheit.";        
        ?>
    </div>
</body>
</html>