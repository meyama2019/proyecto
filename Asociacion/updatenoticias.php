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



  if(isset($_POST['addnews']))
    {
     
      $idnoticia = $_POST['idnews'];
      $iduser = $_POST['id'];
      $titulo= ($_POST['titulo']);
      $descrip = ($_POST['descripcion']);
      $fechai = $_POST['fechainicio'];
      $fechaf = $_POST['fechafin'];


      //echo($socioid);
      //$conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
      //$acentos="SET NAMES 'utf8'";
      //mysqli_query($conexion, $acentos);
      mysqli_set_charset($conexion, 'utf8');
    
      $update = "UPDATE NOTICIAS set 
            userid = '$iduser',
            fechainicio  = date('$fechai'),
            fechafin = date('$fechaf'),
            titulo = '$titulo',
            descripcion = '$descrip'
            where id_noticia = ".$idnoticia." ";
     
      $resultado = mysqli_query($conexion, $update);
    
      if($resultado)
      {
      
        echo "<script>alert('Noticia Actualizada !!');</script>";
        $_GET['id'] = $idnoticia;
       
      }
      else
      {

        echo "<script>alert(Notica no encontrada');</script>";
      }

      

    }

    ?>


<?php
  if(isset($_GET['id']))
  {
    
   // $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
    $id_noti = $_GET['id'];
    $sql = "SELECT * FROM noticias where id_noticia = ".$id_noti." ";
    $consulta = mysqli_query($conexion, $sql);
    if($consulta)
        {
          $data = mysqli_fetch_array($consulta);
        }

  }

?>





      <div class="card">
          <h5 class="card-header" style="background-color: #F78181">Gestión de Noticias (Actualización)</h5>

          <br>
             
         <div class="container">
       
          

        
            <form method="post" accept-charset="utf-8"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                  
                                        
                                        <label for="titulo">Título</label>
                                        <textarea type="textarea" class="form-control" name="titulo" id="titulo" value=<?php echo($data['titulo']); ?> > <?php echo($data['titulo']); ?> </textarea>
                                        
                                         <br>
                                        <label for="descripcion">Descripción</label>
                                        <textarea  type="textarea" class="form-control" name ="descripcion" id ="descripcion" value= <?php echo($data['descripcion']);?> ><?php echo(utf8_encode($data['descripcion']));?></textarea> <br>                            
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                              <label for="fechainicio">Fecha Inicio</label>
                                              <input type="date" class="form-control" name ="fechainicio" id ="fechainicio" value=<?php echo($data['fechainicio']);?> >
                                            </div>

                                    

                                            <div class="form-group col-md-3">
                                              <label for="fechafin">Fecha Fin</label>
                                              <input type="date" class="form-control" name ="fechafin" value=<?php echo($data['fechafin']);?>>
                                            </div>
                                        </div>
                                     

                                        <input type="hidden" class="form-control" name ="id" value=<?php echo ($data['userid']); ?>>
                                        <input type="hidden" class="form-control" name ="idnews" value=<?php echo ($data['id_noticia']); ?>>

                                        <center>
                                        <a class="btn btn-outline-danger btn-sm" href="noticias_g.php" >Cerrar</a>
                                        <button type="submit" class="btn btn-outline-danger btn-sm" name="addnews">Actualizar</button>
                                        </center>
                                       
              
                    
                           
                            </center>
                           
                    
                     
                </form>
            
                                 
              
              <br>
            </div>
          </div>
         



        




