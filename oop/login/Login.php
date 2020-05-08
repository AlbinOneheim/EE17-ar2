<?php
/**
 * En login klass
* PHP version 7
* @category   OOP klass
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/

class Login 
{
    private $conn;

    /* Konstruktorn
    @PARAM $connDb
    */
    public function __construct($connDb)
    {
        $this->conn = $connDb;
    }

    /* Registrera en användare med anamn, lösenord
    @param $user
    @param $pass 
    */
    public function registrera($user, $pass)
    {
        /* Skapa en hash på lösenordet */
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        /* SQL för att spara tabellen */
        $sql = "INSERT INTO admin SET anamn='$user', hash='$hash'";

        /* Kör SQL-frågan */
        $resultat = $this->conn->query($sql);

        /* Gick det bra */
        if (!$resultat) {
            trigger_error("Kunde inte köra sql-frågan: " . $this->conn->error);
        } else {
            return 1;
        }
        
        /* Stäng av anslutningen */
        $this->conn->close();
    }

    /* Kontrollerar om användaren finns i tabellen */
    public function kontroll($user, $pass)
    {
        /* SQL för att spara tabellen */
        $sql = "SELECT * FROM admin WHERE anamn='$user'";

        /* Kör SQL-frågan */
        $resultat = $this->conn->query($sql);

        /* Gick det bra */
        if (!$resultat) {
            trigger_error("Kunde inte köra sql-frågan: " . $this->conn->error);
        } else {
            /* Hittar vi användaren? */
            if ($resultat->num_rows == 0) {
                return 0;
              
            } else {
                /* Hittat använderen och plocka raden med data */
                $rad = $resultat->fetch_assoc();
                /* Stämmer lösenordet */
                if (password_verify($pass, $rad['hash'])) {
                    return 1;
                } else {
                    return 2;
                }   
            }
        }
        
        /* Stäng av anslutningen */
        $this->conn->close();
    }
}