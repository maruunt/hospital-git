
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administrador | Hospitalin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS propio -->
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>

    <!-- BARRA DE NAVEGACION -->
    <header>

        <!-- aca poner fotos y boludeces que se yo -->

        <nav class="navbar navbar-expand-lg navbar-hospital">
            <div class="container">

                <a class="navbar-brand" href="index.php">
                    <img src="img/logo.png" alt="Logo" class="logo-hospital">

                </a>

                <a href="./php/logout.php" class="btn btn-light boton-login">
                    Cerrar sesion
                </a>

            </div>
        </nav>

    </header>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="container py-5">

        <!-- TITULO DEL PANEL -->
        <div class="text-center mb-5">

            <span class="etiqueta-portada">
                Panel de administracion
            </span>

            <h1 class="titulo-hospital mt-3">
                ¡Bienvenido, administrador!
            </h1>

            <p class="text-secondary">
                Desde aqui podes gestionar los usuarios y los turnos del hospital.
            </p>

        </div>

        <!-- SECCION CREAR USUARIOS -->
        <section class="mb-5">

            <h2 class="subtitulo-admin mb-4">
                Gestion de usuarios
            </h2>

            <div class="row g-4">

                <!-- CREAR PACIENTE -->
                <div class="col-md-6 col-lg-3">

                    <div class="card card-admin h-100 text-center">

                        <div class="card-body">

                            <div class="icono-admin">🩺</div>

                            <h5 class="card-title">Pacientes</h5>

                            <p class="card-text">
                                Registrar nuevos pacientes en el sistema.
                            </p>

                            <a href="./php/crearPaciente.php" class="btn btn-hospital">
                                Crear paciente
                            </a>

                        </div>

                    </div>

                </div>

                <!-- CREAR SECRETARIO -->
                <div class="col-md-6 col-lg-3">

                    <div class="card card-admin h-100 text-center">

                        <div class="card-body">

                            <div class="icono-admin">📋</div>

                            <h5 class="card-title">Secretarios</h5>

                            <p class="card-text">
                                Registrar nuevos secretarios en el sistema.
                            </p>

                            <a href="./php/crearSecretario.php" class="btn btn-hospital">
                                Crear secretario
                            </a>

                        </div>

                    </div>

                </div>

                <!-- CREAR MEDICO -->
                <div class="col-md-6 col-lg-3">

                    <div class="card card-admin h-100 text-center">

                        <div class="card-body">

                            <div class="icono-admin">👨‍⚕️</div>

                            <h5 class="card-title">Medicos</h5>

                            <p class="card-text">
                                Registrar nuevos medicos en el sistema.
                            </p>

                            <a href="./php/crearMedico.php" class="btn btn-hospital">
                                Crear medico
                            </a>

                        </div>

                    </div>

                </div>

                <!-- CREAR ADMINISTRADOR -->
                <div class="col-md-6 col-lg-3">

                    <div class="card card-admin h-100 text-center">

                        <div class="card-body">

                            <div class="icono-admin">👤</div>

                            <h5 class="card-title">Administradores</h5>

                            <p class="card-text">
                                Registrar nuevos administradores.
                            </p>

                            <a href="./php/crearAdmin.php" class="btn btn-hospital">
                                Crear administrador
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- SECCION TURNOS -->
        <section>

            <h2 class="subtitulo-admin mb-4">
                Gestion de turnos
            </h2>

            <div class="row g-4">

                <!-- AGENDAR TURNO -->
                <div class="col-md-6">

                    <div class="card card-admin h-100">

                        <div class="card-body text-center">

                            <div class="icono-admin">📅</div>

                            <h5 class="card-title">Agendar un turno</h5>

                            <p class="card-text">
                                Acceder a la gestion para registrar nuevos turnos.
                            </p>

                            <a href="" class="btn btn-hospital">
                                Agendar turno
                            </a>

                        </div>

                    </div>

                </div>

                <!-- VER TURNOS -->
                <div class="col-md-6">

                    <div class="card card-admin h-100">

                        <div class="card-body text-center">

                            <div class="icono-admin">📋</div>

                            <h5 class="card-title">Ver turnos</h5>

                            <p class="card-text">
                                Consultar los turnos registrados en el hospital.
                            </p>
                            <a href="" class="btn btn-hospital">
                                Ver turnos
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
