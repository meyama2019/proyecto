<?php
include('../models/connection1.php');
?>
  <div class="card">
  <h5 class="card-header" style="background-color: #F78181">Mensajes Recibidos</h5>

  <br>
  <div class="container">
    
    <form id="joder" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          
       
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="ccont"></label>
            <input type="text" class="form-control" id="ccont" name="ccont" placeholder="Código">
          </div>        
          <div class="form-group col-md-4">
            <label for="cnombre"></label>
            <input type="text" class="form-control" id="cnombre" name="cnombre" placeholder="Nombre">
          </div>
          <div class="form-group col-md-4">
            <label for="cemaia"></label>
            <input type="text" class="form-control" id="cemaila" name="cemaila" placeholder="Email">
          </div>
         
        </div>
      

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="cfechai"></label>
            <input type="date" class="form-control" id="cfechai" name="cfechai" placeholder="Desde Fecha">
          </div>
          <div class="form-group col-md-4">
            <label for="cfechaf"></label>
            <input type="date" class="form-control" id="cfechaf" name="cfechaf" placeholder="Hasta Fecha">
          </div>
          <div class="form-group col-md-4">
            <label for="ctfno"></label>
            <input type="text" class="form-control" id="ctfno" name="ctfno" placeholder="Teléfono">
          </div>        
        </div>

      
        <center><button type="submit" class="btn btn-primary btn-sm" name="find_contacto">Buscar</button></center>
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
                <th scope="col">Fecha</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Telefono</th>
                <th scope="col">Asunto</th>
                <th scope="col">Mensaje</th>
                <th scope="col">Acción</th>
               
               
             
              </tr>
            </thead>
             <tbody>

              <?php
                 
                  //$conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
                  //$acentos="SET NAMES 'utf8'";
                  //mysqli_query($conexion, $acentos);
                  $sql = "SELECT * from contacto where activo = 1";
                  $x=0;
                  Global $X;
                  if(isset($_POST['find_contacto']))
                  {
                          if(isset($_POST["ccont"]) && $_POST["ccont"]!='')
                          {
                           $sql = $sql . " and id_solicitud = '$_POST[ccont]' ";                          
                          }

                          if(isset($_POST['cnombre']) && $_POST["cnombre"]!='')
                          {
                            $sql = $sql . " and nombre like '%$_POST[cnombre]%'";
                          }
                      
                          if(isset($_POST['cemaila']) && $_POST["cemaila"]!='')
                          {
                             $sql = $sql . " and email like '%$_POST[cemaila]%'";
                          }
                       
                          if(isset($_POST['cfechai']) && $_POST["cfechai"]!='')
                          {
                             $sql = $sql . " and date(fecha_entrada) >= date('$_POST[cfechai]')";
                          }
                       
                          if(isset($_POST['cfechaf']) && $_POST["cfechaf"]!='')
                          {
                            $sql = $sql . " and date(fecha_entrada) <= date('$_POST[cfechaf]')";
                          } 
                                           
                          if(isset($_POST['ctfno']) && $_POST["ctfno"]!='')
                          {
                             $sql = $sql . " and telefono like '%$_POST[ctfno]%'";
                          }
                      

                        
                          //$sql1=$conexion->query($sql);
                          $consulta = mysqli_query($conexion, $sql);
                         
                         //echo($sql . $_POST['ccont'] );
                         // foreach ($sql1->fetchAll() as $listaMensajes[$x]) 
                          while ($listaMensajes = mysqli_fetch_array($consulta))   
                              {
                                //$listanoticias[]= $noticias;
                                    
                                  echo ('
                                     <tr>
                                          <th scope="row'.$x.'" name="row">'. utf8_encode($listaMensajes['id_solicitud']).'</th>
                                          <td>'. utf8_encode($listaMensajes['fecha_entrada']). '</td>
                                          <td>'. utf8_encode($listaMensajes['nombre']).'</td>
                                          <td>'. utf8_encode($listaMensajes['email']).'</td>
                                          <td>'. utf8_encode($listaMensajes['telefono']).'</td>
                                          <td>'. utf8_encode($listaMensajes['asunto']).'</td>
                                          <td>'. utf8_encode($listaMensajes['mensaje']).'</td>');

                                          if($listaMensajes['activo']==1)
                                          {
                                            //echo('<td>Pdte</td>
                                            //  <td ><center><input type="checkbox" class="form-check-input"  id="exampleCheck1" ></center></td>
                                            //   </tr>');
                                            echo('<td><button type="submit" class="btn btn-outline-primary btn-sm" name="update_new" 
                                              value='.$listaMensajes['id_solicitud'].'>Leido</button></td>');
                                          }
                               
                                  
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
                      $sql = "SELECT * from contacto where activo = 1";
                      $x=0;
                      Global $X;
                       //$sql1=$db->query($sql);

                        $consulta = mysqli_query($conexion, $sql);
                         
                         //echo($sql . $_POST['ccont'] );
                          //foreach ($sql1->fetchAll() as $listaMensajes[$x]) 
                          while ($listaMensajes = mysqli_fetch_array($consulta)) 

                              {
                                //$listanoticias[]= $noticias;
                                    
                                  echo ('
                                     <tr>
                                          <th scope="row'.$x.'" name="row">'. utf8_encode($listaMensajes['id_solicitud']).'</th>
                                          <td>'. utf8_encode($listaMensajes['fecha_entrada']). '</td>
                                          <td>'. utf8_encode($listaMensajes['nombre']).'</td>
                                          <td>'. utf8_encode($listaMensajes['email']).'</td>
                                          <td>'. utf8_encode($listaMensajes['telefono']).'</td>
                                          <td>'. utf8_encode($listaMensajes['asunto']).'</td>
                                          <td>'. utf8_encode($listaMensajes['mensaje']).'</td>');

                                          if($listaMensajes['activo']==1)
                                          {
                                            //echo('<td>Pdte</td>
                                            //  <td ><center><input type="checkbox" class="form-check-input"  id="exampleCheck1" ></center></td>
                                            //   </tr>');
                                            echo('<td><button type="submit" class="btn btn-outline-primary btn-sm" name="update_new" 
                                              value='.$listaMensajes['id_solicitud'].'>Leido</button></td>');
                                          }
                               
                                  
                                   $x=$x+1; 
                                   $X=$x; 
                                 
                               }
                           echo ('<p>Resultados encontrados '.$X.'</p>');
                        
                  }
                   //db::cerrar();
                   mysqli_close($conexion);
                   $sql = '';
                   $sqlc = null;
 
               ?>


           
            
            </tbody>
          </table>
      
        </div>
      </form>
  </div>
</div>
