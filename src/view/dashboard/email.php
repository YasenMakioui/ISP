<div class="w-100" id="dns">
    <?php
        $sql = "SELECT status,nombreDominio FROM usuario_servicio WHERE idUsuario = {$_SESSION['idUsuario']} AND idServicio =".
        "(SELECT idServicio FROM servicio WHERE nombreServicio = 'email')";
        $result = $conn->query($sql)->fetch_assoc();
        if ($result['status'] == "no"):
            require_once './src/view/dashboard/setups/email.php';
        else:
            
    ?>
       xd
    <?php endif;?>