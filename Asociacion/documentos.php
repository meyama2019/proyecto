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
					

		
	<?php
            if (isset($_SESSION['rol1']) && $_SESSION['rol1']!= 1 && $_SESSION['activo']==0) // Habría que controlar activo = 0
				{
				?>	

								
						<div class="card">
  							<h5 class="card-header">Documentos Disponibles</h5>
							<div class="accordion" id="accordionExample">
								  <div class="card">
									<div class="card-header" id="headingOne">
									   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          
       
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
																		echo '<option value="'.$valores[id_usuario].'">'.utf8_encode($valores[usuario]).'</option>';
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
									  <div class="form-group col-md-2">
							            <label for="tipo">Tipo</label>
							            <select class="form-control" name ="tipo" >
											<option value="0">Tipo</option>
											<option value="xls">xls</option>
											<option value="xlsx">xlsx</option>
											<option value="doc">doc</option>
											<option value="docx">docx</option>
											<option value="ppt">ppt</option>
											<option value="pptx">pptx</option>
											<option value="txt">txt</option>
											<option value="pdf">pdf</option>
										</select>
							          </div>
							        </div>
									
								<center><button type="submit" class="btn btn-primary btn-sm " name="buscador" >Buscar</button></center>
							    </form>
								
								
									</div>

									<div id="collapseOne" class="collapse show container" aria-labelledby="headingOne" data-parent="#accordionExample">
										<div class="card-body ">
											<div class="container">
														<script src="https://www.w3schools.com/lib/w3.js"></script>
														<table class="table">
															<tr class="thead-light">
																<th >Título</th>
																<th >Descripción</th>
																<th >Subido por</th>
																<th >Fecha</th>
																<th >Enlace</th>
															</tr>
															<tbody>
																<?php

																		
																		// (PAGINACIÓN CRÉDITOS: VER FIN DOCUMENTO) Validado  la variable GET
																		$CantidadMostrar=10;
																		$compag         =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
																		$TotalReg       =$conexion->query("SELECT * FROM documentos WHERE creation_date <= CURDATE()");
																		//Se divide la cantidad de registro de la BD con la cantidad a mostrar 
																		$TotalRegistro  =ceil($TotalReg->num_rows/$CantidadMostrar);

												
																			//--------BUSCADOR - INICIO--->
																			if(isset($_POST['buscador']) )
																			{
																				if(!empty($_POST['titulo']) )
																				{
																					$query ="SELECT * FROM documentos, usuarios WHERE documentos.titulo like '%" . $_POST['titulo'] . "%' AND documentos.userid =usuarios.id_usuario AND creation_date <= CURDATE()";
																					$result = mysqli_query($conexion, $query);
																				}
																				elseif (!empty($_POST['descripcion']) ) 
																				{
																					$query ="SELECT * FROM documentos, usuarios WHERE documentos.descripcion like '%" . $_POST['descripcion'] . "%' AND documentos.userid =usuarios.id_usuario AND creation_date <= CURDATE()";
																					$result = mysqli_query($conexion, $query);
																				}
																				elseif ( !empty($_POST['fechainicio'] && $_POST['fechafin']) ) 
																				{
																					$fechainicio = date("Y-m-d", strtotime($_POST['fechainicio'])); 
																					$fechafin = date("Y-m-d", strtotime($_POST['fechafin']));

																					if  ($fechafin < $fechainicio)
																					{
																						echo "<div class='alert alert-danger' role='alert'>Fecha fin no puede ser inferior a fecha de inicio</div>";
																						$date = date("Y-m-d");
																						$sql = "SELECT * FROM documentos, usuarios
																								WHERE userid =id_usuario AND creation_date <= CURDATE()
																								ORDER BY creation_date DESC
																								LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
																						$consulta = mysqli_query($conexion, $sql);
																						$result = $conexion->query($sql);
																					}
																					else
																					{
																						$query ="SELECT * FROM documentos, usuarios WHERE documentos.creation_date  >= '$fechainicio' AND documentos.creation_date  <= '$fechafin' AND documentos.userid =usuarios.id_usuario";
																						$result = mysqli_query($conexion, $query);
																					}
																				}
																				elseif ( !empty($_POST['quien']) ) 
																				{
																					$query ="SELECT * FROM documentos, usuarios WHERE documentos.userid like '%" . $_POST['quien'] . "%' AND documentos.userid =usuarios.id_usuario AND creation_date <= CURDATE()";
																					$result = mysqli_query($conexion, $query);
																				}
																				elseif ( !empty($_POST['tipo']) ) 
																				{
																					$query ="SELECT * FROM documentos, usuarios WHERE documentos.documento like '%" . $_POST['tipo'] . "%' AND documentos.userid =usuarios.id_usuario AND creation_date <= CURDATE()";
																					$result = mysqli_query($conexion, $query);
																				}																				
																				else
																				{
																					if ( (empty($_POST['fechainicio']) &&  !empty($_POST['fechafin']) ) || (!empty($_POST['fechainicio']) &&  empty($_POST['fechafin'])) )
																					{
																						echo "<div class='alert alert-danger' role='alert'>Debes introducir fecha inicio y fecha fin.</div>";
																						$date = date("Y-m-d");
																						$sql = "SELECT * FROM documentos, usuarios
																								WHERE userid =id_usuario AND creation_date <= CURDATE()
																								ORDER BY creation_date DESC
																								LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
																						$consulta = mysqli_query($conexion, $sql);
																						$result = $conexion->query($sql);
																					}
																					elseif ( empty($_POST['titulo']) &&  empty($_POST['descripcion']) &&  empty($_POST['fechainicio']) &&  empty($_POST['fechafin'])   &&  empty($_POST['quien'])  &&  empty($_POST['tipo']) )  
																					{
																						echo "<div class='alert alert-danger' role='alert'>Debes introducir algún dato para la búsqueda.</div>";
																						$date = date("Y-m-d");
																						$sql = "SELECT * FROM documentos, usuarios
																								WHERE userid =id_usuario AND creation_date <= CURDATE()
																								ORDER BY creation_date DESC
																								LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
																						$consulta = mysqli_query($conexion, $sql);
																						$result = $conexion->query($sql);
																					}
																					else
																					{
																						echo "<div class='alert alert-danger' role='alert'>No hay documentos que mostrar.</div>";
																						$date = date("Y-m-d");
																						$sql = "SELECT * FROM documentos, usuarios
																								WHERE userid =id_usuario AND creation_date <= CURDATE()
																								ORDER BY creation_date DESC
																								LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
																						$consulta = mysqli_query($conexion, $sql);
																						$result = $conexion->query($sql);
																					}
																				}
																				//--------BUSCADOR - FIN--->
																			}
																			else
																			{
																				$date = date("Y-m-d");
																				$sql = "SELECT * FROM documentos, usuarios
																						WHERE userid =id_usuario AND creation_date <= CURDATE()
																						ORDER BY creation_date DESC
																						LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
																				$consulta = mysqli_query($conexion, $sql);
																				$result = $conexion->query($sql);
																			}
																			
																	
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
																				echo "<div class='alert alert-danger' role='alert'>No hay documentos que mostrar.</div>";
																			}
																	
																?>


															</tbody>
														</table>
											
											<!--(CRÉDITOS: VER FIN DOCUMENTO)Sector de Paginacion - Operacion matematica para boton siguiente y atras--> 
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
												
											<!--Fin sector de Paginacion-->	
												
											</div>
											
										</div>
									</div>
								</div>  
							</div>   
						</div>
						 
		
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

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
