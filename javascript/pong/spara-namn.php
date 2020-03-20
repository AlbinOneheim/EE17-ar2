<?php
include_once "./konfig-db.php";
/* Ta enit POST-data */
$namn = filter_input(INPUT_POST, "namn", FILTER_SANITIZE_STRING);

$conn = new mysqli($host, $användare, $lösenord, $databas);

/* Kontrollera att data finns */
if ($namn) {
    echo "Mottaget: $namn";

    /* Spara namnet i tabellen op databasen */
    $sql = "INSERT INTO pong SET namn = '$namn'";
    $result = $conn->query($sql);

    if (!$result) {
        die("Något blev fel med SQL-sattsen: $conn->error");
    } else {
        echo "Namnet har sparats!";
    }
    
}else {
    echo "Något blev fel";
}
?>