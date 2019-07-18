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

								

							<div class="accordion" id="accordionExample">
								  <div class="card">
									<div class="card-header" id="headingOne">
									  <h2 class="mb-0">
										<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										  LISTADO DE DOCUMENTOS<BR>
										  <a href="documentos_add.php" class="btn btn-success">Añadir Documentos</a>
									  </h2>
									</div>

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
																	$result = mysqli_query($mysqli, "SELECT * FROM documentos, usuarios
																									 WHERE userid =id_usuario
																									 ORDER BY creation_date  DESC");
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
																				<a href="<?php echo utf8_encode($docs_data['documento']); ?>" ><?php echo utf8_encode($docs_data['documento']); ?></a>
																				<input type="hidden" name ="documento" value="<?php echo utf8_encode($docs_data['documento']); ?>">
																				</td>
																				<td>
																				<input type="hidden" class="form-control" name ="id_documento" value="<?php echo utf8_encode($docs_data['id_documento']); ?>">
																				<button type="submit" class="btn btn-primary" name="updatedocs">Editar</button>
																				<br> <br>
																				<button type="submit" class="btn btn-primary" name="deletedocs">Eliminar</button>
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
