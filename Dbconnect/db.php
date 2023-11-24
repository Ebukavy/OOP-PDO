<?php
class Database {
    private $host = "localhost:3307"; 
    private $gebruikersnaam = "root";
    private $wachtwoord = "";
    private $database = "dbcon";
    public $verbinding;

    
    public function __construct(){
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->database}";
            $opties = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $this->verbinding = new PDO($dsn, $this->gebruikersnaam, $this->wachtwoord, $opties);

        } catch (PDOException $e) {
            die("Databaseconnectie mislukt: " . $e->getMessage());
        }
    }

    
    public function toevoegenData($Naam, $Leeftijd, $Gender) {
        try {
            
            $sql = "INSERT INTO Namen (Naam, Leeftijd, Gender) VALUES (:Naam, :Leeftijd, :Gender)";

          
            $stmt = $this->verbinding->prepare($sql);

           
            $stmt->bindParam(':Naam', $Naam);
            $stmt->bindParam(':Leeftijd', $Leeftijd);
            $stmt->bindParam(':Gender', $Gender);

            
            $stmt->execute();

            echo "Data succesvol toegevoegd aan de tabel!";
        } catch (PDOException $e) {
            die("Toevoegen van data mislukt: " . $e->getMessage());
        }
    }
}
?>
