<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift-2-7</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <?php
            $storlek = $_REQUEST["storlek"];
            $text = $_REQUEST["text"];

            echo "<h2>Bekräftelse</h2>";

            if ($storlek == "V") {
                $versaler = mb_strtoupper($text);
                echo "<p>$versaler</p>";
            }else {
                $gemener = mb_strtolower($text);
                echo "<p>$gemener</p>";
            }  
        ?>
    </div>
</body>
</html>