<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>if satser</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $lösenord = "123";

        if ($lösenord != "123") {
            echo "<p>Du är utloggad</p>";
        }else {
            echo "<p>Du är inloggad</p>";
        }

        /*  Laugh on Monday, laugh for danger.
            Laugh on Tuesday, kiss a stranger.
            Laugh on Wednesday, laugh for a letter.
            Laugh on Thursday, something better.
            Laugh on Friday, laugh for sorrow.
            Laugh on Saturday, joy tomorrow. 
        */
        $idag = date("l");

        if ($idag =="Monday") {
            echo "<p>Laugh on Monday, laugh for danger.</p>";
        }elseif ($idag == "Tuesday") {
            echo "<p>Laugh on Tuesday, kiss a stranger.</p>";
        }elseif ($idag == "Wednesday") {
            echo "<p>Laugh on Wednesday, laugh for a letter.</p>";
        }elseif ($idag == "Thursday") {
            echo "<p>Laugh on Thursday, something better.</p>";
        }elseif ($idag == "Friday") {
            echo "<p>Laugh on Friday, laugh for sorrow.</p>";
        }elseif ($idag == "Saturday") {
            echo "<p>Laugh on Saturday, joy tomorrow.</p>";
        }


        $månad = date("F");
        $dagensDatum = date("d");

        if ($idag == "Friday" && $dagensDatum == "13") {
            echo "<p>Bäst att hålla sig hemma!</p>";
        }else {
            echo "<p>Kusten är klar</p>";
        }

        if ($dagensDatum == "30" && $månad == "October") {
            echo "<p>Idag är det dagen före halloween</p>";
        } else {
            echo "<p>Du får vänta lite till</p>";
        }


        if ($idag == "Saturday" and  $idag == "Sunday") {
            echo "<p>Skönt! Idag är det helg</p>";
        } else {
            $antalDagarTillHelg = 5 - date("N");
            echo "<p>Du får vänta till $antalDagarTillHelg dagar, till nästa helg</p>";
        }
    ?>
</body>
</html>