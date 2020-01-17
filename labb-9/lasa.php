<?php
/*
* PHP version 7
* @category   Blogg med fillagring
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
    <title>Bloggen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1 class="display-4">Bloggen</h1>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" href="./lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="./sok.php">Sök</a></li>
                <li class="nav-item"><a class="nav-link" href="./admin/admin.php">Admin</a></li>
            </ul>
        </nav>
        <div class="jumbotron">
        <?php
        /* 1. Logga in på mysql-servern och välj databas */
        $conn = new mysqli($host, $användare, $lösenord, $databas);

        /* Gick det att ansluta? */
        if ($conn->connect_error) {
            die("Kunde inte ansluta till databasen: " . $conn->connect_error);
        }
        /* 2. SQL? */
        $query = "SELECT * FROM blogg ORDER BY id DESC";
        $result = $conn->query($query);

        /* Gick det bra? */
        if (!$result) {
            die("Något blev fel med SQL-statsen.");
        }
        
        /* 3. Bearbeta svaret från databasen */
        while ($rad = $result->fetch_assoc()) {
            echo "<div class=\"inlagg\">";
            echo "<h5>{$rad['datum']}</h5>
            <h6>{$rad['rubrik']}</h6>
            <p>{$rad['inlagg']}</p>"; 
            echo "</div>";                
        }

        /* 4. stäng anslutningen */
        $conn->close();
        ?>
        </div>
    </div>
</body>
</html>