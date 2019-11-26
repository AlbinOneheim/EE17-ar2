<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bloggen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
    <h1 class="display-4">Bloggen</h1>
        <nav>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link active" href="./lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
            </ul>
        </nav>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <h2>Skriva</h2><br>
            <textarea name="inlägg" cols="30" rows="10"></textarea><br>
            <button>Skicka</button>
            <?php
            $inlägg = filter_input(INPUT_POST, "inlägg", FILTER_SANITIZE_STRING);

            if ($inlägg) {
                $datum = date("Y-m-d");
                $filnamn = "blogg.txt";
                $hantag = fopen($filnamn, "a");
                fwrite($hantag, "\n$inlägg \n$datum");
                
                fclose($hantag);
                echo "<p>Filen har sparats!</p>";
            }
            ?>
        </form>
    </div>
</body>
</html>