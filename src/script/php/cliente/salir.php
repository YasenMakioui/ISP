<?php

session_start();
session_destroy();

header('Location: /?vista=inicio.php');