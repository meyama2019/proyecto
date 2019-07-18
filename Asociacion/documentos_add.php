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

    if(isset($_POST['adddocs']))
       {
		$target_path = "../docs/";
		$target_path = $target_path . basename( $_FILES['archivo']['name']); 
		move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path);  
		$x= "../docs/". $_FILES['archivo']['name'];
		$conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');		   
        $sql = "INSERT INTO documentos (titulo, descripcion, creation_date, userid,documento ) 
    		   values ('$_POST[titulo]','$_POST[descripcion]','$_POST[creation_date]', '$_POST[id]', '$x')
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
																		<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" accept-charset="utf-8">
																		
																				<label for="titulo">Título</label>
																				<textarea type="text" class="form-control" name ="titulo" value=""></textarea>
																				<br>
																				<label for="descripcion">Descripción</label>
																				<textarea type="text" class="form-control" name ="descripcion" value=""></textarea>
																				<br>
																				<label for="creation_date">Fecha subida</label>
																				<input type="date" class="form-control" name ="creation_date" value="">
																				<br>
																				<label for="archivo">Archivo</label>
																				<input type="file" class="form-control" name ="archivo" value="">
																				<br>
																				<input type="hidden" class="form-control" name ="id" value="<?php echo utf8_encode($_SESSION['id_usuario']); ?>">
																				<button type="submit" class="btn btn-primary" name="adddocs">Añadir</button>
														
																				
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
