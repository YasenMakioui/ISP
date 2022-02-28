<div class="w-100" id="dns">
    <div class="w-100 p-3 text-center">
        <h1>SERVICIOS</h1>
        <div class="d-flex justify-content-end">
            <a href="/?vista=contratarServicio.php" class="btn btn-primary">Añadir servicio</a>
        </div>

    </div>
    <div class="p-3">
        <table class="table table-bordered">
            <thead>

                
                <th scope="col">Servicio</th>
                <th scope="col">Estado</th>
                <th scope="col">Baja</th>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT usuario_servicio.idServicio, usuario_servicio.status, servicio.nombreServicio FROM usuario_servicio INNER JOIN servicio USING(idServicio) ";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) :
                ?>
                    <tr>
                        
                        <td><?= $row['nombreServicio'] ?></td>
                        <td><?=$status = $row['status'] == "no" ? "<i class='bi bi-broadcast text-danger p-2 fs-4'></i>pendiente": "<i class='p-2 bi bi-broadcast text-success fs-4'></i>activo"?></td>
                        <th scope="col">

                            <a href="./src/script/php/service/bajaServicio.php?servicio=<?=$row['idServicio']?>" class="btn btn-danger">BAJA</a>

                        </th>
                    </tr>
                <?php
                endwhile;
                ?>
                
            </tbody>
        </table>
    </div>

</div>