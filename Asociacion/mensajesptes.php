<?php
session_start();
//define('RAIZ', $_SERVER['DOCUMENT_ROOT']. '/proyecto/'); 
//include(RAIZ . 'asociacion/header.php');
include ('../includes/header.php');
include('../models/connection.php');



     $listaMensajes = array(
   array('id_solicitud' => '','fecha_entrada' => '','nombre' => '','email' => '','telefono' => '','asunto' => '','mensaje' => '',
      'activo' =>'')
    );
    $db=Db::getConnect();
    
    $sql=$db->query('SELECT * from contacto where activo=1');





  
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
  <h5 class="card-header">Mensajes Recibidos</h5>
  <div class="card-body">
   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    
      <div class="container">
          <br>
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">id</th>
                <th scope="col">Fecha</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Telefono</th>
                <th scope="col">Asunto</th>
                <th scope="col">Mensaje</th>
                <th scope="col">Acción</th>
               
               
             
              </tr>
            </thead>
             <tbody>

              <?php
                             
                             $x=0;
                             
                              $checkvalue[]='';
                              // $sql=$db->query('SELECT * FROM noticias where fechafin >= curdate()  limit 1');
                              foreach ($sql->fetchAll() as $listaMensajes[$x]) 
                              {
                                //$listanoticias[]= $noticias;
                                    
                                  echo ('
                                     <tr>
                                          <th scope="row'.$x.'" name="row">'. utf8_encode($listaMensajes[$x]['id_solicitud']).'</th>
                                          <td>'. utf8_encode($listaMensajes[$x]['fecha_entrada']). '</td>
                                          <td>'. utf8_encode($listaMensajes[$x]['nombre']).'</td>
                                          <td>'. utf8_encode($listaMensajes[$x]['email']).'</td>
                                          <td>'. utf8_encode($listaMensajes[$x]['telefono']).'</td>
                                          <td>'. utf8_encode($listaMensajes[$x]['asunto']).'</td>
                                          <td>'. utf8_encode($listaMensajes[$x]['mensaje']).'</td>');

                                          if($listaMensajes[$x]['activo']==1)
                                          {
                                            //echo('<td>Pdte</td>
                                            //  <td ><center><input type="checkbox" class="form-check-input"  id="exampleCheck1" ></center></td>
                                            //   </tr>');
                                            echo('<td><button type="submit" class="btn btn-primary btn-sm" name="update_new" 
                                              value='.$listaMensajes[$x]['id_solicitud'].'>Leido</button></td>');
                                          }
                               
                                  
                                   $x=$x+1;  
                                 
                               }
                      require_once('mensajesptes.php');


               ?>


           
            
            </tbody>
          </table>
      
        </div>
      </form>
  </div>
</div>

<?php
          if(isset($_POST['update_new']))
          {
                //$valor = $_POST['update_new']['value'];
                //echo($valor);
                # code...
               
                $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
                $acentos="SET NAMES 'utf8'";
                mysqli_query($conexion, $acentos);

                $sql="UPDATE contacto set activo= 0 where id_solicitud = $_POST[update_new] ";
                mysqli_query($conexion, $sql);
                mysqli_close($conexion);

                //$_SESSION['tot_con'] = $_SESSION['tot_con'] - 1;
                //exit;
                                        
                
               
                

             
               
          }
                
        


    ?>



      

<?php
  include ('footer.php');
?>




          