<?php
include ("./conexion.php");

$query = "SELECT * FROM especialidades";
$stmt = $con->prepare($query);
$stmt-> execute();
$especialidades = $stmt->get_result();
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
        <form action="agregarTurnoMedico.php" method="POST">
            <label>Especialidad:</label>
            <select name="especialidad" required>
                <?php
                while($e = $especialidades->fetch_assoc()){
                ?>

                <option value="<?php echo $e['id']; ?>">
                    <?php echo $e['nombre']; ?>
                </option>

                <?php
                }
                ?>
            </select> <br> <br>
            <input type="submit" value="Enviar">

        </form>
    </section>
</body>
</html>