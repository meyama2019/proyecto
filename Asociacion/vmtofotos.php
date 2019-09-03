
<?php // Funcion para Eliminar una foto ************************************************
if(isset($_POST['deletefoto']))
{

    $id_foto = $_POST['idfoto'];
	$x = $_POST['documento'];
				
	unlink($x);

    $sql = "DELETE FROM fotos WHERE id_foto = $_POST[idfoto]";
    $consulta = mysqli_query($conexion, $sql);
    if($consulta)
    {
        echo "<script>alert('Foto eliminada');</script>";

    }

}
?>

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
            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#mtofotonew">Nuevo</button>
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

                        if(isset($_POST['cmtofecha']) && $_POST['cmtofecha'] !='')
                        {
                            $sqlInicial = $sqlInicial . " && fecha_upload like '%$_POST[cmtofecha]%'";
                        }

                         
                        if(isset($_POST['cmtotitulo']) && $_POST['cmtotitulo'] !='')
                          {
                            $sqlInicial = $sqlInicial . " && titulo like '%$_POST[cmtotitulo]%'";
                          }
                          
                        

                        $result = mysqli_query($conexion, $sqlInicial);

                        while($docs_data = mysqli_fetch_array($result))
                        {?>
                            <tr class="item">
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" accept-charset="utf-8">

                                    <td class="form-group" name ="idfoto" value=<?php echo ($docs_data['id_foto']); ?>>
                                        <?php echo ($docs_data['id_foto']); ?>

                                    </td>

                                    <td class="form-group" name ="userid" value=<?php echo ($docs_data['userid']); ?>>
                                        <?php echo ($docs_data['userid']); ?>

                                    </td>

                                    <td>
                                        <img src='<?php echo ($docs_data['documento']); ?>' class="img-responsive" height="30px" width="30px" alt="...">
										<input type="hidden" name ="documento" value="<?php echo ($docs_data['documento']); ?>">
                                    </td>

                                    <td class="form-group" name ="fecha" value=<?php echo ($docs_data['fecha_upload']); ?>>
                                        <?php echo ($docs_data['fecha_upload']); ?>
                                    </td>

                                    <td class="form-group" name ="titulo" value=<?php echo ($docs_data['titulo']); ?>>
                                        <?php echo ($docs_data['titulo']); ?>
                                    </td>

                                    <td>
                                        <input type="hidden" class="form-control" name ="idfoto" value="<?php echo utf8_decode($docs_data['id_foto']); ?>">
										
                                        <!--<button type="submit" class="btn btn-outline-danger btn-sm" name="updaterol">Editar</button>-->

                                        <button type="submit" class="btn btn-outline-danger btn-sm" name="deletefoto" onclick="return confirm('¿Confirma eliminación foto?');">Borrar</button>
                                    </td>


                                </form>
                            </tr>
                            <?php
                            $x=$x+1;
                            $X=$x;

                        }
                         
                              
                                 
                        echo ('<p>Resultados encontrados '.$X.'</p>');

                     
                      }
                    else
                    {   
                        
                        $x=0;
                        $result = mysqli_query($conexion, "SELECT * FROM fotos where 1");
                        while($docs_data = mysqli_fetch_array($result))
              {?>
                  <tr class="item">
                      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" accept-charset="utf-8" >

                          <td class="form-group" name ="idfoto" value=<?php echo ($docs_data['id_foto']); ?>>
                              <?php echo ($docs_data['id_foto']); ?>

                          </td>

                          <td class="form-group" name ="userid" value=<?php echo ($docs_data['userid']); ?>>
                              <?php echo ($docs_data['userid']); ?>

                          </td>

                          <td>
                              <img src='<?php echo ($docs_data['documento']); ?>' class="img-responsive" height="30px" width="30px" alt="...">
							  <input type="hidden" name ="documento" value="<?php echo ($docs_data['documento']); ?>">
                          </td>

                          <td class="form-group" name ="fecha" value=<?php echo ($docs_data['fecha_upload']); ?>>
                              <?php echo ($docs_data['fecha_upload']); ?>
                          </td>

                          <td class="form-group" name ="titulo" value=<?php echo ($docs_data['titulo']); ?>>
                              <?php echo ($docs_data['titulo']); ?>
                          </td>

                          <td>
                              <input type="hidden" class="form-control" name ="idfoto" value="<?php echo utf8_decode($docs_data['id_foto']); ?>">

                              <button type="submit" class="btn btn-outline-danger btn-sm" name="deletefoto" onclick="return confirm('¿Confirma eliminación foto?');">Borrar</button>
                          </td>


                      </form>
                  </tr>
                  <?php
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

<!-- Modal -->
<div class="modal fade" id="mtofotonew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelur" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelur">Registro de fotos</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data"> 
                        <input type='hidden' name='MAX_FILE_SIZE' value='2000000'> 
                      <div class="form-group">
                        <label for="mtorol_namenew">Id usuario</label>
                        <?php
                      ?>
                      <select class="form-control" id="mtorol_namenew" name ="mtorol_namenew" required >
                      <option value="0">Seleccione:</option>
                      <?php
                        $query1 = $conexion -> query ("SELECT * FROM usuarios");
                        while ($valores1 = mysqli_fetch_array($query1)) {
                        echo '<option value="'.$valores1[id_usuario].'">'.$valores1[usuario].'</option>';
                        }
                      ?>
                      </select>
                      </div>
                
                      <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" placeholder="File.." required accept=".jpeg,.jpg,.png, .bmp">
                      </div>
                      
                      <div class="form-group">

                        <label for="titulo">Titulo</label>
                        <input required type="text" class="form-control" id="titulo" name ="titulo" aria-describedby="emailHelp" placeholder="" >
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



<?php // Control para añadir nuevas fotos

         
     if(isset($_POST['mtousernew1']))
          {
          
           if (isset($_POST['mtorol_namenew']) && $_POST['mtorol_namenew']!='')

              {
              if ($_FILES['foto']['error'] > 0)
              {
                echo 'Problem mayor 0';
                exit;
              }

              if ($_FILES['foto']['type'] != 'image/jpeg')
              {
                echo 'Problem type jpeg';
                exit;
              }

              $aleatorio = rand(1,1000000);
              $nombre= $_FILES['foto']['name'];
              $uploaled_file = '../imagenes/uploads_img/'. $aleatorio .$nombre;
              

              if (is_uploaded_file($_FILES['foto']['tmp_name']))

              {
                if(!move_uploaded_file($_FILES['foto']['tmp_name'], $uploaled_file))
                {
                  echo 'Problem on move';
                  exit;
                }
              }
              else
              {
                echo 'Possible Problem attack';
                exit;
              }

                $docu=$uploaled_file;
                $user = $_SESSION['id_usuario'];

                $sqlindice = "SELECT id_foto from fotos order by id_foto desc limit 1";
                $next=mysqli_query($conexion, $sqlindice);
                $indice = mysqli_fetch_row($next);
                $indice[0] = $indice[0] + 1;
                
                $sql = "INSERT INTO fotos (id_foto,userid,documento,fecha_upload,titulo)
                 values (0,'$_POST[mtorol_namenew]','$docu',current_timestamp,'$_POST[titulo]')";
               
                $consulta = mysqli_query($conexion, $sql);
                 if($consulta)
                    {

                      echo "<script>alert(Foto insertada correctamente');</script>";                  
                    }
                  else
                  {
                     echo "<script>alert(No se ha podido insertar, revise el documento');</script>";  
                   
                  }
               
              }
                
             
           
          } 
       unset($_POST['mtousernew1']);
     

    ?>



<!-------CONFIRMAR BORRAR DOCUMENTO--------------->
<script type="text/javascript">

<!--

function confirmation() {

	if(confirm("Realmente deseas eliminar la noticia?"))

		{window.location = "";

	}

}

//-->

</script>
