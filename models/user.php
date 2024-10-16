<?php

require_once 'config/query.php';

class User {
    private $query;

    public function __construct() {
        $this->query = new Query();
    }

    public function crearUsuario($nombre, $email, $password) {
        $data = [
            'name' => $nombre,
            'email' => $email,
            'password' => $password
        ];
        return $this->query->insert('user', $data);
    }

    public function obtenerUsuario($id) {
        $result = $this->query->select('user', '*', "id = $id");
        return mysqli_fetch_assoc($result);
    }

    public function obtenerTodosUsuarios() {
        $result = $this->query->select('user');
        $usuarios = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $usuarios[] = $row;
        }
        return $usuarios;
    }

    public function actualizarUsuario($id, $nombre, $email) {
        $data = [
            'name' => $nombre,
            'email' => $email
        ];
        return $this->query->update('user', $data, "id = $id");
    }

    public function eliminarUsuario($id) {
        return $this->query->delete('user', "id = $id");
    }

    public function autenticarUsuario($email, $password) {
        $result = $this->query->select('user', '*', "email = '$email' AND password = '$password'");
        $usuario = mysqli_fetch_assoc($result);
        
        if ($usuario) {
            return $usuario;
        }
        
        return false;
    }

    public function obtenerUsuarioPorEmail($email) {
        $result = $this->query->select('user', '*', "email = '$email'");
        return mysqli_fetch_assoc($result);
    }
}
