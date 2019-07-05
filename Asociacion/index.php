<?php
session_start();
//define('RAIZ', $_SERVER['DOCUMENT_ROOT'].'/');
//include('../proyecto/includes/header.php');
define('RAIZ', $_SERVER['DOCUMENT_ROOT'].'/proyecto/'); 
include(RAIZ . 'includes/header.php');
//include('http://localhost/proyecto/includes/header.php');

require_once('menu.php');

  
?>




             


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
                   <a href="asociacion/noticias.php" class="btn btn-primary">Ver más..</a>
            </article>
            </div>

<?php
  require (RAIZ . 'includes/footer.php');
?>