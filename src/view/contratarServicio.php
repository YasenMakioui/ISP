<div class="container-sm">
    <h1 class="fs-3">Dependiendo del servicio, se autoseleccionaran varios ya que requiren estos para su funcionamiento</h1>
    <div class="row">
        <div class="col d-flex flex-column">
            <h1>Servicios</h1>
            <form action="./src/script/php/service/contratarServicio.php" method="POST">
                <?php

                //inicia arrays con las id y nombres de los servicios
                $idContratados = array();
                $nombreContratados = array();
                
                //recupera las id de los servicios del usuario actual
                $sqlContratados = "SELECT idServicio FROM usuario_servicio WHERE idUsuario = {$_SESSION['idUsuario']}";
                $result = $conn->query($sqlContratados);

                //insertamos las id en el array de ids
                while ($row = $result->fetch_assoc()) {
                    array_push($idContratados, $row['idServicio']);
                }

                //recupera toda la informacion de servicio
                $sqlServicio = "SELECT * FROM servicio";
                $result = $conn->query($sqlServicio);

                //bucle que solo muestra un inputs para servicios que aun no estan contratados
                while ($row = $result->fetch_assoc()) :
                    //si el id del servicio no esta en el array de ids mostramos el input
                    if (!in_array($row['idServicio'], $idContratados)) :

                ?>

                        <div class="d-flex flex-column">
                            <div>
                                <label for="apache" class="fs-3"><?= $row['nombreServicio'] ?></label>
                                <input class="inputItem" type="checkbox" name="<?= $row['idServicio'] ?>" id="<?= $row['nombreServicio'] ?>">
                            </div>


                        </div>


                <?php

                    //en caso contrario metemos el nombre del servicio en el array de nombres
                    else :
                        array_push($nombreContratados, $row['nombreServicio']);
                    endif;
                endwhile;

                ?>
                
                <button class="btn btn-primary" type="submit">Contratar</button>
            </form>
        </div>
        <div class="col d-flex flex-column">
            <h1>Contratados</h1>
            <?php
            //bucle que muestra los servicios contratados
            foreach ($nombreContratados as $value) :
            ?>
                <p><?= $value ?></p>
            <?php
            endforeach;
            ?>
        </div>

    </div>
</div>
<script>




</script>