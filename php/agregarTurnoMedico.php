
<?php
if (!empty($_POST['id_especialidad']) && !empty($_POST['id_paciente'])) {
    $idEspecialidad = $_POST['id_especialidad'];
    $idPaciente = $_POST['id_paciente'];

    include ("./conexion.php");

    $query = "SELECT m.id AS id, m.nombre AS nombre FROM medico_especialidad AS me INNER JOIN medico AS m ON m.id = me.id_medico WHERE me.id_especialidad = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('i', $idEspecialidad);
    $stmt->execute();
    $medicos = $stmt->get_result();
    $numRows = $medicos->num_rows;
    $stmt->close();

} else {
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar médico | Hospitalin</title>

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
                <h1 class="titulo-formulario mt-3">Seleccionar médico</h1>
                <p class="texto-portada">
                    Elegí el médico para continuar con la asignación del turno.
                </p>
            </div>

            <?php if ($numRows > 0) { ?>

                <form action="agregarTurnoFecha.php" method="POST">

                    <div class="mb-4">
                        <label for="id_medico" class="form-label">Médicos:</label>

                        <select class="form-select" id="id_medico" name="id_medico" required>

                            <option value="" selected disabled>
                                Seleccioná un médico
                            </option>

                            <?php
                            while($m = $medicos->fetch_assoc()){
                            ?>

                            <option value="<?php echo $m['id']; ?>">
                                <?php echo $m['nombre']; ?>
                            </option>

                            <?php
                            }
                            ?>

                        </select>
                    </div>

                    <input type="hidden" name="id_especialidad" value="<?php echo $idEspecialidad ?>">
                    <input type="hidden" name="id_paciente" value="<?php echo $idPaciente ?>">

                    <div class="d-flex justify-content-center gap-3 mt-4">
                        <a href="agregarTurnoEspecialidad.php" class="btn btn-outline-secondary">
                            Volver
                        </a>

                        <button type="submit" class="btn btn-hospital">
                            Continuar
                        </button>
                    </div>

                </form>

            <?php } else { ?>

                <div class="alert alert-info text-center">
                    No hay médicos disponibles para esta especialidad.
                </div>

                <div class="text-center">
                    <a href="agregarTurnoEspecialidad.php" class="btn btn-hospital">
                        Volver
                    </a>
                </div>

            <?php } ?>

        </div>

    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
