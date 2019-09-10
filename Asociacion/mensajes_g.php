<?php 
session_start();
include ('../includes/header.php');
include('../models/connection1.php');
require_once('menu.php');
  
?>
				  
							  



<!----CAMBIAR ESTADO-->

<?php

          if(isset($_POST['change_msg']))
          {
          
				if (($_POST['activo']) == 0)
				{
					$queryUpdate = "UPDATE contacto
							    SET activo = '1'
								WHERE id_solicitud = ".$_POST['id_solicitud'].";";
				}
				
				if (($_POST['activo']) == 1)
				{
					$queryUpdate = "UPDATE contacto
							    SET activo = '0'
								WHERE id_solicitud = ".$_POST['id_solicitud'].";";
				}		
				$consulta = mysqli_query($conexion, $queryUpdate);

           }	
              

?>
	



								  

   

<?php
if (isset($_SESSION['rol1']) && $_SESSION['rol1']!= 1 && $_SESSION['activo']==0) // Habría que controlar activo = 0
{
	
?>	
	
	<div class="card">
			  <h5 class="card-header" style="background-color: #F78181">Gestión de Mensajes (Contactos)</h5>

  		<br>
 




 
	<!----BUSCADOR--->
    <div class="container">
  	
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          
       
        <div class="form-row">
		
		<div class="form-group col-md-3">
            <label for="idmsg">ID Solicitud</label>
										<select class="form-control" id="idmsg" name ="idmsg" required>
										<option value="0">Busca la ID:</option>
										<?php
										  $query1 = $conexion -> query ("SELECT * FROM contacto");
										  while ($valores = mysqli_fetch_array($query1))
										  {
											echo '<option value="'.$valores[id_solicitud].'">'.$valores[id_solicitud].'</option>';
										  }
										?>
            </select>
        </div>
		<span><br></span>
		<div class="form-group col-md-4">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" placeholder="fecha">
        </div>
		
		<div class="form-group col-md-4">
            <label for="estado">Estado</label>
            <select class="form-control" id="estado" name ="estado" required>
			<option value="0">Escoge una opción</option>
			<option value="1">Leído(s)</option>
			<option value="2">No leído(s)</option>
			</select>
        </div>
		
		<div class="form-group col-md-4">
            <label for="persona">REMITENTE<br></label>
            <input type="text" class="form-control" id="persona" name="persona" placeholder="Busca por nombre del remitente">
        </div>
		
		<div class="form-group col-md-4">
            <label for="email">EMAIL<br></label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Busca por email del remitente">
        </div>
		
		<div class="form-group col-md-4">
            <label for="telefono">TELÉFONO<br></label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Busca por teléfono del remitente">
        </div>
		
		<div class="form-group col-md-4">
            <label for="asunto">ASUNTO</label>
            <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Busca por asunto">
        </div>
		
		<div class="form-group col-md-4">
            <label for="mensaje">MENSAJE</label>
            <input type="text" class="form-control" id="mensaje" name="mensaje" placeholder="Busca por contenido del mensaje">
        </div>
		

        </div>

       
        <center><button type="submit" class="btn btn-primary btn-sm " name="buscador" >Buscar</button></center>


            
       
    </form>
    </div> 
	<!----FIN BUSCADOR--->
  
  
						
			<div id="collapseOne" class="collapse show container" aria-labelledby="headingOne" data-parent="#accordionExample">
				<div class="card-body ">
					<div class="container">
						<table class="table table-hover">
							<tr class="table-info">
								<th scope="col">id</th>
								<th scope="col">Fecha</th>
								<th scope="col">Nombre</th>
								<th scope="col">Email</th>
								<th scope="col">Telefono</th>
								<th scope="col">Asunto</th>
								<th scope="col">Mensaje</th>
								<th scope="col">Acción</th>
							</tr>
							
							<tbody>
							<?php
								if(isset($_POST['buscador']) )
								{
									if(!empty($_POST['idmsg']) )
										{
										  $idmsg = $_POST['idmsg'];
										  echo "<div class='alert alert-dark' role='alert'>Resultados para: $idmsg</div>";
										  $query ="SELECT * FROM contacto WHERE id_solicitud='$_POST[idmsg]' ";
										  $result = mysqli_query($conexion, $query);
										}
									elseif (!empty($_POST['persona']) ) 
										{
										  $persona = $_POST['persona'];	
										  echo "<div class='alert alert-dark' role='alert'>Resultados para: $persona</div>";
										  $query ="SELECT * FROM contacto WHERE nombre like '%" . $_POST['persona'] . "%' ";
										  $result = mysqli_query($conexion, $query);
										}
									elseif (!empty($_POST['email']) ) 
										{
										  $email = $_POST['email'];	
										  echo "<div class='alert alert-dark' role='alert'>Resultados para: $email</div>";
										  $query ="SELECT * FROM contacto WHERE email like '%" . $_POST['email'] . "%' ";
										  $result = mysqli_query($conexion, $query);
										}
									elseif (!empty($_POST['telefono']) ) 
										{
										  $telefono = $_POST['telefono'];	
										  echo "<div class='alert alert-dark' role='alert'>Resultados para: $telefono</div>";
										  $query ="SELECT * FROM contacto WHERE telefono like '%" . $_POST['telefono'] . "%' ";
										  $result = mysqli_query($conexion, $query);
										}
									elseif ( !empty($_POST['fecha']  )) 
										{
										  $today = date("Y-m-d");
										  $fecha = date("Y-m-d",strtotime($_POST['fecha']));
										  if  (($_POST['fecha']) >  $today)
										  {
											  echo "<div class='alert alert-danger' role='alert'>¡La fecha ($fecha) es superior a la de hoy!</div>";
											  $result = mysqli_query($conexion, "SELECT * FROM contacto
																 ORDER BY fecha_entrada DESC");
										  }
										  else
										  {
										  echo "<div class='alert alert-dark' role='alert'>Mensajes recibidos a fecha de $fecha.</div>";
										  $query ="SELECT * FROM contacto WHERE CONVERT(fecha_entrada, DATE)  = '$fecha' ";
										  $result = mysqli_query($conexion, $query);
										  }
										}
									elseif ( !empty($_POST['asunto']) ) 
										{
										  $asunto = $_POST['asunto'];	
										  echo "<div class='alert alert-dark' role='alert'>Resultados para: $asunto</div>";
										  $query ="SELECT * FROM contacto WHERE asunto like '%" . $_POST['asunto'] . "%'  ";
										  $result = mysqli_query($conexion, $query);
										}
									elseif ( !empty($_POST['mensaje']) ) 
										{
										  $mensaje = $_POST['mensaje'];	
										  echo "<div class='alert alert-dark' role='alert'>Resultados para: $mensaje</div>";
										  $query ="SELECT * FROM contacto WHERE mensaje like '%" . $_POST['mensaje'] . "%' ";
										  $result = mysqli_query($conexion, $query);
										}
									elseif ( !empty($_POST['estado']) ) 
										{
										  if ($_POST['estado'] == '1')
										  {
											  $estado = $_POST['estado'];	
											  echo "<div class='alert alert-dark' role='alert'>Lista de solicitudes tramitadas</div>";
											  $query ="SELECT * FROM contacto WHERE activo='0' ";
											  $result = mysqli_query($conexion, $query);
										  }
										  elseif ($_POST['estado'] == '2')
										  {
											  $estado = $_POST['estado'];	
											  echo "<div class='alert alert-dark' role='alert'>Lista de solicitudes pendientes</div>";
											  $query ="SELECT * FROM contacto WHERE activo='1' ";
											  $result = mysqli_query($conexion, $query);
										  }											  
										}				
									else
										{
										$result = mysqli_query($conexion, "SELECT * FROM contacto
																 ORDER BY id_solicitud DESC");
										}
								}
								else
								{
									$result = mysqli_query($conexion, "SELECT * FROM contacto
																 ORDER BY id_solicitud DESC");
								}
	
								
								
								while($contact_data = mysqli_fetch_array($result))
							{?>
								<tr class="item" style = "font-size:0.9em">
									<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" accept-charset="utf-8" onsubmit="return confirm('¿Confirmar el cambio de estado?');">
										<td class="form-group">
											<?php echo $contact_data['id_solicitud']; ?>
											<input type="hidden" class="form-control" name ="id_solicitud" value="<?php echo $contact_data['id_solicitud']; ?>">
										</td>
										
										<td class="form-group">
											<?php echo $contact_data['fecha_entrada']; ?>
										</td>
										
										<td class="form-group">
											<?php echo $contact_data['nombre']; ?>
										</td>
										
										<td class="form-group">
											<?php echo $contact_data['email'];  ?>
										</td>
										<td class="form-group">
											<?php echo $contact_data['telefono']; ?></strong></center>
										</td>
										
										<td class="form-group">
											<?php echo $contact_data['asunto']; ?>
										</td>
										
										<td class="form-group">
											<?php echo $contact_data['mensaje'];?>
										</td>
										
										<td>
											<input type="hidden" class="form-control" name ="activo" value="<?php echo $contact_data['activo']; ?>">
											<?php
												if ($contact_data['activo'] == 0)
												{
													?>
														<button type="submit" class="btn btn-outline-danger btn-sm" name="change_msg">Revisar</button>
													<?php
												}
												else
												{
													?>
														<button type="submit"  class="btn btn-outline-success btn-sm" name="change_msg">Validar</button>
													<?php
												}
											?>	
											
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
 
  mysqli_close($conexion);

  include ('footer.php');
?>





