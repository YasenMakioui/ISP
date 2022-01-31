<?php
/**
 * @author Younes Boudouch
 */
if (isset($_GET['vista'])) {
$noFooter = $_GET['vista'] === 'login.php' || $_GET['vista'] === 'alta.php' ? 'd-none' : '';
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