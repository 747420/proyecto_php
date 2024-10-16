<?php
session_start();
require_once 'models/user.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: singIn.php');
    exit();
}

session_write_close();
$user = new User();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $usuario = $user->obtenerUsuario($id);
    if (!$usuario) {
        header('Location: home.php');
        exit();
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    $res = $user->actualizarUsuario($id, $nombre, $email);

    if ($res) {
        $resultado['success'] = 'Usuario actualizado correctamente.';
    } else {
        $resultado['error'] = 'Error al actualizar el usuario.';
    }

    $usuario = $user->obtenerUsuario($id);
} else {
    header('Location: home.php');
    exit();
}
