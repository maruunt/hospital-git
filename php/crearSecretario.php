<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Secretario</title>
</head>
<body>
    <h1>Crear Secretario</h1>
    <section class="formulario">
        <form action="./registroSecretario.php" method="POST" enctype="multipart/form-data">

            <label>Mail:</label>
            <input type="email" name="mail" require> <br> <br>

            <label>Contraseña:</label>
            <input type="password" name="contrasena" require> <br> <br>

            <input type="submit" value="Guardar">

        </form>
    </section>
</body>
</html>