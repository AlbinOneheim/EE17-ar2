    <!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulär</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h2>Kostanden blir:</h2>
        <?php 
            $tid = $_REQUEST["tid"];
            $belopp = $_REQUEST["belopp"];
            $ränta = $_REQUEST["ränta"];

            $kostnad = $belopp;

            for ($i=0; $i < $tid; $i++) { 
                $kostnad = $kostnad * (1 + $ränta / 100);
            }

            $kostnad = $kostnad - $belopp;
            echo "<p>Totala lånekostnaden är $kostnad</p>";
        ?>
    </div>
</body>
</html> 