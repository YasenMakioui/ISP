<?php

/**
 * @author Yasen El Makioui, Younes Boudouch
 */

//lugares en los que no queremos que se muestre el encabezado
if (isset($_GET['vista'])) {
    $noHeader = $_GET['vista'] === 'login.php' || $_GET['vista'] === 'alta.php' || $_GET['vista']==='dashboard.php'? 'd-none' : '';
}

//si el usuario esta logueado recuperamos su nombre y lo guardamos en la variable
if (isset($_SESSION['idUsuario'])) {
    $sql = "SELECT nombre FROM usuario WHERE idUsuario = {$_SESSION['idUsuario']}";

    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    $userName = $row['nombre'];
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <script src="/src/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="/src/assets/css/styles.css">
    <link rel="stylesheet" href="/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <title>ISP</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-secondary mb-5  <?= $noHeader ?>">
            <div class="container-fluid "></div>
            <a class="navbar-brand" href="">

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="d-flex justify-content-start" style="width: 100% !important;">
                    <div class="d-flex ">
                        <a class="nav-link text-white" href="?vista=inicio.php">Inicio</a>
                        <a class="nav-link text-white" href="?vista=servicios.php">Servicios</a>
                        <a class="nav-link text-white" href="?vista=contacto.php">Contacto</a>

                    </div>
                    <?php if (!isset($_SESSION['idUsuario'])) : //muestra login y signup si el usuario no esta loggeado?>
                        <div class="buttons "></div>
                        <a class="mx-2 btn text-white border-bottom" href="?vista=login.php">Login</a>
                        <a class="btn  mx-2 text-white border-bottom" href="?vista=alta.php">Signup</a>
                </div>
            <?php else : //si esta logueado mostramos lo siguiente?>
                <div>
                    <div class="btn-group">
                        <button class="btn btn-secondary btn-md dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?=$userName //mostramos el nombre de usuario?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/?vista=perfil.php">Mi perfil</a></li>
                            <li><a class="dropdown-item" href="/?vista=dashboard.php">Dashboard</a></li>
                            <li><a class="dropdown-item" href="./src/script/php/cliente/salir.php">Salir</a></li>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
            </div>
    </div>
    </div>
    </nav>