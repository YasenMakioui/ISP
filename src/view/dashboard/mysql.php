<div class="w-100" id="dns">
    <?php
    function numeroDeBasesDeDatos($db, $user)
    {
        $cantidad = 0;
        $connByUser = $db->getConectionByUser($user);
        if ($connByUser) {
            $numero = $connByUser->query("SHOW DATABASES;");
            while ($numeroBd = $numero->fetch_assoc()) {
                $cantidad++;
            }
        }

        return $cantidad;
    }


    $sql = "SELECT status,nombreUsuario FROM usuario_servicio WHERE idUsuario = {$_SESSION['idUsuario']} AND idServicio =" .
        "(SELECT idServicio FROM servicio WHERE nombreServicio = 'mysql')";
    $result = $conn->query($sql)->fetch_assoc();
    if ($result['status'] == "no") :
        require_once './src/view/dashboard/setups/mysql.php';
    else :

    ?>


        <div class="p-5">
            <div class="d-flex justify-content-end p-1">
                <a href="#" class="btn btn-primary">Añadir usuario</a>
            </div>
            <table class="table table-bordered">
                <thead>


                    <th scope="col">Usuario</th>
                    <th scope="col">Numero de bases de datos</th>
                    <th scope="col">Fecha de creación</th>
                    <th scope="col"></th>
                </thead>
                <tbody>

                    <td><?= $result['nombreUsuario'] ?></td>
                    <td><?= numeroDeBasesDeDatos($db, $result['nombreUsuario']) ?></td>
                    <td>2001-10-10</td>
                    <th scope="col">
                        <a href="">
                            <i class="bi bi-trash"></i>
                        </a>
                    </th>
                </tbody>
            </table>
        </div>

</div>
<?php endif; ?>