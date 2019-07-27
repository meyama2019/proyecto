<?php
session_start();

include ('../includes/header.php');
include('../models/connection1.php');
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



  if(isset($_POST['updatedoc']))
    {
     
      $iddocu = $_POST['id'];
      $iduser = $_POST['iduser'];
      $titulo= ($_POST['titulo']);
      $descrip = ($_POST['descripcion']);
      $fecha = $_POST['fechanew'];
      $docu= $_POST['documento'];
      


      //echo($socioid);
      //$conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
      $acentos="SET NAMES 'utf8'";
      mysqli_query($conexion, $acentos);
      mysqli_set_charset($conexion, 'utf8');
    
      $update = "UPDATE documentos set 
            userid = '$iduser',
            documento  = '$docu',
            creation_date = date('$fecha'),
            titulo = '$titulo',
            descripcion = '$descrip'
            where id_documento = ".$iddocu." ";
     
      $resultado = mysqli_query($conexion, $update);
    
      if($resultado)
      {
      
        echo "<script>alert('Documento Actualizado !!');</script>";
        $_GET['id'] = $iddocu;
       
      }
      else
      {

        echo "<script>alert(Documento no encontrado');</script>";
      }

      

    }

    ?>


<?php
  if(isset($_GET['id']))
  {
    
   // $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
    $id_docu = $_GET['id'];
    $sql = "SELECT * FROM documentos where id_documento = ".$id_docu." ";
    $consulta = mysqli_query($conexion, $sql);
    if($consulta)
        {
          $data = mysqli_fetch_array($consulta);
        }

  }

?>





      <div class="card">
          <h5 class="card-header" style="background-color: #F78181">Gestión de Documentos (Actualización)</h5>

          <br>
             
         <div class="container">
       
          

        
            <form method="post" accept-charset="utf-8"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                  
                                        <div class="form-group col-md-1">
                                          <label for="id">ID Doc</label>
                                          <input readonly type="text" class="form-control" id="id" name ="id" aria-describedby="emailHelp" placeholder="Id" value=<?php echo($data['id_documento']); ?>>                                          
                                        </div>
                                        <label for="titulo">Título</label>
                                        <textarea type="textarea" class="form-control" name="titulo" id="titulo" value=<?php echo($data['titulo']); ?> > <?php echo($data['titulo']); ?> </textarea>
                                        
                                         <br>
                                        <label for="descripcion">Descripción</label>
                                        <textarea  type="textarea" class="form-control" name ="descripcion" id ="descripcion" value= <?php echo($data['descripcion']);?> ><?php echo(utf8_encode($data['descripcion']));?></textarea> <br>                            
                                        <div class="form-row">
                                                                             
                                            <div class="form-group col-md-2">
                                              <label for="fechanew">Fecha Subida</label>
                                              <input type="date" class="form-control" name ="fechanew" value=<?php echo($data['creation_date']);?>>
                                            </div>
                                            <div class="form-group col-md-2">
                                              <label for="documento"><a href="<?php echo utf8_encode($data['documento']); ?>" >Ver</a></label>
                                              <input type="text" class="form-control" name ="documento" value=<?php echo($data['documento']);?>>
                                            
                                            </div>
                                           

                                        </div>
                                     

                                        <input type="hidden" class="form-control" name ="iduser" value=<?php echo ($data['userid']); ?>>
                                      

                                        <center>
                                        <a class="btn btn-outline-danger btn-sm" href="documentos_g.php" >Cerrar</a>
                                        <button type="submit" class="btn btn-outline-danger btn-sm" name="updatedoc">Actualizar</button>
                                        </center>
                                       
              
                    
                           
                            </center>
                           
                    
                     
                </form>
            
                                 
              
              <br>
            </div>
          </div>
         



        




