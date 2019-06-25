<?php

define('RAIZ', $_SERVER['DOCUMENT_ROOT'].'/empresa/');
include(RAIZ . 'includes/header.php');
  
?>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                      <a class="nav-link" href="../home.php">Home </a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Galería<span class="sr-only">(current)</span></a>
                    </li>
                     <li class="nav-item ">
                      <a class="nav-link" href="<?php RAIZ ?>noticias.php">Noticias</a>
                    </li>
                     <li class="nav-item ">
                      <a class="nav-link" href="<?php RAIZ ?>asociados.php">Asociados </a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="<?php RAIZ ?>documentos.php">Documentos</a>
                    </li>
                    <li class="nav-item dropdown">
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