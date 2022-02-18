<div class="w-100 d-flex" style="height: 100vh !important;">
    <div class="<?= $noSidebar ?>" style="height: 100vh !important;">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-secondary" style="width: 280px; height: 100vh !important;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <i class="bi bi-house fs-3 mx-2"></i>
                <span class="fs-4">Dashboard</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="/?vista=dashboard.php&accion=inicio" class="nav-link <?=$active = $_GET['accion'] == 'inicio' ? 'active' : 'text-white'?>" id="homeBtn">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="/?vista=dashboard.php&accion=resumen" class="nav-link <?=$active = $_GET['accion'] == 'resumen' ? 'active' : 'text-white'?>" id="summaryBtn">

                        Resumen
                    </a>
                </li>
                <li>
                    <a href="/?vista=dashboard.php&accion=servicios" class="nav-link <?=$active = $_GET['accion'] == 'servicios' ? 'active' : 'text-white'?>">

                        Servicios
                    </a>
                </li>
                <li>
                    <a href="/?vista=dashboard.php&accion=dns" class="nav-link text-white">

                        dns
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">

                        apache
                    </a>
                </li>
                <?php //bucle para listar servicios
                ?>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
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
    if (isset($_GET['accion'])) {
        if ($_GET['accion'] == 'resumen') {
            require_once './src/view/resumen.php';
        } elseif ($_GET['accion'] == 'dns') {
            require_once './src/view/dns.php';
        } elseif ($_GET['accion'] == 'servicios') {
            require_once './src/view/serviciosContratados.php';
        } else {
            echo '<h1>INICIO</h1>';
        }
    } else {
        echo '<h1>INICIO</h1>';
    }

    ?>
</div>

<script>
    const home = document.querySelector('#home');
    const dashboard = document.querySelector('#dashboard');
    const dns = document.querySelector('#dns');

    const homeBtn = document.querySelector('#homeBtn');
    const dashboardBtn = document.querySelector('#dashboardBtn');

    homeBtn.addEventListener('click', () => {
        dashboard.classList.add = 'd-none';
        dns.classList.add = 'd-none'
    });

    dashboardBtn.addEventListener('click', () => {
        home.classList.add('d-none');
        dns.classList.add('d-none');
    })
</script>