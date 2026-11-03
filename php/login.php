<?php
session_start();

require_once __DIR__ . '/conexion.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = trim($_POST['mail'] ?? '');
    $contrasena = $_POST['contrasena'] ?? '';

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL) || $contrasena === '') {
        $error = 'Ingresá un mail y una contraseña válidos.';
    } else {
        $sql = "
            SELECT usuarios.id, usuarios.mail, usuarios.contrasena,
                   usuarios.id_tipo_usuario, tipo_usuario.tipo
            FROM (
                SELECT id, mail, contrasena, id_tipo_usuario FROM paciente
                UNION ALL
                SELECT id, mail, contrasena, id_tipo_usuario FROM secretario
                UNION ALL
                SELECT id, mail, contrasena, id_tipo_usuario FROM medico
                UNION ALL
                SELECT id, mail, contrasena, id_tipo_usuario FROM administrador
            ) AS usuarios
            INNER JOIN tipo_usuario
                ON tipo_usuario.id = usuarios.id_tipo_usuario
            WHERE usuarios.mail = ?
        ";

        $stmt = $con->prepare($sql);
        if (!$stmt) {
            error_log('Error al preparar el inicio de sesión: ' . $con->error);
            http_response_code(500);
            exit('No se pudo procesar el inicio de sesión.');
        }

        $stmt->bind_param('s', $mail);
        if (!$stmt->execute()) {
            error_log('Error al ejecutar el inicio de sesión: ' . $stmt->error);
            http_response_code(500);
            exit('No se pudo procesar el inicio de sesión.');
        }

        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($id, $mailGuardado, $hash, $idTipoUsuario, $tipoUsuario);
            $stmt->fetch();

            if (password_verify($contrasena, $hash)) {
                $vistasPorTipo = [
                    1 => '../paciente.php',
                    2 => '../secretario.php',
                    3 => '../medico.php',
                    4 => '../admin.php',
                ];

                if (isset($vistasPorTipo[$idTipoUsuario])) {
                    if (!session_regenerate_id(true)) {
                        error_log('No se pudo regenerar el ID de sesión después del inicio de sesión.');
                        http_response_code(500);
                        exit('No se pudo iniciar la sesión.');
                    }

                    $_SESSION['usuario_id'] = $id;
                    $_SESSION['mail'] = $mailGuardado;
                    $_SESSION['id_tipo_usuario'] = $idTipoUsuario;
                    $_SESSION['tipo_usuario'] = $tipoUsuario;

                    header('Location: ' . $vistasPorTipo[$idTipoUsuario]);
                    exit;
                }
            }
        } elseif ($stmt->num_rows > 1) {
            error_log('El mail de inicio de sesión está registrado en más de una tabla de usuarios.');
        }

        $stmt->close();
        $error = 'Mail o contraseña incorrectos.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <h1>Iniciar sesión</h1>

    <?php if ($error !== ''): ?>
        <p role="alert"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <label for="mail">Mail:</label>
        <input type="email" id="mail" name="mail" required>
        <br><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>
        <br><br>

        <button type="submit">Ingresar</button>
    </form>
</body>
</html>