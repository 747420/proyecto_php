<!DOCTYPE html>
<html lang="es" data-theme="luxury">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Proyecto</title>
    <link href="./assets/daisyUI.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="flex flex-col min-h-screen">
    <!-- Navbar -->
    <?php include 'components/navbar.php'; ?>

    <!-- Main -->
    <main class="flex-grow container mx-auto px-4 py-8">
        <section class="mockup-code">
            <pre data-prefix=">" class="text-success"><code>Bienvenido a tu página de inicio</code></pre>
            <pre data-prefix="1."><code>Organiza tus proyectos</code></pre>
            <pre data-prefix="2."><code>Gestiona tus tareas</code></pre>
            <pre data-prefix="3."><code>Comunica con tus colaboradores</code></pre>
        </section>

        <section class="overflow-x-auto mt-8">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo electrónico</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <?php
                    require_once 'models/user.php';

                    $user = new User();

                    $usuarios = $user->obtenerTodosUsuarios();
                    foreach ($usuarios as $usuario) {
                    ?>
                        <tr>
                            <th><?= $usuario['id'] ?></th>
                            <td><?= $usuario['name'] ?></td>
                            <td><?= $usuario['email'] ?></td>
                            <td><a class="link link-info" href="editar.php?id=<?= $usuario['id'] ?>">Modificar</a></td>
                            <td><a class="link link-error" href="eliminar.php?id=<?= $usuario['id'] ?>">Eliminar</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <!-- Footer -->
    <?php include 'components/footer.php'; ?>

    <script src="./assets/tailwind.min.js"></script>
</body>

</html>