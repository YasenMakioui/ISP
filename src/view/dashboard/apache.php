<div class="w-100 d-flex justify-content-center align-items-center" id="apache">
    <?php

    //seleccionamos el nombre de dominio y el estado
    $sql = "SELECT status,nombreDominio FROM usuario_servicio WHERE idUsuario = {$_SESSION['idUsuario']} AND idServicio =".
        "(SELECT idServicio FROM servicio WHERE nombreServicio = 'apache')";
    $result = $conn->query($sql)->fetch_assoc();

    //si el status es no, el usuario aun no ha realizado la configuracion inicial,
    //incluimos la vista de inicializacion
    if ($result['status'] == "no"):
        require_once './src/view/dashboard/setups/apache.php';
    else:
    //en caso contrario mostramos su nombre de dominio
    ?>
    <h1>Su host virtual es: <?=$result['nombreDominio']?></h1>
<?php endif;?>