<?php
session_start();
include ('../includes/header.php');
include('../models/connection1.php');

require_once('menu.php');
  
?>

<?php // Funcion para añadir un Rol Nuevo
  if(isset($_POST['addrol']))
  {
    $sqlindice = "SELECT idRol from rolusuario where idRol < 95 or idRol > 95 order by idRol desc limit 1";
        $next=mysqli_query($conexion, $sqlindice);
        $indice = mysqli_fetch_row($next);
        $indice[0] = $indice[0] + 1;  
        $sql = "INSERT INTO rolusuario (idRol,nombre) values (".$indice[0].",'$_POST[namerol]')";
        $insertarol = mysqli_query($conexion, $sql);        
    if($insertarol)
          {
        echo "<script>alert('Rol añadido : ".$_POST['namerol']."');</script>";    
                   
          } 
  }

?>


                                      
<?php // Funcion para actualizar nombre del Rol ************************************************
          if(isset($_POST['updaterol']))
          {
          
        $id_Rol = $_POST['idRol'];               
        $nombre = $_POST['Nombre'];

        $sql = "UPDATE rolusuario
            SET nombre='$_POST[Nombre]' WHERE idRol = '$_POST[idRol]'";
        $consulta = mysqli_query($conexion, $sql);
        if($consulta)
                    {
            echo "<script>alert('Actualizado Rol : ".$nombre." ');</script>";   
                     
                    }   
              
          } 

          
?>


<?php // Funcion para Eliminar un Rol ************************************************


          if(isset($_POST['deleterol'])) 

          {
              $id_Rol = $_POST['idRol'];               
              $nombre = $_POST['Nombre'];
                        
              $sql = "DELETE FROM rolusuario WHERE idRol = '$_POST[idRol]' ";
              $consulta = mysqli_query($conexion, $sql);
              if($consulta)
                    {
                      echo "<script>alert('Eliminado Rol ".$nombre." ');</script>";     
                             
                    } 
          }
          
            
?>


<?php
            if (isset($_SESSION['rol1']) && $_SESSION['rol1']!= 1 && $_SESSION['activo']==0) // Habría que controlar activo = 0
        {
?>  

        <div class="card">
            <h5 class="card-header" style="background-color: #F78181">Gestión de Roles</h5>
            <div class="container">
            <br>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <center>
               <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#mtorolnew">
                                Nuevo
                              </button>
            </center>
          </form>
      </div>    
                  

      <div id="collapseOne" class="collapse show container" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body ">
          <div class="container">
            <script src="https://www.w3schools.com/lib/w3.js"></script>
            <table id="myTable" class="table">
              <tr class="thead-light">
                <th >Id</th>
                <th >Nombre Rol</th>              
                <th >Acción</th>
              </tr>
              <tbody>
                <?php  
                  $sql ="SELECT * FROM rolusuario where 1";
                  $result = mysqli_query($conexion, $sql);
                  while($docs_data = mysqli_fetch_array($result))
                  {?>
                    <tr class="item">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" accept-charset="utf-8">
                      <td class="form-group" name ="idRol" value="<?php echo utf8_encode($docs_data['idRol']); ?>"><?php echo utf8_encode($docs_data['idRol']); ?>
                      </td>
                      <td class="form-group">
                        <input type="text" name="Nombre" value="<?php echo  utf8_encode($docs_data['Nombre'])?>"></td>

                      <td>
                        <input type="hidden" class="form-control" name ="idRol" value="<?php echo utf8_decode($docs_data['idRol']); ?>">
                        <button type="submit" class="btn btn-outline-danger btn-sm" name="updaterol">Editar</button>
                      
                        <button type="submit" class="btn btn-outline-danger btn-sm" name="deleterol" >Eliminar</button> 
                       
                        
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


<!-- Modal para insertar un nuevo Rol de Usuario *************************** -->

 <div class="modal fade" id="mtorolnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelur" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelur">Alta de Roles de Usuario</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                     
                      <div class="form-group">
                        <label for="namerol">Descripción Rol</label>
                        <input type="text" class="form-control" id="namerol" name="namerol" placeholder="Nombre Rol Nuevo" required>
                      </div>
                     
                              
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar</button>
                  <button type="submit" class="btn btn-primary" name="addrol">Insertar</button>
                </div>
               </form>
              </div>
            </div>
          </div>



 
