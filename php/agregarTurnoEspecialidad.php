<?php
if (!empty ($_POST['id_paciente'])) { 
    $idPaciente = $_POST['id_paciente'];
    include ("./conexion.php");
    
    $query = "SELECT * FROM especialidad";
    $stmt = $con->prepare($query);
    $stmt-> execute();
    $especialidades = $stmt->get_result();
    $stmt->close();
    } else {
        header('Location: agregarTurnoPaciente.php');
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
        <form action="agregarTurnoMedico.php" method="POST">
            <label>Especialidad:</label>
            <select name="id_especialidad" required>
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

            <input type="hidden" name="id_paciente" value="<?php echo $idPaciente ?>">
            
            <input type="submit" value="Enviar">

        </form>
    </section>
</body>
</html>