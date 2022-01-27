<?php

//Datos del Formulario
$dominio = $_POST["dominio"];
$usuario = $_POST["usuario"];
$contraseña = $_POST["contraseña"];

$servername = "localhost";
$username = "david";
$password = "terminal";
$dbname = "Library";

//CREAMOS LA CONEXIÓN
$conn = new mysqli($servername,$username,$password,$dbname);

//COMPROBAMOS LA CONEXIÓN
if ($conn -> connect_error){
    die("Ha habido un error: " . $conn->connect_error);
}

//SENTENCIAS SQL Y LAS LANZAMOS
$sql_database = "CREATE DATABASE $dominio";
$sql_user = "CREATE USER '$usuario'@'localhost' IDENTIFIED WITH mysql_native_password BY '$contraseña'";
$sql_privilegios = "GRANT ALL PRIVILEGES ON '$dominio'.* TO '$usuario'@'localhost' WITH GRANT OPTION";

if ($conn->query($sql_database) === TRUE){
    echo "La base de datos $dominio ha sido creado";
}else{
    echo "Error: " . $sql_database . "<br>" . $conn->error;
}

if ($conn->query($sql_user) === TRUE){
    echo "El usuario $usuario ha sido creado";
}else{
    echo "Error: " . $sql_user . "<br>" . $conn->error;
}

//CERRAMOS LA CONEXIÓN
$conn->close();

//AÑADIR EL USUARIO EN LA PROTECCIÓN DE LA INSTANCIA ((OPCIONAL))
$proteccion = shell_exec('sudo htpasswd /etc/phpmyadmin/.htpasswd $usuario');


?>