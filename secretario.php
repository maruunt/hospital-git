
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secretario | Hospitalin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/secretario.css">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-hospital">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="index.php">
                    <img src="img/logo.png" alt="agregar" class="logo-hospital me-2">
                </a>

                <a href="./php/logout.php" class="btn btn-outline-light">
                    Cerrar sesión
                </a>
            </div>
        </nav>
    </header>

    <main class="container py-5">

        <div class="text-center mb-5">
            <span class="etiqueta-portada">Panel de secretaría</span>
            <h1 class="titulo-portada mt-3">¡Bienvenido, secretario!</h1>
            <p class="texto-portada">
                Desde acá podés gestionar pacientes y administrar los turnos del hospital.
            </p>
        </div>

        <!-- Gestión de pacientes -->
        <section class="mb-5">
            <h2 class="subtitulo-admin mb-4">Gestión de pacientes</h2>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card card-admin h-100">
                        <div class="card-body text-center">
                            <div class="icono-admin">🩺</div>
                            <h3 class="card-title">Crear paciente</h3>
                            <p class="card-text">
                                Registrar nuevos pacientes en el sistema hospitalario.
                            </p>
                            <a href="./php/crearPaciente.php" class="btn btn-hospital">
                                Crear paciente
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gestión de turnos -->
        <section>
            <h2 class="subtitulo-admin mb-4">Gestión de turnos</h2>

            <div class="row g-4">

                <div class="col-md-6 col-lg-4">
                    <div class="card card-admin h-100">
                        <div class="card-body text-center">
                            <div class="icono-admin">📅</div>
                            <h3 class="card-title">Agendar turno</h3>
                            <p class="card-text">
                                Asignar nuevos turnos a los pacientes del hospital.
                            </p>
                            <a href="./php/agregarTurnoEspecialidad.php" class="btn btn-hospital">
                                Agendar turno
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card card-admin h-100">
                        <div class="card-body text-center">
                            <div class="icono-admin">📋</div>
                            <h3 class="card-title">Ver turnos</h3>
                            <p class="card-text">
                                Consultar los turnos registrados en el sistema.
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
