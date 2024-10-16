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
    $res = $user->eliminarUsuario($id);

    if ($res) {
        header('Location: home.php?mensaje=Usuario eliminado correctamente');
        exit();
    } else {
        $error = 'Error al eliminar el usuario.';
    }
} else {
    header('Location: home.php');
    exit();
}
?>