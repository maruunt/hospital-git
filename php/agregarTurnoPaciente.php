<?php
    include ("./conexion.php");

    $query = "SELECT id, nombre, apellido FROM paciente";
    $stmt = $con->prepare($query);
    $stmt-> execute();
    $pacientes = $stmt->get_result();
    $numRows = $pacientes->num_rows;
    $stmt->close();

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
        <form action="agregarTurnoEspecialidad.php" method="POST">
            <label>Pacientes:</label>
            <select name="id_paciente" required>
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
            </select> <br> <br>
            
            <input type="submit" value="Enviar">

        </form>
        <?php } else { ?>
        <span>No hay pacientes cargados</span>
        <button><a href="../secretario.php">Volver</a></button>
        <?php } ?>
    </section>
</body>
</html>