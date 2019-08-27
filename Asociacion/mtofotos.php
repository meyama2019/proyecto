<?php 
session_start();
include ('../includes/header.php');
include('../models/connection1.php');


     $listaUsuarios = array(
   array('id_foto' => '','userid' => '','documento' => '','fecha_upload' => '','titulo' => '')
    );
      $sql = "SELECT * FROM fotos";
      $consulta = mysqli_query($conexion, $sql);
      $num_rows = mysqli_num_rows($consulta);

      $tot=0;


       for ($i = 0; $i<= $num_rows; $i++) {
           $tot=$tot+1;
       }  

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
 require_once('vmtofotos.php');
 include ('footer.php');
?>

<!-------CONFIRMAR BORRAR DOCUMENTO--------------->
<script type="text/javascript">

<!--

function confirmation() {

	if(confirm("Realmente desea eliminar?"))

		{window.location = "";

	}

}

//-->

</script>
