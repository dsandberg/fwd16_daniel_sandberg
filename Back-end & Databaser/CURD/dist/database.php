<?php

class TodoDatabase {
    
    private $servername = "83.168.227.23";
    private $username = "u1164707_DanielS";
    private $password = "kv6u>aB3JV";
    private $dbname = "db1164707_DanielS";

    // Function to connect to database
    public function connect($sql_g) {
        try {
            // connection
            // $conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);

            // Set attribute for error mode
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            // statment
            $stmt = $conn->prepare($sql_g);

            // Execute statment
            $stmt->execute();

            // get result
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // return json data
            return $result;
        }

        // error catch
        catch(PDOException $error) {
            echo "Error: " . $error->getMessage();
        }
    }
}

// $test = new TodoDatabase();

// echo $test->connect("SELECT * from todo");



?>