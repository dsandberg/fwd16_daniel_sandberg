<?php

// SQL connection class
class SQL {
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbname = "bank";

    public function searchDB($search_value) {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("CALL search('" . $search_value. "')"); 
            $stmt->execute();

            // Return the result
            return $stmt;
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

// Bank class
class Bank {
    private $fName, $lName, $aName, $balance;
    
    // constructur
    public function __construct($fName, $lName, $aName, $balance) {
        $this->fName = $fName;
        $this->lName = $lName;
        $this->aName = $aName;
        $this->balance = $balance;
    }
    // Print the properties
    public function printBank() {
        echo $this->fName . ". " . $this->lName . " has: " . $this->aName . " account with " . $this->balance . " balance";
    }
}
