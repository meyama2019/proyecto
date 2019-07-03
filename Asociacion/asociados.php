<?php

define('RAIZ', $_SERVER['DOCUMENT_ROOT'].'/proyecto/'); 
include(RAIZ . 'includes/header.php');

include('../models/connection.php');
     $listaUsuarios = array(
   array('id_usuario' => '','usuario' => '','passwd' => '','metodo' => '','email' => '','Nom_Ape' => '','dni' => '','provincia' => '','Pais' => '','telefono' => '','cuenta' => '','activo' => '1','rol_id' => '')
    );
    $db=Db::getConnect();
    $sql=$db->query('SELECT * FROM usuarios');

    // carga en la $listaUsuarios cada registro desde la base de datos
   
    //return $listaUsuarios;

  

   
  
?>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                      <a class="nav-link" href="../home.php">Home </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php RAIZ ?>galeria.php">Galería</a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="<?php RAIZ ?>noticias.php">Noticias</a>
                    </li>
                     <li class="nav-item active">
                      <a class="nav-link" href="#">Asociados <span class="sr-only">(current)</span></a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="<?php RAIZ ?>documentos.php">Documentos</a>
                    </li>
                    <?php
                     if ($listaUsuarios[0]==95)
                      echo '<li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestión del Sitio
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Roles de Usuario</a>
                        <a class="dropdown-item" href="#">Usuarios</a>
                        <a class="dropdown-item" href="#">Noticias</a>
                        <a class="dropdown-item" href="#">Fotos</a>
                        <a class="dropdown-item" href="#">Documentos</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li>'
                    
                    ?>
                    
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                    <ul class="nav">
                               <li class="nav-item">
                                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModa2">
                                    Hazte Socio
                                </button>
                              </li> 
                              <li class="nav-item">
                                <button type="button" class=" btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModa3">
                                    Acceder
                                </button>
                              </li> 

                          </ul>
                  </form>
                </div>
              </nav>
           







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
                                          <td>'. utf8_encode($listaUsuarios[$x]['provincia']).'</td>
                                          <td>'. utf8_encode($listaUsuarios[$x]['Pais']).'</td>
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
  require_once (RAIZ . 'includes/footer.php');
?>