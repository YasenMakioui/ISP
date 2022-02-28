<?php
session_start();

require_once '../../../class/Conection.php';
//instanciamos el objecto para la conexion
$db = new Conection();

$conn = $db->getConection();

foreach ($_POST as $key => $value) {
    $sql = "INSERT INTO usuario_servicio VALUES(NULL, {$key}, {$_SESSION['idUsuario']}, NULL, NULL, NULL, 'no')";
    $conn->query($sql);
    
}

header('Location: /?vista=dashboard.php&accion=serviciosContratados');



