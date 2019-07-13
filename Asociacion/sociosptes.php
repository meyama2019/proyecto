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

     
    //$sql=$db->query('SELECT * FROM usuarios where activo=1');





  
    require_once('menu.php');
   
  
?>
<?php
  if (!isset($_SESSION['rol1']))
  {

    echo('<div class="container"><div class="alert alert-danger" role="alert">
              Hay que estar registrado para poder visualizar este contenido, Ve a Home y regístrate
            </div></div>');
    //header("Location: http://localhost/proyecto/home.php");
    exit;
  }

?>  
      


  <div class="card">
  <h5 class="card-header">Revisión de Socios</h5>
  <div class="card-body">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  
      <div class="container">
          <br>
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">id</th>
                <th scope="col">usuario</th>
                <th scope="col">email</th>
                <th scope="col">Nom_Ape</th>
                <th scope="col">Dni</th>
                <th scope="col">Provincia</th>
                <th scope="col">Pais</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Cuenta</th>
                <th scope="col">Acción</th>
             
              </tr>
            </thead>
             <tbody>

              <?php
                             
                             $x=0;
                             
                             
                              $sql=$db->query("SELECT id_usuario,usuario,email,Nom_Ape,dni,pr.provincia,pa.nombre,telefono,cuenta,activo,rol_id 
                                FROM paises pa  
                                inner join usuarios us on us.Pais = pa.id
                                inner join provincias pr on pr.id_provincia = us.provincia
                                
                                where us.activo = 1 ");
                              foreach ($sql->fetchAll() as $listaUsuarios[$x]) 
                              {
                            
                                    
                                  echo ('
                                           <tr>
                                          <th scope="row">'. utf8_encode($listaUsuarios[$x]['id_usuario']).'</th>
                                          <td>'. utf8_encode($listaUsuarios[$x]['usuario']). '</td>
                                          <td>'. utf8_encode($listaUsuarios[$x]['email']).'</td>
                                          <td>'. utf8_encode($listaUsuarios[$x]['Nom_Ape']).'</td>
                                          <td>'. utf8_encode($listaUsuarios[$x]['dni']).'</td>
                                          <td>'. utf8_encode($listaUsuarios[$x]['provincia']).'</td>
                                          <td>'. utf8_encode($listaUsuarios[$x]['nombre']).'</td>
                                          
                                          <td>'. utf8_encode($listaUsuarios[$x]['telefono']).'</td>
                                          <td>'. utf8_encode($listaUsuarios[$x]['cuenta']).'</td>');

                                          if($listaUsuarios[$x]['activo']==1)
                                          {
                                            
                                             echo('<td><button type="submit" class="btn btn-primary btn-sm" name="update_soc" 
                                              value='.$listaUsuarios[$x]['id_usuario'].'>Activar</button></td>');
                                          }

                                  $x=$x+1;
                               }


               ?>


           
            
            </tbody>
          </table>
      
        </div>
      </form>
  </div>
</div>



<?php // Se realiza el UPDATE en usuarios poniendo campo activo = 0 (Se activa plenamente el Socio)
          if(isset($_POST['update_soc']))
          {
              
                # code...
               
                $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
                $acentos="SET NAMES 'utf8'";
                mysqli_query($conexion, $acentos);

                $sql="UPDATE usuarios set activo = 0 where id_usuario = $_POST[update_soc] ";
                mysqli_query($conexion, $sql);
                
                
                $num_rows=$db->query('SELECT * FROM usuarios where activo=1'); // 1 Pendientes aprobación
                $tot=0;
                 foreach ($num_rows->fetchAll() as $usuario) {
                  $tot=$tot+1;
                }
                $_SESSION['tot_pen'] = $tot;
                mysqli_close($conexion);
                require_once('sociosptes.php');
                
               
                
           
          }
?>



      

<?php
  include ('footer.php');
?>
