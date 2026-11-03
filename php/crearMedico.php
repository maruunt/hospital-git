<?php
include ("./conexion.php");

$especialidades = $con->query("SELECT * FROM especialidad");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Médico</title>
</head>
<body>
    <h1>Crear Médico</h1>
    <section class="formulario">
        <form action="./registroMedico.php" method="POST" enctype="multipart/form-data">

            <label>DNI:</label>
            <input type="text" name="dni" required> <br> <br>

            <label>Nombre</label>
            <input type="text" name="nombre" required> <br> <br>

            <Label>Apellido:</Label>
            <input type="text" name="apellido" required> <br> <br>
            
            <label>Mail:</label>
            <input type="email" name="mail" required> <br> <br>

            <label>Contraseña:</label>
            <input type="password" name="contrasena" required> <br> <br>

            <label>Especialidad:</label>
            <select name="especialidad" required>
                <?php
                while($e = $especialidades->fetch_assoc()){
                ?>

                <option value="<?php echo $e['id']; ?>">
                    <?php echo $e['nombre']; ?>
                </option>

                <?php
                }
                ?>
            </select> <br> <br>

            <input type="submit" value="Guardar">

        </form>
    </section>
</body>
</html>