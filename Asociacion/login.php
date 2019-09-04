
<?php
session_start();
define('RAIZ', $_SERVER['DOCUMENT_ROOT']. '/proyecto/'); 
include(RAIZ . 'asociacion/header.php');
require_once('../models/connection1.php');
 

	

//////////COMPROBACIÓN SI EXISTE + MENSAJE DE ERROR
if ( !empty($_POST['Inputuser']) && !empty($_POST['ole']) && !empty($_POST['Inputemail']) ) 
{
	echo "<script type='text/javascript'>alert('DEBES LOGEAR USANDO EMAIL O NOMBRE DE USUARIO NO AMBAS OPCIONES');  location.href = 'http://localhost/proyecto/home.php';</script>";
}

elseif ( isset($_POST['Inputuser']) && isset($_POST['ole']) && empty($_POST['Inputemail']) ) 
    {
		
		$us = mysqli_real_escape_string($conexion, $_POST['Inputuser']);
		$pw = mysqli_real_escape_string($conexion, sha1($_POST['ole'])); 

		$sql_us = "SELECT * FROM usuarios WHERE usuario='$us'";
        $sql_pw = "SELECT * FROM usuarios WHERE passwd='$pw'";
        
        $res_us = mysqli_query($conexion, $sql_us);
        $res_pw = mysqli_query($conexion, $sql_pw);
		
		if (mysqli_num_rows($res_us) == 0)
		{
			echo "<script type='text/javascript'>alert('USUARIO NO EXISTE O INCORRECTO'); location.href = 'http://localhost/proyecto/home.php';</script>";
		}
		elseif (mysqli_num_rows($res_pw) == 0)
		{
			echo "<script type='text/javascript'>alert('PASSWORD INCORRECTO'); location.href = 'http://localhost/proyecto/home.php';</script>";
		}
		else
		{
			$listaUsuarios = array(
			array('id_usuario' => '','usuario' => '','passwd' => '','metodo' => '','email' => '','Nom_Ape' => '','dni' => '','provincia' => '','Pais' => '','telefono' => '','cuenta' => '','activo' => '','rol_id' => '')
			);
			
			$sql = 'SELECT * FROM usuarios where usuario = "'.$us.'" and passwd = "'.$pw.'"';
			$consulta = mysqli_query($conexion, $sql);
				
			while ($usuario = mysqli_fetch_array($consulta))
			{
			   $listaUsuarios[0]=$usuario;
			   
			}

			  $_SESSION['id_usuario'] = $listaUsuarios[0]['id_usuario'];
			  $_SESSION['login1'] = $listaUsuarios[0]['usuario'];
			  $_SESSION['start'] = time();
			  $_SESSION['expire'] = $_SESSION['start'] * (5 * 60);
			  $_SESSION['rol1'] = $listaUsuarios[0]['rol_id'];
			  $_SESSION['activo'] = $listaUsuarios[0]['activo'];
			 
			 $host  = $_SERVER['HTTP_HOST'];
				$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra = '../home.php';
				header("Refresh:1");
				header("Location: http://$host$uri/$extra");
				exit;	
		}
    }
	
elseif ( isset($_POST['Inputemail']) && isset($_POST['ole']) && empty($_POST['Inputuser'])) 
    {
		$ue = mysqli_real_escape_string($conexion, $_POST['Inputemail']);
		$pw = mysqli_real_escape_string($conexion, sha1($_POST['ole'])); 
		
		$sql_ue = "SELECT * FROM usuarios WHERE email='$ue'";
        $sql_pw = "SELECT * FROM usuarios WHERE passwd='$pw'";
        
        $res_ue = mysqli_query($conexion, $sql_ue);
        $res_pw = mysqli_query($conexion, $sql_pw);
		
		if (mysqli_num_rows($res_ue) == 0)
		{
			echo "<script type='text/javascript'>alert('EMAIL NO EXISTE O INCORRECTO'); location.href = 'http://localhost/proyecto/home.php';</script>";
		}
		elseif (mysqli_num_rows($res_pw) == 0)
		{
			echo "<script type='text/javascript'>alert('PASSWORD INCORRECTO'); location.href = 'http://localhost/proyecto/home.php';</script>";
		}
		else
		{
    
			$listaUsuarios = array(
			array('id_usuario' => '','usuario' => '','passwd' => '','metodo' => '','email' => '','Nom_Ape' => '','dni' => '','provincia' => '','Pais' => '','telefono' => '','cuenta' => '','activo' => '','rol_id' => '')
			);
			$sql = 'SELECT * FROM usuarios where email = "'.$ue.'" and passwd = "'.$pw.'"';
			$consulta = mysqli_query($conexion, $sql);

			while ($usuario = mysqli_fetch_array($consulta))
			{
			  $listaUsuarios[0]=$usuario;
			}
			
	 
			  $_SESSION['id_usuario'] = $listaUsuarios[0]['id_usuario']; 	 
			  $_SESSION['login1'] = $listaUsuarios[0]['email'];
			  $_SESSION['start'] = time();
			  $_SESSION['expire'] = $_SESSION['start'] * (5 * 60);
			  $_SESSION['rol1'] = $listaUsuarios[0]['rol_id'];
			  $_SESSION['activo'] = $listaUsuarios[0]['activo'];

			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = '../home.php';
			header("Refresh:1");
			header("Location: http://$host$uri/$extra");
			exit;	
		}
	}
else
{
	$host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = '../home.php';
    header("Refresh:1");
    header("Location: http://$host$uri/$extra");
    exit;	
}

	
//////////FIN COMPROBACIÓN SI EXISTE + MENSAJE DE ERROR
   
   mysqli_close($conexion);  
  
?>

