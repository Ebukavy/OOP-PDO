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

    public function fetchData($id = null) {
        try {
            if ($id === null) {
                $sql = "SELECT * FROM Namen";
                $stmt = $this->verbinding->query($sql);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $sql = "SELECT * FROM Namen WHERE id = :id";
                $stmt = $this->verbinding->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
            }

            return $result;
        } catch (PDOException $e) {
            die("Fetching data failed: " . $e->getMessage());
        }
    }
    public function deleteData($id) {
        try {
            $sql = "DELETE FROM Namen WHERE id = :id";
            $stmt = $this->verbinding->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_STR); 
            $stmt->execute();
        } catch (PDOException $e) {
            die("Deleting data failed: " . $e->getMessage());
        }
    }
    
    public function updateData($id, $Naam, $Leeftijd, $Gender) {
        try {
            $sql = "UPDATE Namen SET Naam = :Naam, Leeftijd = :Leeftijd, Gender = :Gender WHERE id = :id";
            $stmt = $this->verbinding->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':Naam', $Naam);
            $stmt->bindParam(':Leeftijd', $Leeftijd);
            $stmt->bindParam(':Gender', $Gender);
            $stmt->execute();
            
            echo "Data for ID {$id} updated successfully!";
        } catch (PDOException $e) {
            die("Updating data failed: " . $e->getMessage());
        }
    }
    
}


?>
