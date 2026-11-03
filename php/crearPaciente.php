<?php
include ("./conexion.php");

$obraSocial = $con->query("SELECT * FROM obra_social");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Paciente</title>
</head>
<body>
    <h1>Crear Paciente</h1>
    <section class="formulario">
        <form action="./registroPaciente.php" method="POST" enctype="multipart/form-data">

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

            <label>Fecha de nacimiento:</label>
            <input type="date" name="fecha_nacimiento" required> <br> <br>

            <label>Telefono:</label>
            <input type="number" name="telefono" required> <br> <br>

            <label>Obra social:</label>
            <select name="id_obra_social" required>
                <?php
                while($o = $obraSocial->fetch_assoc()){
                ?>

                <option value="<?php echo $o['id']; ?>">
                    <?php echo $o['nombre']; ?>
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