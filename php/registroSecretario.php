<?php
$mail = $_REQUEST ["mail"];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); //hash

$insertar = "INSERT INTO secretario (mail, contrasena, id_tipo_usuario) VALUES ('$mail', '$contrasena', 2)";

$conexion=new mysqli('localhost', 'root', '', 'hospital');
//ejecutar consulta
$conexion->query($insertar); 

?>