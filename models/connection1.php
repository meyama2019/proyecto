<?php
	
	 @$conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
	 if(!$conexion) 
	 {
	 	 @header("Location:http://localhost/proyecto/asociacion/errorconexion.php");
	 }
	 else
	 {
	 	$acentos="SET NAMES 'utf8'";
     	mysqli_query($conexion, $acentos);
	 }
     
     


?>