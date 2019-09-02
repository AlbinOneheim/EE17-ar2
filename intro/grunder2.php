<?php
    echo "<h1>Vad är datatyper</h1>";
?>
<p>Vilka datatyper finns det i PHP?</p>
<?php
    $förnamn = "Albin";
    $ålder = 18;
    $telefon = "+46702218032";
    $pi = 3.14;
    $harKörkort = false; // true eller false
    $harHus = false;    // true eller false
    $ee17 = ["Erik", "Marcus", "Gene", "Emil", "Albin", "Carl-Axel", "Pontus"];

    echo "<p>$förnamn telefon är $telefon <br>";
    echo "<p>Jag kan pi = $pi</p>";
    echo "<p>harKörkort = $harKörkort</p>";
    echo "<p>harHus = $harHus</p>";

    foreach ($ee17 as $ee171){
        echo $ee171 . "\n";
    }
    echo "<br>";
    echo $ee17[5];
?>