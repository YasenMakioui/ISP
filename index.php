<?php

session_start();
require_once './src/class/Conection.php';
require_once './src/view/layout/header.php';

$db = new Conection();
$conn = $db->getConection();

if (!$conn) {
    echo "no se conectó";
}


$vista = "";

if (isset($_GET['vista'])) {
    $vista = $_GET['vista'];
    require_once './src/view/' . $vista;
} else {
    require_once './src/view/home.php';
}






require_once './src/view/layout/footer.php';
