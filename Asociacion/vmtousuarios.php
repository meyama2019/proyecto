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
            <button type="submit" class="btn btn-outline-danger " name="mto_newrol" >Nuevo</button>
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


