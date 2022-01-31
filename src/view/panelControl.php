<?php

if (!isset($_SESSION['user'])) {
    header('Location: /?vista=home.php');
}

?>