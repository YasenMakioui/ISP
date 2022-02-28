<?php

session_start();

require_once '../../../class/Conection.php';
//instanciamos el objecto para la conexion
$db = new Conection();

$conn = $db->getConection();

//borramos usando la id del servicio recogida por GET
$sql = "DELETE FROM usuario_servicio WHERE idUsuario = {$_SESSION['idUsuario']} and idServicio = {$_GET['servicio']}";


$conn->query($sql);

header('Location: /?vista=dashboard.php&accion=serviciosContratados');
