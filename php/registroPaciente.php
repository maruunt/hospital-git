<?php
$dni = $_REQUEST ["dni"];
$nombre = $_REQUEST["nombre"];
$apellido = $_REQUEST["apellido"];
$mail = $_REQUEST ["mail"];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); //este es el super hash
$fecha_nacimiento = $_REQUEST ["fecha_nacimiento"];
$telefono = $_REQUEST ["telefono"];
$obrasocial = $_REQUEST ["id_obra_social"];

$insertar = "INSERT INTO paciente (dni, nombre, apellido, mail, contrasena, fecha_nacimiento, telefono, id_tipo_usuario, id_obra_social) VALUE ($dni, '$nombre', '$apellido', '$mail', '$contrasena', '$fecha_nacimiento', $telefono, 1, $obrasocial)";

$conexion=new mysqli('localhost', 'root', '', 'hospital');
//ejecutar consulta
$conexion->query($insertar); 

?>