<div class="w-100 d-flex justify-content-center align-items-center" id="dns">
    <?php
        $sql = "SELECT status,nombreDominio FROM usuario_servicio WHERE idUsuario = {$_SESSION['idUsuario']} AND idServicio =".
            "(SELECT idServicio FROM servicio WHERE nombreServicio = 'wordpress')";
        $result = $conn->query($sql)->fetch_assoc();
        if ($result['status'] == "no"):
            require_once './src/view/dashboard/setups/wordpress.php';
        else:

            ?>
        <h1>Su dominio de wordpress es: <?=$result['nombreDominio']?></h1>
        <?php endif;?>