<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "restaurant";
    private $port = 3307; 
    private $conn;

    public function __construct($port = 3307) {
        $this->port = $port;
    }

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->database,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>
