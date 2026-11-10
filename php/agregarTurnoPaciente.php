
<?php
include ("./conexion.php");

$query = "SELECT id, nombre, apellido FROM paciente";
$stmt = $con->prepare($query);
$stmt->execute();
$pacientes = $stmt->get_result();
$numRows = $pacientes->num_rows;
$stmt->close();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar turno | Hospitalin</title>

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
                <span class="etiqueta-portada">Gestión de turnos</span>
                <h1 class="titulo-formulario mt-3">Agendar turno</h1>
                <p class="texto-portada">
                    Seleccioná el paciente para comenzar a gestionar su turno.
                </p>
            </div>

            <?php if ($numRows > 0) { ?>

                <form action="agregarTurnoEspecialidad.php" method="POST">

                    <div class="mb-4">
                        <label for="id_paciente" class="form-label">Paciente:</label>

                        <select class="form-select" id="id_paciente" name="id_paciente" required>
                            <option value="" selected disabled>Seleccioná un paciente</option>

                            <?php
                            while($p = $pacientes->fetch_assoc()){
                            ?>

                            <option value="<?php echo $p['id']; ?>">
                                <?php echo $p['nombre']; ?>
                                <?php echo $p['apellido']; ?>
                            </option>

                            <?php
                            }
                            ?>

                        </select>
                    </div>

                    <div class="d-flex justify-content-center gap-3 mt-4">
                        <a href="../secretario.php" class="btn btn-outline-secondary">
                            Cancelar
                        </a>

                        <button type="submit" class="btn btn-hospital">
                            Continuar
                        </button>
                    </div>

                </form>

            <?php } else { ?>

                <div class="alert alert-info text-center">
                    No hay pacientes cargados en el sistema.
                </div>

                <div class="text-center">
                    <a href="../secretario.php" class="btn btn-hospital">
                        Volver al panel
                    </a>
                </div>

            <?php } ?>

        </div>

    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
