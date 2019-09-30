<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift-1-2</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="./uppgift-3-5b.php" method="POST">
        <h2>Lånakalkylator</h2><br>
        <label>Lånebelopp</label>
        <input type="number" name="belopp">

        <label>Ränta</label>
        <input type="number" name="ränta">

        <label>1 År</label>
        <input type="radio" name="tid" value="1" required>
        <label>3 År</label>
        <input type="radio" name="tid" value="3" required>
        <label>5 År</label>
        <input type="radio" name="tid" value="5" required>
        
        <button class="tertiary">Skicka</button>
    </form>
    <?php 
            $belopp = filter_input(INPUT_POST, "belopp", FILTER_DEFAULT);
            $tid = filter_input(INPUT_POST, "tid", FILTER_DEFAULT);
            $ränta = filter_input(INPUT_POST, "ränta", FILTER_DEFAULT);


            if ($belopp && $ränta && $tid) {
                $kostnad = $belopp;
                for ($i=0; $i < $tid; $i++) { 
                    $kostnad = $kostnad * (1 + $ränta / 100);
                }

                $kostnad = $kostnad - $belopp;
                echo "<p>Totala lånekostnaden är $kostnad</p>";
            }    
        ?>
</body>
</html>