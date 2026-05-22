<?php

class Database {
    private $host = "localhost";
    private $db_name = "peesync"; 
    private $username = "root";
    private $password = "";
    public $pdo = null; 

    public function __construct() {
        try {
            $this->pdo = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4", 
                $this->username, 
                $this->password
            );

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    
    public function getConnection(): PDO {
        return $this->pdo;
    }
}