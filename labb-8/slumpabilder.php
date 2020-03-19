<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Slumpa bilder</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Några slumpade bilder</h1>

        <?php
        /* Läs in alla bilder, scandir() */
        $filer = scandir("./bilder");

        /* Slumpa fram två tal, rand() */
        $slumptal1 = rand(2, 11);        
        $slumptal2 = rand(2, 11);        
        
        /* Visa bilderna */
        echo "<div id=\"carouselExampleControls\" class=\"carousel slide\" data-ride=\"carousel\">
                <div class=\"carousel-inner\">
                    <div class=\"carousel-item active\">";
                        echo "<img src=\"./bilder/$filer[$slumptal1]\">
                    </div>
                    <div class=\"carousel-item\">";
                        echo "<img src=\"./bilder/$filer[$slumptal2]\">
                    </div>
                </div>
                <a class=\"carousel-control-prev\" href=\"#carouselExampleControls\" role=\"button\" data-slide=\"prev\">
                    <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
                        <span class=\"sr-only\">Previous</span>
                </a>
                <a class=\"carousel-control-next\" href=\"#carouselExampleControls\" role=\"button\" data-slide=\"next\">
                    <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
                    <span class=\"sr-only\">Next</span>
                </a>
            </div>";
        ?>
        
      
     
    </div>
</body>
</html>