<div class="card">
	<h5 class="card-header" style="background-color: #F78181">Gestión de Usuarios</h5>

	<br>
	<div class="container">    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          
       
        <div class="form-row">
           <div class="form-group col-md-3">
            <label for="cmtoid"></label>
            <input type="text" class="form-control" id="cmtoid" name="cmtoid" placeholder="Id Usuario">
          </div>
          <div class="form-group col-md-3">
            <label for="cmtonombre"></label>
            <input type="text" class="form-control" id="cmtonombre" name="cmtonombre" placeholder="Usuario">
          </div>
          <div class="form-group col-md-3">
            <label for="cmtoemail"></label>
            <input type="text" class="form-control" id="cmtoemail" name="cmtoemail" placeholder="email">
          </div>
          <div class="form-group col-md-3">
            <label for="cmtonomape"></label>
            <input type="text" class="form-control" id="cmtonomape" name="cmtonomape" placeholder="Nombre">
          </div>

          <div class="form-group col-md-3">
            <label for="cmtodni"></label>
            <input type="text" class="form-control" id="cmtodni" name="cmtodni" placeholder="DNI">
          </div>

          <div class="form-group col-md-3">
            <label for="cmtotlf"></label>
            <input type="text" class="form-control" id="cmtotlf" name="cmtotlf" placeholder="Telefono">
          </div>

         
         
         </div>
         <center><button type="submit" class="btn btn-primary btn-sm " name="mto_buscarrol" >Buscar</button></center>
         <div class="container">
           <div class="form-row">
            <!--<button type="submit" class="btn btn-outline-danger " name="mto_newrol" >Nuevo</button>-->
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#mtousernew">Nuevo</button>
        </div>
         </div>
            
       
    </form>
  </div>

  <div class="card-body">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  
      <div class="container">
          <br>
          <table class="table table-hover">
            <thead class="thead-light">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Usuario</th>
                <th scope="col">email</th>
                <th scope="col">Nombre</th>               
                <th scope="col">dni</th>
                <th scope="col">Prov.</th>
                <th scope="col">Pais</th>               
                <th scope="col">Tfno.</th>
                <th scope="col">Activo</th>
                <th scope="col">Rol</th> 
                <th scope="col">Acción</th> 
                
             
              </tr>
            </thead>
             <tbody>
               

              <?php
                    $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
                    $acentos="SET NAMES 'utf8'";
                    mysqli_query($conexion, $acentos);
                    $sqlInicial="SELECT * FROM usuarios where 1 "; 
                    $x=0;
                    Global $X;
                    if(isset($_POST['mto_buscarrol']) )
                    {
                     
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
                          
                                                
                        if(isset($_POST['cmtotlf']) && $_POST['cmtotlf'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && telefono like '%$_POST[cmtotlf]%'";
                          }          
                       
                         $sql=$db->query($sqlInicial);
                         
                         foreach ($sql->fetchAll() as $listaUsuarios[$x]) 
                                {                            
                                    echo ('
                                             <tr contentEditable="true">
                                            <th scope="row">'. utf8_encode($listaUsuarios[$x]['id_usuario']).'</th>
                                            <td >'. utf8_encode($listaUsuarios[$x]['usuario']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['email']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['Nom_Ape']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['dni']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['provincias']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['Pais']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['telefono']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['activo']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['rol_id']). '</td>
                                            <td><button type="submit" class="btn btn-outline-danger btn-sm" name="edit-rol" 
                                                value='.$listaUsuarios[$x]['id_usuario'].'>Editar</button>
                                                <button type="submit" class="btn btn-outline-danger btn-sm" name="edit-rol" 
                                                value='.$listaUsuarios[$x]['id_usuario'].'>Borrar</button></td></tr>
                                            ');
                                            


                                                
                                     $x=$x+1;
                                     $X=$x;
                                    
                                }

                                   
                                   
                                 
                        echo ('<p>Resultados encontrados '.$X.'</p>');
                     
                      }
                    else
                    {   
                        $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
                        $acentos="SET NAMES 'utf8'";
                        mysqli_query($conexion, $acentos);
                        $sqlInicial="SELECT * FROM usuarios where 1 "; 
                        $x=0;
                       
                    
                        $sql=$db->query($sqlInicial);
                         
                        foreach ($sql->fetchAll() as $listaUsuarios[$x]) 
                                {
                                   
                                    
                                    echo ('
                                             <tr>
                                            <th scope="row">'. utf8_encode($listaUsuarios[$x]['id_usuario']).'</th>
                                            <td>'. utf8_encode($listaUsuarios[$x]['usuario']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['email']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['Nom_Ape']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['dni']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['provincias']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['Pais']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['telefono']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['activo']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['rol_id']). '</td>
                                            <td><button type="submit" class="btn btn-outline-danger btn-sm" name="edit-rol" 
                                                value='.$listaUsuarios[$x]['id_usuario'].'>Editar</button>
                                                <button type="submit" class="btn btn-outline-danger btn-sm" name="edit-rol" 
                                                value='.$listaUsuarios[$x]['id_usuario'].'>Borrar</button></td></tr>
                                            ');
                                     $x=$x+1; 
                                     $X=$x;

                                }

                                   
                                  
                                   
                                    
                               
                         echo ('<p>Resultados encontrados '.$X.'</p>');
                               
                       }

                   mysqli_close($conexion);


               ?>


           
            
            </tbody>
          </table>
      
        </div>
      </form>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mtousernew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelur" aria-hidden="true">
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
                        <label for="mtorol_namenew">Nombre usuario</label>
                        <input type="text" class="form-control" id="mtorol_namenew" name="mtorol_namenew" placeholder="Nombre Usuario" required>
                      </div>
                      <div class="form-group">
                        <label for="Password">Password</label>
                        <input required type="password" class="form-control" id="Password" name ="Password" placeholder="Contraseña">
                      </div>
                      <div class="form-group">
                        <label for="Email">Correo electrónico</label>
                        <input required type="email" class="form-control" id="Email" name ="Email" aria-describedby="emailHelp" placeholder="Ej. tuemail@dominio.es" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,4}" >
                      </div>
                      <div class="form-group">

                        <label for="NombreApellidos">Nombre y apellidos</label>
                        <input required type="text" class="form-control" id="NombreApellidos" name ="NombreApellidos" aria-describedby="emailHelp" placeholder="Nombre y Apellidos" >
                      </div>
                      <div class="form-group">
                        <label for="DNI">DNI</label>
                        <input required type="text" class="form-control" id="DNI" name ="DNI" aria-describedby="emailHelp" placeholder="DNI">
                      </div>
                      <div class="form-group">
                        <label for="Provincia">Provincia</label>
                        <?php
                          $mysqli = new mysqli('localhost', 'socio', 'socio', 'marte');
                        ?>
                        <select class="form-control" id="Provincia" name ="Provincia" required >
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
                      <label for="Pais">País</label>
                      <?php
                        $mysqli = new mysqli('localhost', 'socio', 'socio', 'marte');
                      ?>
                      <select class="form-control" id="Pais" name ="Pais" required >
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
                        <label for="Telf">Teléfono</label>
                        <input required type="text" class="form-control" id="Telf" name ="Telf" aria-describedby="emailHelp" placeholder="Ej. +343987159" pattern="(\+34|0034|34)?[\s|\-|\.]?[6|7|9][\s|\-|\.]?([0-9][\s|\-|\.]?){8}" >
                     </div>

            
                      <div class="form-group">

                      <label for="Cuenta">Nº de Cuenta</label>
                      <input type="text" class="form-control" id="Cuenta" name ="Cuenta" aria-describedby="emailHelp"  >
                      </div>

                      <div class="form-group">
                      <label for="rolid">Rol</label>
                      <?php
                        $mysqli = new mysqli('localhost', 'socio', 'socio', 'marte');
                      ?>
                      <select class="form-control" id="rolid" name ="rolid" required >
                      <option value="0">Seleccione:</option>
                      <?php
                        $query1 = $mysqli -> query ("SELECT * FROM rolusuario");
                        while ($valores1 = mysqli_fetch_array($query1)) {
                        echo '<option value="'.$valores1[idRol].'">'.utf8_encode($valores1[Nombre]).'</option>';
                        }
                      ?>
                      </select>
                      </div>



                     
                              
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar</button>
                  <button type="submit" class="btn btn-primary" name="mtousernew1">Insertar</button>
                </div>
               </form>
              </div>
            </div>
          </div>


 <?php // Control para añadir nuevos usuarios
     if(isset($_POST['mtousernew1']))
          {
          
           if (isset($_POST['mtorol_namenew']) && $_POST['mtorol_namenew']!='')
              {
                
                $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
                $acentos="SET NAMES 'utf8'";
                mysqli_query($conexion, $acentos);

                $sqlindice = "SELECT id_usuario from usuarios order by id_usuario desc limit 1";
                $next=mysqli_query($conexion, $sqlindice);
                $indice = mysqli_fetch_row($next);
                $indice[0] = $indice[0] + 1;
                
                $sql = "INSERT INTO usuarios (id_usuario,usuario) values (".$indice[0].",'$_POST[mtorol_namenew]')";
                $consulta = mysqli_query($conexion, $sql);
                 if($consulta)
                    {
                      include ('confirm_rol.php');                   
                    }
                  else
                  {
                   include ('noconfirm_rol.php');  
                   
                  }
                mysqli_close($conexion);
                
              }
                
             
           
          } 
       unset($_POST['mtousernew1']);
     

    ?>

