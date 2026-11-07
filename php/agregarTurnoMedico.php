<?php
if (!empty($_POST['id_especialidad']) && !empty ($_POST['id_paciente'])) { 
    $idEspecialidad = $_POST['id_especialidad'];
    $idPaciente = $_POST['id_paciente'];
    include ("./conexion.php");

    $query = "SELECT m.id AS id, m.nombre AS nombre FROM medico_especialidad AS me INNER JOIN medico AS m ON m.id = me.id_medico WHERE me.id_especialidad = ?";
    $stmt = $con->prepare($query);
    $stmt-> bind_param('i', $idEspecialidad);
    $stmt-> execute();
    $medicos = $stmt->get_result();
    $numRows = $medicos->num_rows;
    $stmt->close();
} else { 
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar turno</title>
</head>
<body>
    <header>
    </header>
    <section>
        <h1>Agregue el turno</h1>
        <?php if ($numRows>0) { ?>
        <form action="agregarTurnoFecha.php" method="POST">
            <label>Medicos:</label>
            <select name="id_medico" required>
                <?php
                while($m = $medicos->fetch_assoc()){
                ?>

                <option value="<?php echo $m['id']; ?>">
                    <?php echo $m['nombre']; ?>
                </option>

                <?php
                }
                ?>
            </select> <br> <br>
            <input type="hidden" name="id_especialidad" value="<?php echo $idEspecialidad ?>">
            <input type="hidden" name="id_paciente" value="<?php echo $idPaciente ?>">
            <input type="submit" value="Enviar">

        </form>
        <?php } else { ?>
        <span>No hay medicos para esta especialidad</span>
        <button><a href="agregarTurnoEspecialidad.php">Volver</a></button>
        <?php } ?>
    </section>
</body>
</html>