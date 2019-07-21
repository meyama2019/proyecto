<?php
session_start();

include ('../includes/header.php');
include('../models/connection.php');
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

 


<?php


  if(isset($_POST['updateuser']))
  {
    $socioid= $_POST['socioid'];
    $email = $_POST['socioEmail'];
    if(isset($_POST['SocioPasswordN']) && $_POST['SocioPasswordN'] !='')
    {
      $passw = sha1($_POST['SocioPasswordN']);
    }
    else
    {
      $passw = $_POST['SocioPassword'];
    }
    
    $alias = $_POST['SocioUsuario'];
    $nbap = utf8_encode($_POST['NombreApellidosSocio']);
    $dni = $_POST['SocioDNI'];
    $prov = $_POST['SocioProvincia'];
    $pais = $_POST['SocioPais'];
    $telf = $_POST['SocioTelf'];
    $ccct = $_POST['SocioCuenta'];
    $situ = $_POST['SocioSitu'];
    $rolu = $_POST['SocioRol'];
    //echo($socioid);
      $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
      $acentos="SET NAMES 'utf8'";
      mysqli_query($conexion, $acentos);

    $update = "UPDATE usuarios set
         usuario = '$alias',
         passwd = '$passw',
         metodo = 1,
         email = '$email',
         Nom_Ape = '$nbap',
         dni = '$dni',
         provincias = '$prov',
         Pais = '$pais',
         telefono = '$telf',
         cuenta = '$ccct',
         activo = '$situ',
         rol_id = '$rolu'
         where id_usuario = ".$socioid." ";

    $resultado = mysqli_query($conexion, $update);
    if($resultado)
    {
       //echo "<script>alert('Cojones de Socio correcta');</script>";
       $_GET['id'] = $socioid;
    }
    else
    {
      echo "<script>alert(Socio No Encontrado');</script>";
    }

    

  }

?>

<?php
  if(isset($_GET['id']))
  {
    
    $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
    $id_user = $_GET['id'];
    $sql = "SELECT * FROM usuarios where id_usuario=".$id_user." ";
    $consulta = mysqli_query($conexion, $sql);
    if($consulta)
        {
          $news_data = mysqli_fetch_array($consulta);

          //echo "<script>alert('Registro actualizado correctamente');</script>";   
           
        }   

  }
  $passwold= $news_data['passwd'];

?>



      <div class="card">
          <h5 class="card-header" style="background-color: #F78181">Gestión de Usuarios (Actualización)</h5>

          <br>
             
         <div class="container">
       
          

        
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                  <div class="form-row">
                      <div class="form-group col-md-1">
                        <label for="socioEmail">ID</label>
                        <input readonly type="text" class="form-control" id="socioid" name ="socioid" aria-describedby="emailHelp" placeholder="Id" value=<?php echo($news_data['id_usuario']); ?>>
                        
                      </div>
                      <div class="form-group col-md-5">
                        <label for="socioEmail">Correo electrónico</label>
                        <input required type="email" class="form-control" id="socioEmail" name ="socioEmail" aria-describedby="emailHelp" placeholder="Ej. tuemail@dominio.es" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,4}" title="Comprueba tu email por favor" value=<?php echo($news_data['email']); ?>>
                        <small id="emailHelp" class="form-text text-muted">No compartas datos sensibles con otras personas.</small>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="SocioPassword">Password</label>
                        <input required type="password" class="form-control" id="SocioPassword" name ="SocioPassword" placeholder="Contraseña" value=<?php echo($news_data['passwd']);?>>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="SocioPasswordN">Password Nuevo</label>
                        <input  type="password" class="form-control" id="SocioPasswordN" name ="SocioPasswordN" placeholder="Contraseña Nueva" value=''>
                      </div>
                  </div>

                  <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="SocioUsuario">Usuario</label>
                        <input required type="text" class="form-control" id="SocioUsuario" name ="SocioUsuario" aria-describedby="emailHelp" placeholder="Nombre de usuario" value= <?php echo(utf8_encode($news_data['usuario'])); ?>>
                        <small id="emailHelp" class="form-text text-muted">No compartas datos sensibles con otras personas.</small>
                      </div>

            <!--<div class="form-group">-->

                     <div class="form-group col-md-6">

                        <label for="NombreApellidosSocio">Nombre y apellidos</label>
                        <input  type="text" class="form-control" id="NombreApellidosSocio" name ="NombreApellidosSocio" aria-describedby="emailHelp" placeholder="Nombre y Apellidos" value= <?php echo($news_data['Nom_Ape']); ?>>
                      </div>

                      <div class="form-group col-md-3">
                        <label for="SocioDNI">DNI</label>
                        <input  type="text" class="form-control" id="SocioDNI" name ="SocioDNI" aria-describedby="emailHelp" placeholder="DNI" value= <?php echo($news_data['dni']); ?>>
                        <small id="emailHelp" class="form-text text-muted">No compartas datos sensibles con otras personas.</small>
                      </div>
                  </div>

                  <div class="form-row">
                        <div class="form-group col-md-3">
                        <label for="SocioProvincia">Provincia</label>
                        <?php
                          $mysqli = new mysqli('localhost', 'socio', 'socio', 'marte');
                        ?>
                        <select class="form-control" id="SocioProvincia" name ="SocioProvincia" >
                       
                        <?php
                          $query = $mysqli -> query ("SELECT * FROM provincias where
                           id_provincia = $news_data[provincias]");
                          while ($valores = mysqli_fetch_array($query)) {
                          echo '<option value="'.$valores[id_provincia].'">'.utf8_encode($valores[provincia]).'</option>';

                          }
                        ?>
                         <option value='0'></option>
                          <?php
                          $query = $mysqli -> query ("SELECT * FROM provincias");
                          while ($valores = mysqli_fetch_array($query)) {
                          echo '<option value="'.$valores[id_provincia].'">'.utf8_encode($valores[provincia]).'</option>';

                          }
                        ?>
                        </select>
                        </div>

                        <div class="form-group col-md-3">
                                    <label for="SocioPais">País</label>
                        <?php
                          $mysqli = new mysqli('localhost', 'socio', 'socio', 'marte');
                        ?>
                        <select class="form-control" id="SocioPais" name ="SocioPais" required >
                         <?php
                          $query1 = $mysqli -> query ("SELECT * FROM paises where id = $news_data[Pais]");
                          while ($valores1 = mysqli_fetch_array($query1)) {
                          echo '<option value="'.$valores1[id].'">'.utf8_encode($valores1[nombre]).'</option>';
                          }
                        ?>  
                        <option value="0">Seleccione:</option>
                        <?php
                          $query1 = $mysqli -> query ("SELECT * FROM paises");
                          while ($valores1 = mysqli_fetch_array($query1)) {
                          echo '<option value="'.$valores1[id].'">'.utf8_encode($valores1[nombre]).'</option>';
                          }
                        ?>
                        </select></div>


                        <div class="form-group col-md-6">
                        <label for="SocioTelf">Teléfono</label>
                        <input  type="text" class="form-control" id="SocioTelf" name ="SocioTelf" aria-describedby="emailHelp" placeholder="Ej. +343987159" pattern="(\+34|0034|34)?[\s|\-|\.]?[6|7|9][\s|\-|\.]?([0-9][\s|\-|\.]?){8}" value= <?php echo($news_data['telefono']); ?>>
                        <small id="emailHelp" class="form-text text-muted">No compartas datos sensibles con otras personas.</small>
                      </div>

                  </div>

                  <div class="form-row">
                      <div class="form-group col-md-6">

                              <label for="SocioCuenta">Nº de Cuenta</label>
                              <input type="text" class="form-control" id="SocioCuenta" name ="SocioCuenta" aria-describedby="emailHelp"  value= <?php echo($news_data['cuenta']); ?>>
                              <small id="emailHelp" class="form-text text-muted">No compartas datos sensibles con otras personas.</small>
                      </div>
                      <div class="form-group col-md-3">
                              <label for="SocioSitu">Situación</label>
                              <input type="number" min="0" max="3" class="form-control" id="SocioSitu" name ="SocioSitu" aria-describedby="emailHelp"placeholder="0-Activo 1-Pte 2-Baja P 3-Baja D" value= <?php echo($news_data['activo']) ?>>
                              
                      </div>
                      <div class="form-group col-md-3">
                              <label for="SocioRol">Tipo Usuario</label>
                               <?php
                                  $mysqli = new mysqli('localhost', 'socio', 'socio', 'marte');
                                ?>
                                <select class="form-control" id="SocioRol" name ="SocioRol" >
                                     <?php
                                        $query1 = $mysqli -> query ("SELECT * FROM rolusuario where idRol = $news_data[rol_id]");
                                        while ($valores1 = mysqli_fetch_array($query1)) {
                                        echo '<option value="'.$valores1[idRol].'">'.utf8_encode($valores1[Nombre]).'</option>';
                                        }
                                      ?>  
                                  <option value="0">Seleccione:</option>
                                  <?php
                                    $query = $mysqli -> query ("SELECT * FROM rolusuario");
                                    while ($valores = mysqli_fetch_array($query)) {
                                    echo '<option value="'.$valores[idRol].'">'.utf8_encode($valores[Nombre]).'</option>';
                                    }
                                  ?>
                                </select>
                             
                              
                      </div>         
                          
          
                  </div>

                    
                            <center>
                            <a class="btn btn-outline-danger btn-sm" href="mtousuarios.php" >Cerrar</a>
                            <button type="submit" class="btn btn-outline-danger btn-sm" name="updateuser">Guardar</button>
                            <br>
                            </center>
                           
                    
                      </div>
                </form>
            
                      

           

          
          
          


                  
               
               
              
              <br>
         

        




