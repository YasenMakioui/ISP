<?php

//recuperamos el numero de servicios que tiene el usuario
$sql = "SELECT COUNT(idServicio) AS numeroDeServiciosContratados FROM usuario_servicio WHERE idUsuario = '{$_SESSION['idUsuario']}'";
$result = $conn->query($sql)->fetch_assoc();
//mostramos los resultados en el html
?>
<div class="w-100 d-flex flex-column justify-content-center align-items-center">
    <h1>Bienvenido al panel de control</h1>
    <span class="fs-3 mt-5">Numero de servicios: <?=$result['numeroDeServiciosContratados']?></span>
    <a href="/?vista=dashboard.php&accion=serviciosContratados" class="btn btn-primary mt-5">Servicios</a>

</div>