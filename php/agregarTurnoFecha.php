<?php
if (!empty($_POST['id_medico']) && !empty($_POST['id_especialidad']) && !empty ($_POST['id_paciente'])) { 
    session_start();
    $idMedico = $_POST['id_medico'];
    $idEspecialidad = $_POST['id_especialidad'];
    $idPaciente = $_POST['id_paciente'];
    
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
        <form action="guardarTurno.php" method="POST">
            <label>Seleccione una fecha:</label>
            <input type="date" name="fecha" id="calendario">
            <input type="time" name="hora" id="">
            
            <input type="hidden" name="id_medico" value="<?php echo $idMedico ?>">
            <input type="hidden" name="id_especialidad" value="<?php echo $idEspecialidad ?>">
            <input type="hidden" name="id_paciente" value="<?php echo $idPaciente ?>">
            
            <input type="submit" value="Enviar">

        </form>
    </section>

    <script>
        const hoy = new Date().toISOString().split('T') [0] 
        document.getElementById('calendario').min = hoy //para que los dias anteriores a hoy no cuenten
    </script>
</body>
</html>