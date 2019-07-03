<?php

//define('RAIZ', $_SERVER['DOCUMENT_ROOT'].'/');
//include('../proyecto/includes/header.php');
define('RAIZ', $_SERVER['DOCUMENT_ROOT'].'/proyecto/'); 
include(RAIZ . 'includes/header.php');

require_once('models/connection.php');
    $listaUsuarios =[];
    $db= Db::getConnect();
    $sql=$db->query('SELECT * FROM usuarios');

    // carga en la $listaUsuarios cada registro desde la base de datos
    foreach ($sql->fetchAll() as $usuario) {
      $listaUsuarios[]= ($usuario['rol_id']);
    }
    $num_rows=$db->query('SELECT * FROM usuarios where activo=1');
    $tot=0;
     foreach ($num_rows->fetchAll() as $usuario) {
      $tot=$tot+1;
    }

    //return $listaUsuarios;

  
?>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link" href="<?php RAIZ ?>asociacion/galeria.php">Galería</a>
                    </li>
                     <li class="nav-item ">
                      <a class="nav-link" href="<?php RAIZ ?>asociacion/noticias.php">Noticias</a>
                    </li>
                     <li class="nav-item ">
                      <a class="nav-link" href="<?php RAIZ ?>asociacion/asociados.php">Asociados </a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="<?php RAIZ ?>asociacion/documentos.php">Documentos</a>
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
                    </li>
                     <li class="nav-item">
                      <button type="button" class="btn btn-primary">
                        Solicitudes <span class="badge badge-light">'.$tot.'</span>
                        <span class="sr-only">unread messages</span>
                      </button>
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
                                    <?php
                                    if ($listaUsuarios[0]==95)
                                      {
                                        echo('Administrador');
                                      } 
                                      $db=Db::cerrar();
                                      ?>
                                </button>
                              </li> 
                             

                          </ul>
                  </form>
                </div>
              </nav>



             


           <div class="jumbotron jumbotron-fluid">
              <div class="container">
                <h1 class="display-6">Asociacion Hoteleros de Marte (aquí en su momento metemos un Carousel</h1>
               
              </div>
           </div>




         <div class="container">
          <div class="row">
            <div class=" col-6 shadow p-3 mb-5 bg-white  border-left">
               <article id="beneficios">
                <h3 >Beneficios</h3>
                <p>Estar informado/a y compartir con todos los asociados, la trayectoria futura de nuestra
                   asociaci&oacute;n, teniendo voz y voto en las decisiones que se tomen. Disfrutar de todas las
                   ventajas de pertenecer a nuestra Asociaci&oacute;n, convenios, acuerdos, adoptados con otras
                   entidades y servicios que dia a dia vamos seleccionando para dar lo mejor.</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Regístrate
                    </button>
            </article>
            </div>
            <div class=" col-6 shadow p-3 mb-5 bg-white rounded">
              <article id="asesorar">
                    <h3 class="asesora">Asesoramieto</h3>
                    <p>Hoy en d&iacute;a los impuestos provocan una de las cargas m&aacute;s importantes para un
                       aut&oacute;nomo. Para reducir esta carga es necesaria la implantaci&oacute;n de una adecuada
                       planificaci&oacute;n fiscal y laboral con le objetivo de lograr el ahorro. Por este motivo
                       tenemos a vuestra disposici&oacute;n una amplia gama de servicios de car&aacute;cter
                       administrativo, econ&oacute;mico y jur&iacute;dico.</p>
                </article>
            </div>
          
          </div>
          </div>


       
        
            <div class="col-12 col-5 shadow p-3 mb-5 bg-white rounded">
             <article id="general">
                <h3 class="titgeneral">Noticias Generales</h3>
                <p>El pasado s&aacute;bado d&iacute;a 24 de febrero tuvo lugar la V Carrera por la Igualdad organizado
                   por el Ayuntamiento de Alcaudete.</p>
                <p>Tras la redacci&oacute;n del proyecto, da comienzo la construcci&oacute;n de un espacio "skatepark"
                   junto a los casi finalizados parque de educaci&oacute;n vial y zona infantil de juegos.</p>
                   <a href="asociacion/noticias.html" class="btn btn-primary">Ver más..</a>
            </article>
            </div>

<?php
  require (RAIZ . 'includes/footer.php');
?>