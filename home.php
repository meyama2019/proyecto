<?php
  //require_once('models/connection.php');
  include('Asociacion/index.php');
  $self = $_SERVER['PHP_SELF']; //Obtenemos la página en la que nos encontramos
  header("refresh:2; url=$self"); //Refrescamos cada 300 segundos
 

?>