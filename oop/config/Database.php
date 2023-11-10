<?php
class Database
{
    private $host = "localhost";
    private $database_name = "cv";
    private $username = "root";
    private $password = "root";
    public $conn;
    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" .
                $this->database_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
            // echo 'Yeah Berhasil berikut datanya';
        } catch (PDOException $exception) {
            echo "Database could not be connected: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
