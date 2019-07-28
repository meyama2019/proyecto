<?php
session_start();

include ('../includes/header.php');
include('../models/connection1.php');
require_once('menu.php');

  
  if (!isset($_SESSION['rol1']))
  {

    echo('<div class="container"><div class="alert alert-danger" role="alert">
              Hay que estar registrado para poder visualizar este contenido, Ve a Home y regístrate
            </div></div>');
    //header("Location: http://localhost/proyecto/home.php");
    exit;
  }

 
?>  


      <div class="card">
          <h5 class="card-header" style="background-color: #F78181">Gestión de Usuarios (Alta)</h5>

          <br>
             
         <div class="container">
       
          
        
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                  <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="socioEmail">Correo electrónico</label>
                        <input required type="email" class="form-control" id="socioEmail" name ="socioEmail" aria-describedby="emailHelp" placeholder="Ej. tuemail@dominio.es" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,4}" title="Comprueba tu email por favor">
                        <small id="emailHelp" class="form-text text-muted">No compartas datos sensibles con otras personas.</small>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="SocioPassword">Password</label>
                        <input required type="password" class="form-control" id="SocioPassword" name ="SocioPassword" placeholder="Contraseña">
                      </div>
                  </div>

                  <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="SocioUsuario">Usuario</label>
                        <input required type="text" class="form-control" id="SocioUsuario" name ="SocioUsuario" aria-describedby="emailHelp" placeholder="Nombre de usuario" >
                        <small id="emailHelp" class="form-text text-muted">No compartas datos sensibles con otras personas.</small>
                      </div>

            <!--<div class="form-group">-->

                     <div class="form-group col-md-6">

                        <label for="NombreApellidosSocio">Nombre y apellidos</label>
                        <input required type="text" class="form-control" id="NombreApellidosSocio" name ="NombreApellidosSocio" aria-describedby="emailHelp" placeholder="Nombre y Apellidos" >
                      </div>
                      <div class="form-group col-md-3">
                        <label for="SocioDNI">DNI</label>
                        <input required type="text" class="form-control" id="SocioDNI" name ="SocioDNI" aria-describedby="emailHelp" placeholder="DNI">
                        <small id="emailHelp" class="form-text text-muted">No compartas datos sensibles con otras personas.</small>
                      </div>
                  </div>

                  <div class="form-row">
                        <div class="form-group col-md-3">
                        <label for="SocioProvincia">Provincia</label>
                        <?php
                          //$mysqli = new mysqli('localhost', 'socio', 'socio', 'marte');
                        ?>
                        <select class="form-control" id="SocioProvincia" name ="SocioProvincia" value=required >
                        <option value="0">Seleccione:</option>
                        <?php
                          $query = $conexion -> query ("SELECT * FROM provincias");
                          while ($valores = mysqli_fetch_array($query)) {
                          echo '<option value="'.$valores[id_provincia].'">'.utf8_encode($valores[provincia]).'</option>';
                          }
                        ?>
                        </select>
                        </div>
                        <div class="form-group col-md-3">
                                    <label for="SocioPais">País</label>
                        <?php
                          //$mysqli = new mysqli('localhost', 'socio', 'socio', 'marte');
                        ?>
                        <select class="form-control" id="SocioPais" name ="SocioPais" required >
                        <option value="0">Seleccione:</option>
                        <?php
                          $query1 = $conexion -> query ("SELECT * FROM paises");
                          while ($valores1 = mysqli_fetch_array($query1)) {
                          echo '<option value="'.$valores1[id].'">'.utf8_encode($valores1[nombre]).'</option>';
                          }
                        ?>
                        </select></div>
                        <div class="form-group col-md-6">
                        <label for="SocioTelf">Teléfono</label>
                        <input required type="text" class="form-control" id="SocioTelf" name ="SocioTelf" aria-describedby="emailHelp" placeholder="Ej. +343987159" pattern="(\+34|0034|34)?[\s|\-|\.]?[6|7|9][\s|\-|\.]?([0-9][\s|\-|\.]?){8}" >
                        <small id="emailHelp" class="form-text text-muted">No compartas datos sensibles con otras personas.</small>
                      </div>

                  </div>

                  <div class="form-row">
                      <div class="form-group col-md-4">
                              <label for="SocioCuenta">Nº de Cuenta</label>
                              <input type="text" class="form-control" id="SocioCuenta" name ="SocioCuenta" aria-describedby="emailHelp"  >
                              <small id="emailHelp" class="form-text text-muted">No compartas datos sensibles con otras personas.</small>
                      </div> 
                      <div class="form-group col-md-4">
                              <label for="SocioSitu">Situación</label>
                              <input type="number" min="0" max="3" class="form-control" id="SocioSitu" name ="SocioSitu" aria-describedby="emailHelp"placeholder="0-Activo 1-Pte 2-Baja P 3-Baja D"  >
                              
                      </div>
                      <div class="form-group col-md-4">
                              <label for="SocioRol">Tipo Usuario</label>
                               <?php
                                  //$mysqli = new mysqli('localhost', 'socio', 'socio', 'marte');
                                ?>
                                <select class="form-control" id="SocioRol" name ="SocioRol" value=required >
                                <option value="0">Seleccione:</option>
                                <?php
                                  $query = $conexion -> query ("SELECT * FROM rolusuario");
                                  while ($valores = mysqli_fetch_array($query)) {
                                  echo '<option value="'.$valores[idRol].'">'.utf8_encode($valores[Nombre]).'</option>';
                                  }
                                ?>
                        </select>
                             
                              
                      </div>         
                  </div>

                   
                            <center>
                            <a class="btn btn-outline-danger btn-sm" href="mtousuarios.php" >Cerrar</a>
                            <button type="submit" class="btn btn-outline-danger btn-sm" name="adduser">Añadir</button>
                            
                            </center>
                            <br>
                           
            </form>
        </div>
      </div>

      <br>
         



<?php // inserción de nuevos socios

  if(isset($_POST['adduser']))
  {
    $email = $_POST['socioEmail'];
    $passw = sha1($_POST['SocioPassword']);
    $alias = $_POST['SocioUsuario'];
    $nbap = $_POST['NombreApellidosSocio'];
    $dni = $_POST['SocioDNI'];
    $prov = $_POST['SocioProvincia'];
    $pais = $_POST['SocioPais'];
    $telf = $_POST['SocioTelf'];
    $ccct = $_POST['SocioCuenta'];
    $situ = $_POST['SocioSitu'];
    $rol = $_POST['SocioRol'];

      //$conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
      //$acentos="SET NAMES 'utf8'";
      //mysqli_query($conexion, $acentos);    
      
      $sql = "INSERT INTO usuarios (usuario, passwd, email, Nom_Ape,  dni, provincias, pais, telefono, cuenta, activo, rol_id ) 
          values ('$alias','$passw','$email','$nbap','$dni','$prov','$pais','$telf', '$ccct','$situ', '$rol')";
      $inserta = mysqli_query($conexion, $sql);
      if($inserta)
      {
         echo "<script>alert('Alta de Socio correcta');</script>";
      }
    
    
    
    

  }
  mysqli_close($conexion);

?>
