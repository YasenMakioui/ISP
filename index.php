<?php

session_start();

require_once './src/view/layout/header.php';


$vista = "";

if (isset($_GET['vista'])) {
    $vista = $_GET['vista'];    
}

require_once './src/view/'.$vista;




require_once './src/view/layout/footer.php';

?>