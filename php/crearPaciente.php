
<?php
include ("./conexion.php");

$obraSocial = $con->query("SELECT * FROM obra_social");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Paciente | Hospitalin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS del hospital -->
    <link rel="stylesheet" href="../css/cp.css">
</head>

<body class="pagina-formulario">

    <header>
        <nav class="navbar navbar-hospital">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="../secretario.php">
                    <img src="../img/logo.png" alt="Logo" class="logo-hospital me-2">
                </a>

                <a href="../secretario.php" class="btn btn-outline-light">
                    Volver al panel
                </a>
            </div>
        </nav>
    </header>

    <main class="container py-5">

        <div class="formulario-paciente">

            <div class="text-center mb-4">
                <span class="etiqueta-portada">Gestión de pacientes</span>
                <h1 class="titulo-formulario mt-3">Crear paciente</h1>
                <p class="texto-portada">
                    Completá los datos para registrar un nuevo paciente.
                </p>
            </div>

            <form action="./registroPaciente.php" method="POST" enctype="multipart/form-data">

                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="dni" class="form-label">DNI:</label>
                        <input type="text" class="form-control" id="dni" name="dni" required>
                    </div>

                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>

                    <div class="col-md-6">
                        <label for="apellido" class="form-label">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                    </div>

                    <div class="col-md-6">
                        <label for="mail" class="form-label">Mail:</label>
                        <input type="email" class="form-control" id="mail" name="mail" required>
                    </div>

                    <div class="col-md-6">
                        <label for="contrasena" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                    </div>

                    <div class="col-md-6">
                        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                    </div>

                    <div class="col-md-6">
                        <label for="telefono" class="form-label">Teléfono:</label>
                        <input type="number" class="form-control" id="telefono" name="telefono" required>
                    </div>

                    <div class="col-md-6">
                        <label for="id_obra_social" class="form-label">Obra social:</label>

                        <select class="form-select" id="id_obra_social" name="id_obra_social" required>
                            <option value="" selected disabled>Seleccioná una obra social</option>

                            <?php
                            while($o = $obraSocial->fetch_assoc()){
                            ?>

                            <option value="<?php echo $o['id']; ?>">
                                <?php echo $o['nombre']; ?>
                            </option>

                            <?php
                            }
                            ?>

                        </select>
                    </div>

                </div>

                <div class="d-flex justify-content-center gap-3 mt-4">
                    <a href="../secretario.php" class="btn btn-outline-secondary">
                        Cancelar
                    </a>

                    <button type="submit" class="btn btn-hospital">
                        Guardar paciente
                    </button>
                </div>

            </form>

        </div>

    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
