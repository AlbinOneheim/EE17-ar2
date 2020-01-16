<?php
include_once "./konfig-db.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista alla bilar i tabellen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Alla bilar</h1>
        <?php
        /* 1. Logga in på mysql-servern och välj databas */
        $conn = new mysqli($host, $användare, $lösenord, $databas);

        /* Gick det att ansluta? */
        if ($conn->connect_error) {
            die("Kunde inte ansluta till databasen: " . $conn->connect_error);
        } else {
            echo "<p>Yipee! Gick bra att ansluta.</p>";
        }
        
        /* 2. Ställ en SQL-fråga */
        $sql = "SELECT * FROM bilar";
        $result = $conn->query($sql);

        /* Gick det bra? */
        if (!$result) {
            die("Något blev fel med SQL-statsen.");
        } else {
            echo "<p>Lista på bilar kunde hämtas</p>";
        }
        echo "<table>";
        echo "<tr>
        <th>Marke</th>
        <th>Marke</th>
        <th>Marke</th>
    </tr>"; 
        /* 3. Ta emot svaret och bearbeta det */
        while ($rad = $result->fetch_assoc()) {
            
            echo "<tr>
                    <td>{$rad['marke']}</td>
                    <td>{$rad['modell']}</td>
                    <td>{$rad['arsmodell']}</td>
                </tr>";  
        }        
        
        echo "</table>";
        /* 4. Stäng ner anslutningen */
        $conn->close();
        ?>
    </div>
</body>
</html>