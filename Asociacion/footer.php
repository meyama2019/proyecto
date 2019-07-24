<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> 

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trabajo - Modulo 3</title>
    <script type="text/javascript" src="http://localhost/proyecto/js/jquery.js"></script>
    <script type="text/javascript" src="http://localhost/proyecto/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/proyecto/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" type="text/css" href="http://localhost/proyecto/css/principal.css" />
    <link rel="stylesheet" media="print" type="text/css" href="http://localhost/proyecto/css/imprimir.css" />
    <style type="text/css">
         .carousel-inner img {
            width: 100%;
            max-height: 460px;
        }
        .carousel-inner{
         height: 250px;
        }
    </style>
   
 <script type="text/javascript">
 function contar ()
{
    var x = document.getElementById("ContactoMensasje").value.length;
    
    if (x == 0)
    {
      document.getElementById("labelcontactmessage").innerHTML = "M&aacute;nimo 200 car&aacute;cteres";
    }
    else if (x > 0 && x < 200)
    {
      var y = "Quedan " + (201-x) + " " + "letras";
      y = y.bold();
      document.getElementById("labelcontactmessage").innerHTML = y;
    }
} 
</script>      
   
</head>




<!--Para el alta de SOCIOS-->
<?php
          if(isset($_POST['submit1']))
          {
          
            if (( !empty($_POST['SocioUsuario'])) && ( !empty($_POST['socioEmail'])) && ( !empty($_POST['SocioPassword'])) && ( !empty($_POST['SocioDNI'])) && ( !empty($_POST['SocioTelf'])) )
              {
                
                $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
                $username = $_POST['SocioUsuario'];
                $userdni = $_POST['SocioDNI'];
                $useremail = $_POST['socioEmail'];
                
                $sql_u = "SELECT * FROM usuarios WHERE usuario='$username'";
                $sql_d = "SELECT * FROM usuarios WHERE dni='$userdni'";
                $sql_e = "SELECT * FROM usuarios WHERE email='$useremail'";
                $res_u = mysqli_query($conexion, $sql_u);
                $res_d = mysqli_query($conexion, $sql_d);
                $res_e = mysqli_query($conexion, $sql_e);
                
                $password = sha1($_POST['SocioPassword']);
                
                if ((mysqli_num_rows($res_d) == 0) && (mysqli_num_rows($res_e) == 0) && (mysqli_num_rows($res_u) == 0))
                
                {
                  $sql = "INSERT INTO usuarios (usuario, passwd, email, Nom_Ape,  dni, provincias, pais, telefono, cuenta, activo, rol_id ) 

				  values ('$_POST[SocioUsuario]','$password','$_POST[socioEmail]','$_POST[NombreApellidosSocio]','$_POST[SocioDNI]','$_POST[SocioProvincia]','$_POST[SocioPais]','$_POST[SocioTelf]', '$_POST[SocioCuenta]',1, 1)";

                  $consulta = mysqli_query($conexion, $sql);
                  if($consulta)
                    {
                      include ('confirm.php');
                      //ini_set('SMTP','smtp.gmail.com');
                      //ini_set('smtp_port',587);
                      //$to = "meyama2019@gmail.com";
                      //$subject = "Alta como socio";
                      //$mensaje = "Buenos días,\r\n¡Te damos la bienvenida!.\r\n¡Gracias por formar parte de nuestra familia!\r\n" ;
                      //$headers = "From: meyama2019@gmail.com" . "\r\n" . "BCC: meyama2019@gmail.com;  ";
                      //mail($to,$subject,$mensaje,$headers);
                    }
                  mysqli_close($conexion);
                
                }
                else
                {
                  include ('noconfirm.php');    
                }
              }
          }  
    ?>

  
  
  
  





 	
	
	
	

<!--Para el alta de USUARIOS REGISTRADOS-->
<?php
     if(isset($_POST['submitur']))
          {
          
           if ((!empty($_POST['ur_email'])) && (!empty($_POST['ur_passwd'])))
              {
                
                $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
                $em=$_POST['ur_email']; //obligatorio
                $pw=sha1($_POST['ur_passwd']); //obligatorio
                $activo=0; // <- Usuario registrado activo
                $rol=1;    // <- Rol de Usuario registrado
                
               
                $sql_e = "SELECT * FROM usuarios WHERE email='$em'";
               
                $res_e = mysqli_query($conexion, $sql_e);
                
               
                
                if ((mysqli_num_rows($res_e) == 0))
                
                {
                  $sql = "INSERT INTO usuarios ( email, passwd, metodo, activo, rol_id )
                   values ('$_POST[ur_email]','$pw',1,'$activo', '$rol')";
                  $consulta = mysqli_query($conexion, $sql);
                  if($consulta)
                    {
                      include ('confirm_ur.php');
                      //ini_set('SMTP','smtp.gmail.com');
                      //ini_set('smtp_port',587);
                      //$to = "meyama2019@gmail.com";
                      //$subject = "Alta como socio";
                      //$mensaje = "Buenos días,\r\n¡Te damos la bienvenida!.\r\n¡Gracias por formar parte de nuestra familia!\r\n" ;
                      //$headers = "From: meyama2019@gmail.com" . "\r\n" . "BCC: meyama2019@gmail.com;  ";
                      //mail($to,$subject,$mensaje,$headers);
                    }
                  mysqli_close($conexion);
                
                }
                else
                {
                  include ('noconfirm_ur.php');    
                }
              }
          }  
    ?>

 
<!--Para el formulario de CONTACTO-->
<?php
          if(isset($_POST['submitContacto']))
          {
                $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
                $acentos="SET NAMES 'utf8'";
                mysqli_query($conexion, $acentos);
                $sql = "INSERT INTO contacto (fecha_entrada, nombre, email, telefono, asunto, mensaje, activo) values (current_timestamp ,'$_POST[ContactoNombre]','$_POST[ContactoEmail]','$_POST[ContactoTelefono]','$_POST[ContactoAsunto]','$_POST[ContactoMensasje]', 1)";
                $consulta = mysqli_query($conexion, $sql);
                if($consulta)
                    {
                      include ('confirm_me.php');
                      //ini_set('SMTP','smtp.gmail.com');
                      //ini_set('smtp_port',587);
                      //$to = "meyama2019@gmail.com";
                      //$subject = "Alta como socio";
                      //$mensaje = "Buenos días,\r\n¡Te damos la bienvenida!.\r\n¡Gracias por formar parte de nuestra familia!\r\n" ;
                      //$headers = "From: meyama2019@gmail.com" . "\r\n" . "BCC: meyama2019@gmail.com;  ";
                      //mail($to,$subject,$mensaje,$headers);
                    $num_rows=$db->query('SELECT * FROM contacto where activo=1'); // 1 Pendientes aprobación
                    $tot=0;
                     foreach ($num_rows->fetchAll() as $contacto) {
                      $tot=$tot+1;
                     $_SESSION['tot_con'] = $tot;
                    }
                   
                    mysqli_close($conexion);
                   
          }
        else
          {
            include ('noconfirm.php');    
          }
          }  
    ?>



 
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

                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                       <div class="form-group">
                        <label for="ContactoNombre">Nombre y apellidos</label>
                        <input type="text" class="form-control" name="ContactoNombre" aria-describedby="emailHelp" placeholder="¿Cómo quieres que te llamemos?" pattern="[A-Za-z \- \/_]{1,45}" title="máximo 45 letras (se admiten espacios y '-&_'" required>
                      
                      </div>
                      <div class="form-group">
                        <label for="ContactoEmail">Correo electrónico</label>
                        <input type="email" class="form-control" name="ContactoEmail" aria-describedby="emailHelp" placeholder="Ej. tuemail@dominio.es" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,4}" title="Comprueba tu email por favor" required>
                     
                      </div>
                      <div class="form-group">
                        <label for="ContactoTelefono"´>Teléfono de Contacto</label>
                        <input type="text" class="form-control" name="ContactoTelefono" aria-describedby="emailHelp" placeholder="Ej. +343987159" pattern="(\+34|0034|34)?[\s|\-|\.]?[6|7|9][\s|\-|\.]?([0-9][\s|\-|\.]?){8}" title="Comprueba tu teléfono por favor: ejemplos: 0034666666666 / +34777777777 / 999999999">
                      
                       </div>
                       <div class="form-group">
                        <label for="ContactoAsunto">Asunto</label>
                        <input type="text" class="form-control" name="ContactoAsunto" aria-describedby="asuntoHelp" placeholder="Ej. Queja / Información" required>
                      
                      </div>
                       <div class="form-group">
                        <label for="ContactoMensasje"´ id="labelcontactmessage" >Mensaje Max.200 Caract.</label>
                      
                        <textarea class="span6 form-control" id="ContactoMensasje" name="ContactoMensasje" maxlength="200" rows="3" cols="50" oninput="contar(this)"  placeholder="Escribe tu mensaje..." required></textarea>
                      
                      </div>

                        <center>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="submitContacto">Enviar</button>
                       </center>
                     
                           
                     
                    </form>


                  
                </div>
               
            </div>
          </div>
        </div>





 <!-- Modal del usuarios registrados  ------------------------------------------------------->
      <!-- Modal -->
          <div class="modal fade" id="exampleModalur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelur" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelur">Registro de usuario</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                      <div class="form-group">
                        <label for="ur_email">Correo electrónico</label>
                        <input type="email" class="form-control" id="ur_email" name="ur_email" aria-describedby="emailHelp" placeholder="Ej. tuemail@dominio.es" required>
                        <small id="emailHelpur" class="form-text text-muted">No compartas datos sensibles con otras personas.</small>
                      </div>
                      <div class="form-group">
                        <label for="ur_passwd">Password</label>
                        <input type="password" class="form-control" id="ur_passwd" name="ur_passwd" placeholder="Contraseña" required>
                      </div>
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheckur">
                        <label class="form-check-label" for="exampleCheckur">Enviar Noticias</label>
                      </div>
                              
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar</button>
                  <button type="submit" class="btn btn-primary" name="submitur">Registro</button>
                </div>
               </form>
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
       
            <!--<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">-->

				
				    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                      <div class="form-group">
                        <label for="socioEmail">Correo electrónico</label>
                        <input required type="email" class="form-control" id="socioEmail" name ="socioEmail" aria-describedby="emailHelp" placeholder="Ej. tuemail@dominio.es" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,4}" title="Comprueba tu email por favor">
                        <small id="emailHelp" class="form-text text-muted">No compartas datos sensibles con otras personas.</small>
                      </div>
                      <div class="form-group">
                        <label for="SocioPassword">Password</label>
                        <input required type="password" class="form-control" id="SocioPassword" name ="SocioPassword" placeholder="Contraseña">
                      </div>
                      <div class="form-group">
                        <label for="SocioUsuario">Usuario</label>
                        <input required type="text" class="form-control" id="SocioUsuario" name ="SocioUsuario" aria-describedby="emailHelp" placeholder="Nombre de usuario" >
                        <small id="emailHelp" class="form-text text-muted">No compartas datos sensibles con otras personas.</small>
                      </div>

            <!--<div class="form-group">-->

					           <div class="form-group">

                        <label for="NombreApellidosSocio">Nombre y apellidos</label>
                        <input required type="text" class="form-control" id="NombreApellidosSocio" name ="NombreApellidosSocio" aria-describedby="emailHelp" placeholder="Nombre y Apellidos" >
                      </div>
                      <div class="form-group">
                        <label for="SocioDNI">DNI</label>
                        <input required type="text" class="form-control" id="SocioDNI" name ="SocioDNI" aria-describedby="emailHelp" placeholder="DNI">
                        <small id="emailHelp" class="form-text text-muted">No compartas datos sensibles con otras personas.</small>
                      </div>

            <div class="form-group">
                        <label for="SocioProvincia">Provincia</label>
            <?php
              $mysqli = new mysqli('localhost', 'socio', 'socio', 'marte');
            ?>
            <select class="form-control" id="SocioProvincia" name ="SocioProvincia" required >
            <option value="0">Seleccione:</option>
            <?php
              $query = $mysqli -> query ("SELECT * FROM provincias");
              while ($valores = mysqli_fetch_array($query)) {
              echo '<option value="'.$valores[id_provincia].'">'.utf8_encode($valores[provincia]).'</option>';
              }
            ?>
            </select>
            </div>
            <div class="form-group">
                        <label for="SocioPais">País</label>
            <?php
              $mysqli = new mysqli('localhost', 'socio', 'socio', 'marte');
            ?>
            <select class="form-control" id="SocioPais" name ="SocioPais" required >
            <option value="0">Seleccione:</option>
            <?php
              $query1 = $mysqli -> query ("SELECT * FROM paises");
              while ($valores1 = mysqli_fetch_array($query1)) {
              echo '<option value="'.$valores1[id].'">'.utf8_encode($valores1[nombre]).'</option>';
              }
            ?>
            </select>
            </div>

					  
                      <div class="form-group">
                        <label for="SocioTelf">Teléfono</label>
                        <input required type="text" class="form-control" id="SocioTelf" name ="SocioTelf" aria-describedby="emailHelp" placeholder="Ej. +343987159" pattern="(\+34|0034|34)?[\s|\-|\.]?[6|7|9][\s|\-|\.]?([0-9][\s|\-|\.]?){8}" >
                        <small id="emailHelp" class="form-text text-muted">No compartas datos sensibles con otras personas.</small>
                      </div>

            <!--<div class="form-group">-->
					  <div class="form-group">

                        <label for="SocioCuenta">Nº de Cuenta</label>
                        <input type="text" class="form-control" id="SocioCuenta" name ="SocioCuenta" aria-describedby="emailHelp"  >
                        <small id="emailHelp" class="form-text text-muted">No compartas datos sensibles con otras personas.</small>
                      </div>
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Acepto los términos y condiciones </label>
                      </div>
                      <center>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary" name="submit1">Enviar</button>
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

                    <form action="http://localhost/proyecto/asociacion/login.php" method="post">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Usuario</label>
                        <input type="text" class="form-control" id="Inputuser" name= "Inputuser" aria-describedby="emailHelp" placeholder="Para Socios y/o Admins">
                      
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Correo electrónico</label>

                        <input type="email" class="form-control" id="Inputemail" name ="Inputemail" aria-describedby="emailHelp" placeholder="Para usuarios registrados, Socios y/o Admins">
                      
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="InputPassword" name="ole" placeholder="Contraseña" required>
                      </div>
                        <center>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                        </center>
                     
                           
                     
                    </form>


                  
                </div>
               
            </div>
          </div>
        </div>



<!-- Footer -->
<footer class="page-footer font-small blue-grey lighten-5">

  <div style="background-color: #006450; color: #ffffff;">

    <div class="container">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <h6 class="mb-0">Contacte con nosotros en Redes Sociales</h6>
          
        </div>
        <div class="col-md-6 col-lg-5 text-center text-md-right mb-4 mb-md-0" id='myWatch'></div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right">

          <!-- Facebook -->
          <a class="fb-ic">
            <i class="fab fa-facebook-f white-text mr-4"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fab fa-twitter white-text mr-4"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fab fa-google-plus-g white-text mr-4"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="fab fa-linkedin-in white-text mr-4"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic">
            <i class="fab fa-instagram white-text"> </i>
          </a>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row mt-3 dark-grey-text">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mb-4">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">Asociación Marte</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
          consectetur
          adipisicing elit.</p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Products</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a class="dark-grey-text" href="#!">MDBootstrap</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">MDWordPress</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">BrandFlow</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Bootstrap Angular</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Useful links</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a class="dark-grey-text" href="#!">Your Account</a>
        </p>
        <p>
          <a href="" class="badge badge-info" data-toggle="modal" data-target="#exampleModa4" >Contacto</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Shipping Rates</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Help</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contact</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <i class="fas fa-home mr-3"></i> C/El Carmen,100</p>
        <p>
          <i class="fas fa-homee mr-3"></i> 23660 - Alcaudete</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> alcaudete@curso.es</p>

        <p>
          <i class="fas fa-phone mr-3"></i> + 34 955 567 88</p>
       

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center text-black-50 py-3">© 2018 Copyright:
    <a class="dark-grey-text" href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

<!---- FUNCIONES AJAX --------------------------------------------->


 



</body>

</html>
