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

              

     
        <div class="accordion" id="accordionExample">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Ferial Madrid 2019
                </button>
              </h2>
            </div>

            <div id="collapseOne" class="collapse show container" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body ">
                <div class="row">
                  <div class="col-4">
                       <img src="../imagenes/alcaudete1.jpg" alt="..." class="img-thumbnail">
                  </div>
                   <div class="col-4">
                       <img src="../imagenes/alcaudete2.jpg" alt="..." class="img-thumbnail">
                  </div>
                   <div class="col-4">
                       <img src="../imagenes/alcaudete3.jpg" alt="..." class="img-thumbnail">
                  </div>
                  
                </div>
                  <div class="row">
                  <div class="col-4">
                       <img src="../imagenes/alcaudete1.jpg" alt="..." class="img-thumbnail">
                  </div>
                   <div class="col-4">
                       <img src="../imagenes/alcaudete2.jpg" alt="..." class="img-thumbnail">
                  </div>
                   <div class="col-4">
                       <img src="../imagenes/alcaudete3.jpg" alt="..." class="img-thumbnail">
                  </div>
                  
                </div>


               

              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Asistencia a Evento #1
                </button>
              </h2>
            </div>
            <div id="collapseTwo" class="collapse container" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
               
                <div class="row">
                  <div class="col-4">
                       <img src="../imagenes/alcaudete4.jpg" alt="..." class="img-thumbnail">
                  </div>
                   <div class="col-4">
                       <img src="../imagenes/alcaudete5.jpg" alt="..." class="img-thumbnail">
                  </div>
                   <div class="col-4">
                       <img src="../imagenes/alcaudete6.jpg" alt="..." class="img-thumbnail">
                  </div>
                  
                </div>

              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Grupo de Fotos #3
                </button>
              </h2>
            </div>
            <div id="collapseThree" class="collapse container" aria-labelledby="headingThree" data-parent="#accordionExample">
              <div class="card-body">
                
                   <div class="row">
                      <div class="col-4">
                           <img src="../imagenes/alcaudete1.jpg" alt="..." class="img-thumbnail">
                      </div>
                       <div class="col-4">
                           <img src="../imagenes/alcaudete3.jpg" alt="..." class="img-thumbnail">
                      </div>
                       <div class="col-4">
                           <img src="../imagenes/alcaudete6.jpg" alt="..." class="img-thumbnail">
                      </div>
                      
                    </div>

              </div>
            </div>

   
  
<?php
  require (RAIZ . 'includes/footer.php');
?>