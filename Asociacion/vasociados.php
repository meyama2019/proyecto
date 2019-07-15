<div class="card">
  <h5 class="card-header">Conoce a nuestros asociados</h5>

  <!-- (1) Formulario de búsqueda por criterios ------->
  <br>
  <div class="container">
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          
       
        <div class="form-row">
           <div class="form-group col-md-3">
            <label for="cid"></label>
            <input type="text" class="form-control" id="cid" name="cid" placeholder="Código">
          </div>
          <div class="form-group col-md-3">
            <label for="cemail"></label>
            <input type="text" class="form-control" id="cemail" name="cemail" placeholder="Email">
          </div>
          <div class="form-group col-md-3">
            <label for="cnom_ape"></label>
            <input type="text" class="form-control" id="cnom_ape" name="cnom_ape" placeholder="Nombre / Apellidos">
          </div>
          <div class="form-group col-md-3">
            <label for="ctfno"></label>
            <input type="text" class="form-control" id="ctfno" name="ctfno" placeholder="Teléfono">
          </div>
        </div>
      

        

      
        <center><button type="submit" class="btn btn-primary btn-sm" name="busca_socio">Buscar</button></center>
  </form>
</div>
 




    <div class="card-body">
        <div class="container">
          
        
          <table class="table table-hover">
            <thead class="thead-light">
              <tr>
                <th scope="col">id</th>
                
                <th scope="col">email</th>
                <th scope="col">Nom_Ape</th>               
                <th scope="col">Provincia</th>
                <th scope="col">Pais</th>
                <th scope="col">Teléfono</th>
                
              </tr>
            </thead>
             <tbody>

                <?php
                    $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
                    $acentos="SET NAMES 'utf8'";
                    mysqli_query($conexion, $acentos);
                    $sqlInicial="SELECT id_usuario,usuario,email,Nom_Ape,dni,pr.provincia,pa.nombre,telefono,cuenta,activo,rol_id 
                        FROM paises pa  
                        inner join usuarios us on us.Pais = pa.id
                        inner join provincias pr on pr.id_provincia = us.provincias                                
                        where 1 and rol_id != 95"; 
                     $x=0;
                     Global $X;
                    if(isset($_POST['busca_socio']) )
                    {
                     
                         if(isset($_POST['cid']) && $_POST['cid'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && id_usuario = '$_POST[cid]'";
                          }
                        if(isset($_POST['cnom_ape']) && $_POST['cnom_ape'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && Nom_Ape like '%$_POST[cnom_ape]%'";
                          }
                       
                        if(isset($_POST['cemail']) && $_POST['cemail'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && email like '%$_POST[cemail]%'";
                          }
                        if(isset($_POST['ctfno']) && $_POST['ctfno'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && telefono like '%$_POST[ctfno]%'";
                          }
                       
                       
                        $sql=$db->query($sqlInicial);
                        
                        foreach ($sql->fetchAll() as $listaUsuarios[$x]) 
                                {
                                   
                                    
                                    echo ('
                                             <tr>
                                            <th scope="row">'. utf8_encode($listaUsuarios[$x]['id_usuario']).'</th>
                                            
                                            <td>'. utf8_encode($listaUsuarios[$x]['email']).'</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['Nom_Ape']).'</td>
                                           
                                            <td>'. utf8_encode($listaUsuarios[$x]['provincia']).'</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['nombre']).'</td>
                                            
                                            <td>'. utf8_encode($listaUsuarios[$x]['telefono']).'</td>');
                                           

                                           
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
                      $sqlInicial="SELECT id_usuario,usuario,email,Nom_Ape,dni,pr.provincia,pa.nombre,telefono,cuenta,activo,rol_id 
                          FROM paises pa  
                          inner join usuarios us on us.Pais = pa.id
                          inner join provincias pr on pr.id_provincia = us.provincias                                
                          where 1 and rol_id != 95"; 
                       $x=0;
                       Global $X;
                       $sql=$db->query($sqlInicial);
                        
                        foreach ($sql->fetchAll() as $listaUsuarios[$x]) 
                                {
                                   
                                    
                                    echo ('
                                             <tr>
                                            <th scope="row">'. utf8_encode($listaUsuarios[$x]['id_usuario']).'</th>
                                            
                                            <td>'. utf8_encode($listaUsuarios[$x]['email']).'</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['Nom_Ape']).'</td>
                                           
                                            <td>'. utf8_encode($listaUsuarios[$x]['provincia']).'</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['nombre']).'</td>
                                            
                                            <td>'. utf8_encode($listaUsuarios[$x]['telefono']).'</td>');
                                           

                                           
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


</div>




            