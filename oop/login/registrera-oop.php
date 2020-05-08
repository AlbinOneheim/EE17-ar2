<?php
/**
* PHP version 7
* @category   OOP variant
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/

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
    <title>Registrera OOP</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/flatly/bootstrap.min.css" rel="stylesheet" integrity="sha384-T5jhQKMh96HMkXwqVMSjF3CmLcL1nT9//tCqu9By5XSdj7CwR0r+F3LTzUdfkkQf" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <header>
            <h1>Registrera med OOP</h1>
            <nav>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="./logga-in.php">Logga in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./registrera.php">Registrera</a>
                    </li>
                </ul>
            </nav>
        </header>
        <?php
        /* Ta emot data */
        $anamn = filter_input(INPUT_POST, 'anamn', FILTER_SANITIZE_STRING);
        $lösen = filter_input(INPUT_POST, 'lösen', FILTER_SANITIZE_STRING);

        /* Om vi har tagit emot data då registrerar vi användaren */
        if ($anamn && $lösen) {
           $login = new Login($conn);

           $svar = $login->registrera($anamn, $lösen);

           switch ($svar) {
               case '1':
                    echo "<p class=\"alert alert-success\">Du är registrerad!-</p>";
                   break;
           }
        }
        ?>
        <main>
        <form class="jumbotron" action="#" method="post">
                <label>Användarnamn</label>
                <input class="form-control" type="text" name="anamn" required>
                <label>Lösenord</label>
                <input class="form-control" type="password" name="lösen" required>
                <button class="btn btn-primary">Registrera</button>
            </form>
        </main>
    </div>
</body>
</html>