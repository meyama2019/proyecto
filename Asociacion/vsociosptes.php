<?php
 include('../models/connection1.php');
?>

 <div class="card">
  <h5 class="card-header" style="background-color: #F78181">Revisión de Socios</h5>

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
            <label for="cusuario"></label>
            <input type="text" class="form-control" id="cusuario" name="cusuario" placeholder="Usuario">
          </div>
          <div class="form-group col-md-3">
            <label for="cdni"></label>
            <input type="text" class="form-control" id="cdni" name="cdni" placeholder="DNI">
          </div>
          <div class="form-group col-md-3">
            <label for="cemail"></label>
            <input type="text" class="form-control" id="cemail" name="cemail" placeholder="Email">
          </div>
         
        </div>
      

        <div class="form-row">
         
          <div class="form-group col-md-6">
            <label for="ctfno"></label>
            <input type="text" class="form-control" id="ctfno" name="ctfno" placeholder="Teléfono">
          </div>
          <div class="form-group col-md-6">
            <label for="ccuenta"></label>
            <input type="text" class="form-control" id="ccuenta" name="ccuenta" placeholder="Cuenta">
          </div>
         
        </div>

      
        <center><button type="submit" class="btn btn-primary btn-sm" name="busca_socio">Buscar</button></center>
  </form>
</div>
 

  <div class="card-body">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  
      <div class="container">
          <br>
          <table class="table table-hover">
            <thead class="thead-light">
              <tr>
                <th scope="col">id</th>
                <th scope="col">usuario</th>
                <th scope="col">email</th>
                <th scope="col">Nom_Ape</th>
                <th scope="col">Dni</th>
                <th scope="col">Provincia</th>
                <th scope="col">Pais</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Cuenta</th>
                <th scope="col">Acción</th>
             
              </tr>
            </thead>
             <tbody>

              <?php
                    $sqlInicial="SELECT id_usuario,usuario,email,Nom_Ape,dni,pr.provincia,pa.nombre,telefono,cuenta,activo,rol_id 
                        FROM paises pa  
                        inner join usuarios us on us.Pais = pa.id
                        inner join provincias pr on pr.id_provincia = us.provincias                                
                        where us.activo = 1 "; 
                    $x=0;
                    Global $X;
                    if(isset($_POST['busca_socio']) )
                    {
                     
                        if(isset($_POST['cid']) && $_POST['cid'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && id_usuario like '%$_POST[cid]%'";
                          }
                        if(isset($_POST['cusuario']) && $_POST['cusuario'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && usuario like '%$_POST[cusuario]%'";
                          }
                        if(isset($_POST['cdni']) && $_POST['cdni'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && dni like '%$_POST[cdni]%'";
                          }
                        if(isset($_POST['cemail']) && $_POST['cemail'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && email like '%$_POST[cemail]%'";
                          }
                        if(isset($_POST['ctfno']) && $_POST['ctfno'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && telefono like '%$_POST[ctfno]%'";
                          }
                       
                        if(isset($_POST['ccuenta']) && $_POST['cid'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && cuenta like '%$_POST[ccuenta]%'";
                          }

                         $consulta = mysqli_query($conexion, $sqlInicial);                         
                         
                        while ($listaUsuarios = mysqli_fetch_array($consulta)) 
                                {
                                   
                                    
                                    echo ('
                                             <tr>
                                            <th scope="row">'. utf8_encode($listaUsuarios['id_usuario']).'</th>
                                            <td>'. utf8_encode($listaUsuarios['usuario']). '</td>
                                            <td>'. utf8_encode($listaUsuarios['email']).'</td>
                                            <td>'. ($listaUsuarios['Nom_Ape']).'</td>
                                            <td>'. utf8_encode($listaUsuarios['dni']).'</td>
                                            <td>'. ($listaUsuarios['provincia']).'</td>
                                            <td>'. ($listaUsuarios['nombre']).'</td>
                                            
                                            <td>'. utf8_encode($listaUsuarios['telefono']).'</td>
                                            <td>'. utf8_encode($listaUsuarios['cuenta']).'</td>');

                                            if($listaUsuarios['activo']==1)
                                            {
                                              
                                               echo('<td><button type="submit" class="btn btn-outline-primary btn-sm" name="update_soc" 
                                                value='.$listaUsuarios['id_usuario'].'>Activar</button></td>');
                                            }

                                    $x=$x+1;
                                    $X=$x;
                                 }
                        echo ('<p>Resultados encontrados '.$X.'</p>');
                     
                    }
                    else
                    {

                      $sqlInicial="SELECT id_usuario,usuario,email,Nom_Ape,dni,pr.provincia,pa.nombre,telefono,cuenta,activo,rol_id 
                          FROM paises pa  
                          inner join usuarios us on us.Pais = pa.id
                          inner join provincias pr on pr.id_provincia = us.provincias                                
                          where us.activo = 1 "; 
                      $x=0;
                      Global $X;
                        $consulta = mysqli_query($conexion, $sqlInicial);
                        while ($listaUsuarios = mysqli_fetch_array($consulta)) 
                                {
                                   
                                    
                                    echo ('
                                             <tr>
                                            <th scope="row">'. utf8_encode($listaUsuarios['id_usuario']).'</th>
                                            <td>'. utf8_encode($listaUsuarios['usuario']). '</td>
                                            <td>'. utf8_encode($listaUsuarios['email']).'</td>
                                            <td>'. ($listaUsuarios['Nom_Ape']).'</td>
                                            <td>'. utf8_encode($listaUsuarios['dni']).'</td>
                                            <td>'. ($listaUsuarios['provincia']).'</td>
                                            <td>'. ($listaUsuarios['nombre']).'</td>
                                            
                                            <td>'. utf8_encode($listaUsuarios['telefono']).'</td>
                                            <td>'. utf8_encode($listaUsuarios['cuenta']).'</td>');

                                            if($listaUsuarios['activo']==1)
                                            {
                                              
                                               echo('<td><button type="submit" class="btn btn-outline-primary btn-sm" name="update_soc" 
                                                value='.$listaUsuarios['id_usuario'].'>Activar</button></td>');
                                            }

                                    $x=$x+1;
                                    $X=$x;
                                 }
                        echo ('<p>Resultados encontrados '.$X.'</p>');


                    }

                   
               ?>


           
            
            </tbody>
          </table>
      
        </div>
      </form>
  </div>
</div>


