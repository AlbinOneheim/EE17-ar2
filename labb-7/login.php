<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spara</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Logga in</h1>
        <form action="#" method="POST">
            <label>Användarnamn</label>
            <input type="text" name="anamn">
            <label>Lösenord</label>
            <input type="text" name="losen">

            <button class="tertiary">Logga in</button>
            <?php
$anamn = filter_input(INPUT_POST, "anamn", FILTER_SANITIZE_STRING);
$losen = filter_input(INPUT_POST, "losen", FILTER_SANITIZE_STRING);

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
                echo "<p>Du är inloggad!</p>";
                exit();
            } else {
                echo "<p>Fel användarnamn eller lösenord</p>";
                exit();
            }
        }
        
    }
    echo "<p>Användarnamnet $anamn hittades inte!</p>";
}

?>
        </form>
    </div>
</body>
</html>