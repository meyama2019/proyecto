<?php

/*
05.07.2019
$_SESSION['login1']  <-- contiene campo usuario de tabla usuarios
$_SESSION['start']  <-- contiene tipo fecha y hora de inicio de sesión
$_SESSION['expire'] <-- contiene tipo fecha y hora de fin sesión
$_SESSION['rol1']    <-- contiene Rol_id de tabla usuario para controlar qué se muestra según el tipo de usuario
$_SESSION['activo'] <-- Contiene el estado del socio, activo, pendiente confirmacion



*********** ESTADOS DEL SOCIO / USUARIO campo activo tabla usuarios.

0	ACTIVO
1	PENDIENTE APROBACION	
2	BAJA PROVISIONAL
3	BAJA DEFINITIVA


*/


/* *********** ESTADOS DEL SOCIO / USUARIO campo Rol_id tabla usuarios.

1	Usuario Registrado
2	SOCIO
95 	Administrador


*/


/* *********** ESTADOS campo activo TABLA CONTACTO.

0 - Leido
1 - Pendiente leer 



?>


/* USUARIOS */

usuario admin
contraseña mojitos2019
email admin@marte.com

usuario socio
contraseña cervecitas2019
email socio1@marte.com

usuario registrado
contraseña verano2019
email registrado@marte.comr

