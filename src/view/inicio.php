<div class="container px-4 px-lg-5">
    <!-- Heading Row-->
    <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-7 d-flex justify-content-center"><img class="img-fluid rounded mb-4 mb-lg-0" src="/src/assets/img/logo.jpg" alt="..." /></div>
        <div class="col-lg-5">
            <h1 class="font-weight-light">El ISP mas sencillo</h1>
            <p>Nuestra pagina ofrece la creación y monitorización de servicios. Si has tenido un largo dia configurando serviciós en otro ISP aqui no sera igual!</p>
            <a class="btn btn-secondary" href="?vista=alta.php">Empezar!</a>
        </div>
    </div>
    <!-- Call to Action-->
    <div class="card text-white bg-myFirstColor my-5 py-4 text-center">
        <div class="card-body">
            <p class="m-0 text-center fs-3 text-dark" >Entre la multitud de serviciós que ofrecemos se encuentran los siguientes</p>
        </div>
    </div>
    <!-- Content Row-->
    <div class="row gx-4 gx-lg-5">
        <?php

        $sql = "SELECT * FROM informacionServicios WHERE titulo = 'apache' or titulo = 'dns' or titulo = 'email'";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()):
        ?>
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title"><?=$row['titulo']?></h2>
                        <p class="card-text"><?=$row['contenido']?></p>
                    </div>
                    <div class="card-footer"><a class="btn btn-secondary btn-sm" href="<?=$row['url']?>">Mas Info</a></div>
                </div>
            </div>
        <?php

           endwhile;
        ?>

    </div>
</div>