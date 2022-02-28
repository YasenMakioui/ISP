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


    $sql = "DELETE FROM usuario WHERE idUsuario = {$_SESSION['idUsuario']}";


    $result = $conn->query($sql);

    if (!$result) {
        header('Location: /?vista=perfil.php&obligatorio=1');
        die();
    }

    session_destroy();

    header('Location: /?vista=inicio.php');




