<?php
 session_start();
//define('RAIZ', $_SERVER['DOCUMENT_ROOT']. '/proyecto/'); 
//include(RAIZ . 'asociacion/header.php');
include ('../includes/header.php');
include('../models/connection.php');
     $listaUsuarios = 
      array('id_foto' => '','user_id' => '','documento' => '','fecha_upload' => '','titulo' => '');

 
      require_once('menu.php');
      $listaeventos = array ('titulo' => ''); // Va a contener los grupo de Títulos
      
      
 
?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Momentos Compartidos</h1>
    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
    <?php
       if (isset($_SESSION['rol1']))
       {
        echo('<a class="btn btn-primary btn-sm" href="#" role="button">Sube una foto</a>');
       }

    ?>
  </div>
</div>


              
<div class="accordion" id="accordionExample">

<?php


    $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
    $sql = "SELECT titulo FROM fotos group by titulo";
    $consulta = mysqli_query($conexion, $sql);
    $result = $conexion->query($sql);
    if ($result->num_rows > 0)
    {
      $x=0;
      while($row = $result->fetch_assoc())
       {
      
              echo(' <div class="card"> 
                        <div class="card-header" id="heading'.$x.'">
                        <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'.$x.'" aria-expanded="true" aria-controls="collapse'.$x.'">
                         '.$row['titulo'].'
                        </button>
                        </h2>
                    </div>


                    <div id="collapse'.$x.'" class="collapse show" aria-labelledby="heading'.$x.'" data-parent="#accordionExample">
                     <div class="card-body">
                       <div class="row">');
               $sql1 = "SELECT documento FROM fotos where titulo = '".$row['titulo']."' order by fecha_upload desc";
               $consulta1 = mysqli_query($conexion, $sql1);
               $result1 = $conexion->query($sql1);
             
               if ($result1->num_rows > 0) // Mostramos las fotos que tienen el mismo titulo
               {
                 while($row1 = $result1->fetch_assoc())
                 {
                   
                   echo('<figure class="col-md-4">
                        <a href='.$row1['documento'].' data-size="800x600">
                          <img alt="picture" src='.$row1['documento'].' "
                            class="img-fluid">
                        </a>
                      </figure>');
                   // echo('<div class="col-4"><img src='.$row1['documento'].' alt="..." class="img-thumbnail">
                   //                   </div>');
                 }
                 echo('</div>');
               }
          $x=$x+1;
          echo('</div></div></div>');
        }
      }
      
  ?>




 



  
<?php
  include ('footer.php');
?>