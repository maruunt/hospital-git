
<?php
session_start();

if (!isset($_SESSION['usuario_id']) || $_SESSION['id_tipo_usuario'] != 3) {
    exit('No tenés permiso para acceder a esta página.');
}

include("./conexion.php");

$idMedico = $_SESSION['usuario_id'];

$query = "SELECT t.fecha, t.hora, t.estado,
                 p.nombre AS nombre_paciente,
                 p.apellido AS apellido_paciente,
                 e.nombre AS especialidad
          FROM turno AS t
          INNER JOIN paciente AS p ON t.id_paciente = p.id
          INNER JOIN especialidad AS e ON t.id_especialidad = e.id
          WHERE t.id_medico = ?
          ORDER BY t.fecha, t.hora";

$stmt = $con->prepare($query);
$stmt->bind_param('i', $idMedico);
$stmt->execute();
$turnos = $stmt->get_result();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis turnos | Hospitalin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/turnosMedicos.css">
</head>

<body>

<nav class="navbar navbar-hospital">
    <div class="container">
        <a class="navbar-brand" href="../medico.php">
            <img src="../img/logo.png" class="logo-hospital" alt="Hospitalin">
        </a>

        <a href="../medico.php" class="btn btn-outline-light">
            Volver al panel
        </a>
    </div>
</nav>

<main class="container py-5">

    <div class="text-center mb-5">
        <span class="etiqueta-portada">Panel médico</span>
        <h1 class="titulo-portada mt-3">Mis turnos médicos</h1>
        <p class="texto-portada">
            Consultá los pacientes que tenés asignados.
        </p>
    </div>

    <?php if ($turnos->num_rows > 0) { ?>

        <div class="table-responsive tabla-turnos-container">
            <table class="table tabla-turnos">
                <thead>
                    <tr>
                        <th>Paciente</th>
                        <th>Especialidad</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Estado</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($t = $turnos->fetch_assoc()) { ?>

                        <tr>
                            <td>
                                <?= htmlspecialchars($t['nombre_paciente'] . ' ' . $t['apellido_paciente']) ?>
                            </td>

                            <td><?= htmlspecialchars($t['especialidad']) ?></td>
                            <td><?= htmlspecialchars($t['fecha']) ?></td>
                            <td><?= htmlspecialchars($t['hora']) ?></td>

                            <td>
                                <?php if ($t['estado'] == 1) { ?>
                                    <span class="estado-turno estado-activo">Activo</span>
                                <?php } else { ?>
                                    <span class="estado-turno estado-cancelado">Cancelado</span>
                                <?php } ?>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>

    <?php } else { ?>

        <div class="mensaje-sin-turnos">
            No tenés turnos registrados.
        </div>

    <?php } ?>

</main>

</body>
</html>
