<?php
session_start();
define('RAIZ', $_SERVER['DOCUMENT_ROOT'].'/proyecto/');
include(RAIZ . 'asociacion/header.php');
include('../models/connection.php');
    $listaUsuarios =[];
    $db=Db::getConnect();
    $sql=$db->query('SELECT * FROM usuarios');

    // carga en la $listaUsuarios cada registro desde la base de datos
    foreach ($sql->fetchAll() as $usuario) {
      $listaUsuarios[]= ($usuario['rol_id']);
    }
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
                     <li class="nav-item ">
                      <a class="nav-link" href="<?php RAIZ ?>asociados.php">Asociados </a>
                    </li>
                     <li class="nav-item active">
                      <a class="nav-link" href="#">Documentos<span class="sr-only">(current)</span></a>
                    </li>
                     <?php
                      if (isset($_SESSION['rol1']) && $_SESSION['rol1']==95)
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
                    </li>
                    <li class="nav-item">
                      <button type="button" class="btn btn-primary">
                        Solicitudes <span class="badge badge-light">'.$_SESSION['tot_pen'].'</span>
                        <span class="sr-only">unread messages</span>
                      </button>
                    </li>'
                    
                    ?>
                    
                  </ul>
                  <form class="form-inline my-2 my-lg-0" action="http://localhost/proyecto/asociacion/logout.php" method="post">
                    <ul class="nav">
                               <li class="nav-item">
                                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModa2">
                                    Hazte Socio
                                </button>
                              </li> 
                              <li class="nav-item">
                               <?php
                                    if (isset($_SESSION['rol1']) )
                                      {
                                        echo('<button type="submit" class=" btn btn-outline-primary btn-sm" >Salir');
                                        
                                      } 
                                    elseif (!isset($_SESSION['rol1']))
                                    {
                                      echo('<button type="button" class=" btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModa3">Accede');
                                    }

                                      ?>
                                </button>
                              </li> 

                          </ul>
                  </form>
                </div>
              </nav>
           


              <?php

              if( !isset($_SESSION['rol1']) || $_SESSION['rol1'] == 1)
              {
                echo(' <div class="alert alert-danger" role="alert">
                    Sección disponible sólo para Socios !
                  </div> ');
              }
              else
                echo(' <div class="accordion" id="accordionExample">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Registro / Solicitudes
                    </button>
                  </h2>
                </div>

                <div id="collapseOne" class="collapse show container" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body ">
                      <div class="container">
                      
                          <table class="table">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">Cod</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Fecha</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                              </tr>
                               <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                              </tr>
                         
                            </tbody>
                          </table>
                      
                        </div>

                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                     Manuales / Doc. en pdf
                    </button>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse container" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body">
                   <div class="container">
                      
                          <table class="table">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">Cod</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Fecha</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                              </tr>
                               <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                              </tr>
                         
                            </tbody>
                          </table>
                      
                        </div>
                  </div>
                </div>
              </div>
                <div class="card">
                <div class="card-header" id="headingThree">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Reservas
                    </button>
                  </h2>
                </div>
                
                <div id="collapseThree" class="collapse container" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body">
                   <div class="container">
                      
                          <table class="table">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">Cod</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Fecha</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                              </tr>
                               <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                              </tr>
                         
                            </tbody>
                          </table>
                      
                        </div>
                  </div>
                </div>
                ');
              ?>
     
           
            

 
   

<?php
  require (RAIZ . 'includes/footer.php');
?>