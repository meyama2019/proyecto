<?php
 session_start();
include ('../includes/header.php');
include('../models/connection1.php');
     $listaUsuarios = 
      array('id_foto' => '','user_id' => '','documento' => '','fecha_upload' => '','titulo' => '');

 
      require_once('menu.php');
      $listaeventos = array ('titulo' => ''); // Va a contener los grupo de Títulos
      
      
 
?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Momentos Compartidos</h1>
    <p class="lead">Trocitos de historia en imágenes de la Asociación</p>
    <?php
       if (isset($_SESSION['rol1']))
       {
        echo('<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadfile">
                                Añade una foto
                              </button>');
       }

    ?>
  </div>
</div>


              
<div class="accordion" id="accordionExample">

<?php


    $sql = "SELECT date(fecha_upload) as fecha_upload,titulo FROM fotos group by date(fecha_upload) order by date(fecha_upload)desc";
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
                         '.$row['fecha_upload'].'
                        </button>
                        </h2>
                    </div>


                    <div id="collapse'.$x.'" class="collapse show" aria-labelledby="heading'.$x.'" data-parent="#accordionExample">
                     <div class="card-body">
                       <div class="row">');
                $sql1 = "SELECT fo.documento,us.Nom_Ape,fo.fecha_upload FROM fotos fo inner join usuarios us on fo.userid=us.id_usuario where date(fecha_upload) = '".$row['fecha_upload']."' order by fecha_upload desc";

               $result1 = $conexion->query($sql1);
             
               if ($result1->num_rows > 0) // Mostramos las fotos que tienen el mismo titulo
               {
                 while($row1 = $result1->fetch_assoc())
                 {
                   
                   echo('<figure class="col-md-4">
                        <a href='.$row1['documento'].' data-size="800x600">
                          <img alt="picture" src='.$row1['documento'].' "
                            class="img-thumbnail">
                            <h5 class="card-title">'.$row1['Nom_Ape'].'</h5>
                            <h6 class="card-title">'.$row1['fecha_upload'].'</h5>
                           
                        </a>
                      </figure>');
                 }
                 echo('</div>');
               }
          $x=$x+1;
          echo('</div></div></div>');
        }
      }
      
  ?>


     <div class="modal fade" id="uploadfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelur" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelur">Añadir Fotos</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  enctype="multipart/form-data"> 
                        <input type='hidden' name='MAX_FILE_SIZE' value='2000000'>
                       <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" placeholder="File.." required accept=".jpeg,.jpg,.png, .bmp">
                      </div>
                      
                              
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar</button>
                  <button id="upload1" type="submit" class="btn btn-primary" name="upload2" >Añadir Foto</button>
                 
          </script>
                </div>
               </form>
              </div>
            </div>
          </div>


    </div>      


<?php //*******************************Comprobación de las fotos y carga en BBDD 

 
  if (isset($_POST['upload2']))
  {

     if ($_FILES['foto']['error'] > 0)
      {
        echo 'Problem mayor 0';
        exit;

      }

      if ($_FILES['foto']['type'] != 'image/jpeg')
      {
        echo 'Problem type jpeg';
        exit;
      }
      $aleatorio = rand(1,1000000);
      $nombre= $_FILES['foto']['name'];
      $uploaled_file = '../imagenes/uploads_img/'.$aleatorio .$nombre;

      if (is_uploaded_file($_FILES['foto']['tmp_name']))
      {
        if(!move_uploaded_file($_FILES['foto']['tmp_name'], $uploaled_file))
        {
          echo 'Problem on move';
          exit;
        }
      }
      else
      {
        echo 'Possible Problem attack';
        exit;
      }

      // Inserción en BBDD. 

     
      try{
     
      $docu=$uploaled_file;
      $user = $_SESSION['id_usuario'];
      $titu = 'Fotos Varias'; 

      $sqlfotom = "INSERT INTO fotos (id_foto,userid,documento,fecha_upload,titulo) values (NULL,
      '$_SESSION[id_usuario]','$docu',current_timestamp,'$titu')";
      
         $consulta = mysqli_query($conexion, $sqlfotom);
             
       }   
      catch(Exception $e)   
      {
        echo($e);
        include ('noconfirm.php');
       

      }
      finally{
        mysqli_close($conexion);
        unset($_POST['upload1']);
        
       
        
      }
     

  }
   include ('footer.php'); 
?>

