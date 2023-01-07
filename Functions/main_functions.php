<?php
require '../Connection/conn.php';

class User {
    private $mysqli;
    public $query;
    
    // Constructor
    public function __construct($mysqli) {
    $this->mysqli = $mysqli;
    }

    public function create($Voornaam, $Achternaam, $Groep, $Wachtwoord, $Rechten) {
        // Insert the new item into the database
        $stmt = $this->mysqli->prepare("INSERT INTO gebruikers (Voornaam, Achternaam, Groep, Wachtwoord, Rechten) VALUES (?, ?, ?, ?, ?)");
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

    public function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}
?>