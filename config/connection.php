<?php

class Connection {
    private $host = 'localhost';
    private $db_name = 'crud_php_clase_2';
    private $username = 'root';
    private $password = '';
    private $port = 3306;
    private $conn;

    public function connect() {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db_name, $this->port);

        if (!$this->conn) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        mysqli_set_charset($this->conn, "utf8");
        return $this->conn;
    }

    public function getConnection() {
        if ($this->conn === null) {
            $this->connect();
        }
        return $this->conn;
    }

    public function closeConnection() {
        if ($this->conn !== null) {
            mysqli_close($this->conn);
            $this->conn = null;
        }
    }
}

