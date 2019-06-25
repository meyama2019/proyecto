<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trabajo - Modulo 1</title>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" type="text/css" href="../css/principal.css" />
    <link rel="stylesheet" media="print" type="text/css" href="../css/imprimir.css" />
</head>
<body>
 <div class="container">
            <header id="cabecera">
                <h1>ASOCIACION DE HOTELEROS DE MARTE</h1>
                
                <div class="clear"></div>
            </header>
          
          

              <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="../index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../asociacion/galeria.html">Galería</a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="../asociacion/noticias.html">Noticias</a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="../asociacion/asociados.html">Asociados</a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="../asociacion/documentos.html">Documentos</a>
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





     <div class="container">
          <div class="jumbotron">
            <h1 class="display-4">Eventos</h1>
            <p class="lead">Al día con la Asociación</p>
               <hr class="my-4">
              <h2>SEMINARIO Innovaci&oacute;n y Creatividad en los Negocios</h2>
              <p class="peventos">Hablaremos de como el cambio y la adaptaci&oacute;n exitosa a entornos fluctuantes ha sido
                 la clave de la evoluci&oacute;n, la innovaci&oacute;n lo es para la supervivencia y sostenibilidad de las
                 organizaciones en el mundo actual.</p>
              <h2>Nuevas alternativas, nuevos mercados, m&aacute;s oportunidades</h2>
              <p class="peventosu">El objetivo de este taller es ayudar a las empresas a plantear, de manera integral, el acceso
                 a mercados diferentes a los tradicionales. Se inicia en la fase de an&aacute;lisis y valoraci&oacute;n de
                 oportunidades, evaluaci&oacute;n de la capacidad interna etc.</p>
          </div>
    </div>



        <!-- Modal del Contacto y comunicación con Administrador / Empresa  ------------------------------------------------------->

      <!-- Modal -->
           <div class="modal fade" id="exampleModa4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabe4" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabe4">Contactar con la Asociación</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                    <form>
                       <div class="form-group">
                        <label for="exampleInputEmail4">Nombre y apellidos</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="namelHelp" placeholder="Name" required>
                      
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                      
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1"´>Teléfono de Contacto</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="tfnolHelp" placeholder="Enter your phone" >
                      
                       </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Asunto</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="asuntoHelp" placeholder="Enter your phone" >
                      
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1"´>Mensaje Max.200 Caract.</label>
                      
                        <textarea class="span6 form-control" rows="3" cols="50" placeholder="Escribe tus comentarios..." required></textarea>
                      
                      </div>

                        <center>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                       </center>
                     
                           
                     
                    </form>


                  
                </div>
               
            </div>
          </div>
        </div>

    
      <div class="container">
         <footer id="pie">
            <div class="row">
              <div class="col-11">
                 <h4><ins>Contacto</ins></h4>
                  
                  <p id="sede">Sede en Alcaudete<br/>
                     Asocicaci&oacute;n de Comerciantes de Alcaudete<br/>
                     C/ El Carmen, 100<br/>
                     23660 - Alcaudete<br/>
                     Telf.: 999 55 55 55<br/>
                     e-mail: alcaudete@curso.es</p>

                  
               </div>
              <div class="col-1">
                <a href="asociacion/contacto.html" class="badge badge-info" data-toggle="modal" data-target="#exampleModa4" >Contacto</a>
                
              </div>


            </div>
           
        </footer>
          <p id="copyright">Copyright &copy; meyama2019</p>
      </div>
       
    </div>   
        
  
</body>
</html>