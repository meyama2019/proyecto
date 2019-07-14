<?php
session_start();
//define('RAIZ', $_SERVER['DOCUMENT_ROOT']. '/proyecto/'); 
//include(RAIZ . 'asociacion/header.php');
include ('../includes/header.php');
include('../models/connection.php');


     $listaUsuarios = array(
   array('id_usuario' => '','usuario' => '','passwd' => '','metodo' => '','email' => '','Nom_Ape' => '','dni' => '','provincia' => '','nombre' => '','telefono' => '','cuenta' => '','activo' => '','rol_id' => '')
    );
    $db=Db::getConnect();

      $num_rows=$db->query('SELECT * FROM contacto where activo=1'); // 1 Pendientes aprobación
      $tot=0;
      foreach ($num_rows->fetchAll() as $contacto) {
               $tot=$tot+1;
               }
      $_SESSION['tot_con'] = $tot;


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
 require_once('vsociosptes.php');
?>


<?php // Se realiza el UPDATE en usuarios poniendo campo activo = 0 (Se activa plenamente el Socio)
          if(isset($_POST['update_soc']))
          {
              
                # code...
               
                $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
                $acentos="SET NAMES 'utf8'";
                mysqli_query($conexion, $acentos);

                $sql="UPDATE usuarios set activo = 0, rol_id=2 where id_usuario = $_POST[update_soc] ";
                mysqli_query($conexion, $sql);
                
                
                $num_rows=$db->query('SELECT * FROM usuarios where activo=1'); // 1 Pendientes aprobación
                $tot=0;
                 foreach ($num_rows->fetchAll() as $usuario) {
                  $tot=$tot+1;
                }
                $_SESSION['tot_pen'] = $tot;
                mysqli_close($conexion);
                
                
               
                
           
          }
          
?>



      

<?php
  include ('footer.php');
?>
