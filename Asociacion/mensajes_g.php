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
			 <h5 class="card-header" style="background-color: #F78181" align="center"><br>CENTRO DE MENSAJES<br><br></h5>

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
		<div class="form-group col-md-3">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" placeholder="fecha">
        </div>
		<br><br><br><br>	
		<div class="form-group col-md-5">
            <label for="estado">Estado</label>
            <select class="form-control" id="estado" name ="estado" required>
			<option value="0">Escoge una opción</option>
			<option value="1">Pendiente</option>
			<option value="2">No pendiente</option>
			</select>
        </div>
		
		<div class="form-group col-md-8">
            <label for="persona">REMITENTE Y CONTACTO<br></label>
            <input type="text" class="form-control" id="persona" name="persona" placeholder="Busca por nombre de remitente, su email o teléfono">
        </div>
		
		<div class="form-group col-md-8">
            <label for="mensaje">ASUNTO Y MENSAJE</label>
            <input type="text" class="form-control" id="mensaje" name="mensaje" placeholder="Busca por contenido del mensaje o el asunto">
        </div>
		
		

        </div>

       
        <center><button type="submit" class="btn btn-primary btn-sm " name="buscador" >Buscar</button></center>


            
       
    </form>
    </div> 
	<!----FIN BUSCADOR--->
  
  
						
			<div id="collapseOne" class="collapse show container" aria-labelledby="headingOne" data-parent="#accordionExample">
				<div class="card-body ">
					<div class="container">
						<table id="myTable" class="table">
							<tr class="table-info">
								<th >ID</th>
								<th >FECHA</th>
								<th >REMITENTE Y CONTACTO</th>
								<th >ASUNTO Y MENSAJE</th>
								<th >ESTADO ACTUAL</th>
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
										  $query ="SELECT * FROM contacto WHERE nombre like '%" . $_POST['persona'] . "%' OR email like '%" . $_POST['persona'] . "%' OR telefono like '%" . $_POST['persona'] . "%' ";
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
									elseif ( !empty($_POST['mensaje']) ) 
										{
										  $mensaje = $_POST['mensaje'];	
										  echo "<div class='alert alert-dark' role='alert'>Resultados para: $mensaje</div>";
										  $query ="SELECT * FROM contacto WHERE asunto like '%" . $_POST['mensaje'] . "%' OR mensaje like '%" . $_POST['mensaje'] . "%' ";
										  $result = mysqli_query($conexion, $query);
										}
									elseif ( !empty($_POST['estado']) ) 
										{
										  if ($_POST['estado'] == '2')
										  {
											  $estado = $_POST['estado'];	
											  echo "<div class='alert alert-dark' role='alert'>Lista de solicitudes tramitadas</div>";
											  $query ="SELECT * FROM contacto WHERE activo='0' ";
											  $result = mysqli_query($conexion, $query);
										  }
										  elseif ($_POST['estado'] == '1')
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
																 ORDER BY fecha_entrada DESC");
										}
								}
								else
								{
									$result = mysqli_query($conexion, "SELECT * FROM contacto
																 ORDER BY fecha_entrada DESC");
								}
	
								
								
								while($contact_data = mysqli_fetch_array($result))
							{?>
								<tr class="item">
									<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" accept-charset="utf-8" onsubmit="return confirm('¿Confirmar el cambio de estado?');">
										<td class="form-group">
											<?php echo $contact_data['id_solicitud']; ?>
											<input type="hidden" class="form-control" name ="id_solicitud" value="<?php echo $contact_data['id_solicitud']; ?>">
										</td>
										
										<td class="form-group">
											<?php echo $contact_data['fecha_entrada']; ?>
										</td>
										
										<td class="form-group">
											<center><?php echo $contact_data['nombre']; echo "<br>"; echo "<hr>";?> <strong><?php echo $contact_data['email']; echo " | "; echo $contact_data['telefono']; ?></strong></center>
										</td>
										
										<td class="form-group">
											<?php echo $contact_data['asunto']; echo "<br>"; echo "<hr>";?> <strong> <?php  echo $contact_data['mensaje'];?></strong>
										</td>
										
										<td>
											<input type="hidden" class="form-control" name ="activo" value="<?php echo $contact_data['activo']; ?>">
											<?php
												if ($contact_data['activo'] == 0)
												{
													?>
														<p>Solicitud Tramitada</p>
														<button type="submit"  class="btn btn-outline-danger btn-sm" name="change_msg">PONER EN PENDIENTES</button>
													<?php
												}
												else
												{
													?>
														<p>Solicitud pendiente</p>
														<button type="submit"  class="btn btn-success" name="change_msg">MARCAR COMO FINALIZADO</button>
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





