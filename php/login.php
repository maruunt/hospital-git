<?php
session_start();

require_once __DIR__ . '/conexion.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = trim($_POST['mail'] ?? '');
    $contrasena = $_POST['contrasena'] ?? '';

    if (!empty($mail) && !empty($contrasena)) {
        
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
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        if ($resultado->num_rows === 1) {
            $usuario = $resultado->fetch_assoc();
            $hash = $usuario ['contrasena'];
            if (password_verify($contrasena, $hash)) {
                $vistasPorTipo = [
                    1 => '../paciente.php',
                    2 => '../secretario.php',
                    3 => '../medico.php',
                    4 => '../admin.php',
                ];
                
                $idTipoUsuario = $usuario ['id_tipo_usuario'];

                if (isset($vistasPorTipo[$idTipoUsuario])) {

                    $id = $usuario ['id'];
                    $correo = $usuario ['mail'];
                    $tipoUsuario = $usuario ['tipo'];

                    $_SESSION['usuario_id'] = $id;
                    $_SESSION['mail'] = $correo;
                    $_SESSION['id_tipo_usuario'] = $idTipoUsuario;
                    $_SESSION['tipo_usuario'] = $tipoUsuario;

                    header('Location: ' . $vistasPorTipo[$idTipoUsuario]);
                    exit;
                }
            }


            $stmt->close();
        }
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