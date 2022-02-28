<?php

session_start();

require_once '../../../../class/Conection.php';
//instanciamos el objecto para la conexion
$db = new Conection();

$conn = $db->getConection();

$sql = "UPDATE usuario_servicio SET status='yes', nombreUsuario='{$_POST['usuario']}', password = '{$_POST['password']}',nombreDominio = '{$_POST['dominio']}' WHERE idUsuario = {$_SESSION['idUsuario']} AND idServicio =".
"(SELECT idServicio FROM servicio WHERE nombreServicio = 'email')";


$conn->query($sql);
//shell_exec("");
header('Location: /?vista=dashboard.php&accion=email');