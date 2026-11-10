
<?php
if (!empty($_POST['id_medico']) && !empty($_POST['id_especialidad']) && !empty($_POST['id_paciente'])) {
    session_start();

    $idMedico = $_POST['id_medico'];
    $idEspecialidad = $_POST['id_especialidad'];
    $idPaciente = $_POST['id_paciente'];

} else {
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar fecha | Hospitalin</title>

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
                <h1 class="titulo-formulario mt-3">Seleccionar fecha y horario</h1>
                <p class="texto-portada">
                    Elegí el día y la hora para asignar el turno médico.
                </p>
            </div>

            <form action="guardarTurno.php" method="POST">

                <div class="mb-3">
                    <label for="calendario" class="form-label">
                        Seleccioná una fecha:
                    </label>

                    <input
                        type="date"
                        class="form-control"
                        name="fecha"
                        id="calendario"
                        required
                    >
                </div>

                <div class="mb-4">
                    <label for="hora" class="form-label">
                        Seleccioná un horario:
                    </label>

                    <input
                        type="time"
                        class="form-control"
                        name="hora"
                        id="hora"
                        required
                    >
                </div>

                <input type="hidden" name="id_medico" value="<?php echo $idMedico ?>">
                <input type="hidden" name="id_especialidad" value="<?php echo $idEspecialidad ?>">
                <input type="hidden" name="id_paciente" value="<?php echo $idPaciente ?>">

                <div class="d-flex justify-content-center gap-3 mt-4">
                    <a href="../secretario.php" class="btn btn-outline-secondary">
                        Cancelar
                    </a>

                    <button type="submit" class="btn btn-hospital">
                        Guardar turno
                    </button>
                </div>

            </form>

        </div>

    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const hoy = new Date().toISOString().split('T')[0];
        document.getElementById('calendario').min = hoy;
    </script>

</body>
</html>
