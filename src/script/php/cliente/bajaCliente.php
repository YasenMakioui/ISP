<?php

/**
 * @author Younes Boudouch
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

if (password_verify($_POST['password'], $hash)) {
    $sql = "DELETE FROM usuario WHERE idUsuario = {$_SESSION['idUsuario']}";


    $result = $conn->query($sql);

    if (!$result) {
        header('Location: /?vista=perfil.php&obligatorio=1');
    }

    header('Location: /?vista=inicio.php');
} else {
    header('Location: /?vista=perfil.php&obligatorio=0');
}



