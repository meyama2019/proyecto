<?php
session_start();
//define('RAIZ', $_SERVER['DOCUMENT_ROOT']. '/proyecto/'); 
//include(RAIZ . 'asociacion/header.php');
include ('../includes/header.php');
include('../models/connection1.php');



     $listaMensajes = array(
   array('id_solicitud' => '','fecha_entrada' => '','nombre' => '','email' => '','telefono' => '','asunto' => '','mensaje' => '',
      'activo' =>'')
    );
    //$db=Db::getConnect();
    //$num_rows=$db->query('SELECT * FROM usuarios where activo=1'); // 1 Pendientes aprobación
    $sql = "SELECT * FROM usuarios where activo=1";
    $consulta = mysqli_query($conexion, $sql);
    $num_rows = mysqli_num_rows($consulta); 
                $tot=0;
                // foreach ($num_rows->fetchAll() as $usuario) {
                for ($i = 0; $i<= $num_rows; $i++) {  
                  $tot=$tot+1;
                }
                $_SESSION['tot_pen'] = $tot;

    //$num_rows=$db->query('SELECT * FROM contacto where activo=1'); // 1 Pendientes aprobación
    $sql = "SELECT * FROM contacto where activo=1";
    $consulta = mysqli_query($conexion, $sql);
    $num_rows = mysqli_num_rows($consulta); 
    $tot=0;
    //foreach ($num_rows->fetchAll() as $contacto) {
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
    //header("Location: http://localhost/proyecto/home.php");
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
                //$valor = $_POST['update_new']['value'];
                //echo($valor);
                # code...
               
                //$conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
                //$acentos="SET NAMES 'utf8'";
                //mysqli_query($conexion, $acentos);

            
                $sql="UPDATE contacto set activo= 0 where id_solicitud = $_POST[update_new] ";
                mysqli_query($conexion, $sql);
                

                //$num_rows=$db->query('SELECT * FROM contacto where activo=1'); // 1 Pendientes aprobación
                 $sql = "SELECT * FROM contacto where activo=1";
                 $consulta = mysqli_query($conexion, $sql);
                 $num_rows = mysqli_num_rows($consulta); 
                 $tot=0;
                 //foreach ($num_rows->fetchAll() as $contacto) {
                for ($i = 0; $i<= $num_rows; $i++) {
                  $tot=$tot+1;
                }
                $_SESSION['tot_con'] = $tot;
                mysqli_close($conexion);
 
                            
          }

                   

    ?>



      

<?php
  include ('footer.php');
?>




          