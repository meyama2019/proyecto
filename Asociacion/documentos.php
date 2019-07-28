 <?php
session_start();
//define('RAIZ', $_SERVER['DOCUMENT_ROOT']. '/proyecto/'); 
//include(RAIZ . 'asociacion/header.php');
include ('../includes/header.php');
include('../models/connection1.php');
    $listaUsuarios =[];
    //$db=Db::getConnect();
    //$sql=$db->query('SELECT * FROM usuarios');

    $sql = "SELECT * FROM usuarios";
    $consulta = mysqli_query($conexion, $sql);

    // carga en la $listaUsuarios cada registro desde la base de datos
    //foreach ($sql->fetchAll() as $usuario) {
    while ($usuario = mysqli_fetch_array($consulta)) {
      $listaUsuarios[]= ($usuario['rol_id']);
    }
    //return $listaUsuarios;
      require_once('menu.php');
  
?>
	<?php
            if (isset($_SESSION['rol1']) && $_SESSION['rol1']!= 1 && $_SESSION['activo']==0) // Habría que controlar activo = 0
				{
				?>	

								
						<div class="card">
  							<h5 class="card-header">Documentos Disponibles</h5>
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
														<table id="table_format" class="table">
															<tr class="thead-light">
																<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(1)')" style="cursor:pointer" >Título</th>
																<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(2)')" style="cursor:pointer" >Descripción</th>
																<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(3)')" style="cursor:pointer" >Subido por</th>
																<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(4)')" style="cursor:pointer" >Fecha</th>
																<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(5)')" style="cursor:pointer" >Enlace</th>
															</tr>
															<tbody>
																<?php
																	//$conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
																		
																		// (PAGINACIÓN CRÉDITOS: VER FIN DOCUMENTO) Validado  la variable GET
																		$CantidadMostrar=10;
																		$compag         =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
																		$TotalReg       =$conexion->query("SELECT * FROM documentos WHERE creation_date <= CURDATE()");
																		//Se divide la cantidad de registro de la BD con la cantidad a mostrar 
																		$TotalRegistro  =ceil($TotalReg->num_rows/$CantidadMostrar);

																	
																	
																	$date = date("Y-m-d");
																	$sql = "SELECT * FROM documentos, usuarios
																			WHERE userid =id_usuario AND creation_date <= CURDATE()
																			ORDER BY creation_date DESC
																			LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
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
																				?>
																				
																						<?php																						
																		}
																		else
																			{
																				echo "No hay documentos que mostrar";
																			}
																	
																?>


															</tbody>
														</table>
									<!--(CRÉDITOS: VER FIN DOCUMENTO)Sector de Paginacion - Operacion matematica para boton siguiente y atras--> 
									
									<nav>
										
										<?php
											$IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):1;
											$DecrementNum =(($compag -1))<1?1:($compag -1);
																	  
											echo "<ul class=\"pagination\">
											  	<li>
										  		<a class=\"page-link\" href=\"?pag=".$DecrementNum."\">◀
												</a>
												</li>";
												//Se resta y suma con el numero de pag actual con el cantidad de 
												//numeros  a mostrar
												$Desde=$compag-(ceil($CantidadMostrar/2)-1);
												$Hasta=$compag+(ceil($CantidadMostrar/2)-1);
																						
												//Se valida
												$Desde=($Desde<1)?1: $Desde;
												$Hasta=($Hasta<$CantidadMostrar)?$CantidadMostrar:$Hasta;
												//Se muestra los numeros de paginas
												for($i=$Desde; $i<=$Hasta;$i++)
													{
													//Se valida la paginacion total de registros
													if($i<=$TotalRegistro)
														{
															//Validamos la pag activo
															if($i==$compag)
																{
																echo "<a class=\"page-link\" href=\"?pag=".$i."\">".$i."</a>";
																}
															else
																{
																echo "<a class=\"page-link\" href=\"?pag=".$i."\">".$i."</a>";
																}     		
														}
													}
													echo "<a class=\"page-link\" href=\"?pag=".$IncrimentNum."\">▶</a></ul>";
										?>
										
									</nav>
									
																				<!--Fin sector de Paginacion--> 
													
											</div>
										</div>
									</div>
								</div>  
							</div>   
						</div> 
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="lisenme.js"></script>
<script>
jQuery('#table_format').ddTableFilter();
</script>
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




<!--
  CÓDIGO PAGINACIÓN ADAPTADO DE: 
 * Autor: Rodrigo Chambi Q.
 * Mail:  filvovmax@gmail.com
 * web:   www.gitmedio.com
 * Paginador datos para PHP y Mysql, HTML5
-->
