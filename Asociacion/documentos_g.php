<?php 
session_start();
include ('../includes/header.php');
include('../models/connection1.php');
    $listaUsuarios =[];
    $sql = "SELECT * FROM usuarios";
    $consulta = mysqli_query($conexion, $sql);
    while ($usuario = mysqli_fetch_array($consulta)) {
      $listaUsuarios[]= ($usuario['rol_id']);
    }
      require_once('menu.php');
  
?>


<!----DOCUMENTOS DELETE | ELIMINAR DOCUMENTO-->	
<?php
          if(isset($_POST['deletedocs']))
          {
          
                //$conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
				$id_documento = $_POST['id_documento'];
                $x= $_POST['documento'];
				
				unlink($x);
				$sql = "DELETE FROM documentos
						WHERE id_documento = '$_POST[id_documento]'
						";
				$consulta = mysqli_query($conexion, $sql);
				if($consulta)
                    {
					  echo "<script>alert('Documento eliminado de la tabla y del servidor');</script>";			
                    }		

          }  
    ?>





<?php
            if (isset($_SESSION['rol1']) && $_SESSION['rol1']!= 1 && $_SESSION['activo']==0) // Habría que controlar activo = 0
				{
				?>	
								<div class="card">
								  	<h5 class="card-header" style="background-color: #F78181">Gestión de Documentos</h5>
								  	<br>
								  	 <div class="container">
								  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
          

							        <div class="form-row">
							           <div class="form-group col-md-3">
							            <label for="titulo">Título</label>
							            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
							          </div>
							          <div class="form-group col-md-3">
							            <label for="descripcion">Descripción</label>
							            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción">
							          </div>
							           <div class="form-group col-md-2">
							            <label for="quien">Autor</label>
																	<select class="form-control" id="quien" name ="quien" required >
																	<option value="0">Subido por:</option>
																	<?php
																	  $query1 = $conexion -> query ("SELECT * FROM usuarios");
																	  while ($valores = mysqli_fetch_array($query1))
																	  {
																		echo '<option value="'.$valores[id_usuario].'">'.$valores[usuario].'</option>';
																	  }
																	?>
							            </select>
							          </div>
							          <div class="form-group col-md-2">
							            <label for="fechainicio">Desde</label>
							            <input type="date" class="form-control" id="fechainicio" name="fechainicio" placeholder="Desde">
							          </div>
							          <div class="form-group col-md-2">
							            <label for="fechafin">Hasta</label>
							            <input type="date" class="form-control" id="fechafin" name="fechafin" placeholder="Hasta">
							          </div>
							        </div>

							       
							        <center><button type="submit" class="btn btn-primary btn-sm " name="buscador" >Buscar</button></center>

							         
							        
							         <div class="container">
							           <div class="form-row">
							           	
							            <center><a href="documentos_add.php" class="btn btn-outline-danger btn-sm">Nuevo</a></center>
							           
							        	</div>
							         </div>
							            
							       
							    </form>
							</div>
									<!--FIN BUSCADORES--->

			
									<div id="collapseOne" class="collapse show container" aria-labelledby="headingOne" data-parent="#accordionExample">
										<div class="card-body ">
											<div class="container">
														<script src="https://www.w3schools.com/lib/w3.js"></script>
														<table id="myTable" class="table">
															<tr class="thead-light">
																<th >Fecha subida</th>
																<th >Título</th>
																<th >Descripción</th>
																<th >Subido por</th>
																<th >Documento</th>
																<th >Actualización</th>
																
															</tr>
															<tbody>
																<?php  
																if(isset($_POST['buscador']) )
																{
																	if(!empty($_POST['titulo']) )
																		{
																		  $query ="SELECT * FROM documentos, usuarios WHERE documentos.titulo like '%" . $_POST['titulo'] . "%' AND documentos.userid =usuarios.id_usuario";
																		  $result = mysqli_query($conexion, $query);
																		}
																	elseif (!empty($_POST['descripcion']) ) 
																		{
																		  $query ="SELECT * FROM documentos, usuarios WHERE documentos.descripcion like '%" . $_POST['descripcion'] . "%' AND documentos.userid =usuarios.id_usuario";
																		  $result = mysqli_query($conexion, $query);
																		}
																	elseif ( !empty($_POST['fechainicio'] && $_POST['fechafin']) ) 
																		{
																		  $fechainicio = date("Y-m-d", strtotime($_POST['fechainicio'])); 
																		  $fechafin = date("Y-m-d", strtotime($_POST['fechafin']));
																		  
																		  if  ($fechafin < $fechainicio)
																		  {
																			  echo "<script>alert('Fecha fin no puede ser inferior a fecha de inicio');</script>";
																			  $result = mysqli_query($conexion, "SELECT * FROM documentos, usuarios
																									 WHERE userid =id_usuario
																									 ORDER BY creation_date  DESC");
																		  }
																		  else
																		  {
																			$query ="SELECT * FROM documentos, usuarios WHERE documentos.creation_date  >= '$fechainicio' AND documentos.creation_date  <= '$fechafin' AND documentos.userid =usuarios.id_usuario";
																			$result = mysqli_query($conexion, $query);
																		  }
																		}
																	elseif ( !empty($_POST['quien']) ) 
																		{
																			$query ="SELECT * FROM documentos, usuarios WHERE documentos.userid like '%" . $_POST['quien'] . "%' AND documentos.userid =usuarios.id_usuario";
																			$result = mysqli_query($conexion, $query);
																		}	
																	else
																		{
																			if ( (empty($_POST['fechainicio']) &&  !empty($_POST['fechafin']) ) || (!empty($_POST['fechainicio']) &&  empty($_POST['fechafin'])) )		
																			{
																				echo "<script>alert('Debes introducir fecha inicio y fecha fin.');</script>";
																				$result = mysqli_query($conexion, "SELECT * FROM documentos, usuarios
																									   WHERE userid =id_usuario
																									   ORDER BY creation_date  DESC");
																			}
																			elseif ( empty($_POST['titulo']) &&  empty($_POST['descripcion']) &&  empty($_POST['fechainicio']) &&  empty($_POST['fechafin'])   &&  empty($_POST['quien']) )
																			{
																				echo "<script>alert('Debes introducir criterios de búsqueda.');</script>";
																				$result = mysqli_query($conexion, "SELECT * FROM documentos, usuarios
																									   WHERE userid =id_usuario
																									   ORDER BY creation_date  DESC");
																			}
																			else
																			{
																				
																				$result = mysqli_query($conexion, "SELECT * FROM documentos, usuarios
																									   WHERE userid =id_usuario
																									   ORDER BY creation_date  DESC");
																					echo "<p class='alert alert-danger'>No hay documentos que mostrar.</p>";
																			}
																			
																		}
																}
																else
																{
																	$result = mysqli_query($conexion, "SELECT * FROM documentos, usuarios
																									 WHERE userid =id_usuario
																									 ORDER BY creation_date  DESC");
																}

																if ($result->num_rows > 0)
																		{
																		while($docs_data = mysqli_fetch_array($result))
																			{?>
																				<tr class="item">
																				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" accept-charset="utf-8" onsubmit="return confirm('¿Realmente deseas eliminar el documento?');">
																					<td >
																					<input type="date" class="form-control " name ="fecha" value="<?php echo $docs_data['creation_date']; ?>">
																					</td>
																					<td >
																					<textarea type="text" class="form-control" name ="titulo" value=""><?php echo $docs_data['titulo']; ?></textarea>
																					</td>
																					<td >
																					<textarea type="text" class="form-control" name ="descripcion" value=""><?php echo $docs_data['descripcion']; ?></textarea>
																					</td>
																					<td >
																					<?php echo $docs_data['usuario']; ?>
																					</td>
																					<td >
																					<a href="<?php echo $docs_data['documento']; ?>" >Ver</a>
																					<input type="hidden" name ="documento" value="<?php echo $docs_data['documento']; ?>">
																					</td>
																					
																					<input type="hidden" class="form-control" name ="id_documento" value="<?php echo $docs_data['id_documento']; ?>">
																					
																					<td >
																					<a class="btn btn-outline-danger btn-sm" href="updatedocumentos.php?id=<?php echo ($docs_data['id_documento'])?>">Editar</a>

																					<button type="submit" class="btn btn-outline-danger btn-sm" name="deletedocs">Borrar</button>
																					</td>
															


																					
																					</form>
																				</tr>
																			<?php         
																					
																			}
																		}
																		else
																			{
																				echo "<div class='alert alert-danger' role='alert'>No hay documentos que mostrar.</div>";
																			}
																?>
															</tbody>
														</table>
											
											</div>
										</div>
									</div>
								</div>  
						

			<?php
				}
			else
				{
					echo('<div class="container">
								<div class="alert alert-danger" role="alert">
								 No tienes permiso para visualizar el contenido
								</div></div> ');
					
				}		
					  
							  
							  

   mysqli_close($conexion);


  include ('footer.php');
?>





