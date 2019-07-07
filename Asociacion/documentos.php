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
            if (isset($_SESSION['rol1']) && $_SESSION['rol1']!= 1 )
				{
				?>	

								

							<div class="accordion" id="accordionExample">
								  <div class="card">
									<div class="card-header" id="headingOne">
									  <h2 class="mb-0">
										<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										  Registro / Solicitudes
										</button>
									  </h2>
									</div>

									<div id="collapseOne" class="collapse show container" aria-labelledby="headingOne" data-parent="#accordionExample">
										<div class="card-body ">
											<div class="container">
														<script src="https://www.w3schools.com/lib/w3.js"></script>
														<table id="myTable" class="table">
															<tr class="thead-light">
																<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(1)')" style="cursor:pointer" >Título</th>
																<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(2)')" style="cursor:pointer" >Descripción</th>
																<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(3)')" style="cursor:pointer" >Subido por</th>
																<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(4)')" style="cursor:pointer" >Fecha</th>
																<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(5)')" style="cursor:pointer" >Enlace</th>
															</tr>
															<tbody>
																<?php
            													
																
																	$date = date("Y-m-d");
																	$conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
																	$sql = "SELECT * FROM documentos, usuarios
																			WHERE userid =id_usuario AND creation_date <= CURDATE()
																			ORDER BY creation_date DESC";
																	$consulta = mysqli_query($conexion, $sql);
																	
																	$result = $conexion->query($sql);
																	if ($result->num_rows > 0)
																		{
																			while($row = $result->fetch_assoc())
																				{?>
																					<tr class="item">
																						<td><?php echo $row['titulo']; ?></td>
																						<td><?php echo $row['descripcion']; ?></td>
																						<td><?php echo $row['usuario']; ?></td>
																						<td><?php echo $row['creation_date']; ?></td>
																						<?php
																						$archivo = $row["documento"];
																						$extension = explode(".", $archivo);
																						$tipo = $extension[count($extension)-1];
																						?>
																						<td><a href=<?php echo $row["documento"]; ?>>Enlace</a> - <?php echo $tipo; ?></td>
																					</tr>
																				<?php
																				}
																				
																		}
																		else
																		
																		{
																			echo "No hay documentos que mostrar";
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


