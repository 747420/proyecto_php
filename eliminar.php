<?php require_once 'controllers/eliminar.php'; ?>
<!DOCTYPE html>
<html lang="es" data-theme="luxury">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario - Proyecto</title>
    <link href="./assets/daisyUI.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="flex flex-col min-h-screen">
    <!-- Navbar -->
    <?php include 'components/navbar.php'; ?>

    <!-- Main -->
    <main class="flex-grow flex items-center justify-center">
        <section class="max-w-md w-auto md:w-full sm:px-20 md:px-0">
            <h2 class="text-4xl font-bold text-center mb-8 text-primary">Eliminar Usuario</h2>
            <?php
            if (isset($error)) {
                echo '<p class="alert alert-error mb-4">' . $error . '</p>';
            }
            ?>
            <form action="" method="POST" class="space-y-6">
                <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                <p class="text-center">¿Estás seguro de que deseas eliminar al usuario <?php echo $usuario['name']; ?>?</p>
                <div class="flex justify-center space-x-4">
                    <button type="submit" class="btn btn-error">Sí, eliminar</button>
                    <a href="home.php" class="btn btn-ghost">Cancelar</a>
                </div>
            </form>
        </section>
    </main>

    <!-- Footer -->
    <?php include 'components/footer.php'; ?>

    <script src="./assets/tailwind.min.js"></script>
</body>

</html>
