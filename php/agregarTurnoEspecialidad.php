
<?php
if (!empty ($_POST['id_paciente'])) {
    $idPaciente = $_POST['id_paciente'];
    include ("./conexion.php");

    $query = "SELECT * FROM especialidad";
    $stmt = $con->prepare($query);
    $stmt->execute();
    $especialidades = $stmt->get_result();
    $stmt->close();

} else {
    header('Location: agregarTurnoPaciente.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar especialidad | Hospitalin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS del hospital -->
    <link rel="stylesheet" href="../css/estilos.css">
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
                <h1 class="titulo-formulario mt-3">Seleccionar especialidad</h1>
                <p class="texto-portada">
                    Elegí la especialidad médica para continuar con la asignación del turno.
                </p>
            </div>

            <form action="agregarTurnoMedico.php" method="POST">

                <div class="mb-4">
                    <label for="id_especialidad" class="form-label">
                        Especialidad:
                    </label>

                    <select class="form-select" id="id_especialidad" name="id_especialidad" required>

                        <option value="" selected disabled>
                            Seleccioná una especialidad
                        </option>

                        <?php
                        while($e = $especialidades->fetch_assoc()){
                        ?>

                        <option value="<?php echo $e['id']; ?>">
                            <?php echo $e['nombre']; ?>
                        </option>

                        <?php
                        }
                        ?>

                    </select>
                </div>

                <input type="hidden" name="id_paciente" value="<?php echo $idPaciente ?>">

                <div class="d-flex justify-content-center gap-3 mt-4">
                    <a href="../secretario.php" class="btn btn-outline-secondary">
                        Cancelar
                    </a>

                    <button type="submit" class="btn btn-hospital">
                        Continuar
                    </button>
                </div>

            </form>

        </div>

    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
