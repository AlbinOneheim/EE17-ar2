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
        <h2>Bekräftelse</h2>
        <?php 
            $anamn = $_REQUEST["anamn"];
            $lösenord = $_REQUEST["lösenord"];

            if ($anamn == "Albin" and $lösenord == "123") {
                echo "<p>Du är inloggad</p>";
            } else {
                header("location: uppgift-3-2.php?fel=ja");
                
            }
            
        ?>
    </div>
</body>
</html>