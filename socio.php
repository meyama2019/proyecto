<?php 

	include('includes/header.php');

?>
			

		 <main id="central">
		 <div id="central" class="container-main">
		 
			<hr>
		   <h1>HAZTE SOCIO/A</h1>
		   <hr>
		   <article>
				<p>
				Puedes hacerte socio/a en varias maneras:<br>
				1. Llamando al 999 999 999.<br>
				2. Envíanos tus datos rellenando el formulario a continuación y te llamaremos nosotros/as.<br>
				3. Enviar un mensaje al telf. 999 999 999 con la frase “quiero ser socio” y te llamaremos nosotros/as.<br>
				</p>
				<div align="center">
				<form action="#" method="post">
				   <label for="nombre">NOMBRE Y APELLIDOS</label>
				   <input id="nombre" name="nombre" placeholder="Nombre y apellidos" required>
				   <label for="email">EMAIL</label>
				   <input id="email" name="email" type="email" placeholder="ejemplo@email.com" required>
				   <label for="telf">TELÉFONO</label>
				   <input type="tel" id="telf" name="telf" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>

				   <br>
				   <input id="submit" name="submit" type="submit" value="Enviar">
				</form>
				</div>
				

		   </article>
		</div>	
     	</main>



<?php 

	include('includes/footer.php');

?>
