<?php

define('RAIZ', $_SERVER['DOCUMENT_ROOT'].'/empresa/');
include(RAIZ . 'includes/header.php');
  
?>



    <div class="container">
         <h2 class="titform">CONTACTO</h2>
          <div class="row">
            <div class="  col-md-12 col-lg-8">
               <section id="formularios">
                <form id="formcontacto" action="" method="post">
                    <label class="contact" for="nombre">Nombre y apellidos</label><span class="requerido">*</span>
                    <br/>
                    <input type="text" id="nombre" name="nombre" maxlength="30" value="" size ="50"/>
                    <br/>
                    <br/>
                    <label class="contact" for="email">Email</label><span class="requerido">*</span>
                    <br/>
                    <input type="text" id="email" name="email" maxlenght="30" value="" size="50"/>
                    <br/>
                    <br/>
                    <label class="contact" for="telefono">Teléfono de contacto</label>
                    <br/>
                    <input type="text" id="telefono" name="telefono" maxlength="9" value="" size="50"/>
                    <br/>
                    <br/>
                    <label class="contact" for="asunto">Asunto</label><span class="requerido">*</span>
                    <br/>
                    <input type="text" id="asunto" name="asunto"  maxlenght="30" value="" size="50"/>
                    <br/>
                    <br/>
                    <label class="contact" for="mensaje">Mensaje</label><span class="requerido">*</span>
                    <br/>
                    <textarea id="mensaje" name="mensaje" cols="80" rows="5"></textarea>
                    <br/>
                    <br/>
                    <input type="checkbox" name="privacidad" value="aceptar"/><strong>Entiendo y acepto la politica de privacidad</strong>
                    <br/>
                    <!--<input class="botones" type="submit" name="enviar" value="Enviar"/>-->
                     <a class="btn btn-primary btn-sm" href="#" role="button" type="submit">Enviar</a>
                </form>
               
                </section>
            </div>
            <div class=" col-md-12 col-lg-4">

                 <div class="card" style="width: 16rem;">
                  <img src="../imagenes/alcaudete1.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Castillo Medieval</h5>
                    <p class="card-text">Viejo Castillo de...</p>
                  
                  </div>
                 </div>
                <div class="card" style="width: 16rem;">
                  <img src="../imagenes/alcaudete2.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Castillo Medieval</h5>
                    <p class="card-text">Viejo Castillo de...</p>
                  
                  </div>
                </div>
             
            </div>
            
          </div>
     </div>

 
<?php
  require (RAIZ . 'includes/footer.php');
?>