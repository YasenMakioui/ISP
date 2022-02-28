<?php

/**
 * @author Yasen Makioui
 */

session_start();

//comprobamos si esta loggeado, si no lo esta redirigimos
if (!isset($_SESSION['idUsuario'])) {
    header('Location: /?vista=inicio.php');
}

//realizamos la conexion

require_once '../../../class/Conection.php';

$db = new Conection();
$conn = $db->getConection();

//recuperamos la contraseña de la base de datos
$password = $conn
    ->query("SELECT password from usuario WHERE idUsuario = {$_SESSION['idUsuario']}")
    ->fetch_all();

//recuperamos la contraseña del array bidimensional
$hash = $password[0][0];

//variable para guardar la nueva contraseña en caso de haberla
$nuevaPasswordHash;

//ternaria, asigna una nueva contraseña si esta ha sido rellenada, en caso contrario asignamos un string vacio
$nuevaPassword = $_POST['newPassword'] && !empty($_POST['newPassword'])?  $nuevaPasswordHash = password_hash($_POST['newPassword'], PASSWORD_BCRYPT): $nuevaPassword = "";
$nuevaPasswordSet = $_POST['newPassword'] ? "password='{$nuevaPasswordHash}', " : "";
//si coincide la contraseña realizamos el update de los valores
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


    //tratamiento de errores y redirecciones
    if (!$result) {
        header('Location: /?vista=perfil.php&obligatorio=1');
    }

    header('Location: /?vista=perfil.php&obligatorio=0');
} else {
    header('Location: /?vista=perfil.php&obligatorio=2');
}


