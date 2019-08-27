<?php


session_start();
unset ($SESSION['login1']);
unset ($SESSION['start']);
unset ($SESSION['expire']);
unset ($SESSION['rol1']);
unset ($SESSION['activo']);
unset ($SESSION['id_usuario']);
session_destroy();




$host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = '../home.php';
    header("Location: http://$host$uri/$extra");
    exit;





?>