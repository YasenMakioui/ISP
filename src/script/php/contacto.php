<?php
//importamos la conexion
require_once '../../class/Conection.php';

$db = new Conection();

$conn = $db->getConection();

//iniciamos variables
$nombre = $apellidos = $telefono = $email = $observaciones = "";


//comprobamos que se envian datos por post
if (isset($_POST['nombre'],$_POST['apellidos'],$_POST['telefono'],$_POST['email'],$_POST['observaciones'])) {
    //comprobamos que no esten vacios los obligatorios
    if (!(empty($_POST['nombre']) or empty($_POST['telefono']) or empty($_POST['email']) or empty($_POST['observaciones']))) {
        //securizamos los datos
        $nombre = htmlspecialchars($_POST['nombre']);
        $apellidos = htmlspecialchars($_POST['apellidos']);
        $telefono = htmlspecialchars($_POST['telefono']);
        $email = htmlspecialchars($_POST['email']);
        $observaciones = htmlspecialchars($_POST['observaciones']);

        //realizamos el insert
        $sql = "INSERT INTO contacto VALUES(NULL, '{$nombre}', '{$apellidos}', '{$telefono}', '{$email}', '{$observaciones}')";

        $result = $conn->query($sql);
        //redirecciones para cada caso
        if (!$result) {
            header("Location: /?vista=contacto.php&code=1");
        } else {
            header("Location: /?vista=contacto.php&code=0");
        }
    } else {
        header("Location: /?vista=contacto.php&code=2");
    }
} else {
    header("Location: /");
}