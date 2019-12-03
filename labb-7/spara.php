<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
    <h1>Registrera</h1>
        <form action="#" method="POST">
            <label>Användarnamn</label>
            <input type="text" name="anamn">
            <label>Lösenord</label>
            <input type="text" name="losen">

            <button class="tertiary">Spara</button>
            </form>
            <?php
            $anamn = filter_input(INPUT_POST, "anamn", FILTER_SANITIZE_STRING);
            $losen = filter_input(INPUT_POST, "losen", FILTER_SANITIZE_STRING);

            if ($anamn && $losen) {
                $trimmadAnamn = trim($anamn);
                $trimmadLosen = trim($losen);

                $trimmadAnamn = strtolower($trimmadAnamn);
                $trimmadLosen = strtolower($trimmadLosen);
                
                $hash = password_hash($trimmadLosen, PASSWORD_DEFAULT);

                $info = "info.txt";
                $hantag = fopen($info, "a");
                fwrite($hantag, "$trimmadAnamn $hash\n");
                fclose($hantag);
                header("location: ./login.php");
            }
            ?>
        
    </div>
</body>
</html>