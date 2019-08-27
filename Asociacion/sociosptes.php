<?php
session_start();
include ('../includes/header.php');
include('../models/connection1.php');


     $listaUsuarios = array(
   array('id_usuario' => '','usuario' => '','passwd' => '','metodo' => '','email' => '','Nom_Ape' => '','dni' => '','provincia' => '','nombre' => '','telefono' => '','cuenta' => '','activo' => '','rol_id' => '')
    );

  

    require_once('menu.php');
   
  
  if (!isset($_SESSION['rol1']))
  {

    echo('<div class="container"><div class="alert alert-danger" role="alert">
              Hay que estar registrado para poder visualizar este contenido, Ve a Home y regístrate
            </div></div>');
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
               
                $sql="UPDATE usuarios set activo = 0, rol_id=2 where id_usuario = $_POST[update_soc] ";
                mysqli_query($conexion, $sql);
				$sql1="SELECT * FROM usuarios where activo=1";
                $consulta = mysqli_query($conexion, $sql1);
                $num_rows = mysqli_num_rows($consulta);

                $tot=0;
                for($i=0;$i<=$num_rows;$i++){
                  $tot=$tot+1;
                }
                
                $_SESSION['tot_pen'] = $tot;
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
