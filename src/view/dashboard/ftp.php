<div class="w-100 d-flex justify-content-center align-items-center"  id="ftp">
    <?php

    //seleccionamos el nombre de usuario y el estado
    $sql = "SELECT status,nombreUsuario FROM usuario_servicio WHERE idUsuario = {$_SESSION['idUsuario']} AND idServicio =" .
        "(SELECT idServicio FROM servicio WHERE nombreServicio = 'ftp')";
    $result = $conn->query($sql)->fetch_assoc();

    //si el status es no, el usuario aun no ha realizado la configuracion inicial,
    //incluimos la vista de inicializacion

    if ($result['status'] == "no") :
        require_once './src/view/dashboard/setups/ftp.php';
    else :

    //en caso contrario mostramos su nombre de usuario
    ?>

    <h1>Su usuario FTP es: <?=$result['nombreUsuario']?></h1>


<?php endif; ?>