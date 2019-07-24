<?php
session_start();
//define('RAIZ', $_SERVER['DOCUMENT_ROOT']. '/proyecto/'); 
//include(RAIZ . 'asociacion/header.php');
include ('../includes/header.php');
include('../models/connection.php');
require_once('menu.php');
  
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

  <br>
  <div class="container">
  	
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
										<option value="0">Subida por:</option>
										<?php
										  $mysqli1 = mysqli_connect('localhost', 'socio', 'socio', 'marte');	
										  $query1 = $mysqli1 -> query ("SELECT * FROM usuarios");
										  while ($valores = mysqli_fetch_array($query1))
										  {
											echo '<option value="'.$valores[id_usuario].'">'.utf8_encode($valores[usuario]).'</option>';
										  }
										?>
            </select>
            <!--<input type="text" class="form-control" id="cmtopais" name="cmtopais" placeholder="Pais">  -->
          </div>
          <div class="form-group col-md-2">
            <label for="fechainicio">Desde</label>
            <input type="date" class="form-control" id="fechainicio" name="fechainicio" placeholder="Desde">
          </div>
          <div class="form-group col-md-2">
            <label for="fechafin">Hasta</label>
            <input type="date" class="form-control" id="fechafin" name="fechafin" placeholder="Hasta">
          </div>
        </div>

       
        <center><button type="submit" class="btn btn-primary btn-sm " name="buscador" >Buscar</button></center>
         
        
         <div class="container">
           <div class="form-row">
           	
            <center><a href="noticias_add.php" class="btn btn-outline-danger btn-sm">Nuevo</a></center>
           
        	</div>
         </div>
            
       
    </form>
    </div>  

			
			
									
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
								<th >Acciones</th>
							</tr>
							
							<tbody>
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
																 ORDER BY fechainicio DESC");
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

											<a type="submit" class="btn btn-outline-danger btn-sm" href="updatenoticias.php?id_noticia=<?php echo ($news_data['id_noticia'])?> ">Editar</a></
											
											
											<button type="submit" class="btn btn-outline-danger btn-sm" name="deletenews">Eliminar</button>
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





