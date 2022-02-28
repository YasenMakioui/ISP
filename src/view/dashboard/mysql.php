<div class="w-100" id="mysql">
    <?php

    function numeroDeBasesDeDatos($db, $user)
    {
        //iniciamos la variable
        $cantidad = 0;

        //conexion mediante el nombre de usuario actual
        $connByUser = $db->getConectionByUser($user);

        //si la conexion es exitosa realizamos un show databases y un bucle para contar
        if ($connByUser) {
            $numero = $connByUser->query("SHOW DATABASES;");
            while ($numeroBd = $numero->fetch_assoc()) {
                $cantidad++;
            }
        }
//devuelve la cantidad de bases de datos que tiene el usuario
        return $cantidad;
    }

    ////seleccionamos el nombre de usuario y el estado

    $sql = "SELECT status,nombreUsuario FROM usuario_servicio WHERE idUsuario = {$_SESSION['idUsuario']} AND idServicio =" .
        "(SELECT idServicio FROM servicio WHERE nombreServicio = 'mysql')";
    $result = $conn->query($sql)->fetch_assoc();
    //si el status es no, el usuario aun no ha realizado la configuracion inicial,
    //incluimos la vista de inicializacion
    if ($result['status'] == "no") :
        require_once './src/view/dashboard/setups/mysql.php';
    else :

    //en caso contrario mostramos una tabla con la informacion recuperada anteriormente

    ?>


        <div class="p-5">

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