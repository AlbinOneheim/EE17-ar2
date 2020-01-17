<?php
/*
* PHP version 7
* @category   Blogg med fillagring
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
include_once "../konfig-db.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bloggen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="kontainer">
        <h1 class="display-4">Bloggen</h1>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="../lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="../sok.php">Sök</a></li>
                <li class="nav-item"><a class="nav-link" href="./admin.php">Admin</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
                <li class="nav-item"><a class="nav-link active">Radera</a></li>
            </ul>
        </nav>
        <main>
            <?php
            $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
            $radera = filter_input(INPUT_POST, "radera", FILTER_SANITIZE_STRING);

            $conn = new mysqli($host, $användare, $lösenord, $databas);
            if ($conn->connect_error) {
                die("Kunde inte ansluta till databasen: " . $conn->connect_error);
            }

            if ($id && !$radera) {
                echo "<p>Inlägg Nummer $id</p>";

                $query = "SELECT * FROM blogg WHERE id = '$id'";
                $result = $conn->query($query);

                if (!$result) {
                    die("Något blev fel med SQL-statsen.");
                }else {
                $rad = $result->fetch_assoc();
                echo "<form action=\"#\" method=\"POST\">";
                echo "<div class=\"inlagg\">";
                echo "<h5>{$rad['datum']}</h5>";
                echo "<h6>{$rad['rubrik']}</h6>";
                echo "<p>{$rad['inlagg']}</p>"; 
                echo "</div>";
                echo "<button class=\"btn btn-danger\" name=\"radera\" value=\"1\">Radera inlägg!</button>";
                echo "</form>";
                } 
               
            }
            if ($id && $radera) {
                $sql = "DELETE FROM blogg WHERE id = '$id'";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Något blev fel med SQL-statsen.");
                }else {
                    echo "<p class=\"alert alert-info\">Inlägg $id har raderats!</p>";
                }
            }

            $conn->close();
            ?>
        </main>
    </div>
</body>
</html>