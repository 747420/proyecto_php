<?php

require_once 'models/user.php';

function iniciarSesion($datos) {
    $user = new User();

    $errores = [];
    // Validar los datos de entrada
    if (empty($datos['email'])) {
        $errores[] = 'Debe de haber un correo electronico';
    }

    if (empty($datos['password'])) {
        $errores[] = 'Debe de haber una contraseña';
    }

    
    if (!empty($errores)) {
        return ['error' => implode(', ', $errores)];
    }

    // Extraer y limpiar los datos del formulario
    $email = filter_var($datos['email'], FILTER_SANITIZE_EMAIL);
    $password = $datos['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['error' => 'El correo electrónico no es válido'];
    }

    // Verificar si el usuario existe y la contraseña es correcta
    $usuario = $user->obtenerUsuarioPorEmail($email);
    if ($usuario && $password == $usuario['password']) {
        session_start();
        $_SESSION['usuario'] = [
            'name' => $usuario['name'],
            'email' => $usuario['email']
        ];

        header('Location: home.php');
        exit;
    } else {
        return ['error' => 'El correo electrónico o la contraseña son incorrectos'];
    }
}

// Uso de la función
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = iniciarSesion($_POST);
    if (isset($resultado['error'])) {
        // Manejar el error, por ejemplo, mostrarlo en la vista
    }
}
