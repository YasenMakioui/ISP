<?php
if (!isset($_SESSION['idUsuario'])) {
    header('Location: /?vista=inicio.php');
}

require_once '../../../class/Conection.php';

$db = new Conection();
$conn = $db->getConection();

$datosUsuario = array(
    'nombre' => $_POST['nombre'],
    'apellido1' => $_POST['apellido1'],
    'apellido2' => $_POST['apellido2'],
    'email' => $_POST['email'],
    'nombreUsuario' => $_POST['nombreUsuario'],
    'telefono' => $_POST['dni'],
    'fechaNacimiento' => $_POST['fechaNacimiento'],
    'direccion' => $_POST['direccion'],
    'codigoPostal' => $_POST['codigoPostal'],
    'poblacion' => $_POST['poblacion']
    
);


$sql = "SELECT * FROM usuario WHERE idUsuario = {$_SESSION['idUsuario']}";

$result = $conn->query($sql);

$usuario = $result->fetch_assoc();



if ($_POST['nombre'] == $usuario['nombre']) {
    
}

if ($_POST['nombre'] == $usuario['nombre']) {
    
}

if ($_POST['nombre'] == $usuario['nombre']) {
    
}

if ($_POST['nombre'] == $usuario['nombre']) {
    
}

if ($_POST['nombre'] == $usuario['nombre']) {
    
}

if ($_POST['nombre'] == $usuario['nombre']) {
    
}

if ($_POST['nombre'] == $usuario['nombre']) {
    
}

