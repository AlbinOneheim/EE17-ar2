<?php
/**
 * Enkel blogg modul
* PHP version 7
* @category   OOP klass
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/

class Blog
{   
    private $conn;

    public function __construct($connDb)
    {
        $this->conn = $connDb;
    }

    /* Hämta alla inlägg */
    public function läsa()
    {
        $sql = "SELECT * FROM blog ORDER BY id DESC";
        $resultat = $this->conn->query($sql);

        if ($resultat) {
            return $resultat;
        }


        $this->conn->close();
    }

    /* Spara ett iknlägg i tabellen
    @param $rubriken
    @param $inläggetz
    */
    public function skriva($rubriken, $inlägget)
    {
        $sql = "INSERT INTO blog SET rubrik='$rubriken', inlagg='$inlägget'";

        $resultat = $this->conn->query($sql);

        if ($resultat) {
            return $this->conn->insert_id;
        }

        $this->conn->close();
    }

    /* Radera ett inlägg i tabellen
    @param
    */
    public function radera()
    {
        
    }

    /* Ändra ett inlägg i tabellen
    @param 
    @param 
    @paramS 
    */
    public function ändra()
    {
        
    }
}