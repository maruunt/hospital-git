<?php
$mail = $_REQUEST ["mail"];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); //hash

$insertar = "INSERT INTO administrador (mail, contrasena, id_tipo_usuario) VALUES ('$mail', '$contrasena', 4)";

$conexion=new mysqli('localhost', 'root', '', 'hospital');
//ejecutar consulta
$conexion->query($insertar); 

?>