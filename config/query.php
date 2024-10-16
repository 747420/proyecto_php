<?php

require_once 'connection.php';

class Query {
    private $db;

    public function __construct() {
        $this->db = new Connection();
    }

    public function select($table, $columns = '*', $where = null, $orderBy = null, $limit = null) {
        $query = "SELECT $columns FROM $table";
        
        if ($where !== null) {
            $query .= " WHERE $where";
        }
        
        if ($orderBy !== null) {
            $query .= " ORDER BY $orderBy";
        }
        
        if ($limit !== null) {
            $query .= " LIMIT $limit";
        }

        $result = mysqli_query($this->db->getConnection(), $query);
        
        if (!$result) {
            die("Error en la consulta: " . mysqli_error($this->db->getConnection()));
        }
        
        return $result;
    }

    public function insert($table, $data) {
        $columns = implode(', ', array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        
        $query = "INSERT INTO $table ($columns) VALUES ($values)";
        
        $result = mysqli_query($this->db->getConnection(), $query);
        
        if (!$result) {
            die("Error en la inserción: " . mysqli_error($this->db->getConnection()));
        }
        
        return mysqli_insert_id($this->db->getConnection());
    }

    public function update($table, $data, $where) {
        $set = [];
        foreach ($data as $column => $value) {
            $set[] = "$column = '$value'";
        }
        $set = implode(', ', $set);
        
        $query = "UPDATE $table SET $set WHERE $where";
        
        $result = mysqli_query($this->db->getConnection(), $query);
        
        if (!$result) {
            die("Error en la actualización: " . mysqli_error($this->db->getConnection()));
        }
        
        return mysqli_affected_rows($this->db->getConnection());
    }

    public function delete($table, $where) {
        $query = "DELETE FROM $table WHERE $where";
        
        $result = mysqli_query($this->db->getConnection(), $query);
        
        if (!$result) {
            die("Error en la eliminación: " . mysqli_error($this->db->getConnection()));
        }
        
        return mysqli_affected_rows($this->db->getConnection());
    }

    public function __destruct() {
        $this->db->closeConnection();
    }
}
