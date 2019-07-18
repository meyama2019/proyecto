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

    if(isset($_POST['addnews']))
       {
		$tit=utf8_encode($_POST['titulo']);
		$conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');		   
        $sql = "INSERT INTO noticias (titulo, descripcion, fechainicio, fechafin, userid ) 
    		   values ('$tit','utf8_encode($_POST[descripcion])','$_POST[fechainicio]','$_POST[fechafin]', '$_POST[id]')
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

								

							<div class="accordion" id="accordionExample">
								  <div class="card">
									<div class="card-header" id="headingOne">
									  <h2 class="mb-0">

									  </h2>
									</div>

									<div id="collapseOne" class="collapse show container" aria-labelledby="headingOne" data-parent="#accordionExample">
										<div class="card-body ">
											<div class="container">
														<script src="https://www.w3schools.com/lib/w3.js"></script>
														<table id="myTable" class="table">
															<tbody>
																		<tr class="item">
																		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" accept-charset="utf-8">
																		
																				<label for="titulo">Título</label>
																				<textarea type="text" class="form-control" name ="titulo" value="" required></textarea>
																				<br>
																				<label for="descripcion">Descripción</label>
																				<textarea type="text" class="form-control" name ="descripcion" value="" required></textarea>
																				<br>
																				<label for="fechainicio">Fecha Inicio</label>
																				<input type="date" class="form-control" name ="fechainicio" value="" required>
																				<br>
																				<label for="fechafin">Fecha Fin</label>
																				<input type="date" class="form-control" name ="fechafin" value="" required>
																				<br>
																				<input type="hidden" class="form-control" name ="id" value="<?php echo utf8_encode($_SESSION['id_usuario']); ?>">
																				<button type="submit" class="btn btn-primary" name="addnews">Añadir</button>
														
																				
																			</form>
																		</tr>

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
