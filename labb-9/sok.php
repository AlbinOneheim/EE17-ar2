<?php
/*
* PHP version 7
* @category   Skriv en text som sparas i textfil
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
session_start();
include_once "./admin/konfig-db.php";

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
    <div class="kontainer">
    <h1 class="display-4">Bloggen</h1>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="./lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link active" href="./sok.php">Sök</a></li>
                <li class="nav-item"><a class="nav-link" href="./admin/admin.php">Admin</a></li>
            </ul>
        </nav>
        <form action="#" method="POST">
            <label>Fritext</label>
            <input type="text" name="soktext" required><br>

            <button class="btn btn-primary">Sök i alla inlägg</button>
            </form>

            <?php
            /* Ta emot söktexten */
            $soktext = filter_input(INPUT_POST, "soktext", FILTER_SANITIZE_STRING);

            if ($soktext) {
            /* 1. */
            $conn = new mysqli($host, $användare, $lösenord, $databas);

            if ($conn->connect_error) {
                die("Kunde inte ansluta till databasen: " . $conn->connect_error);
            } else {
                // echo "<p>Yipee! Gick bra att ansluta.</p>";
            }

            /* 2. */
            $sql = "SELECT * FROM blogg WHERE rubrik LIKE '%$soktext%' OR inlagg LIKE '%$soktext%'";
            $result = $conn->query($sql);

            if (!$result) {
                die("Något blev fel med SQL-statsen.");
            }

            /* Hur många träffar blev det? */
            echo "<h5>Hittade $result->num_rows inlägg som matchar söktexten.</h5>"; 

            /* 3. */
            $rad = $result->fetch_assoc();
            echo "<div class=\"inlagg\">";
            echo "<h5>{$rad['datum']}</h5>
            <h6>{$rad['rubrik']}</h6>
            <p>{$rad['inlagg']}</p>"; 
            echo "</div>"; 
            
            }
            /* 4. */
            $conn->close();
            ?>
        
    </div>
</body>
</html>