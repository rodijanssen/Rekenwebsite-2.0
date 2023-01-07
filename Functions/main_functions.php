<?php
require '../Connection/conn.php';

class User {
    private $mysqli;
    
    // Constructor
    public function __construct($mysqli) {
    $this->mysqli = $mysqli;
    }

    public function create($Voornaam, $Achternaam, $Groep, $Wachtwoord, $Rechten) {
        // Insert the new item into the database
        $stmt = $this->mysqli->prepare("INSERT INTO gebruikers (Prijs, Categorie) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $Voornaam, $Achternaam, $Groep, $Wachtwoord, $Rechten);
        $stmt->execute();
        $stmt->close();
    }

    public function read() {
        // Select all data from the users table
        $stmt = $this->mysqli->prepare("SELECT * FROM groepen");
        $stmt->execute();       
        $result = $stmt->get_result(); // Bind the result to a new variable
        $data = $result->fetch_all(MYSQLI_ASSOC); // Fetch all rows as an associative array
        $stmt->close(); // Close the statement
        return $data; // Return the data
        }
}
?>