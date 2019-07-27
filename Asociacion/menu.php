<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> 

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trabajo - Modulo 3</title>
    <script type="text/javascript" src="http://localhost/proyecto/js/jquery.js"></script>
    <script type="text/javascript" src="http://localhost/proyecto/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/proyecto/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/proyecto/css/bootstrap.css">
    <link rel="stylesheet" media="screen" type="text/css" href="http://localhost/proyecto/css/principal.css" />
    <link rel="stylesheet" media="print" type="text/css" href="http://localhost/proyecto/css/imprimir.css" />

    <script type="text/javascript" src="../js/inicio.js"></script>
</head>






<body>



                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="http://localhost/proyecto/home.php">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Galería
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                         <?php
                          if (isset($_SESSION['rol1']))
                          {
                            echo('<a class="dropdown-item" href="http://localhost/proyecto/asociacion/galeria.php">Fotos de la Asociación</a>');
                          }
                        ?>

                        <a class="dropdown-item" href="http://localhost/proyecto/asociacion/momentos.php">Momentos compartidos</a>
                     
                    </li>
                  
               
                     <li class="nav-item ">
                      <a class="nav-link" href="http://localhost/proyecto/asociacion/noticias.php">Noticias</a> 

                    </li>
                     <li class="nav-item ">
                      <a class="nav-link" href="http://localhost/proyecto/asociacion/asociados.php">Asociados </a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="http://localhost/proyecto/asociacion/documentos.php">Documentos</a>
                    </li>
                    <?php

                     if (isset($_SESSION['rol1']) && $_SESSION['rol1']==95)
                     {
                      

                      echo ('<li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestión del Sitio
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="http://localhost/proyecto/asociacion/mtoroles.php">Roles de Usuario</a>
                        <a class="dropdown-item" href="http://localhost/proyecto/asociacion/mtousuarios.php">Usuarios</a>
                        <a class="dropdown-item" href="http://localhost/proyecto/asociacion/noticias_g.php">Noticias</a>
                        <a class="dropdown-item" href="http://localhost/proyecto/asociacion/mtofotos.php">Fotos</a>
                        <a class="dropdown-item" href="http://localhost/proyecto/asociacion/documentos_g.php">Documentos</a>

                       
                      </div>
                      </li>
                     <li>
                       <a href="http://localhost/proyecto/asociacion/sociosptes.php" class="btn btn-outline-danger btn-sm">
                       Socios Ptes <span id="tot_pen" class="badge badge-light"></span>
                        <span class="sr-only">unread messages</span>
                       
                       </a>
                     </li>

                    <li>
                       <a href="http://localhost/proyecto/asociacion/mensajesptes.php" class="btn btn-outline-warning btn-sm">
                       Mensajes <span id="tot_ure" class="badge badge-light"></span>
                        <span class="sr-only">unread messages</span>

                      

                       </a>
                      

                     </li>');
 
                     }


                    ?>
                  </ul>
                  <form class="form-inline form my-2 my-lg-0" action="http://localhost/proyecto/asociacion/logout.php" method="post">
                    <ul class="nav"> 
                               <li class="nav-item">
							   
								<?php
                    if (isset($_SESSION['rol1']))
                    {
										    echo ('<button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModa2" disabled>Hazte Socio</button>');
									  }
                    else
                    {
                        echo ('<button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModa2" >Hazte Socio</button>');
                    }
								?>	  
                              </li  >  
                              <li class="nav-item">
                                <?php
                                    if (isset($_SESSION['rol1']) )
                                      {
                                        //echo('<button type="submit" class=" btn btn-outline-primary btn-sm" >Salir');
                                        echo('<button type="submit" class=" btn btn-outline-primary btn-sm" ><img src="https://img.icons8.com/windows/20/000000/logout-rounded.png" > Salir');
                                        
                                      } 
                                    elseif (!isset($_SESSION['rol1']))
                                    {
                                      echo('<button type="button" class=" btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModa3">Accede');
                                    }
                                   
                                     
                                     
                                   
                                     // $db=Db::cerrar();
                                      ?>
                                       
                               
                                    
                                </button>
                              </li> 
                             

                          </ul>
                  </form>
                </div>
              </nav>


<?php
include_once('datetime.php');
include_once('totpen.php');
include_once('toture.php');
?>
