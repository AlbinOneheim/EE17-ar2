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
        <h2>Multiplicera</h2>
        <?php 
            $Name = $_REQUEST["namn"];
            $Mobil = $_REQUEST["mobil"];
            $E_post = $_REQUEST["e-postadress"];
            $Kontaktad = $_REQUEST["kontaktad"];

            echo "<p>$Name<br>$E_post<br>$Mobil<br></p>";
            if ($Kontaktad){
                echo "<p>Vi kommer att kontakta dig inom snarast per $Kontaktad</p>";
            }
            
        ?>
    </div>
</body>
</html>