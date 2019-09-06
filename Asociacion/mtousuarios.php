<?php
session_start();
include ('../includes/header.php');
include('../models/connection1.php');
require_once('menu.php');
   $listaUsuarios = array(
   array('id_usuario' => '','usuario' => '','passwd' => '','metodo' => '','email' => '','Nom_Ape' => '','dni' => '','provincias' => '','Pais' => '','telefono' => '','cuenta' =>'','activo'=> 1,'rol_id' =>0)
    );
    //$db=Db::getConnect();
    
    require_once('menu.php');
   
  
  if (!isset($_SESSION['rol1']))
  {
    echo('<div class="container"><div class="alert alert-danger" role="alert">
              Hay que estar registrado para poder visualizar este contenido, Ve a Home y regístrate
            </div></div>');
    exit;
  }

 function provincia($prov)
 {
   $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
   $sql = "SELECT * FROM provincias where id_provincia = '$prov' ";
   $consulta = mysqli_query($conexion, $sql);
   while ($valores = mysqli_fetch_array($consulta)) 
    {   $provincia = $valores['provincia'];   }
   return($provincia);
 }

  function paises($pais)
 {
   $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
   $sql = "SELECT * FROM paises where id = '$pais' ";
   $consulta = mysqli_query($conexion, $sql);
   while ($valores = mysqli_fetch_array($consulta)) {
    $pais = $valores['nombre'];
   }
   return($pais);
 }
  function roles($rol)
 {
   $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
   $sql = "SELECT * FROM rolusuario where idRol = '$rol' ";
   $consulta = mysqli_query($conexion, $sql);
   while ($valores = mysqli_fetch_array($consulta)) {
    $rol = $valores['Nombre'];
   }
   return($rol);
 }
  function estado($est)
 {  
  switch ($est) {
    case '0':
      return("Activo");
      break;
    case '1':
      return("Pte.Confirmar");
      break;
    case '2':
      return("Baja Prov.");
      break;
    case '3':
      return("Baja Defin.");
      break;
    
    default:
      # code...
      break;
  }
}
   
?>  

<?php // Funcion para Eliminar un Rol ************************************************
          // Hay que realizar varias búsquedas en las tablas en las que el usuario tenga datos:
          // documentos, fotos, noticias. Realizar borrado lógico poniendo 2 - Baja Provisional o 3-Baja Definitiva
          if(isset($_POST['userdel'])) 
          {
            $id_Rol = $_POST['userdel']; 
            $sql = "UPDATE usuarios set activo = 2 WHERE id_usuario = '$_POST[userdel]' ";
            $consulta = mysqli_query($conexion, $sql);
            if($consulta)
                    {
                      echo "<script>alert('Baja Provisional Realizada');</script>";     
                     
                    }   
          }  
    ?>









<div class="card">
  <h5 class="card-header" style="background-color: #F78181">Gestión de Usuarios</h5>

  <br>
  <div class="container">    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
          
       
        <div class="form-row">
           <div class="form-group col-md-2">
            <label for="cmtoid"></label>
            <input type="text" class="form-control" id="cmtoid" name="cmtoid" placeholder="Id Usuario">
          </div>
          <div class="form-group col-md-2">
            <label for="cmtonombre"></label>
            <input type="text" class="form-control" id="cmtonombre" name="cmtonombre" placeholder="Usuario">
          </div>
          <div class="form-group col-md-4">
            <label for="cmtoemail"></label>
            <input type="text" class="form-control" id="cmtoemail" name="cmtoemail" placeholder="email">
          </div>
          <div class="form-group col-md-4">
            <label for="cmtonomape"></label>
            <input type="text" class="form-control" id="cmtonomape" name="cmtonomape" placeholder="Asociado">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-2">
            <label for="cmtodni"></label>
            <input type="text" class="form-control" id="cmtodni" name="cmtodni" placeholder="DNI">
          </div>

          <div class="form-group col-md-2">
            <label for="cmtotlf"></label>
            <input type="text" class="form-control" id="cmtotlf" name="cmtotlf" placeholder="Telefono">
          </div>    
           <div class="form-group col-md-2">
            <label for="cmtopro"></label>
            <select class="form-control" id="cmtopro" name ="cmtopro"  >
                          <option value='' >Provincia:</option>
                          <?php
                            $query = $conexion -> query ("SELECT * FROM provincias");
                            while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores[id_provincia].'">'.utf8_encode($valores[provincia]).'</option>';
                            }
                          ?>
            </select>
          </div>

          <div class="form-group col-md-2">
            <label for="cmtopais"></label>
            <select class="form-control" id="cmtopais" name ="cmtopais"  >
                        <option value=''>Pais:</option>
                        <?php
                          $queryp = $conexion -> query ("SELECT * FROM paises");
                          while ($valoresp = mysqli_fetch_array($queryp)) {
                          echo '<option value="'.$valoresp[id].'">'.utf8_encode($valoresp[nombre]).'</option>';
                          }
                        ?>
            </select>
          </div>
           <div class="form-group col-md-2">
            <label for="cmtosit"></label>
            <input type="number" min="0" max="3" class="form-control" id="cmtosit" name="cmtosit" placeholder="0-Ac 1-Pt 2-BP 3-BD">
          </div>           
          <div class="form-group col-md-2">
            <label for="cmtorol"></label>
             <select class="form-control" id="cmtorol" name ="cmtorol"  >
                    <option value=''>Rol:</option>
                    <?php
                        $query = $conexion -> query ("SELECT * FROM rolusuario");
                        while ($valores = mysqli_fetch_array($query)) {
                             echo '<option value="'.$valores[idRol].'">'.utf8_encode($valores[Nombre]).'</option>';
                             }
                    ?>
              </select>
          </div>  
         </div>

         <center><button type="submit" class="btn btn-primary btn-sm " name="mto_buscarrol" >Buscar</button></center> 
         <div class="container">
           <div class="form-row">
            <a href="mtousuarios-u.php" class="btn btn-outline-danger btn-sm">Nuevo</a></button>
        </div>
         </div>
            
       
    </form>
  </div>

  <div class="card-body">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return confirm('¿Realmente deseas eliminar el usuario?');">
  
      <div class="container">
          <br>
          <table class="table table-hover">
            <thead class="thead-light">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Usuario</th>
                <th scope="col">email</th>
                <th scope="col">Asociado</th>               
                <th scope="col">dni</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Acción</th> 
                
             
              </tr>
            </thead>
             <tbody>
               

          <?php
                    
                    $x=0;
                    Global $X;
                    
                    if(isset($_POST['mto_buscarrol']) )
                    {
                        $sqlInicial="SELECT * FROM usuarios where 1 "; 
                     
                        if(isset($_POST['cmtoid']) && $_POST['cmtoid'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && id_usuario = '$_POST[cmtoid]'";
                          }
                        if(isset($_POST['cmtonombre']) && $_POST['cmtonombre'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && Usuario like '%$_POST[cmtonombre]%'";
                          }
                        if(isset($_POST['cmtoemail']) && $_POST['cmtoemail'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && email like '%$_POST[cmtoemail]%'";
                          }
                         
                        if(isset($_POST['cmtonomape']) && $_POST['cmtonomape'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && Nom_Ape like '%$_POST[cmtonomape]%'";
                          }
                          
                        if(isset($_POST['cmtodni']) && $_POST['cmtodni'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && dni like '%$_POST[cmtodni]%'";
                          }
                        if(isset($_POST['cmtopro']) && $_POST['cmtopro'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && provincias like '%$_POST[cmtopro]%'";
                          }
                          
                        if(isset($_POST['cmtopais']) && $_POST['cmtopais'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && Pais = '$_POST[cmtopais]'";
                          }  
                                                
                        if(isset($_POST['cmtotlf']) && $_POST['cmtotlf'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && telefono like '%$_POST[cmtotlf]%'";
                          }  
                        if(isset($_POST['cmtosit']) && $_POST['cmtosit'] !='' )
                          {
                            $sqlInicial = $sqlInicial . " && activo = '$_POST[cmtosit]'";
                          }
                        if(isset($_POST['cmtorol']) && $_POST['cmtorol'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && rol_id = '$_POST[cmtorol]'";
                          }
                      }
                    else
                    {
                        $sqlInicial= "SELECT * FROM usuarios where 1 ";
                    }
                      $registro_por_pagina = 10;
                      $pagina = 0;
                      if(isset($_GET["pagina"]))
                            {
                             $pagina = $_GET["pagina"];
                            }
                      else
                            {
                             $pagina = 1;
                            }
                     $start_from = ($pagina-1)*$registro_por_pagina;
                     $page_query= $sqlInicial . " LIMIT $start_from, $registro_por_pagina";
                     $page_result = mysqli_query($conexion, $sqlInicial);
                     $total_records = mysqli_num_rows($page_result);
                      
                     $total_pages = ceil($total_records/$registro_por_pagina);
                     $start_loop = 1;
                     
                     $diferencia = $total_pages - $pagina;
                     if($diferencia <= $start_loop)
                        {
                          $start_loop = $pagina;
                        } 
                       $end_loop = $total_pages;
                     $sql=$conexion->query($page_query); // ****
                    while($listaUsuarios = mysqli_fetch_array($sql))
                                {                            
                                    echo ('
                                            <tr >
                                            <th scope="row">'. utf8_encode($listaUsuarios['id_usuario']).'</th>
                                            <td>'. utf8_encode($listaUsuarios['usuario']). '</td>
                                            <td>'. utf8_encode($listaUsuarios['email']). '</td>
                                            <td>'. ($listaUsuarios['Nom_Ape']). '</td>
                                            <td>'. utf8_encode($listaUsuarios['dni']). '</td>
                                            <td>'. utf8_encode($listaUsuarios['telefono']). '</td>
                                            <td> <a class="btn btn-outline-danger btn-sm" href="mtousuario-a.php?id='.$listaUsuarios['id_usuario'].'">Editar</a>
                                                <button type="submit" class="btn btn-outline-danger btn-sm" name="userdel" 
                                                value='.$listaUsuarios['id_usuario'].'>Borrar</button></td></tr>
                                            ');
                                    $prov = provincia($listaUsuarios['provincias']);
                                    $pais = paises($listaUsuarios['Pais']);
                                    $estado = estado($listaUsuarios['activo']);
                                    $roles = roles($listaUsuarios['rol_id']);
                                    echo ('
                                        <tr class ="fila2" style="display:none">
                                            
                                            <td>'. utf8_encode($prov). '</td>
                                            <td>'. utf8_encode($pais). '</td>
                                            <td>'. utf8_encode($estado). '</td>
                                            <td>'. utf8_encode($roles). '</td>
                                      ');
                                            
                                     $x=$x+1;
                                     $X=$x;
                                    
                                }
                        echo ('<p>Resultados encontrados '.$total_records.'</p>');
               ?>
        
            </tbody>
         

          </table>
              <?php
                     
                    
                    if ($total_pages > 1)
                    {
                       echo('<center><nav aria-label="Page navigation example ">
                          <ul class="pagination justify-content-center">');
                       if($pagina == 1)
                           {
                             echo(' 
                         
                                <li><a class="page-link" href="mtousuarios.php?pagina='.($end_loop) .'" aria-label="Previous">
                                   <span aria-hidden="true">&laquo;</span>
                                  </a>
                                </li>');
                           }
                       if (($pagina <= $end_loop) && ($pagina != 1))
                       {
                         
                          echo('<li><a class="page-link" href="mtousuarios.php?pagina='.($pagina - 1) .'" aria-label="Previous">
                               <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>');
                       }
                    
               
                      for($i=1; $i<=$total_pages; $i++)
                        {     
                        echo(' <li class="page-item"><a class="page-link" href="mtousuarios.php?pagina='.$i.'">'.$i.'</a></li>');
                      
                        }
                 
                  
                      if(($pagina < $end_loop) && ($pagina != 4))
                      {
                      
                       echo (' <li class="page-item">
                                <a class="page-link" href="mtousuarios.php?pagina='.($pagina + 1).'" aria-label="Next">
                                  <span aria-hidden="true">&raquo;</span>
                                </a>
                              </li>
                              ');
                      }
                      if ($pagina == 4)
                      {
                        echo (' <li class="page-item">
                                <a class="page-link" href="mtousuarios.php?pagina=1" aria-label="Next">
                                  <span aria-hidden="true">&raquo;</span>
                                </a>
                              </li>
                              ');
                      }
                      echo('</ul>
                               </nav></center>');
                   }
                   
                   
             ?>
      
        </div>
       
      </form>
  </div>
</div>




      
<?php
   mysqli_close($conexion);
 include ('footer.php');
?>



<!-- Modal del Alta / Update de Socio  ------------------------------------------------------->
      <!-- Modal -->
        <div class="modal fade" id="updateuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabe2" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabe2">Alta de Socio</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
       
        
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
                        <input required type="text" class="form-control" id="SocioUsuario" name ="SocioUsuario" aria-describedby="emailHelp" placeholder="Nombre de usuario" value=<?php echo($user) ?>>
                        <small id="emailHelp" class="form-text text-muted">No compartas datos sensibles con otras personas.</small>
                      </div>


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
            ?>
            <select class="form-control" id="SocioProvincia" name ="SocioProvincia" required >
            <option value="0">Seleccione:</option>
            <?php
              $query = $conexion -> query ("SELECT * FROM provincias");
              while ($valores = mysqli_fetch_array($query)) {
              echo '<option value="'.$valores[id_provincia].'">'.($valores[provincia]).'</option>';
              }
            ?>
            </select>
            </div>
            <div class="form-group">
                        <label for="SocioPais">País</label>
            <?php
            ?>
            <select class="form-control" id="SocioPais" name ="SocioPais" required >
            <option value="0">Seleccione:</option>
            <?php
              $query1 = $conexion -> query ("SELECT * FROM paises");
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


      
    <script type="text/javascript">
      $(document).ready()
      {
        
        $("tr").click(function(){
           $(this).css("cursor","pointer");
           $(this).next("tr.fila2").toggle("class").css({
            'color':'#2E2EFE',
            'background':'#CEECF5',
            'fontSize':'0.8em'}
            );
            
          
        });
       
      }
    </script>
