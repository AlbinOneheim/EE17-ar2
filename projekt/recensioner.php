<?php
include_once "konfig-db.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spara resturanger</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Recensioner</h1>
        <nav>
            <ul>
                <li>
                    <a href="recensioner.php">Recensioner</a>
                </li>
                <li>
                    <a href="spara.php">Spara</a>
                </li>
                <li>
                    <a href="admin.php">Admin</a>
                </li>
                <!--  <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1  aria-disabled="true">Disabled</a>
                </li> -->
            </ul>
        </nav>
    </header>
    <main>
        <div class="kontainer">
            <div class="jumbotron">
                <?php
                $conn = new mysqli($host, $användare, $lösenord, $databas);
        
                if ($conn->connect_error) {
                    die("Kunde inte ansluta till databasen: " . $conn->connect_error);
                }
        
                $query = "SELECT * FROM resturanger ORDER BY id DESC";
                $result = $conn->query($query);
        
                if (!$result) {
                    die("Något blev fel med SQL-statsen.");
                }
        
                while ($rad = $result->fetch_assoc()) {
                    echo "<div class=\"inlagg\">";
                    echo "<h5>$rad[resturanger]</h5>";
                    echo "<h6>$rad[adress]</h6>";
                    echo "<h6>Omdöme: $rad[omdome]</h6>";
                    echo "<p>$rad[recension]</p>";
                    echo "</div>";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </main>
</body>
</html>