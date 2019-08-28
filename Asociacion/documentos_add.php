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

if(isset($_POST['adddocs']))
{
	$target_path = "../docs/";
	$target_path = $target_path . basename( $_FILES['archivo']['name']); 
	if ($_FILES['archivo']['size'] == 0)
	{
		echo "<script>alert('Error al cargar el archivo (recuerda, máximo 2 MB).');</script>";
	}	
	else
	{
		if ( (file_exists($target_path)))
		{
			echo "<script>alert('Archivo existe. Renómbralo por favor.');</script>";		
		
		}
		else
		{
			$x=  $_FILES['archivo']['name'];
			$anio= date("Y");
			$mes= date("m");
			$dia= date("d");
			$hora = date("h");
			$minuto = date("i");
			$segundo= date("sa");
			$quien = $_SESSION['id_usuario'] . "_";
			$nuevo_nombre = $quien . $anio . $mes. $dia . $hora . $minuto . $segundo;
			$nuevo_nombre = $quien . $anio . $mes. $dia . $hora . $minuto . $segundo;
			$nueva_ext = pathinfo($_FILES['archivo']['name'],PATHINFO_EXTENSION);
			$x = "../docs/". $nuevo_nombre. ".$nueva_ext";
			$pt = $_POST['titulo'];
			$pd = $_POST['descripcion'];
			
			move_uploaded_file($_FILES['archivo']['tmp_name'],$target_path ); 
			rename($target_path,$x);
			$sql = "INSERT INTO documentos (titulo, descripcion, creation_date, userid,documento ) 
				   values ('$pt','$pd','$_POST[creation_date]', '$_POST[id]', '$x')
					";

                  $consulta = mysqli_query($conexion, $sql);
                  if($consulta)
                    {
                     echo "<script>alert('Registro añadido');</script>";		
                    }	
        }
	}	
}		
?>





	<?php
            if (isset($_SESSION['rol1']) && $_SESSION['rol1']!= 1 && $_SESSION['activo']==0) // Habría que controlar activo = 0
				{
				?>	

								

							
								  <div class="card">
									 <h5 class="card-header" style="background-color: #F78181">Gestión de Documentos (Alta)</h5>

									
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
																				<label for="creation_date">Fecha subida</label>
																				<input type="date" class="form-control" name ="creation_date" value="" required>
																				<br>
																				<label for="archivo" >Archivo </label>
																				<small><br>Máximo 2 MB. Solo se admiten archivos pdf, de text (.txt) y MS Word, Excel, Power Point</small>
																				<br>
																				<input type="file" class="form-control" name ="archivo" value="2097152" required accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf" >
																				<br>
																				<input type="hidden" class="form-control" name ="id" value="<?php echo utf8_encode($_SESSION['id_usuario']); ?>">
																				
																				<center>
														                            <a class="btn btn-outline-danger btn-sm" href="documentos_g.php" >Cerrar</a>
														                            <button type="submit" class="btn btn-outline-danger btn-sm" name="adddocs">Añadir</button>
														                            
														                        </center>
														
																				
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

  include ('footer.php');
?>
