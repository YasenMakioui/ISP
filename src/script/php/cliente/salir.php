<?php
//destruimos la session y redirigimos
session_start();
session_destroy();

header('Location: /?vista=inicio.php');