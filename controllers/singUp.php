<?php

require_once 'models/user.php';

function registrarUsuario($datos)
{
    
    // Validar los datos de entrada
    if (!isset($datos['nombre'])) {
        return ['error' => 'Debe de haber un nombre'];
    }
    if (!isset($datos['email'])) {
        return ['error' => 'Debe de haber un email'];
    }
    if (!isset($datos['password'])) {
        return ['error' => 'Debe de haber una contraseña'];
    }
    if (!isset($datos['confirm_password'])) {
        return ['error' => 'Debes de confirmar tu contraseña'];
    }

    $errores = [];
    
    // Extraer y limpiar los datos del formulario
    $nombre = $datos['nombre'];
    $email = $datos['email'];
    $password = filter_input(INPUT_POST, $datos['password'], FILTER_UNSAFE_RAW);
    $confirmarPassword = filter_input(INPUT_POST, $datos['confirm_password'], FILTER_UNSAFE_RAW);
    
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'El correo electrónico no es válido';
    }
    
    if ($password !== $confirmarPassword) {
        $errores[] = 'Las contraseñas no coinciden';
    }
    
    if (!empty($errores)) {
        return ['error' => implode(', ', $errores)];
    }

    $user = new User();

    // Verificar si el correo ya está registrado
    $usuarioExistente = $user->obtenerUsuarioPorEmail($email);
    if ($usuarioExistente) {
        return ['error' => 'El correo electrónico ya está registrado'];
    }

    // Crear el nuevo usuario
    $resultado = $user->crearUsuario($nombre, $email, $password);

    return $resultado
        ? ['success' => 'Usuario registrado con éxito']
        : ['error' => 'Error al registrar el usuario'];
}

// Uso de la función
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = registrarUsuario($_POST);
    if (isset($resultado['success'])) {
        session_start();

        $_SESSION['usuario'] = [$_POST["nombre"], $_POST["email"]];

        header('Location: home.php');
        exit;
    }
}
