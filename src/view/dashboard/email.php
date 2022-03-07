<div class="w-100 d-flex justify-content-center align-items-center" id="email">
    <?php
    //seleccionamos el nombre de dominio y el estado

    $sql = "SELECT status,nombreDominio, nombreUsuario FROM usuario_servicio WHERE idUsuario = {$_SESSION['idUsuario']} AND idServicio =".
        "(SELECT idServicio FROM servicio WHERE nombreServicio = 'email')";
        $result = $conn->query($sql)->fetch_assoc();

    //si el status es no, el usuario aun no ha realizado la configuracion inicial,
    //incluimos la vista de inicializacion

    if ($result['status'] == "no"):
            require_once './src/view/dashboard/setups/email.php';
        else:
    //en caso contrario mostramos su nombre de dominio y su nombre de usuario
    ?>
            <h1>Su dominio de mail es: <?=$result['nombreDominio']?></h1>
    <?php endif;?>

   </div>
