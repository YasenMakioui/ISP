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

                <th scope="col">
                    <input type="checkbox" name="" id="">
                    Type
                </th>
                <th scope="col">Servicio</th>
                <th scope="col">Dominio</th>
                <th scope="col">Acción</th>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT usuario_servicio.idServicio, servicio.nombreServicio FROM usuario_servicio INNER JOIN servicio USING(idServicio) ";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) :
                ?>
                    <tr>
                        <th scope="row"><?= $row['idServicio'] ?></th>
                        <td><?= $row['nombreServicio'] ?></td>
                        <td><?= $row['nombreServicio'] ?></td>
                        <th scope="col">
                            <a href="">
                                <a href="" class="btn btn-danger">BAJA</a>
                            </a>
                        </th>
                    </tr>
                <?php
                endwhile;
                ?>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <th scope="col">
                    <a href="" class="btn btn-danger">BAJA</a>
                </th>
            </tbody>
        </table>
    </div>

</div>