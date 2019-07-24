<?php 

//Consulta de Socios Pendientes de confirmar
 $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
 $sqlpen = "SELECT * from usuarios where activo = 1";
 $result=mysqli_query($conexion, $sqlpen);
 $total = mysqli_num_rows($result);
 //$contenido= date("d-m-Y H:i:s");

echo $total;

?>