<?php
/*
* PHP version 7
* @category   Lånekalkylator
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
include_once "./konfig-db.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
    <h1 class="display-4">Bloggen</h1>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="./lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
                <li class="nav-item"><a class="nav-link active" href="./lista.php">Admin</a></li>
            </ul>
        </nav>
        <?php
        /* 1. Logga in på mysql-servern och välj databas */
        $conn = new mysqli($host, $användare, $lösenord, $databas);

        /* 2. SQL? */
        $query = "SELECT * FROM blogg";
        $result = $conn->query($query);

        echo "<table>";
        echo "<tr>
        <th>Datum</th>
        <th>Rubrik</th>
        <th>Inlägg</th>
        <th>Handling</th>
        </tr>"; 

        /* 3. Ta emot svaret och bearbeta det */
        while ($rad = $result->fetch_assoc()) {
            echo "<tr>
                <td>$rad[datum]</td>
                <td>$rad[rubrik]</td>
                <td>$rad[inlagg]</td>
                <td><a href=\"redigera.php?id=$rad[id]\"><i class=\"fa fa-edit\"></i></a>
                <a href=\"radera.php?id=$rad[id]\"><i class=\"fa fa-trash-o\"></i></a>
                </td>
                </tr>";  
            }        
            echo "</table>";
            ?>
    </div>
</body>
</html>