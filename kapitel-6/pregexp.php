<?php
/* Regexp  regular expression = regulära uttryck */

/* På samma sett som strstr */
/* Leta efter ordet väg */
echo "<h1>Craafords väg 23</h1>";
$adress = "Craafords väg 23";
if (preg_match("/väg/", $adress)) {
    echo "<p>Texten innehåller ordet 'väg'</p>";
} else {
    echo "<p>Texten innehåller INTE ordet väg</p>";
}

/* Leta efter siffror */
if (preg_match("/[0-9]/", $adress)) {
    echo "<p>Texten innehåller siffror</p>";
} else {
    echo "<p>Texten innehåller INTE siffror</p>";
}

/* Leta efter gemener */
if (preg_match("/[a-zåäö]/", $adress)) {
    echo "<p>Texten innehåller gemener</p>";
} else {
    echo "<p>Texten innehåller INTE gemener</p>";
}

/* Leta efter tecken som inte finns */
if (preg_match("/[^_]/", $adress)) {
    echo "<p>Texten innehåller INTE _</p>";
} else {
    echo "<p>Texten innehåller _</p>";
}

/* Leta efter en eller flera "a" */
if (preg_match("/a+/", $adress)) {
    echo "<p>Texten innehåller en eller flera a</p>";
} else {
    echo "<p>Texten innehåller INTE en eller flera a</p>";
}

/* Leta efter en eller två a */
if (preg_match("/a{1,2}/", $adress)) {
    echo "<p>Texten innehåller en eller två</p>";
} else {
    echo "<p>Texten innehåller INTE en eller två a</p>";
}

/* Leta efter alternativa ord */
if (preg_match("/väg|gata/", $adress)) {
    echo "<p>Texten innehåller ordet väg eller gata</p>";
} else {
    echo "<p>Texten innehåller INTE ordet väg eller gata</p>";
}

?>