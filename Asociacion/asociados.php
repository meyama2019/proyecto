<?php
session_start();
//define('RAIZ', $_SERVER['DOCUMENT_ROOT']. '/proyecto/'); 
//include(RAIZ . 'asociacion/header.php');
include ('../includes/header.php');
include('../models/connection.php');


     $listaUsuarios = array(array('id_usuario' => '', 'usuario' => '', 'email' => '', 'Nom_Ape' => '','dni' => '', 'provincia' => '', 'nombre' => '', 'telefono' => '','cuenta' => '', 'activo' => '', 'rol_id' => '')
      );
    


    $db=Db::getConnect();
    $sql=$db->query(' SELECT id_usuario,usuario,email,Nom_Ape,dni,pr.provincia,pa.nombre,telefono,cuenta,activo,rol_id 
      FROM usuarios us  
      inner join paises pa on us.Pais = pa.id
      inner join provincias pr on pr.id_provincia = us.provincia      
      where us.rol_id = 2');

    // carga en la $listaUsuarios cada registro desde la base de datos
   
    //return $listaUsuarios;

  
    require_once('menu.php');
   
  
?>





        <div class="container">
          <h2>Conoce a nuestros asociados</h2>
          <br><br>
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">id</th>
                <th scope="col">usuario</th>
                <th scope="col">email</th>
                <th scope="col">Nom_Ape</th>
                <th scope="col">DNI</th>
                <th scope="col">Provincia</th>
                <th scope="col">Pais</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Cuenta</th>
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
                                          <td>'. utf8_encode($listaUsuarios[$x]['dni']).'</td>
                                          <td>'. utf8_encode($listaUsuarios[$x]['provincia']).'</td>
                                          <td>'. utf8_encode($listaUsuarios[$x]['nombre']).'</td>
                                          <td>'. utf8_encode($listaUsuarios[$x]['telefono']).'</td>
                                          <td>'. utf8_encode($listaUsuarios[$x]['cuenta']).'</td>
                                     </tr> '); 

                                  $x=$x+1;
                               }


               ?>


           
            
            </tbody>
          </table>
      
        </div>

<?php
  include ('footer.php');
?>