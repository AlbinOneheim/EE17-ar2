<?php
    $stad1 = "Stockholm";
    $stad2 = "Göteborg";
    $stad3 = "Filipstad";
    $stad4 = "Malmö";


    $städer = ["Stockholm", "Göteborg", "Malmö", "Filipstad"];
    $tomArray = [];
    $annanArray = array("Hej", "På", "Dig");

    print_r($städer);
    echo $städer[2] . "<br>"; // skriver ut Malmö

    $städer[] = "Helsingborg";
    echo $städer[4] . "<br>";

    foreach ($städer as $stad){
        echo "<p> Staden heter $stad.</p>";
    }

     $språk = [
         "SV" => "Sverige",
         "NO" => "Norge",
         "FN" => "Finland"
     ];

     foreach($språk as $key => $Land){
         echo "<p><br>$key är förkortningen för $Land</p>";
     }
?>