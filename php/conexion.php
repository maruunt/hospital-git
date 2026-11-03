<?php

$con = new mysqli("localhost", "root", "", "hospital");
//Comprobar si tiene un error
if ($con->connect_error) {
    //Informa cual fue el error
    die("Connection failed: " . $con->connect_error);
}

?>