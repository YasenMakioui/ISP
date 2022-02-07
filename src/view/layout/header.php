<?php

/**
 * @author Yasen El Makioui, Younes Boudouch
 */
if (isset($_GET['vista'])) {
    $noHeader = $_GET['vista'] === 'login.php' || $_GET['vista'] === 'alta.php'? 'd-none' : '';
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
    <title>Document</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5 <?= $noHeader ?>">
            <div class="container-fluid"></div>
            <a class="navbar-brand" href="">

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="d-flex justify-content-between" style="width: 100% !important;">
                    <div class="d-flex ">
                        <a class="nav-link" href="?vista=inicio.php">Home</a>
                        <a class="nav-link" href="?vista=servicios.php">Services</a>
                        <a class="nav-link" href="?vista=contacto.php">Contact</a>
                        <a class="nav-link" href="?vista=mas.php">More</a>
                    </div>
                    <?php if (!isset($_SESSION['user'])) : ?>
                        <div class="buttons "></div>
                        <a class="btn btn-primary" href="?vista=login.php">Login</a>
                        <a class="btn btn-primary" href="?vista=alta.php">Signup</a>
                </div>
            <?php else : ?>
                <div>
                    <div class="btn-group">
                        <button class="btn btn-secondary btn-md dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['user']['nombre'] ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="./src/script/php/cliente/salir.php">Salir</a></li>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
            </div>
    </div>
    </div>
    </nav>