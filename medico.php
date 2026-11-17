
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médico | Hospitalin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-hospital">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="img/logo.png" alt="Hospitalin" class="logo-hospital me-2">
            </a>

            <a href="./php/logout.php" class="btn btn-outline-light">
                Cerrar sesión
            </a>
        </div>
    </nav>
</header>

<main class="container py-5">

    <div class="text-center mb-5">
        <span class="etiqueta-portada">Panel médico</span>
        <h1 class="titulo-portada mt-3">¡Bienvenido, médico!</h1>
        <p class="texto-portada">
            Desde acá podés consultar los turnos de tus pacientes.
        </p>
    </div>

    <section>
        <h2 class="subtitulo-admin mb-4">Gestión de turnos</h2>

        <div class="row g-4">

            <div class="col-md-6 col-lg-4">
                <div class="card card-admin h-100">
                    <div class="card-body text-center">

                        <div class="icono-admin">📅</div>

                        <h3 class="card-title">Mis turnos</h3>

                        <p class="card-text">
                            Consultar los turnos asignados y los pacientes que tenés que atender.
                        </p>

                        <a href="./php/turnosMedico.php" class="btn btn-hospital">
                            Ver mis turnos
                        </a>

                    </div>
                </div>
            </div>

        </div>
    </section>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
