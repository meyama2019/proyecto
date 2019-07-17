<?php
session_start();
//define('RAIZ', $_SERVER['DOCUMENT_ROOT']. '/proyecto/'); 
//include(RAIZ . 'asociacion/header.php');
include ('../includes/header.php');
include('../models/connection.php');


     $listaUsuarios = array(
   array('idRol' => '','Nombre' => '')
    );
    $db=Db::getConnect();

      $num_rows=$db->query('SELECT * FROM rolusuario '); // 1 Pendientes aprobación
      $tot=0;
      foreach ($num_rows->fetchAll() as $contacto) {
               $tot=$tot+1;
               }
      //$_SESSION['tot_con'] = $tot;


    require_once('menu.php');
   
  
  if (!isset($_SESSION['rol1']))
  {

    echo('<div class="container"><div class="alert alert-danger" role="alert">
              Hay que estar registrado para poder visualizar este contenido, Ve a Home y regístrate
            </div></div>');
    //header("Location: http://localhost/proyecto/home.php");
    exit;
  }

 
?>  


      
<?php
 require_once('vmtoroles.php');
 
 include ('footer.php');

?>

 