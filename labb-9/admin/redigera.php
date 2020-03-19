<?php
/*
 * PHP version 7
 * @category   Skriv en text som sparas i textfil
 * @author     Karim Ryde <karye.webb@gmail.com>
 * @license    PHP CC
 */
session_start();
include_once "konfig-db.php";

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
                <li class="nav-item"><a class="nav-link active">Redigera</a></li>
                
            </ul>
        </nav>
        <main>
            <?php
/* Läs in id och hämta inläggets rubrik och text */
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
$rubrik = filter_input(INPUT_POST, "rubrik", FILTER_SANITIZE_STRING);
$inlagg = filter_input(INPUT_POST, "inlagg", FILTER_SANITIZE_STRING);

/* 1. Logga in på mysql-servern och välj databas */
$conn = new mysqli($host, $användare, $lösenord, $databas);

/* Gick det att ansluta? */
if ($conn->connect_error) {
    die("Kunde inte ansluta till databasen: " . $conn->connect_error);
} else {
    // echo "<p>Yipee! Gick bra att ansluta.</p>";
}

if ($id && !$rubrik) {
    $conn = new mysqli($host, $användare, $lösenord, $databas);

    $query = "SELECT * FROM blogg WHERE id = '$id'";
    $result = $conn->query($query);

    if (!$result) {
        die("Något blev fel med SQL-statsen.");
    } else {
        $rad = $result->fetch_assoc();
        echo "<form action=\"#\" method=\"POST\">";
        echo "<label>Rubrik</label><br>";
        echo "<input type=\"text\" name=\"rubrik\" value=\"$rad[rubrik]\" required><br>";
        echo "<input type=\"hidden\" name\"id\" value\"$id\" required>";
        echo "<label>Inlägg</label><br>";
        echo "<textarea id=\"inlagg\" name=\"inlagg\" cols=\"30\" rows=\"10\">$rad[inlagg]</textarea><br>";
        echo "<button class=\"btn btn-warning\">Uppdatera inlägget</button>";
        echo "</form>";
    }
}

if ($rubrik && $inlagg) {

    /* 2. Registrera inlägget i tabellen */
    $sql = "UPDATE blogg SET rubrik = '$rubrik', inlagg = '$inlagg' WHERE id = '$id'";
    $result = $conn->query($sql);

    /* Gick det bra? */
    if (!$result) {
        die("Något blev fel med SQL-statsen.");
    } else {
        echo "<p class=\"alert alert-success\">Inägget har sparats.</p>";
    }
}
$conn->close();
?>
        </main>
    </div>
</body>
</html>