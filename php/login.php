
<?php
session_start();

require_once __DIR__ . '/conexion.php';

$mensajeError = '';

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
            $hash = $usuario['contrasena'];

            if (password_verify($contrasena, $hash)) {

                $vistasPorTipo = [
                    1 => '../paciente.php',
                    2 => '../secretario.php',
                    3 => '../medico.php',
                    4 => '../admin.php',
                ];

                $idTipoUsuario = $usuario['id_tipo_usuario'];

                if (isset($vistasPorTipo[$idTipoUsuario])) {

                    $id = $usuario['id'];
                    $correo = $usuario['mail'];
                    $tipoUsuario = $usuario['tipo'];

                    $_SESSION['usuario_id'] = $id;
                    $_SESSION['mail'] = $correo;
                    $_SESSION['id_tipo_usuario'] = $idTipoUsuario;
                    $_SESSION['tipo_usuario'] = $tipoUsuario;

                    $stmt->close();

                    header('Location: ' . $vistasPorTipo[$idTipoUsuario]);
                    exit;
                }
            }
        }

        $stmt->close();

        $mensajeError = 'El correo o la contraseña son incorrectos.';

    } else {
        $mensajeError = 'Completá todos los campos para ingresar.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar sesión | Hospitalin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body class="login-page">

    <!-- BARRA DE NAVEGACION -->
    <header>
        <nav class="navbar navbar-hospital">
            <div class="container">
                <a class="navbar-brand" href="../index.php">
                    <img src="../img/logo.png" alt="agregar" class="logo-hospital">
                </a>
                <a href="../index.php" class="btn btn-light boton-login">
                    Volver al inicio
                </a>
            </div>
        </nav>
    </header>

    <!-- FORMULARIO DE INICIO DE SESION -->
    <main class="container login-container">
        <div class="row justify-content-center align-items-center">

            <!-- IMAGEN -->
            <div class="col-lg-5 d-none d-lg-block">

                <div class="login-imagen">
                    <img src="../img/medicos.jpg" 
                         alt="Personal médico del hospital">
                    <div class="login-texto-imagen">
                        <h2>Bienvenido a ....</h2>
                        <p>
                            Tu salud, nuestra prioridad.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FORMULARIO -->
            <div class="col-lg-5 col-md-8">
                <div class="login-card">
                    <div class="text-center mb-4">
                        <h1 class="titulo-hospital">
                            Iniciar sesión
                        </h1>
                        <p class="text-secondary">
                            Ingresá tus datos para acceder al sistema.
                        </p>
                    </div>

                    <!-- MENSAJE DE ERROR -->
                    <?php if (!empty($mensajeError)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo htmlspecialchars($mensajeError); ?>
                        </div>
                    <?php endif; ?>

                    <form action="login.php" method="POST">

                        <!-- CORREO -->
                        <div class="mb-3">
                            <label for="mail" class="form-label">
                                Correo electrónico
                            </label>
                            <input
                                type="email"
                                class="form-control"
                                id="mail"
                                name="mail"
                                placeholder="Ingresá tu correo"
                                value="<?php echo htmlspecialchars($_POST['mail'] ?? ''); ?>"
                                required>
                        </div>

                        <!-- CONTRASEÑA -->
                        <div class="mb-4">
                            <label for="contrasena" class="form-label">
                                Contraseña
                            </label>
                            <input
                                type="password"
                                class="form-control"
                                id="contrasena"
                                name="contrasena"
                                placeholder="Ingresá tu contraseña"
                                required>
                        </div>

                        <!-- BOTON INGRESAR -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-hospital btn-lg">
                                Ingresar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- PIE DE PAGINA -->
    <footer class="footer-hospital">
        <div class="container">
            <div class="row text-center text-md-start g-4">
                <!-- UBICACION -->
                <div class="col-md-6">
                    <h5> Estamos en</h5>
                    <p>
                        Av. Siempre Viva 123<br>
                        Buenos Aires, Argentina
                    </p>
                </div>

                <!-- CONTACTO -->
                <div class="col-md-6">
                    <h5> Contactanos</h5>
                    <p>
                        Telefono: 11-4000-0000<br>
                        Email: contacto@hospitalin.com
                    </p>
                </div>
            </div>
            <hr>
            <p class="copyright mb-0">
                © 2026 - Todos los derechos reservados.
            </p>
        </div>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
