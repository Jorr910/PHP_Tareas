<?php

class DataBase {

    private $host = "localhost";
    private $dbname = "user_management"; 
    private $username = "root";
    private $password = "";
    public $connection;

    public function getConnection() {
        $this->connection = null;

        try {
        
            $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
            $this->connection = new PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }

        return $this->connection;
    }
}

?>
