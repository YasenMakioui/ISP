<div class="w-100" id="dns">
    <?php


    $sql = "SELECT status,nombreUsuario FROM usuario_servicio WHERE idUsuario = {$_SESSION['idUsuario']} AND idServicio =" .
        "(SELECT idServicio FROM servicio WHERE nombreServicio = 'ftp')";
    $result = $conn->query($sql)->fetch_assoc();
    if ($result['status'] == "no") :
        require_once './src/view/dashboard/setups/ftp.php';
    else :
        echo $result['nombreUsuario'];
    ?>



<?php endif; ?>