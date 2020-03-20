<?php
include_once "./konfig-db.php";
/* Ta enit POST-data */
$poäng = filter_input(INPUT_POST, "poäng", FILTER_SANITIZE_STRING);
$namn = filter_input(INPUT_POST, "namn", FILTER_SANITIZE_STRING);

$conn = new mysqli($host, $användare, $lösenord, $databas);

/* Kontrollera att data finns */
if ($poäng && $namn) {
    echo "Mottaget: $poäng";

   /* Uppdatera tabellen med poäng */
   $sql = "UPDATE pong SET poäng='$poäng' WHERE namn='$namn'";
    
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