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
      </div>


           <div class="container">
                <div class="row">
                  <div class="col-10" >

                    <ul class="nav ">
                    
                        <li class="nav-item"><a class="nav-link" name="inicio" href="../index.html">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" name="galeria" href="../asociacion/galeria.html">Galeria</a></li>
                        <li class="nav-item"><a class="nav-link" name="noticias" href="../asociacion/noticias.html">Noticias</a></li>
                        <li class="nav-item"><a class="nav-link" name="asociados" href="../asociacion/asociados.html">Asociados</a></li>
                        <li class="nav-item"><a class="nav-link" name="documentos" href="../asociacion/documentos.html">Documentos</a></li>
                        <li class="nav-item"><a class="nav-link" name="registro" href="../asociacion/registro.html">Hazte Socio</a></li> 
                    </ul>

                  </div>

                  <div class="col-2">
                      <ul class="nav">                                           
                        <li class="nav-item"><a class="nav-link" name="inscribete" href="#">Accede</a></li>
                      </ul>
                  </div> 

                </div>                                           
           </div>  
        </div> 



    <div class="container">
        <h2 class="titins">Inscribete</h2>
        <div class="row">
        <div class="  col-md-12 col-lg-8">
                
        <p class="contact">Rellena el siguiente formulario para solicitar tu inscripción en la Asociacion:</p>
        <div id="formularios">
            <form id="forminscribete" action="" method="post">
                <label class="contact" for="nombre">Nombre y apellidos</label><span class="requerido">*</span>
                <br/>
                <input type="text" id="nombre" name="nombre" maxlength="30" value="" size ="40"/>
                <br/>
                <br/>
                <label class="contact" for="dni">DNI/NIE</label><span class="requerido">*</span>
                <br/>
                <input type="text" id="dni" name="dni" maxlength="9" value="" size="40"/>
                <br/>
                <br/>
                <label class="contact" for="sexo">Sexo</label>
                <br/>
                <input type="radio" id="sexo" name="sexo" value="hombre" checked="checked" /> Hombre
                <br/>
                <input type="radio" name="sexo" value="mujer" /> Mujer
                <br/>
                <br/>
                <label class="contact" for="nivel">Nivel de Estudios</label>
                <br/>
                <input type="radio" id="nivel" name="nivel" value="sin" checked="checked"/> Sin estudios
                <br/>
                <input type="radio" name="nivel" value="eso"/> Estudios obligatorios (ESO,EGB)
                <br/>
                <input type="radio" name="nivel" value="fp"/> Formación Profesional,Bachillerato
                <br/>
                <input type="radio" name="nivel" value="funi"/> Formación Universitaria
                <br/>
                <input type="radio" name="nivel" value="doctorado"/> Doctorado
                <br/>
                <br/>
                <label class="contact" for="situacion">Situacion Actual</label>
                <br/>
                <input type="radio" id="situacion" name="situacion" value="estudiante" checked="checked"/> Estudiante
                <br/>
                <input type="radio" name="situacion" value="desempleado"/> Desempleado
                <br/>
                <input type="radio" name="situacion" value="autonomo"/> Trabajador Autónomo
                <br/>
                <input type="radio" name="situacion" value="ajena"/> Trabajador por cuenta ajena
                <br/>
                <input type="radio" name="situacion" value="funcionario"/> Funcionario
                <br/>
                <input type="radio" name="situacion" value="Jubilado"/> Jubilado
                <br/>
                <input type="radio" name="situacion" value="otros"/> Otros
                <br/>
                <br/>
                <label class="contact" for="localidad">Localidad</label><span class="requerido">*</span>
                <br/>
                <input type="text" id="localidad" name="localidad"  maxlenght="20" value="" size="40"/>
                <br/>
                <br/>
                <label class="contact" for="provincia">Provincia</label><span class="requerido">*</span>
                <br/>
                <input type="text" id="provincia" name="Provincia"  maxlenght="20" value="" size="40"/>
                <br/>
                <br/>
                <label class="contact" for="telefono">Teléfono de contacto</label>
                <br/>
                <input type="text" id="telefono" name="telefono" maxlength="9" value="" size="40"/>
                <br/>
                <br/>
                <label class="contact" for="email">Email</label><span class="requerido">*</span>
                <br/>
                <input type="text" id="email" name="email" maxlenght="30" value="" size="40"/>
                <br/>
                <br/>
                <input type="checkbox" name="privacidad" value="aceptar"/><strong>Entiendo y acepto la politica de privacidad</strong>
                <br/>
                <br/>
                <!--<input class="botones" type="submit" name="enviar" value="Enviar"/>-->
                     <a class="btn btn-primary btn-sm" href="#" role="button" type="submit">Enviar</a>
            </form>
            <div class="clear"></div>

        </div>
        </div>
        <div class=" col-md-12 col-lg-4">
            <div class="card" style="width: 16rem;">
                  <img src="../imagenes/alcaudete3.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Castillo Medieval</h5>
                    <p class="card-text">Viejo Castillo de...</p>
                  
                  </div>
            </div>
            <div class="card" style="width: 16rem;">
                  <img src="../imagenes/alcaudete4.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Castillo Medieval</h5>
                    <p class="card-text">Viejo Castillo de...</p>
                  
                  </div>
            </div>
           <div class="card" style="width: 16rem;">
                  <img src="../imagenes/alcaudete5.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Castillo Medieval</h5>
                    <p class="card-text">Viejo Castillo de...</p>
                  
                  </div>
            </div>
            <div class="card" style="width: 16rem;">
                  <img src="../imagenes/alcaudete6.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Castillo Medieval</h5>
                    <p class="card-text">Viejo Castillo de...</p>
                  
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