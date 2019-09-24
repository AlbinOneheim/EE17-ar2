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
        <h2>Talserie</h2>
        <?php 
            $talet = $_REQUEST["talet"];

            /* skriv ut ett tal och respektive tals kvadrat från talet till 50. */
            
            echo "<p>";
            for ($i=$talet; $i <= 50; $i++) { 
                echo " $i " . $i * $i;
            }
            echo "</p>";
        ?>
    </div>
</body>
</html>