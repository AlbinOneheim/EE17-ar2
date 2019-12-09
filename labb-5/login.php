<?php
/*
* PHP version 7
* @category   Logga in
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
session_start();
if (!$_SESSION['login']) {
    $_SESSION['login'] = false;
}
?>
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
<?php
        

        $anamn = filter_input(INPUT_POST, "anamn", FILTER_SANITIZE_STRING);
        $losen = filter_input(INPUT_POST, "losen", FILTER_SANITIZE_STRING);

        /* kolla om användarnamn och lösenord stämmer */
        if ($anamn && $losen) {
            $anamn = trim($anamn);
            $losen = trim($losen);

            $anamn = strtolower($anamn);
            $losen = strtolower($losen);

            $rader = file("info.txt") or die("Kunde inte öppna textfilen");
            foreach ($rader as $rad) {

                $delar = explode(" ", $rad);
                $anamnFil = $delar[0];
                $hashFil = trim($delar[1]);

                if ($anamn == $anamnFil) {
                    if (password_verify($losen, $hashFil)) {
                        $_SESSION['login'] = true;
                    }
                }
            }

            
    }
        ?>
    <div class="kontainer">
        <h1 class="display-4">Bloggen</h1>
        <nav>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="./lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
                <?php
                if(!$_SESSION['login']){
                    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"./login.php\">Logga in</a></li>";
                }else {
                    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"./logout.php\">Logga ut</a></li>";
                }
                ?>
            </ul>
        </nav>
        <?php
        $fran = filter_input(INPUT_GET, "fran", FILTER_SANITIZE_STRING);
        if ($fran == "skriva") {
            echo "<p class=\"alert alert-info\">För att skriva inlägg måste du logga in!</p>";
        }
        ?>
        <form action="./login.php" method="POST">
        <h2>Logga in</h2><br>
        <label>Användarnamn</label>
        <input type="text" name="anamn" placeholder="Användarnamn" required>
        <label>Lösenord</label>
        <input type="password" name="losen" placeholder="Lösenord" required>
        
        <button class="tertiary">Logga in</button>
        </form>
        <?php
        if ($_SESSION['login']){
            echo "<p class=\"alert alert-success\">Du är inloggaD!</p>";
        }else {
            echo "<p class=\"alert alert-warning\">Fel användarnamn eller lösenord</p>"; 
        }
        ?>
    </div>
    
</body>
</html>