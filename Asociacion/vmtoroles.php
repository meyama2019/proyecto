<?php
 include('../models/connection1.php');
?>
 <div class="card">
  <h5 class="card-header" style="background-color: #F78181">Gestión de Roles</h5>

  <!-- (1) Formulario de búsqueda por criterios ------->
  

  <br>
  <div class="container">    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">          
       
        <div class="form-row">
           <div class="form-group col-md-3">
            <label for="cmtoid"></label>
            <input type="text" class="form-control" id="cmtoid" name="cmtoid" placeholder="Id Rol">
          </div>
          <div class="form-group col-md-3">
            <label for="cmtonombre"></label>
            <input type="text" class="form-control" id="cmtonombre" name="cmtonombre" placeholder="Descripción Rol">
          </div>
         
         
         </div>
         <center><button type="submit" class="btn btn-primary btn-sm " name="mto_buscarrol" >Buscar</button></center>
         <div class="container">
           <div class="form-row">
            <!--<button type="submit" class="btn btn-outline-danger " name="mto_newrol" >Nuevo</button> -->
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#mtorolnew">
                                Nuevo
                              </button>
        </div>
         </div>
            
       
    </form>
  </div>
  
  

  <div class="card-body">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
   <div class="row d-flex justify-content-center">
      <div class="container" >
       
          <br>
          <table class="table table-hover table-responsive-sm">
            <thead class="thead-light">
              <tr>
                <th scope="col">id Rol</th>
                <th scope="col">Descripción rol</th>               
                <th scope="col">Acción</th>
             
              </tr>
            </thead>
             <tbody>
               

              <?php
                    //$conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
                    //$acentos="SET NAMES 'utf8'";
                    //mysqli_query($conexion, $acentos);
                    $sqlInicial="SELECT * FROM rolusuario where 1 "; 
                    $x=0;
                    Global $X;
                    if(isset($_POST['mto_buscarrol']) )
                    {
                     
                        if(isset($_POST['cmtoid']) && $_POST['cmtoid'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && idRol = '$_POST[cmtoid]'";
                          }
                        if(isset($_POST['cmtonombre']) && $_POST['cmtonombre'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && nombre like '%$_POST[cmtonombre]%'";
                          }
                       
                         //$sql=$db->query($sqlInicial);
                         $consulta = mysqli_query($conexion, $sqlInicial); 
                         
                         //foreach ($sql->fetchAll() as $listaUsuarios[$x])
                         while ($listaUsuarios = mysqli_fetch_array($consulta))  
                                {                            
                                    echo ('
                                             <tr>
                                            <th scope="row">'. utf8_encode($listaUsuarios['idRol']).'</th>
                                            <td>'. utf8_encode($listaUsuarios['Nombre']). '</td>
                                            <td ><button type="submit" class="btn btn-outline-danger btn-sm" name="editrol" 
                                                value='.$listaUsuarios['idRol'].'>Editar</button></td>

                                                <td><button type="submit" class="btn btn-outline-danger btn-sm" name="deleterol" 
                                                value='.$listaUsuarios['idRol'].'>Borrar</button></td></tr>
                                            ');
                                            


                                                
                                     $x=$x+1;
                                     $X=$x;
                                    
                                }

                                   
                                   
                                 
                        echo ('<p>Resultados encontrados '.$X.'</p>');
                     
                      }
                    else
                    {   
                        //$conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
                        //$acentos="SET NAMES 'utf8'";
                        //mysqli_query($conexion, $acentos);
                        $sqlInicial="SELECT * FROM rolusuario where 1 "; 
                        $x=0;
                       
                    
                        //$sql=$db->query($sqlInicial);
                        $consulta = mysqli_query($conexion,$sqlInicial);
                         
                        //foreach ($sql->fetchAll() as $listaUsuarios[$x])
                        while ($listaUsuarios = mysqli_fetch_array($consulta))  
                                {
                                   
                                    
                                    echo ('
                                             <tr>
                                            <th scope="row">'. utf8_encode($listaUsuarios['idRol']).'</th>
                                            <td contentEditable="true">'. utf8_encode($listaUsuarios['Nombre']). '</td>
                                            <td><button type="submit" class="btn btn-outline-danger btn-sm" name="editrol" 
                                                value='.$listaUsuarios['idRol'].'>Editar</button>
                                                <button type="submit" class="btn btn-outline-danger btn-sm" name="deleterol" 
                                                value='.$listaUsuarios['idRol'].'>Borrar</button></td></tr>
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
        </div>
      </form>
  </div>
</div>

<!-- Modal -->
          <div class="modal fade" id="mtorolnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelur" aria-hidden="true">
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
                        <label for="mtorol_namenew">Descripción Rol</label>
                        <input type="text" class="form-control" id="mtorol_namenew" name="mtorol_namenew" placeholder="Nombre Rol Nuevo" required>
                      </div>
                     
                              
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar</button>
                  <button type="submit" class="btn btn-primary" name="mtorolnew1">Insertar</button>
                </div>
               </form>
              </div>
            </div>
          </div>

<!-- Modal -->
          <div class="modal fade" id="mtoroledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabeled" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabeled">Registro de usuario</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                     
                      <div class="form-group">
                        <label for="mtorol_namenew">Descripción Rol</label>
                        <input type="text" class="form-control" id="mtorol_namenew" name="mtorol_namenew" placeholder="Nombre Rol Nuevo" required>
                      </div>
                     
                              
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar</button>
                  <button type="submit" class="btn btn-primary" name="mtoroledit">Insertar</button>
                </div>
               </form>
              </div>
            </div>
          </div>          




    <?php // Control para añadir nuevos roles
     if(isset($_POST['mtorolnew1']))
          {
          
           if (isset($_POST['mtorol_namenew']) && $_POST['mtorol_namenew']!='')
              {
                
                //$conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
                //$acentos="SET NAMES 'utf8'";
                //mysqli_query($conexion, $acentos);

                $sqlindice = "SELECT idRol from rolusuario where idRol < 95 or idRol > 95 order by idRol desc limit 1";
                $next=mysqli_query($conexion, $sqlindice);
                $indice = mysqli_fetch_row($next);
                $indice[0] = $indice[0] + 1;
                
                $sql = "INSERT INTO rolusuario (idRol,nombre) values (".$indice[0].",'$_POST[mtorol_namenew]')";
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
       unset($_POST['mtorolnew1']);
     

    ?>      

 
   <?php // Control para Eliminar Roles (hay que comprobar si en usuario tiene el rol asignado <-- no borrar)
     if(isset($_POST['deleterol']))
          {
           $x=$x-1;
           if ($_POST['deleterol'] !='' )
              {
               
                //$conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
                //$acentos="SET NAMES 'utf8'";
                //mysqli_query($conexion, $acentos);
                //echo($_POST['delete-rol']);
                $sqlindice = "SELECT * FROM USUARIOS where rol_id = ".$_POST['deleterol']." ";
                $next=mysqli_query($conexion, $sqlindice);
                //echo($_POST['deleterol']);
                if(mysqli_num_rows($next)==0)
                {
                  $sqlborra = "DELETE from rolusuario where idRol = '$_POST[deleterol]' ";
                  $borra = mysqli_query($conexion, $sqlborra);
                  if ($borra)
                  {
                    include ('confirm_rol.php');
                  }
                  else
                  {
                    include ('noconfirm_rol.php');
                  }

                }
          
              }
            else
            {
              echo("no Inicializado x");
            }
                
           mysqli_close($conexion);
            
           
          } 
      

    ?>      

