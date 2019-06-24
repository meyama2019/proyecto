<?php 

	include('header.php');

?>
			

		 <main id="central">
		 <div id="central" class="container-main">
		 
			<hr>
		   <h1>GESTIONAR ROLES</h1>
		   <hr>
		   <article>
				
				<div align="center">
				<form action="#" method="post">
				   <label for="rol">ID rol</label>
				   <input id="rol" name="rol" placeholder="" onkeypress="return solonumeros(event)" required>
				   <label for="nombre">Nombre Rol</label>
				   <input id="nombre" name="nombre" placeholder="" required>
				  
				   <br>
				   <input id="submit" name="submit" type="submit" value="Enviar">
				</form>
				</div>
				

		   </article>
		</div>	
     	</main>



<?php 

	include('footer.php');

?>

<script type="text/javascript">
	function solonumeros(e){

	    var keynum = window.event ? window.event.keyCode : e.which;

	    if(keynum == 8){
	        //backspace
	        return true;
	    }
	    else if(keynum>=48 && keynum<=57){
	        //es un numero
	        return true;
	    }
	    else{
	        return alert("Debe introducir un numero");
	    }
	}

</script>