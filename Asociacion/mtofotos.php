<?php
session_start();
//define('RAIZ', $_SERVER['DOCUMENT_ROOT']. '/proyecto/'); 
//include(RAIZ . 'asociacion/header.php');
include ('../includes/header.php');
include('../models/connection1.php');


     $listaUsuarios = array(
   array('id_foto' => '','userid' => '','documento' => '','fecha_upload' => '','titulo' => '')
    );
    //$db=Db::getConnect();
     //$conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
      $sql = "SELECT * FROM fotos";
      $consulta = mysqli_query($conexion, $sql);
      $num_rows = mysqli_num_rows($consulta);

      //$num_rows=$db->query('SELECT * FROM fotos '); // 1 Pendientes aprobación
      $tot=0;
      //foreach ($num_rows->fetchAll() as $contacto) {
      //         $tot=$tot+1;
      //         }

       for ($i = 0; $i<= $num_rows; $i++) {
           $tot=$tot+1;
       }

       //mysqli_close($conexion);
         
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
 require_once('vmtofotos.php');
 include ('footer.php');
?>
