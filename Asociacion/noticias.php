<?php

define('RAIZ', $_SERVER['DOCUMENT_ROOT'].'/proyecto/');
include(RAIZ . 'asociacion/header.php');

require_once('../models/connection.php');
    $listaUsuarios = array(
   array('id_usuario' => '','usuario' => '','passwd' => '','metodo' => '','email' => '','Nom_Ape' => '','dni' => '','provincia' => '','Pais' => '','telefono' => '','cuenta' => '','activo' => '1','rol_id' => '')
);
    $listanoticias = array(
  array('id_noticia' => '1','userid' => '1','fechainicio' => '2019-06-25','fechafin' => '2019-06-30','titulo' => 'MOOC: ¿Estás preparado para competir? Transformación digital para pymes.','descripcion' => 'La transformación digital de las empresas es un factor clave hoy día para su competitividad y productividad. Próximamente, Andalucía Digital pone en marcha un MOOC sobre este tema, para los que quieran formarse de forma gratuita y on-line.')
);
  
    $db=Db::getConnect();
    $y=0;
    $sql=$db->query('SELECT * FROM usuarios where id_usuario=1');

    // carga en la $listaUsuarios cada registro desde la base de datos

    foreach ($sql->fetchAll() as $usuario) {
      $listaUsuarios[$y]= $usuario;
      $y=$y+1;
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
                     <li class="nav-item active">
                      <a class="nav-link" href="#">Noticias<span class="sr-only">(current)</span></a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="<?php RAIZ ?>asociados.php">Asociados</a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="<?php RAIZ ?>documentos.php">Documentos</a>
                    </li>
                     <?php
                     if ($listaUsuarios[0]['rol_id']==95)
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

 

                 <?php
                              $x = 0;
                              switch ($listaUsuarios[0]['rol_id']) {
                                case 95:
                                  # code...
                                  $sql=$db->query('SELECT * FROM noticias');
                                  break;
                                 case 2:
                                  # code...
                                   $sql=$db->query('SELECT * FROM noticias where fechafin >= curdate()');
                                  break;
                                  case 1:
                                  # code...
                                   $sql=$db->query('SELECT * FROM noticias where fechafin >= curdate()  limit 1');
                                  break;
                                
                                default:
                                  # code...
                                  break;
                              }
                             
                              // $sql=$db->query('SELECT * FROM noticias where fechafin >= curdate()  limit 1');
                              foreach ($sql->fetchAll() as $listanoticias[$x]) {
                                //$listanoticias[]= $noticias;
                                
                              echo('<div class="card">
                                <div class="card-header"><h3> '. utf8_encode($listanoticias[$x]['titulo']) .'            
                                         </h3>
                                      </div>
                                      <div class="card-body">
                                        <h6 class="card-title">'. utf8_encode($listanoticias[$x]['fechafin']) .'</h6>
                                        <p class="card-text">'. utf8_encode($listanoticias[$x]['descripcion']) .'</p>
                                     
                                        <a href="#" class="btn btn-primary">Ver más..</a>
                                      </div>
                                </div>');

                              $x=$x+1;
                              }
                  
                              $db=Db::cerrar();
                ?>

             

           
         
        
        
  


 <?php
  require (RAIZ . 'includes/footer.php');
?>