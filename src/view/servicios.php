<div class="container-sm">
    <div class="text-center w-100">
        <h1>Nuestros servicios</h1>
    </div>

    <div class="row gx-4 gx-lg-5 mt-5">
    <?php
    //creamos sentencia para recuperar la informacion de los servicios
    $sql = "SELECT * FROM informacionServicios";

    $result = $conn->query($sql);

    //bucle para imprimir cada servicio
    while ($row = $result->fetch_assoc()):

    ?>
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="card-title"><?=$row['titulo']?></h2>
                    <p class="card-text"><?=$row['contenido']?></p>
                </div>
                <div class="card-footer"><a class="btn btn-secondary btn-sm" href="<?=$row['url']?>" target="_blank">Mas Info</a></div>
            </div>
        </div>

    <?php

    endwhile;

    ?>
    </div>
</div>