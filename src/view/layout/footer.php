<?php
/**
 * @author Younes Boudouch
 */

//lugares en el que no queremos que se muestre el pie de pagina
if (isset($_GET['vista'])) {
$noFooter = $_GET['vista'] === 'login.php' || $_GET['vista'] === 'alta.php' || $_GET['vista'] === 'dashboard.php' ? 'd-none' : '';
}

?>
</div>    
<div class="footer w-100 d-flex flex-column justify-content-end <?=$noFooter?>">
    <footer class="text-center">
        <span class="text-white">klk soy el footer</span>
    </footer>
</div>
</body>
</html>