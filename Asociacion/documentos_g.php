<?php
session_start();
//define('RAIZ', $_SERVER['DOCUMENT_ROOT']. '/proyecto/'); 
//include(RAIZ . 'asociacion/header.php');
include ('../includes/header.php');
include('../models/connection.php');
    $listaUsuarios =[];
    $db=Db::getConnect();
    $sql=$db->query('SELECT * FROM usuarios');

    // carga en la $listaUsuarios cada registro desde la base de datos
    foreach ($sql->fetchAll() as $usuario) {
      $listaUsuarios[]= ($usuario['rol_id']);
    }
    //return $listaUsuarios;
      require_once('menu.php');
  
?>


<!----DOCUMENTOS UPDATE-->																			
<?php
          if(isset($_POST['updatedocs']))
          {
          
                $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
				$id_documento = $_POST['id_documento'];
                $fecha = $_POST['fecha'];
                $titulo = $_POST['titulo'];
                $descripcion = $_POST['descripcion'];

				$sql = "UPDATE documentos
						SET titulo='$_POST[titulo]',descripcion='$_POST[descripcion]', creation_date='$_POST[fecha]'
						WHERE id_documento = '$_POST[id_documento]'
						";
				$consulta = mysqli_query($conexion, $sql);
				if($consulta)
                    {
					  echo "<script>alert('Información actualizada correctamente');</script>";		
                      //echo "Registro Nº ".$_POST['id_noticia']." ha sido actualizado correctamente";
                    }		
              
          }  
?>


<!----DOCUMENTOS DELETE-->	
<?php
          if(isset($_POST['deletedocs']))
          {
          
                $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
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
                      //echo "Registro Nº ".$_POST['id_noticia']." ha sido eliminado correctamente";
                    }		



          }  
    ?>





	<?php
            if (isset($_SESSION['rol1']) && $_SESSION['rol1']!= 1 && $_SESSION['activo']==0) // Habría que controlar activo = 0
				{
				?>	

								

						
								  <div class="card">
								  	<h5 class="card-header" style="background-color: #F78181">Gestión de Documentos</h5>
								  	<div class="container">
								  		<br>
										<center><a href="documentos_add.php" class="btn btn-outline-danger btn-sm">Nuevo Doc</a></center>
									</div>		
									
									<!--INICIO BUSCADORES--->
										<ul class="list-group">
											<li class="list-group-item">
												<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
													<div class="form-row align-items-center">
																<input name="titulo" type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Buscar en título">
																<input name="descripcion" type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Buscar en descripción">
															

																
																<label for="fechainicio">Fecha inicio</label>
																<input name="fechainicio" type="date" class="form-control mb-2" id="inlineFormInput" >
																<label for="fechafin">Fecha fin</label>
																<input name="fechafin" type="date" class="form-control mb-2" id="inlineFormInput">
																					

																<label for="quien">O buscar por quién subió la noticia</label>
																<select class="form-control" id="quien" name ="quien" required >
																<option value="0">Seleccione:</option>
																<?php
																  $mysqli1 = mysqli_connect('localhost', 'socio', 'socio', 'marte');	
																  $query1 = $mysqli1 -> query ("SELECT * FROM usuarios");
																  while ($valores = mysqli_fetch_array($query1))
																  {
																	echo '<option value="'.$valores[id_usuario].'">'.utf8_encode($valores[usuario]).'</option>';
																  }
																?>
																</select>
															
													
														<div class="col-auto">
															<button type="submit" name="buscador" class="btn btn-primary mb-2">Buscar</button>
														</div>
													</div>
												</form>
											</li>
										</ul>
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
															$mysqli = mysqli_connect('localhost', 'socio', 'socio', 'marte');
																if(isset($_POST['buscador']) )
																{
																	if(!empty($_POST['titulo']) )
																		{
																		  $query ="SELECT * FROM documentos, usuarios WHERE documentos.titulo like '%" . $_POST['titulo'] . "%' AND documentos.userid =usuarios.id_usuario";
																		  $result = mysqli_query($mysqli, $query);
																		}
																	elseif (!empty($_POST['descripcion']) ) 
																		{
																		  $query ="SELECT * FROM documentos, usuarios WHERE documentos.descripcion like '%" . $_POST['descripcion'] . "%' AND documentos.userid =usuarios.id_usuario";
																		  $result = mysqli_query($mysqli, $query);
																		}
																	elseif ( !empty($_POST['fechainicio'] && $_POST['fechafin']) ) 
																		{
																		  $fechainicio = date("Y-m-d", strtotime($_POST['fechainicio'])); 
																		  $fechafin = date("Y-m-d", strtotime($_POST['fechafin']));
																		  
																		  if  ($fechafin < $fechainicio)
																		  {
																			  echo "<script>alert('Fecha fin no puede ser inferior a fecha de inicio');</script>";
																			  goto general;
																		  }
																		  else
																		  {
																		  $query ="SELECT * FROM documentos, usuarios WHERE documentos.creation_date  >= '$fechainicio' AND documentos.creation_date  <= '$fechafin' AND documentos.userid =usuarios.id_usuario";
																		  $result = mysqli_query($mysqli, $query);
																		  }
																		}
																	elseif ( !empty($_POST['quien']) ) 
																		{
																		  $query ="SELECT * FROM documentos, usuarios WHERE documentos.userid like '%" . $_POST['quien'] . "%' AND documentos.userid =usuarios.id_usuario";
																		  $result = mysqli_query($mysqli, $query);
																		}	
																	else
																		{
																			goto general;
																		}
																}
																else
																{
																	general:
																	$result = mysqli_query($mysqli, "SELECT * FROM documentos, usuarios
																									 WHERE userid =id_usuario
																									 ORDER BY creation_date  DESC");
																}


																	while($docs_data = mysqli_fetch_array($result))
																		{?>
																			<tr class="item">
																			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" accept-charset="utf-8">
																				<td class="form-group">
																				<input type="date" class="form-control" name ="fecha" value="<?php echo utf8_encode($docs_data['creation_date']); ?>">
																				</td>
																				<td class="form-group">
																				<textarea type="text" class="form-control" name ="titulo" value=""><?php echo utf8_encode($docs_data['titulo']); ?></textarea>
																				</td>
																				<td class="form-group">
																				<textarea type="text" class="form-control" name ="descripcion" value=""><?php echo utf8_encode($docs_data['descripcion']); ?></textarea>
																				</td>
																				<td class="form-group">
																				<?php echo utf8_encode($docs_data['usuario']); ?>
																				</td>
																				<td class="form-group">
																				<a href="<?php echo utf8_encode($docs_data['documento']); ?>" >Ver</a>
																				<input type="hidden" name ="documento" value="<?php echo utf8_encode($docs_data['documento']); ?>">
																				</td>
																				<td>
																				<input type="hidden" class="form-control" name ="id_documento" value="<?php echo utf8_encode($docs_data['id_documento']); ?>">
																				<button type="submit" class="btn btn-outline-danger btn-sm" name="updatedocs">Editar</button>
																				<br> <br>
																				<button type="submit" class="btn btn-outline-danger btn-sm" name="deletedocs">Eliminar</button>
																				</td>
														
																				
																				</form>
																			</tr>
																		<?php         
																			    
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
					  
							  
							  

   


  include ('footer.php');
?>
