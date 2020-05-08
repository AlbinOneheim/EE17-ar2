<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("./resurser/konfig-db.php");
require_once("./Login.php");
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logga in OOP</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/flatly/bootstrap.min.css" rel="stylesheet" integrity="sha384-T5jhQKMh96HMkXwqVMSjF3CmLcL1nT9//tCqu9By5XSdj7CwR0r+F3LTzUdfkkQf" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <header>
            <h1>Inloggning med OOP</h1>
            <nav>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="./logga-in-oop.php">Logga in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./registrera-oop.php">Registrera</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <?php
            /* Ta emot data */
        $anamn = filter_input(INPUT_POST, 'anamn', FILTER_SANITIZE_STRING);
        $lösen = filter_input(INPUT_POST, 'lösen', FILTER_SANITIZE_STRING);

        /* Om vi har tagit emot data då registrerar vi användaren */
        if ($anamn && $lösen) {
            $login = new Login($conn);

            /* Registrera användare */
            $svar = $login->kontroll($anamn, $lösen);

            switch ($svar) {
                case '0':
                    echo "<p class=\"alert alert-warning\">Användarnamnet finns inte!</p>";
                    break;
                case '1':
                    echo "<p class=\"alert alert-success\">Du är inloggad</p>";
                    break;
                case '2':
                    echo "<p class=\"alert alert-warning\">Lösenordet stämmer inte!</p>";
            }
        }
            ?>
            <form class="jumbotron" action="#" method="post">
                <label>Användarnamn</label>
                <input class="form-control" type="text" name="anamn" required>
                <label>Lösenord</label>
                <input class="form-control" type="password" name="lösen" required>
                <button class="btn btn-primary">logga in</button>
            </form>
        </main>
    </div>
</body>
</html>