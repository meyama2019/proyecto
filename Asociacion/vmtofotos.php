<div class="card">
	<h5 class="card-header" style="background-color: #F78181">Gestión de Fotos</h5>

	<br>
	<div class="container">    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          
       
        <div class="form-row">
           <div class="form-group col-md-3">
            <label for="cmtoid"></label>
            <input type="text" class="form-control" id="cmtoid" name="cmtoid" placeholder="Id Fotos">
          </div>
          <div class="form-group col-md-3">
            <label for="cmtonombre"></label>
            <input type="text" class="form-control" id="cmtonombre" name="cmtonombre" placeholder="Id Usuario">
          </div>
          <div class="form-group col-md-3">
            <label for="cmtodocumento"></label>
            <input type="text" class="form-control" id="cmtodocumento" name="cmtodocumento" placeholder="Foto">
          </div>
          <div class="form-group col-md-3">
            <label for="cmtofecha"></label>
            <input type="date" class="form-control" id="cmtofecha" name="cmtofecha" placeholder="Fecha">
          </div>

          <div class="form-group col-md-3">
            <label for="cmtotitulo"></label>
            <input type="text" class="form-control" id="cmtotitulo" name="cmtotitulo" placeholder="Titulo">
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
                <th scope="col">Id Foto</th>
                <th scope="col">Id Usuario</th>
                <th scope="col">Foto</th>
                <th scope="col">Fecha</th>               
                <th scope="col">Titulo</th>
                <th scope="col">Acción</th>
                               
             
              </tr>
            </thead>
             <tbody>
               

              <?php
                    $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
                    $acentos="SET NAMES 'utf8'";
                    mysqli_query($conexion, $acentos);
                    $sqlInicial="SELECT * FROM fotos where 1 "; 
                    $x=0;
                    Global $X;
                    if(isset($_POST['mto_buscarrol']) )
                    {
                     
                        if(isset($_POST['cmtoid']) && $_POST['cmtoid'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && id_foto = '$_POST[cmtoid]'";
                          }
                        if(isset($_POST['cmtonombre']) && $_POST['cmtonombre'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && userid like '%$_POST[cmtonombre]%'";
                          }

                        if(isset($_POST['cmtodocumento']) && $_POST['cmtodocumento'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && documento like '%$_POST[cmtodocumento]%'";
                          }
                         
                        if(isset($_POST['cmtotitulo']) && $_POST['cmtotitulo'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && titulo like '%$_POST[cmtotitulo]%'";
                          }
                          
                        
                         $sql=$db->query($sqlInicial);
                         
                         foreach ($sql->fetchAll() as $listaUsuarios[$x]) 
                                {                            
                                    echo ('
                                             <tr >
                                            <th scope="row">'. utf8_encode($listaUsuarios[$x]['id_foto']).'</th>
                                            <td >'. utf8_encode($listaUsuarios[$x]['userid']). '</td>
                                            <td><img src='. utf8_encode($listaUsuarios[$x]['documento']). ' class="img-responsive" height="30px" width="30px" alt="..."></td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['fecha_upload']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['titulo']). '</td>
                                            <td><button type="submit" class="btn btn-outline-danger btn-sm" name="edit-rol" 
                                                value='.$listaUsuarios[$x]['id_foto'].'>Editar</button>
                                                <button type="submit" class="btn btn-outline-danger btn-sm" name="edit-rol" 
                                                value='.$listaUsuarios[$x]['id_foto'].'>Borrar</button></td></tr>
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
                        $sqlInicial="SELECT * FROM fotos where 1 "; 
                        $x=0;
                       
                    
                        $sql=$db->query($sqlInicial);
                         
                        foreach ($sql->fetchAll() as $listaUsuarios[$x]) 
                                {
                                   
                                    
                                    echo ('
                                             <tr>
                                            <th scope="row">'. utf8_encode($listaUsuarios[$x]['id_foto']).'</th>
                                            <td >'. utf8_encode($listaUsuarios[$x]['userid']). '</td>
                                            <td><img src='. utf8_encode($listaUsuarios[$x]['documento']). ' class="img-responsive" height="30px" width="30px" alt="..."></td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['fecha_upload']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['titulo']). '</td>
                                            <td><button type="submit" class="btn btn-outline-danger btn-sm" name="edit-rol" 
                                                value='.$listaUsuarios[$x]['id_foto'].'>Editar</button>
                                                <button type="submit" class="btn btn-outline-danger btn-sm" name="edit-rol" 
                                                value='.$listaUsuarios[$x]['id_foto'].'>Borrar</button></td></tr>
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


