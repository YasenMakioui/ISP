<?php

$nombre;
$apellido1;
$apellido2;
$nombreUsuario;
$password;
$email;
$telefono;
$dni;
$fechaNacimiento;
$direccion;
$codiPostal;
$poblacion;
$pais;

if (
    isset($_POST['nombre']) and
    isset($_POST['apellido1']) and
    isset($_POST['nombreUsuario']) and
    isset($_POST['password']) and
    isset($_POST['email']) and
    isset($_POST['telefono']) and
    isset($_POST['dni'])

) {

    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $nombreUsuario = $_POST['nombreUsuario'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $dni = $_POST['dni'];
} 




/*
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$nombreUsuario = $_POST['nombreUsuario'];
$password = $_POST['password'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$dni = $_POST['dni'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$direccion = $_POST['direccion'];
$codiPostal = $_POST['codiPostal'];
$poblacion = $_POST['poblacion'];
$pais = $_POST['pais'];

*/
