<!-- nummer som inte finns och finns -->
<?php
    $nummer = [
        "1" => "1",
        "2" => "2",
        "3" => "3",
    ];
    
    if (array_key_exists("1", $nummer)){
        echo "Nummer " . $nummer[1] . "<br>";
    }else {
        echo "Nummret finns inte";
    }
    if (array_key_exists("2", $nummer)){
        echo "Nummer " . $nummer[2] . "<br>";
    }else {
        echo "Nummret finns inte";
    }
    if (array_key_exists("3", $nummer)){
        echo "Nummer " . $nummer[3] . "<br>";
    }else {
        echo "Nummret finns inte";
    }
    if (array_key_exists("4", $nummer)){
        echo "Nummer" . $nummer[4] . "<br>";
    }else {
        echo "Nummret finns inte i listan <br>";
    }
?>
<!-- hur man kan skriva ut nummer -->
<?php
    $uddaNummer = [1,3,5,7,9];
    for ($i = 0; $i < count($uddaNummer); $i=$i+1){
        $uddaNummer1 = $uddaNummer[$i];
        echo $uddaNummer1 . "\n";
    }
?>
<!-- hur man skriver ut nummer på enklare sett -->
<?php
    echo "<br>";
    foreach ($uddaNummer as $uddaNummer1) {
        echo $uddaNummer1 . "\n";
    }
?>
<!-- skriva ut telefonnummer -->
<?php
    echo "<br>";
    $telefonNummer = [
        "Pontus" => "295 123 123 <br>",
        "Brutals" => "123 453 656",
    ];
    foreach($telefonNummer as $namn => $telefonNummer1){
        echo "$namn nummer är $telefonNummer1";
    }
?>
<?php
    echo "<br>";
    $frukter = [
        "Äpple" => "Grön <br>",
        "Mandarin" => "Orange",
    ];
    foreach ($frukter as $farger => $frukter1) {
        echo "$farger har färgen $frukter1";
    }
?>