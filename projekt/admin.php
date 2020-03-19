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
        <h1>Recensioner</h1>
        <nav>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="recensioner.php">Recensioner</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="spara.php">Spara</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="admin.php">Admin</a>
                </li>
               <!--  <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li> -->
            </ul>
        </nav>
            <?php
            $conn = new mysqli($host, $användare, $lösenord, $databas);

            $query = "SELECT * FROM resturanger";
            $result = $conn->query($query);
            ?>
        </div>
    </div>
</body>
</html>