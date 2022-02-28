<div class="w-100 d-flex" style="height: 100vh !important;">
    <div class="<?= $noSidebar ?>" style="height: 100vh !important;">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-secondary" style="width: 280px; height: 100vh !important;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <i class="bi bi-house fs-3 mx-2"></i>
                <span class="fs-4">Dashboard</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <?php
                //array que va a contener los elementos de navegacion
                $lista = array("inicio", "serviciosContratados");

                //recupera los servicios de la base de datos
                $sql = "SELECT servicio.nombreServicio FROM usuario_servicio INNER JOIN servicio ON servicio.idServicio = usuario_servicio.idServicio WHERE idUsuario = '{$_SESSION['idUsuario']}'";
                $result = $conn->query($sql);

                //bucle para insertar los servicios en la lista
                while ($row = $result->fetch_assoc()){
                    array_push($lista, $row['nombreServicio']);
                }

                //bucle que pinta los elementos de navegacion usando la informacion de la base de datos
                foreach ($lista as $value):
?>
                <li>
                    <a href="<?="/?vista=dashboard.php&accion=".$value?>" class="nav-link text-white">
                        <?=$value?>
                    </a>
                </li>
                <?php
                endforeach;
                ?>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <?php //print_r($lista)?>
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="/?vista=inicio.php">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php
    //condicion: recoge la variable de GET para requerir el archivo usando la lista anterior
    if (isset($_GET['accion'])) {
        foreach ($lista as $value) {
            if ($value == $_GET["accion"]) {
                require_once './src/view/dashboard/' . $value . '.php';
            }
        }
    } else {
        require_once './src/view/dashboard/inicio.php';
    }




    ?>
</div>