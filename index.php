<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de gestión hospitalaria</title>

    <!-- Bootstrap CSS (va ANTES de tu CSS para que el tuyo tenga prioridad) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <!-- BARRA DE NAVEGACION -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-hospital">
            <div class="container d-flex justify-content-between align-items-center">
                <a class="navbar-brand" href="index.php">
                    <img src="img/logo.png" alt="Logo del hospital" class="logo-hospital">
                </a>

                <?php if (isset($_SESSION['mail'])): ?>
                    <a href="./php/logout.php" class="btn btn-light boton-login">
                        Cerrar sesión
                    </a>
                <?php else: ?>
                    <a href="./php/login.php" class="btn btn-light boton-login">
                        Iniciar sesión
                    </a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <!-- PORTADA -->
    <main class="container py-5">
        <section class="row align-items-center portada">

            <!-- TEXTO DE BIENVENIDA -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <span class="etiqueta-portada">
                    Sistema de gestión hospitalaria
                </span>
                <h1 class="titulo-portada mt-3">
                    Tu salud, nuestra prioridad
                </h1>
                <p class="texto-portada mt-3">
                    Bienvenido a ..., una plataforma diseñada
                    para facilitar la gestión de pacientes, médicos
                    y turnos de manera sencilla y organizada.
                </p>
                <a href="./php/login.php" class="btn btn-hospital btn-lg mt-3">
                    Ingresar al sistema
                </a>
            </div>

            <!-- IMAGEN PRINCIPAL -->
            <div class="col-lg-6 text-center">
                <img src="img/medicos.jpg"
                     alt="Personal médico del hospital"
                     class="imagen-portada">
            </div>

        </section>
    </main>

    <!-- PIE DE PAGINA -->
    <footer class="footer-hospital">
        <div class="container">
            <div class="row text-center text-md-start g-4">

                <!-- UBICACION -->
                <div class="col-md-6">
                    <h5>Estamos en</h5>
                    <p>
                        Av. Siempre Viva 123<br>
                        Buenos Aires, Argentina
                    </p>
                </div>

                <!-- CONTACTO -->
                <div class="col-md-6">
                    <h5>Contactanos</h5>
                    <p>
                        Teléfono: 11-4000-0000<br>
                        Email: contacto@gmail.com
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