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
          if(isset($_POST['updatenews']))
          {
          
                $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
				$id_noticia = $_POST['id_noticia'];
                $titulo =  utf8_encode($_POST['titulo']);
                $descripcion =  utf8_encode($_POST['descripcion']);
                $fechainicio = $_POST['fechainicio'];
                $fechafin = $_POST['fechafin'];

				$sql = "UPDATE noticias
						SET titulo='$_POST[titulo]',descripcion='$_POST[descripcion]', fechainicio='$_POST[fechainicio]',fechafin='$_POST[fechafin]'
						WHERE id_noticia = '$_POST[id_noticia]'
						";
				$consulta = mysqli_query($conexion, $sql);
				if($consulta)
                    {
					  echo "<script>alert('Registro actualizado correctamente');</script>";		
                      //echo "Registro Nº ".$_POST['id_noticia']." ha sido actualizado correctamente";
                    }		
              
          }  
?>

<?php
          if(isset($_POST['deletenews']))
          {
          
                $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
				$id_noticia = $_POST['id_noticia'];
                

				$sql = "DELETE FROM noticias
						WHERE id_noticia = '$_POST[id_noticia]'
						";
				$consulta = mysqli_query($conexion, $sql);
				if($consulta)
                    {
					  echo "<script>alert('Registro eliminado');</script>";			
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
										  LISTADO DE NOTICIAS
										  <a href="noticias_add.php" class="btn btn-success">Añadir noticia</a>
									  </h2>
									</div>

									<div id="collapseOne" class="collapse show container" aria-labelledby="headingOne" data-parent="#accordionExample">
										<div class="card-body ">
											<div class="container">
														<script src="https://www.w3schools.com/lib/w3.js"></script>
														<table id="myTable" class="table">
															<tr class="thead-light">
																<th >Título</th>
																<th >Descripción</th>
																<th >Subido por</th>
																<th >Fecha inicio</th>
																<th >Fecha fin</th>
																<th >Actualización</th>
																
															</tr>
															<tbody>
																<?php  
																	$mysqli = mysqli_connect('localhost', 'socio', 'socio', 'marte');
																	$result = mysqli_query($mysqli, "SELECT * FROM noticias, usuarios
																									 WHERE userid =id_usuario
																									 ORDER BY fechainicio DESC");
																	while($news_data = mysqli_fetch_array($result))
																		{?>
																			<tr class="item">
																			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" accept-charset="utf-8">
																				<td class="form-group">
																				<textarea type="text" class="form-control" name ="titulo" value="" ><?php echo utf8_encode($news_data['titulo']); ?></textarea>
																				</td>
																				<td class="form-group">
																				<textarea type="text" class="form-control" name ="descripcion" value="" ><?php echo utf8_encode($news_data['descripcion']); ?></textarea>
																				</td>
																				<td class="form-group">
																				<?php echo utf8_encode($news_data['usuario']); ?>
																				</td>
																				<td class="form-group">
																				<input type="date" class="form-control" name ="fechainicio" value="<?php echo $news_data['fechainicio']; ?>">
																				</td>
																				<td class="form-group">
																				<input type="date" class="form-control" name ="fechafin" value="<?php echo $news_data['fechafin']; ?>">
																				</td>
																				<td>
																				<input type="hidden" class="form-control" name ="id_noticia" value="<?php echo utf8_encode($news_data['id_noticia']); ?>">
																				<button type="submit" class="btn btn-primary" name="updatenews">Editar</button>
																				<br> <br>
																				<button type="submit" class="btn btn-primary" name="deletenews">Eliminar</button>
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
