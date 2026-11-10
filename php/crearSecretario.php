
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Secretario | Hospitalin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS del hospital -->
    <link rel="stylesheet" href="../css/cp.css">
</head>

<body class="pagina-formulario">

    <header>
        <nav class="navbar navbar-hospital">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="../admin.php">
                    <img src="../img/logo.png" alt="Logo" class="logo-hospital me-2">
                </a>

                <a href="../admin.php" class="btn btn-outline-light">
                    Volver al panel
                </a>
            </div>
        </nav>
    </header>

    <main class="container py-5">

        <div class="formulario-paciente">

            <div class="text-center mb-4">
                <span class="etiqueta-portada">Gestión de usuarios</span>
                <h1 class="titulo-formulario mt-3">Crear secretario</h1>
                <p class="texto-portada">
                    Completá los datos para registrar un nuevo secretario.
                </p>
            </div>

            <form action="./registroSecretario.php" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="mail" class="form-label">Mail:</label>
                    <input type="email" class="form-control" id="mail" name="mail" required>
                </div>

                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                </div>

                <div class="d-flex justify-content-center gap-3 mt-4">
                    <a href="../admin.php" class="btn btn-outline-secondary">
                        Cancelar
                    </a>

                    <button type="submit" class="btn btn-hospital">
                        Guardar secretario
                    </button>
                </div>

            </form>

        </div>

    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
