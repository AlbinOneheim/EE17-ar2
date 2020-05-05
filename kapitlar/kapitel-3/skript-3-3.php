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
        <h2>Heltalsserie</h2>
        <?php 
            $tal1 = $_REQUEST["tal1"];
            $tal2 = $_REQUEST["tal2"];
          
            /* Skriv ut alla heltal mellan de två som matats in. Separera med mellanslag. */
            echo "<p>";
            for ($i=$tal1 + 1; $i < $tal2; $i++) { 
                echo "$i ";
            }
            echo "</p>";
        ?>
    </div>
</body>
</html>