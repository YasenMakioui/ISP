<?php

session_start();

if (!isset($_SESSION['idUsuario'])) {
    header('Location: /?vista=inicio.php');
}

require_once '../../../class/Conection.php';

$db = new Conection();
$conn = $db->getConection();

$password = $conn
    ->query("SELECT password from usuario WHERE idUsuario = {$_SESSION['idUsuario']}")
    ->fetch_all();

$hash = $password[0][0];

if (password_verify($_POST['password'], $hash)) {
    //$conn = NULL;
    //$conn = $db->getConection();



    $sql = "UPDATE usuario SET nombre='{$_POST['nombre']}', " .
        "apellido1='{$_POST['apellido1']}', " .
        "apellido2='{$_POST['apellido2']}', " .
        "correo='{$_POST['email']}', " .
        "nombreUsuario='{$_POST['nombreUsuario']}', " .
        "telefono='{$_POST['telefono']}', " .
        "fechaNacimiento='{$_POST['fechaNacimiento']}', " .
        "direccion='{$_POST['direccion']}', " .
        "codigoPostal='{$_POST['codigoPostal']}', " .
        "idCiudad=NULL WHERE idUsuario = {$_SESSION['idUsuario']};";


    $result = $conn->query($sql);



    if (!$result) {
        header('Location: /?vista=perfil.php&obligatorio=1');
    }

    header('Location: /?vista=perfil.php&obligatorio=0');
} else {
    header('Location: /?vista=perfil.php&obligatorio=2');
}

//if (password_verify($_POST['password'], $password)) {
   
//}
