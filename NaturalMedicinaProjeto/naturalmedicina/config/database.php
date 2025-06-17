<?php
class Database {
    private $host = "localhost";
    private $db_name = "plantas";
    private $username = "root";
    private $password = "";
    private $conn = null;

    public function getConnection() {
        if ($this->conn === null) {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->conn;
    }
}