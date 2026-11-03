<?php
$dni = $_REQUEST ["dni"];
$nombre = $_REQUEST["nombre"];
$apellido = $_REQUEST["apellido"];
$mail = $_REQUEST ["mail"];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); //este es el super hash
$especialidad = $_REQUEST ["especialidad"];

$insertar = "INSERT INTO medico (dni, nombre, apellido, mail, contrasena, especialidad, id_tipo_usuario) VALUES ($dni, '$nombre', '$apellido', '$mail', '$contrasena', $especialidad, 3)";

$conexion=new mysqli('localhost', 'root', '', 'hospital');
//ejecutar consulta
$conexion->query($insertar); 
?>