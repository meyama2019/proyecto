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
    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
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


<?php
session_start();
//define('RAIZ', $_SERVER['DOCUMENT_ROOT']. '/proyecto/'); 
//include(RAIZ . 'asociacion/header.php');
include ('../includes/header.php');
include('../models/connection.php');
    $listaUsuarios =[];
    $db=Db::getConnect();
    $sql=$db->query('SELECT * FROM usuarios');
    // carga en la $listaUsuarios cada registro desde la base de datos
    foreach ($sql->fetchAll() as $usuario) {
      $listaUsuarios[]= ($usuario['rol_id']);
    }
    //return $listaUsuarios;
      require_once('menu.php');
  
?>
          
                

<!----NEWS UPDATE-->
<?php
          if(isset($_POST['updatenews']))
          {
          
                $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
                mysqli_set_charset($conexion, 'utf8');
        $id_noticia = $_POST['id_noticia'];
                $titulo =  utf8_encode($_POST['titulo']);
                $descripcion =  utf8_encode($_POST['descripcion']);
                $fechainicio = $_POST['fechainicio'];
                $fechafin = $_POST['fechafin'];
        $sql = "UPDATE noticias
            SET titulo='$_POST[titulo]',descripcion='$_POST[descripcion]', fechainicio='$_POST[fechainicio]',fechafin='$_POST[fechafin]'
            WHERE id_noticia = '$_POST[id_noticia]'
            ";
        $consulta = mysqli_query($conexion, $sql);
        if($consulta)
                    {
            echo "<script>alert('Registro actualizado correctamente');</script>";   
                      //echo "Registro Nº ".$_POST['id_noticia']." ha sido actualizado correctamente";
                    }   
              
          }  
?>

<!----DELETE NOTICIA-->
<?php
          if(isset($_POST['deletenews']))
          {
          
                $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
        $id_noticia = $_POST['id_noticia'];
                
        $sql = "DELETE FROM noticias
            WHERE id_noticia = '$_POST[id_noticia]'
            ";
        $consulta = mysqli_query($conexion, $sql);
        if($consulta)
                    {
            echo "<script>alert('Registro eliminado');</script>";     
                      //echo "Registro Nº ".$_POST['id_noticia']." ha sido eliminado correctamente";
                    }   
              
          }  
    ?>
  



                  

   

<?php
if (isset($_SESSION['rol1']) && $_SESSION['rol1']!= 1 && $_SESSION['activo']==0) // Habría que controlar activo = 0
{
  
?>  
  
  <div class="card">
       <h5 class="card-header" style="background-color: #F78181">Gestión de Noticias</h5>

  <br>
  <div class="container">    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          
       
        <div class="form-row">
           <div class="form-group col-md-3">
            <label for="titulo"></label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
          </div>
          <div class="form-group col-md-3">
            <label for="descripcion"></label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción">
          </div>
           <div class="form-group col-md-2">
            <label for="quien"></label>
                    <select class="form-control" id="quien" name ="quien" required >
                    <option value="0">Subida por:</option>
                    <?php
                      $mysqli1 = mysqli_connect('localhost', 'socio', 'socio', 'marte');  
                      $query1 = $mysqli1 -> query ("SELECT * FROM usuarios");
                      while ($valores = mysqli_fetch_array($query1))
                      {
                      echo '<option value="'.$valores[id_usuario].'">'.utf8_encode($valores[usuario]).'</option>';
                      }
                    ?>
            </select>
            <!--<input type="text" class="form-control" id="cmtopais" name="cmtopais" placeholder="Pais">  -->
          </div>
          <div class="form-group col-md-2">
            <label for="fechainicio"></label>
            <input type="date" class="form-control" id="fechainicio" name="fechainicio" placeholder="Desde">
          </div>
          <div class="form-group col-md-2">
            <label for="fechafin"></label>
            <input type="date" class="form-control" id="fechafin" name="fechafin" placeholder="Hasta">
          </div>
        </div>

       
        <center><button type="submit" class="btn btn-primary btn-sm " name="buscador" >Buscar</button></center>
         
        
         <div class="container">
           <div class="form-row">
            
            <center><a href="noticias_add.php" class="btn btn-outline-danger btn-sm">Nuevo</a></center>
           
          </div>
         </div>
            
       
    </form>
   </div>
      
      
                  
      <div id="collapseOne" class="collapse show container" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body ">
          <div class="container">
            <table id="myTable" class="table">
              <tr class="thead-light">
                <th >Título</th>
                <th >Descripción</th>
                <th >Subido por</th>
                <th >Fecha inicio</th>
                <th >Fecha fin</th>
                <th >Actualización</th>
              </tr>
              
              <tbody>
              <?php
                $mysqli = mysqli_connect('localhost', 'socio', 'socio', 'marte');
                if(isset($_POST['buscador']) )
                {
                  if(!empty($_POST['titulo']) )
                    {
                      $query ="SELECT * FROM noticias, usuarios WHERE noticias.titulo like '%" . $_POST['titulo'] . "%' AND noticias.userid =usuarios.id_usuario";
                      $result = mysqli_query($mysqli, $query);
                    }
                  elseif (!empty($_POST['descripcion']) ) 
                    {
                      $query ="SELECT * FROM noticias, usuarios WHERE noticias.descripcion like '%" . $_POST['descripcion'] . "%' AND noticias.userid =usuarios.id_usuario";
                      $result = mysqli_query($mysqli, $query);
                    }
                  elseif ( !empty($_POST['fechainicio'] && $_POST['fechafin']) ) 
                    {
                      $fechainicio = date("Y-m-d", strtotime($_POST['fechainicio'])); 
                      $fechafin = date("Y-m-d", strtotime($_POST['fechafin']));   
                      if  ($fechafin < $fechainicio)
                      {
                        echo "<script>alert('Fecha fin no puede ser inferior a fecha de inicio');</script>";
                        goto general;
                      }
                      else
                      {
                      $query ="SELECT * FROM noticias, usuarios WHERE noticias.fechainicio >= '$fechainicio' AND noticias.fechainicio <= '$fechafin' AND noticias.userid =usuarios.id_usuario";
                      $result = mysqli_query($mysqli, $query);
                      }
                    }
                  elseif ( !empty($_POST['quien']) ) 
                    {
                      $query ="SELECT * FROM noticias, usuarios WHERE noticias.userid like '%" . $_POST['quien'] . "%' AND noticias.userid =usuarios.id_usuario";
                      $result = mysqli_query($mysqli, $query);
                    } 
                  else
                    {
                      goto general;
                    }
                }
                else
                {
                  general:
                  $result = mysqli_query($mysqli, "SELECT * FROM noticias, usuarios
                                 WHERE userid =id_usuario
                                 ORDER BY fechainicio DESC");
                }
                
                
                while($news_data = mysqli_fetch_array($result))
              {?>
                <tr class="item">
                  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" accept-charset="utf-8">
                    <td class="form-group">
                      <textarea type="text" class="form-control" name ="titulo" value="" ><?php echo utf8_encode($news_data['titulo']); ?></textarea>
                    </td>
                    <td class="form-group">
                      <textarea type="text" class="form-control" name ="descripcion" value="" ><?php echo utf8_encode($news_data['descripcion']); ?></textarea>
                    </td>
                    <td class="form-group">
                      <?php echo utf8_encode($news_data['usuario']); ?>
                    </td>
                    <td class="form-group">
                      <input type="date" class="form-control" name ="fechainicio" value="<?php echo $news_data['fechainicio']; ?>">
                    </td>
                    <td class="form-group">
                      <input type="date" class="form-control" name ="fechafin" value="<?php echo $news_data['fechafin']; ?>">
                    </td>
                    <td>
                      <input type="hidden" class="form-control" name ="id_noticia" value="<?php echo utf8_encode($news_data['id_noticia']); ?>">
                      <button type="submit" class="btn btn-outline-danger btn-sm" name="updatenews">Editar</button>
                      <br> <br>
                      <button type="submit" class="btn btn-outline-danger btn-sm" name="deletenews">Eliminar</button>
                    </td>
                  </form>
                </tr>
              <?php         
              }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>    
<?php
}
else
{
  echo('<div class="container">
      <div class="alert alert-danger" role="alert">
      No tienes permiso para visualizar el contenido
        </div></div> ');
} 
  include ('footer.php');
?>

              
<div class="accordion" id="accordionExample">

<?php


    //$conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
    
    $sql = "SELECT date(fecha_upload) as fecha_upload,titulo FROM fotos group by date(fecha_upload) order by date(fecha_upload)desc";
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
                         '.$row['fecha_upload'].'
                        </button>
                        </h2>
                    </div>


                    <div id="collapse'.$x.'" class="collapse show" aria-labelledby="heading'.$x.'" data-parent="#accordionExample">
                     <div class="card-body">
                       <div class="row">');
               //$sql1 = "SELECT documento FROM fotos where titulo = '".$row['titulo']."' order by fecha_upload desc";
                $sql1 = "SELECT fo.documento,us.Nom_Ape,fo.fecha_upload FROM fotos fo inner join usuarios us on fo.userid=us.id_usuario where date(fecha_upload) = '".$row['fecha_upload']."' order by fecha_upload desc";

               $consulta1 = mysqli_query($conexion, $sql1);
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
                        <input type="file" class="form-control" id="foto" name="foto" placeholder="File.." required>
                      </div>
                      
                              
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
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
      //$docu = '../imagenes/uploads_img/'. $_FILES['foto']['name'];
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

