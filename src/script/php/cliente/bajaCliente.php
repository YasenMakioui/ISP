<?php

/**
 * @author Younes Boudouch
 */

session_start();
//comprobamos que el usuario este loggeado
if (!isset($_SESSION['idUsuario'])) {
    header('Location: /?vista=inicio.php');
}


require_once '../../../class/Conection.php';


$db = new Conection();
$conn = $db->getConection();


//realizamos el delete
    $sql = "DELETE FROM usuario WHERE idUsuario = {$_SESSION['idUsuario']}";


    $result = $conn->query($sql);

    //si va mal redirigimos con una varible y matamos el proceso
    if (!$result) {
        header('Location: /?vista=perfil.php&obligatorio=1');
        die();
    }

    //destruimos la session ya que el usuario ha sido eliminado y redirigimos
    session_destroy();

    header('Location: /?vista=inicio.php');




