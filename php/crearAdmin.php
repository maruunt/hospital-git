<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Administrador</title>
</head>
<body>
    <h1>Crear Administrador</h1>
    <section class="formulario">
        <form action="./registroAdmin.php" method="POST" enctype="multipart/form-data">

            <label>Mail:</label>
            <input type="email" name="mail" required> <br> <br>

            <label>Contraseña:</label>
            <input type="password" name="contrasena" required> <br> <br>

            <input type="submit" value="Guardar">

        </form>
    </section>
</body>
</html>