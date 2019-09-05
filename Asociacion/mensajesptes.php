<?php
session_start();
include ('../includes/header.php');
include('../models/connection1.php');



     $listaMensajes = array(
   array('id_solicitud' => '','fecha_entrada' => '','nombre' => '','email' => '','telefono' => '','asunto' => '','mensaje' => '',
      'activo' =>'')
    );

    $sql = "SELECT * FROM usuarios where activo=1";
    $consulta = mysqli_query($conexion, $sql);
    $num_rows = mysqli_num_rows($consulta); 
                $tot=0;
                for ($i = 0; $i<= $num_rows; $i++) {  
                  $tot=$tot+1;
                }
                $_SESSION['tot_pen'] = $tot;

    $sql = "SELECT * FROM contacto where activo=1";
    $consulta = mysqli_query($conexion, $sql);
    $num_rows = mysqli_num_rows($consulta); 
    $tot=0;
    for ($i = 0; $i<= $num_rows; $i++) {
      $tot=$tot+1;
    }
    $_SESSION['tot_con'] = $tot;
    require_once('menu.php');
   
    if(!isset($_SESSION['rol1']))
  {
    echo('<div class="container"><div class="alert alert-danger" role="alert">
              Hay que estar registrado para poder visualizar este contenido, Ve a Home y regístrate
            </div></div>');
    exit;
  }
   mysqli_close($conexion);

?>     

<?php
 

  require_once('vmensajesptes.php');
?>

<?php
          if(isset($_POST['update_new']))
          {
				$sql="UPDATE contacto set activo= 0 where id_solicitud = $_POST[update_new] ";
                mysqli_query($conexion, $sql);
                

                 $sql = "SELECT * FROM contacto where activo=1";
                 $consulta = mysqli_query($conexion, $sql);
                 $num_rows = mysqli_num_rows($consulta); 
                 $tot=0;
                for ($i = 0; $i<= $num_rows; $i++) {
                  $tot=$tot+1;
                }
                $_SESSION['tot_con'] = $tot;
                mysqli_close($conexion);
                
                echo "<script type=\"text/javascript\">";
                echo "$(document).ready(function(){";
                echo " if(document.URL.indexOf(\"#\")==-1){";
                echo " url = document.URL+\"#\"; location = \"#\";";
                echo "location.reload(true);";
                echo "}    });";
                echo "</script>"; 
          }
    ?>
    

<?php
  include ('footer.php');
?>




          