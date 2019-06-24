<!-- 21.06.2019 marcelo he introducido este cambio para que lo veamos todos -->
<!-- 23.06.2019 elisa comentario de prueba para probar la subida de los cambios -->
<!-- 24.06.2019 elisa comentario de prueba desde el trabajo -->
<?php
	
	require('connection.php');
		$listaUsuarios =[]; // Esto en una prueba de conexión a mi BBDD y muestro en el menú otra li dependiendo del tipo_usuario
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM usuarios order by id_usuario'); // como solo he creado uno me va a mostrar uno

		// carga en la $listaUsuarios cada registro desde la base de datos
		foreach ($sql->fetchAll() as $usuario) {
			$listaUsuarios[]= ($usuario['rol_id']);
		}
		$tipouser = $listaUsuarios[0];


?>

<!doctype html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title>ASOCIACIÓN DE HOTELEROS DE MARTE</title>
	<meta name="description" content="Trabajo I - Curso de Desarrollo de Aplicaciones Web Dinámicas - UNED 2019"/>
	
	<link rel="icon" type="image/png" href="images/favicon.ico"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<meta name="robots" content="noindex,nofollow" />

		


<!--PARA ROTAR LAS IMÁGENES DE FONDO-->
	<script type="text/javascript" src="./js/jquery-1.6.1.min.js"></script>
	<script type="text/javascript" src="./js/vegas/jquery.vegas.js"></script>
	<link rel="stylesheet" type="text/css" href="./js/vegas/jquery.vegas.css">
	<script type="text/javascript">
	<!--
	$.vegas('slideshow', {
	  backgrounds:[
		{ src:'./images/bg1.jpg', fade:1000 },
		{ src:'./images/bg2.jpg', fade:1000 },
		{ src:'./images/bg4.jpg', fade:1000 },
		{ src:'./images/bg3.jpg', fade:1000 }
	  ]
	})('overlay', {
	  src:'/vegas/overlays/11.png'
	});
	-->
	</script>

	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><br>
<![endif]-->

</head>

<body>
<div id="capa_contenedora">

		<header id="cabecera">
				<section id="logo">
					<a href="index.php">
					<img src="images/logo.gif" alt="logo" style="width:30%; height:30%; margin:5px; padding=5px;"/>
					</a>
					<br>
					<em>ASOCIACIÓN DE HOTELEROS</em>
					<br>
					<em>DE MARTE</em>
				</section>
		</header>
		
		<nav id='cssmenu'>
		<ul>
			<li><a href="index.php">Inicio</a></li>
			<li><a href="gallery1.php">Galería de fotos</a></li>
			<li><a href="noticias.php">Noticias</a></li>
			<li><a href="socio.php">Hazte Socio</a></li>
			<li><a href="asociados.php">Nuestros Asociados</a></li>
			<?php // aqui muesro otro li dependiendo del tipo usuario 

				switch ($tipouser) {
					case '1':
						# code...
						echo ('<li><a href="roles.php">Usuario Reg.</a></li>');
						break;
					case '2':
						# code...
						echo ('<li><a href="#">Socio.</a></li>');
						break;
					case '95':
						# code...
						echo ('<li><a href="#">Administrador</a></li>');
						break;	
						
					default:
						# code...
						break;
				}

			?>
		
		</ul>
		</nav>