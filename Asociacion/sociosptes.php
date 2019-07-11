<?php
session_start();
//define('RAIZ', $_SERVER['DOCUMENT_ROOT']. '/proyecto/'); 
//include(RAIZ . 'asociacion/header.php');
include ('../includes/header.php');
include('../models/connection.php');


     $listaUsuarios = array(
   array('id_usuario' => '','usuario' => '','passwd' => '','metodo' => '','email' => '','Nom_Ape' => '','dni' => '','provincia' => '','Pais' => '','telefono' => '','cuenta' => '','activo' => '1','rol_id' => '')
    );
    $db=Db::getConnect();
    $sql=$db->query('SELECT * FROM usuarios where activo=1');





  
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
  
    <center><a href="#" class="btn btn-primary btn-sm">Activar</a></center>
      <div class="container">
          <br>
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">id</th>
                <th scope="col">usuario</th>
                <th scope="col">email</th>
                <th scope="col">Nom_Ape</th>
                <th scope="col">Provincia</th>
                <th scope="col">Pais</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Cuenta</th>
                <th scope="col">Marcar</th>
             
              </tr>
            </thead>
             <tbody>

              <?php
                             
                             $x=0;
                             
                             
                              // $sql=$db->query('SELECT * FROM noticias where fechafin >= curdate()  limit 1');
                              foreach ($sql->fetchAll() as $listaUsuarios[$x]) 
                              {
                                //$listanoticias[]= $noticias;
                                    
                                  echo ('
                                     <tr>
                                          <th scope="row">'. utf8_encode($listaUsuarios[$x]['id_usuario']).'</th>
                                          <td>'. utf8_encode($listaUsuarios[$x]['usuario']). '</td>
                                          <td>'. utf8_encode($listaUsuarios[$x]['email']).'</td>
                                          <td>'. utf8_encode($listaUsuarios[$x]['Nom_Ape']).'</td>
                                          <td>'. utf8_encode($listaUsuarios[$x]['provincia']).'</td>
                                          <td>'. utf8_encode($listaUsuarios[$x]['Pais']).'</td>
                                          <td>'. utf8_encode($listaUsuarios[$x]['telefono']).'</td>
                                          <td>'. utf8_encode($listaUsuarios[$x]['cuenta']).'</td>
                                          <td><center><input type="checkbox" class="form-check-input" id="exampleCheck1"></center></td>
                                     </tr> '); 

                                  $x=$x+1;
                               }


               ?>


           
            
            </tbody>
          </table>
      
        </div>
  </div>
</div>





      

<?php
  include ('footer.php');
?>