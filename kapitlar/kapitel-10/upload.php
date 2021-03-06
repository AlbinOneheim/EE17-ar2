<?php
/* Har man tryckt på knappen "submit" */
if (isset($_POST['submit'])) {
    /* Läs av filen */
    $file = $_FILES['file'];
    var_dump($file);
    /* Vad är filnamnet? */
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
            if ($fileSize < 500000) {
                /* Skapa ett nytt unikt filnamn så att vi inte ersätter filer */
                $fileNameNew = uniqid('', true) . ".$fileActualExt";
                $fileDestination = "uploads/$fileNameNew";
                /* Äntligen, nu flyttar vi filen in i rätt katalog */
                move_uploaded_file($fileTmpName, $fileDestination);
                
                /* Vi hoppar direkt tillbaka till formuläret och skickar med ett medelande om att vi lyckades ladda up bilden*/
                header('Location: index.php?uploadsuccess=1');
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
?>