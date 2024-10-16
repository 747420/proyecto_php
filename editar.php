<?php
require_once 'controllers/editar.php';
?>
<!DOCTYPE html>
<html lang="es" data-theme="luxury">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario - Proyecto</title>
    <link href="./assets/daisyUI.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="flex flex-col min-h-screen">
    <!-- Navbar -->
    <?php include 'components/navbar.php'; ?>

    <!-- Main -->
    <main class="flex-grow flex items-center justify-center">
        <section class="max-w-md w-auto md:w-full sm:px-20 md:px-0">
            <h2 class="text-4xl font-bold text-center mb-8 text-primary">Editar Usuario</h2>
            <?php
            if (isset($resultado)) {
                if (isset($resultado['error'])) {
                    echo '<p class="alert alert-error mb-4">' . $resultado['error'] . '</p>';
                } elseif (isset($resultado['success'])) {
                    echo '<p class="alert alert-success mb-4">' . $resultado['success'] . '</p>';
                }
            }
            ?>
            <form action="" method="POST" class="space-y-6">
                <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                <fieldset>
                    <label class="label" for="nombre">
                        <span class="label-text">Nombre completo</span>
                    </label>
                    <label class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z"/>
                        </svg>
                        <input type="text" name="nombre" class="grow" placeholder="Nombre completo..." value="<?php echo $usuario['name']; ?>" required />
                    </label>
                </fieldset>
                <fieldset>
                    <label class="label" for="email">
                        <span class="label-text">Correo electrónico</span>
                    </label>
                    <label class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
                            <path d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                            <path d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                        </svg>
                        <input type="email" name="email" class="grow" placeholder="Correo electrónico..." value="<?php echo $usuario['email']; ?>" required />
                    </label>
                </fieldset>
                <fieldset class="form-control mt-6">
                    <button class="btn btn-primary">Actualizar Usuario</button>
                </fieldset>
            </form>
        </section>
    </main>

    <!-- Footer -->
    <?php include 'components/footer.php'; ?>

    <script src="./assets/tailwind.min.js"></script>
</body>

</html>
