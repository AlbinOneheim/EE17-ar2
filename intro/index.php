<?php
/*
* PHP version 7
* @category   Lånekalkylator
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<?php 
    $namn = "Carl";
    $mittEfternamn = "Brutal";
    $ålder = 18;
    $gatuAdress = "Lindaus Väg 20";

    /* testar <h1> */
    echo "<h1>";
        echo "Hellu Wurld";
    echo "</h1>";

    echo $namn . " " . $mittEfternamn;
    echo "<br>";
    /* testar enkel fnutt */
    echo "<h3>";
        echo 'hello it\'s nice to see you!';
    echo "</h3>"; 

    /* hur man sätter ihop text */
    echo "Hej! mitt namn är " . $namn . " " . $mittEfternamn . "." . "<br>" . "Och min åler är " . $ålder . "<br>";

    /* hur man sätter ihop text smartast */
    echo "Mitt namn är $namn, jag bor på $gatuAdress<br>"; 
    /* med enkel fnutt */
    echo 'Mitt namn är $namn, jag bor på $gatuAdress<br>'; 

?>