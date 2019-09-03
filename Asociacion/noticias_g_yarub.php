<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#load").click(function () {
                    loadmore();
                });
            });

            function loadmore()
            {
                var val = document.getElementById("result_no").value;
                $.ajax({
                    type: 'post',
                    url: 'getrecord.php',
                    data: {
                        getresult: val
                    },
                    success: function (response) {
                        var content = document.getElementById("result_para");
                        content.innerHTML = content.innerHTML + response;
                        document.getElementById("result_no").value = Number(val) + 5;
                    }
                });
            }
        </script>

    </head>
	
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
      require_once('../asociacion/menu.php');
  
?>
				  
							  

<!----NEWS UPDATE-->
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

<!----DELETE NOTICIA-->
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
	
	<div class="card">
		<h5 class="card-header" style="background-color: #F78181">Gestión de Noticias</h5>
			<div class="card-header" id="headingOne">
			<br>
			<center><a href="noticias_add.php" class="btn btn-outline-danger btn-sm">Nueva Noticia</a></center>
			</div>
		<br>
			
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
						<table id="myTable" class="table">
							<tr class="thead-light">
								<th >Título</th>
								<th >Descripción</th>
								<th >Subido por</th>
								<th >Fecha inicio</th>
								<th >Fecha fin</th>
								<th >Actualización</th>
							</tr>
							
							<tbody id="result_para">
							<?php
								$mysqli = mysqli_connect('localhost', 'socio', 'socio', 'marte');
								if(isset($_POST['buscador']) )
								{
									if(!empty($_POST['titulo']) )
										{
										  $query ="SELECT * FROM noticias, usuarios WHERE noticias.titulo like '%" . $_POST['titulo'] . "%' AND noticias.userid =usuarios.id_usuario";
										  $result = mysqli_query($mysqli, $query);
										}
									elseif (!empty($_POST['descripcion']) ) 
										{
										  $query ="SELECT * FROM noticias, usuarios WHERE noticias.descripcion like '%" . $_POST['descripcion'] . "%' AND noticias.userid =usuarios.id_usuario";
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
										  $query ="SELECT * FROM noticias, usuarios WHERE noticias.fechainicio >= '$fechainicio' AND noticias.fechainicio <= '$fechafin' AND noticias.userid =usuarios.id_usuario";
										  $result = mysqli_query($mysqli, $query);
										  }
										}
									elseif ( !empty($_POST['quien']) ) 
										{
										  $query ="SELECT * FROM noticias, usuarios WHERE noticias.userid like '%" . $_POST['quien'] . "%' AND noticias.userid =usuarios.id_usuario";
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
									$result = mysqli_query($mysqli, "SELECT * FROM noticias, usuarios
																 WHERE userid =id_usuario
																 ORDER BY fechainicio DESC
																 LIMIT 0,5");
								}
								
								
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
											<button type="submit" class="btn btn-outline-danger btn-sm" name="updatenews">Editar</button>
											<br> <br>
											<button type="submit" class="btn btn-outline-danger btn-sm" name="deletenews">Eliminar</button>
											
										</td>

									</form>
								</tr>
								
							<?php         
							}
							?>
							</tbody>
							
						</table>
						<input type="hidden" id="result_no" value="5">
							<input type="button" id="load" value="Load More Results">
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





