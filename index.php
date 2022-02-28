<?php
//comienza la session
session_start();

//incluimos la clase de la base de datos
require_once './src/class/Conection.php';

//instancia y realiza la conexion
$db = new Conection();
$conn = $db->getConection();

//encabezado de la pagina
require_once './src/view/layout/header.php';


//validacion de la conexion
if (!$conn) {
    echo "no se conectó";
}

//inizializamos vista
$vista = "";


//requerimos la vista mediante GET
if (isset($_GET['vista'])) {
    $vista = $_GET['vista'];
    require_once './src/view/' . $vista;
} else {
    require_once './src/view/inicio.php';
}





//incluimos el footer

require_once './src/view/layout/footer.php';
