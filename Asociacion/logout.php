<?php

// Controlador de desconexión de sesión

session_start();
unset ($SESSION['login1']);
unset ($SESSION['start']);
unset ($SESSION['expire']);
unset ($SESSION['rol1']);
session_destroy();




//header('Location: http://localhost/Login/login.html');
$host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    //$uri   = '/proyecto';
    $extra = '../home.php';
    header("Location: http://$host$uri/$extra");
    exit;





?>