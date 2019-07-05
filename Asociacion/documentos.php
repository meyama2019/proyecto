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
      require_once('menu.php');
  
?>

       
  


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