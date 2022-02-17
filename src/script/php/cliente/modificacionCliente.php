<?php

/**
 * @author Yasen Makioui
 */

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
//password hasheado de sql

$nuevaPasswordHash;
$nuevaPassword = $_POST['newPassword'] && !empty($_POST['newPassword'])?  $nuevaPasswordHash = password_hash($_POST['newPassword'], PASSWORD_BCRYPT): $nuevaPassword = "";
$nuevaPasswordSet = $_POST['newPassword'] ? "password='{$nuevaPasswordHash}', " : "";
//password verify -> password via post y el hash de sql 
if (password_verify($_POST['password'], $hash)) {
    $sql = "UPDATE usuario SET nombre='{$_POST['nombre']}', " .
        "apellido1='{$_POST['apellido1']}', " .
        "apellido2='{$_POST['apellido2']}', " .
        "dni='{$_POST['dni']}', " .
        $nuevaPasswordSet .
        "correo='{$_POST['email']}', " .
        "nombreUsuario='{$_POST['nombreUsuario']}', " .
        "telefono='{$_POST['telefono']}', " .
        "fechaNacimiento='{$_POST['fechaNacimiento']}', " .
        "direccion='{$_POST['direccion']}', " .
        "codigoPostal='{$_POST['codigoPostal']}', " .
        "idCiudad={$_POST['poblacion']} WHERE idUsuario = {$_SESSION['idUsuario']};";


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