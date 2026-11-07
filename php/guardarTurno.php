<?php
if (!empty($_POST['id_especialidad']) && !empty($_POST['id_medico']) && !empty($_POST['id_paciente']) && !empty($_POST['fecha']) && !empty($_POST['hora'])) { 
    session_start();
    $idEspecialidad = $_POST['id_especialidad'];
    $idMedico = $_POST['id_medico'];
    $idPaciente = $_POST['id_paciente'];
    $Fecha = $_POST['fecha'];
    $Hora = $_POST['hora'];
    $estado = 1 ;
    $idSecretario = $_SESSION['usuario_id'];

    include ("./conexion.php");

    $query = "INSERT INTO turno (fecha, hora, id_paciente, id_medico, id_especialidad, id_secretario_asignado, estado) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($query);
    $stmt-> bind_param('ssiiiii', $Fecha, $Hora, $idPaciente, $idMedico, $idEspecialidad, $idSecretario ,$estado);
    $stmt-> execute();
    $stmt->close();

    header('Location: '); //tengo que poner la ruta del archivo con los turnos
} else { 
    exit();
}