<?php
/*
* PHP version 7
* @category   
* @author     Carl-Axel Jirner <carl-axel.jirner@gmail.com>
* @license    PHP CC
*/

include_once "./funktioner.inc.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ladda upp bilder</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Bygg din PC</h1>
        <h2>Ladda upp en vara</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <label>Kategori</label>
            <select name="kategori">
                <option value="chassi">Chassi</option>
                <option value="cpu">CPU</option>
                <option value="disk">Disk</option>
                <option value="grafikkort">Grafikkort</option>
                <option value="kylare">Kylare</option>
                <option value="moderkort">Moderkort</option>
                <option value="psu">PSU</option>
                <option value="ram">Ram</option>
            </select><br>

            <label>Namn</label>
            <input type="text" name="namn" required>

            <label>Pris</label>
            <input type="text" name="pris" required><br>
            <input type="file" name="file" required>

            <button class="tertiary">Ladda upp</button>
        </form>
        <?php
        /* Ta emot data */
        $kategori = filter_input(INPUT_POST, 'kategori', FILTER_SANITIZE_STRING);
        $namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);
        $pris = filter_input(INPUT_POST, 'pris', FILTER_SANITIZE_STRING);
        

        if ($kategori && $namn && $pris) {
            /* Läs in filen */
            $file = $_FILES['file'];
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileError = $file['error'];
            $fileType = $file['type'];

            /* Plocka ut fileändelsen */
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            /* Vilka bildtyper tillåter vi */
            $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

            /* Testa att filtypen är tillåten */
            if (in_array($fileActualExt, $allowed)) {
                /* Testar om det blev något fel */
                if ($fileError === 0) {
                    /* Testa filstorleken */
                    if ($fileSize < 1000000000) {
                        /* Skapa ett nytt unikt filnamn så att vi inte ersätter filer */
                        $fileNameNew = $namn . "-" . $pris . "." . $fileActualExt;
                        $fileDestination = "$kategori/$fileNameNew";
                        var_dump($fileDestination);
                        /* Äntligen, nu flyttar vi filen in i rätt katalog */
                        //move_uploaded_file($fileTmpName, $fileDestination);
                
                        /* Vi hoppar direkt tillbaka till formuläret och skickar med ett medelande om att vi lyckades ladda up bilden*/
                        //header('Location: admin.php?uploadsuccess=1');
                    }else {
                        echo "<p>Bilden måste vara mindre än 500kb!</p>";
                    }
                }else{
                    echo "<p>Något är fel. Filen kunde inte laddas upp!</p>";
                }
            }else{
                echo "<p>Filtypen är ej tillåten!</p>";
            }
        }    
            /* spara ner filen */
        
        ?>
    </div>
</body>
</html>