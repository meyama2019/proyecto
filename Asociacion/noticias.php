<?php

define('RAIZ', $_SERVER['DOCUMENT_ROOT'].'/empresa/');
include(RAIZ . 'includes/header.php');

  
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
                      <a class="nav-link" href="<?php RAIZ ?>galeria.php">Asociados</a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="<?php RAIZ ?>galeria.php">Documentos</a>
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

 


              <div class="card">
                    <div class="card-header"><h3>
                      MOOC: ¿Est&aacute;s preparado para competir? Transformaci&oacute;n digital para pymes.</h3>
                    </div>
                    <div class="card-body">
                      <h6 class="card-title">15 de febrero de 2019</h6>
                      <p class="card-text">La transformaci&oacute;n digital de las empresas es un factor clave hoy d&iacute;a para su
                   competitividad y productividad. Pr&oacute;ximamente, Andaluc&iacute;a Digital pone en marcha un MOOC sobre
                   este tema, para los que quieran formarse de forma gratuita y on-line.</p>
                   
                      <a href="#" class="btn btn-primary">Ver más..</a>
                    </div>
              </div>

              <div class="card">
                <div class="card-header"><h3>
                 El Ayuntamiento de Alcaudete ha presentado la primera edici&oacute;n del Premio a la Mejor Idea Empresarial.</h3>
                </div>

                <div class="card-body">
                    <h6 class="card-title">20 de Marzo de 2019</h6>
                    <p class="card-text">Este certamen est&aacute; dirigido a emprendedores de hasta 35 años. La idea es potenciar
                 el desarrollo de nuevos proyectos empresariales. Cuenta con un premio de 4.000 € y otro de 1.000 €. El plazo
                 de presentaci&oacute;n de proyectos va del 1 de febrero al 15 de Marzo del 2019</p>
                 
                    <a href="#" class="btn btn-primary">Ver más..</a>
                </div>
              </div>

               <div class="card">
                <div class="card-header"><h3>
                 LINCE, un Evento para el Emprendedor y sus Ideas</h3>
                </div>
                <div class="card-body">
                  <h6 class="card-title"> 23 de junio de 2017</h6>
                  <p class="card-text">LINCE pretende apoyar a los mejores proyectos en marcha e ideas de Emprendimiento de la
               Provincia. Visualizar el Ecosistema de Emprendimiento de la Provincia. Crear Redes entre Emprendedores,
               Empresarios e Instituciones, y Mostrar Buenas Pr&aacute;cticas y Experiencias de Empresas.</p>
               
                  <a href="#" class="btn btn-primary">Ver más..</a>
                </div>
              </div>
          
              <div class="card">
                <div class="card-header"><h3>
                 IMEFE: abierto el plazo de solicitud para la cesi&oacute;n gratuita de espacios de negocio</h3>
                </div>
                <div class="card-body">
                  <h6 class="card-title">27 de junio de 2017</h6>
                  <p class="card-text">El Instituto Municipal de Empleo y Formaci&oacute;n Empresarial del Excmo. Ayuntamiento
               informa que, actualmente y hasta el 18 de agosto de 2017 (13:00 horas), se encuentra abierto el plazo de
               solicitud para la cesi&oacute;n gratuita de negocio</p>
               
                  <a href="#" class="btn btn-primary">Ver más..</a>
                </div>
              </div>

         
        
        
  
           <!-- Modal del Regístrate ------------------------------------------------------->





      <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Registro de usuario</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                    <form>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>


                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
               


     <!-- Modal del Alta de Socio  ------------------------------------------------------->

      <!-- Modal -->
           <div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabe2" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabe2">Alta de Socio</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                    <form>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Usuario</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">DNI</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Teléfono</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                      </div>
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
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



 <!-- Modal del Acceso de Usuarios  ------------------------------------------------------->

      <!-- Modal -->
           <div class="modal fade" id="exampleModa3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabe2" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabe2">Login Usuario</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                    <form>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Usuario</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                      
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                      
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                        <center>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                        </center>
                     
                           
                     
                    </form>


                  
                </div>
               
            </div>
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