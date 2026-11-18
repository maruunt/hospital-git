
<?php
session_start();

if (!isset($_SESSION['usuario_id']) || $_SESSION['id_tipo_usuario'] != 4) {
    exit('No tenés permiso para acceder a esta página.');
}

include("./conexion.php");

// Modificar o cancelar un turno
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $idTurno = (int) $_POST['id_turno'];

    if ($_POST['accion'] === 'guardar') {

        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];

        $query = "UPDATE turno SET fecha = ?, hora = ? WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param('ssi', $fecha, $hora, $idTurno);
        $stmt->execute();
        $stmt->close();

    } elseif ($_POST['accion'] === 'cancelar') {

        $query = "UPDATE turno SET estado = 3 WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param('i', $idTurno);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: turnosAdmin.php");
    exit();
}

// Consultar todos los turnos
$query = "SELECT t.id, t.fecha, t.hora, t.estado,
                 p.nombre AS nombre_paciente,
                 p.apellido AS apellido_paciente,
                 m.nombre AS nombre_medico,
                 m.apellido AS apellido_medico,
                 e.nombre AS especialidad
          FROM turno AS t
          INNER JOIN paciente AS p ON t.id_paciente = p.id
          INNER JOIN medico AS m ON t.id_medico = m.id
          INNER JOIN especialidad AS e ON t.id_especialidad = e.id
          ORDER BY t.fecha, t.hora";

$stmt = $con->prepare($query);
$stmt->execute();
$turnos = $stmt->get_result();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administrar turnos | Hospitalin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/turnosAdmin.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-hospital">
    <div class="container">

        <a class="navbar-brand" href="../admin.php">
            <img src="../img/logo.png" class="logo-hospital" alt="Hospitalin">
        </a>

        <a href="../admin.php" class="btn btn-light boton-login">
            Volver al panel
        </a>

    </div>
</nav>

<main class="container py-5">

    <div class="text-center mb-5">

        <span class="etiqueta-portada">Panel de administración</span>

        <h1 class="titulo-hospital mt-3">
            Administración de turnos
        </h1>

        <p class="text-secondary">
            Consultá y administrá todos los turnos registrados en el hospital.
        </p>

    </div>

    <?php if ($turnos->num_rows > 0) { ?>

        <div class="table-responsive tabla-turnos-container">

            <table class="table tabla-turnos">

                <thead>
                    <tr>
                        <th>Paciente</th>
                        <th>Médico</th>
                        <th>Especialidad</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    <?php while ($t = $turnos->fetch_assoc()) { ?>

                        <tr>

                            <td>
                                <?= htmlspecialchars($t['nombre_paciente'] . ' ' . $t['apellido_paciente']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($t['nombre_medico'] . ' ' . $t['apellido_medico']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($t['especialidad']) ?>
                            </td>

                            <td>

                                <form id="editar<?= $t['id'] ?>" method="POST">

                                    <input type="hidden" name="id_turno" value="<?= $t['id'] ?>">
                                    <input type="hidden" name="accion" value="guardar">

                                </form>

                                <input
                                    form="editar<?= $t['id'] ?>"
                                    type="date"
                                    name="fecha"
                                    value="<?= htmlspecialchars($t['fecha']) ?>"
                                    class="form-control"
                                    required>

                            </td>

                            <td>

                                <input
                                    form="editar<?= $t['id'] ?>"
                                    type="time"
                                    name="hora"
                                    value="<?= htmlspecialchars($t['hora']) ?>"
                                    class="form-control"
                                    required>

                            </td>

                            <td>

                                <?php if ($t['estado'] == 1) { ?>

                                    <span class="estado-turno estado-activo">
                                        Activo
                                    </span>

                                <?php } else { ?>

                                    <span class="estado-turno estado-cancelado">
                                        Cancelado
                                    </span>

                                <?php } ?>

                            </td>

                            <td>

                                <div class="acciones-turno">

                                    <?php if ($t['estado'] == 1) { ?>

                                        <button
                                            form="editar<?= $t['id'] ?>"
                                            type="submit"
                                            class="btn btn-primary btn-sm">

                                            Guardar

                                        </button>

                                        <form method="POST"
                                              onsubmit="return confirm('¿Querés cancelar este turno?');">

                                            <input type="hidden" name="id_turno" value="<?= $t['id'] ?>">
                                            <input type="hidden" name="accion" value="cancelar">

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Cancelar
                                            </button>

                                        </form>

                                    <?php } ?>

                                </div>

                            </td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    <?php } else { ?>

        <div class="mensaje-sin-turnos">
            Todavía no hay turnos registrados.
        </div>

    <?php } ?>

</main>

</body>
</html>
