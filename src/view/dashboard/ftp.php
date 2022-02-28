<div class="w-100 d-flex justify-content-center align-items-center"  id="ftp">
    <?php


    $sql = "SELECT status,nombreUsuario FROM usuario_servicio WHERE idUsuario = {$_SESSION['idUsuario']} AND idServicio =" .
        "(SELECT idServicio FROM servicio WHERE nombreServicio = 'ftp')";
    $result = $conn->query($sql)->fetch_assoc();
    if ($result['status'] == "no") :
        require_once './src/view/dashboard/setups/ftp.php';
    else :
    ?>

    <h1>Su usuario FTP es: <?=$result['nombreUsuario']?> y esta activo!!</h1>


<?php endif; ?>