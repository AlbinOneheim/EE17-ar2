<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    /* skriv ut 1 till 10 */
        echo "<p>";
        for ($i=1; $i < 11; $i++) { 
            echo "Steg $i ";
        }
        echo "</p>";

        echo "<p>Steg:";
        for ($i=1; $i < 11; $i++) { 
            echo " $i ";
        }
        echo "</p>";

        /* Multiplikationstabellen */
        echo "<p>";
        for ($i=1; $i < 11; $i++) {
            $i10 = $i * 10; 
            echo "$i $i10<br>";
        }
        echo "</p>";


        echo "<table>";
        echo "<tr>
                <th>Talet</th>
                <th>Talet ggr 10</th>
              <tr>";
        for ($i=1; $i < 11; $i++) {
            $i10 = $i * 10; 
            echo "<tr><td>$i</td><td>$i10</td><tr>";
        }
        echo "</table><br>";
        
        echo "<table>";
        echo "<tr>
                <th>Talet</th>
              <tr>";
        for ($i=10; $i > 0 ; $i--) { 
            echo "<tr>
                    <td>$i</td>
                  <tr>";
        }
        echo "</table><br>";

        /* Räkna ned: 100, 81, 64, 49, 36, 25, 16, 9, 4, 1 */
        echo  "<table>";
        echo "<tr>
                <th>Kvadraten</th>
              <tr>";
              $i = 10;
        while ($i > 0) {
            $i2 = $i * $i;
            echo "<tr>
                    <td>$i2</td>
                  <tr>";
            $i--;
        }
        echo "</table>";

        
    ?>
</body>
</html>