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
        <form action="<?php echo $_SERVER['PHP_SELF'];?>">
        <?php
        $filnamn = "blogg.txt";
        if (is_readable($filnamn)) {
            $texten = file($filnamn);
            $texten = array_reverse($texten);
            foreach ($texten as $rad) {
                echo "<p>$rad</p>";
            }
        }else {
            echo "<p>Texten kan inte läsas!</p>";
        }
        ?>
        </form>
    </div>
</body>
</html>