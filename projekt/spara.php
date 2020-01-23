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
    <div class="kontainer">
        <h1>Spara recension</h1>
        <nav>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="recensioner.php">Recensioner</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="spara.php">Spara</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Admin</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li> -->
            </ul>
        </nav>
        <form action="#" method="POST">
            <label>Resturnag</label>
            <input type="text" name="resturang" required>
            <label>Adress</label>
            <input type="text" name="adress" required>
            <label>Skala 1-10</label>
            <input type="number" name="omdome" required>
            <label>Recension</label>
            <textarea name="recension" cols="30" rows="10" required></textarea><br>
            <button class="btn btn-primary">Spara</button>
        </form>
        <?php
        $resturang = filter_input(INPUT_POST, "resturang", FILTER_SANITIZE_STRING);
        $adress = filter_input(INPUT_POST, "adress", FILTER_SANITIZE_STRING);
        $omdome = filter_input(INPUT_POST, "omdome", FILTER_SANITIZE_STRING);
        $recension = filter_input(INPUT_POST, "recension", FILTER_SANITIZE_STRING);

        if ($resturang && $adress && $omdome && $recension) {
            $conn = new mysqli($host, $användare, $lösenord, $databas);

            if ($conn->connect_error) {
                die("Kunde inte ansluta till databasen: " .  $conn->connect_error);
            }

            $sql = "INSERT INTO resturanger (resturanger, adress, omdome, recension) VALUES ('$resturang', '$adress', '$omdome', '$recension')";
            $result = $conn->query($sql);

            if (!$result) {
                die("Något blev fel med SQL-satsen.");
            }else {
                echo "<p class=\"alert alert-success\">Recensionen har sparats.</p>";
            }
        }
        $conn->close();
        ?>
    </div>
</body>
</html>