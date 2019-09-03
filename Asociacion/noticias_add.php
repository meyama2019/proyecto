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

    if(isset($_POST['addnews']))
       {
		//$tit= utf8_encode($_POST['titulo']);
		//$des= utf8_encode($_POST['descripcion']);
		$conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');	
		$ti = utf8_decode($_POST['titulo']);
		$de = utf8_decode($_POST['descripcion']);   
        $sql = "INSERT INTO noticias (titulo, descripcion, fechainicio, fechafin, userid ) 
    		   values ('$ti','$de','$_POST[fechainicio]','$_POST[fechafin]', '$_POST[id]')
				";

                  $consulta = mysqli_query($conexion, $sql);
                  if($consulta)
                    {
                     echo "<script>alert('Registro añadido');</script>";		
                    }      
       }  
?>





	<?php
            if (isset($_SESSION['rol1']) && $_SESSION['rol1']!= 1 && $_SESSION['activo']==0) // Habría que controlar activo = 0
				{
				?>	

								  <div class="card">
								  	 <h5 class="card-header" style="background-color: #F78181">Gestión de Noticias (Alta)</h5>
										<br>
									

										<div class="card-body ">
											<div class="container">
														<script src="https://www.w3schools.com/lib/w3.js"></script>
														<table id="myTable" class="table">
															<tbody>
																		<tr class="item">
																		<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" accept-charset="utf-8">
																		
																				<label for="titulo">Título</label>
																				<textarea type="text" class="form-control" name ="titulo" value="" required></textarea>
																				<br>
																				<label for="descripcion">Descripción</label>
																				<textarea type="text" class="form-control" name ="descripcion" value="" required></textarea>
																				<br>
																				<div class="form-row">
                     															 <div class="form-group col-md-3">
																				<label for="fechainicio">Fecha Inicio</label>
																				<input type="date" class="form-control" name ="fechainicio" value="" required>
																				</div>

																				<br>
																				<div class="form-group col-md-3">
																				<label for="fechafin">Fecha Fin</label>
																				<input type="date" class="form-control" name ="fechafin" value="" required>
																					</div>
																				</div>
																				<br>
																				<input type="hidden" class="form-control" name ="id" value="<?php echo utf8_encode($_SESSION['id_usuario']);  ?>">
																				<center>
																				<a class="btn btn-outline-danger btn-sm" href="noticias_g.php" >Cerrar</a>
																				<button type="submit" class="btn btn-outline-danger btn-sm" name="addnews">Añadir</button>
																				</center>
																				<br>
							
																				
																			</form>
																		</tr>

															</tbody>
														</table>
											
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
?>
