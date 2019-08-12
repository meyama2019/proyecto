
<?php
  session_start();
//require_once('../models/connection.php');

//Inputuser
//Inputemail
//InputPassword

		
//define('RAIZ', $_SERVER['DOCUMENT_ROOT'].'/');
//include('../proyecto/includes/header.php');
define('RAIZ', $_SERVER['DOCUMENT_ROOT']. '/proyecto/'); 
include(RAIZ . 'asociacion/header.php');

require_once('../models/connection1.php');
   
   // Cuando el usuer entra alias y passwd
    if (isset($_POST["Inputuser"]) && (isset($_POST["ole"]))) 
    {
      $us = $_POST['Inputuser'];
      //$em = $_POST['Inputemail']; 
      $pw = sha1($_POST['ole']); 
  
      // Comprobamos usuario
          $listaUsuarios = array(
         array('id_usuario' => '','usuario' => '','passwd' => '','metodo' => '','email' => '','Nom_Ape' => '','dni' => '','provincia' => '','Pais' => '','telefono' => '','cuenta' => '','activo' => '','rol_id' => '')
          );
        //$db= Db::getConnect();
        //$sql=$db->query('SELECT * FROM usuarios where usuario = "'.$us.'" and passwd = "'.$pw.'"');
        $sql = 'SELECT * FROM usuarios where usuario = "'.$us.'" and passwd = "'.$pw.'"';
        $consulta = mysqli_query($conexion, $sql);
		
		
        // carga en la $listaUsuarios cada registro desde la base de datos
        // foreach ($sql->fetchAll() as $usuario) {
			
	    while ($usuario = mysqli_fetch_array($consulta)) {
           $listaUsuarios[0]=$usuario;
		   
          }
        
        // Iniciamos sesión
        
         if($us == $listaUsuarios[0]['usuario'] && $pw == $listaUsuarios[0]['passwd'])
         {
          $_SESSION['id_usuario'] = $listaUsuarios[0]['id_usuario'];
          $_SESSION['login1'] = $listaUsuarios[0]['usuario'];
          $_SESSION['start'] = time();
          $_SESSION['expire'] = $_SESSION['start'] * (5 * 60);
          $_SESSION['rol1'] = $listaUsuarios[0]['rol_id'];
          $_SESSION['activo'] = $listaUsuarios[0]['activo'];
         }
    }




     // Cuando el user entra email y passwd


      if (isset($_POST["Inputemail"]) && (isset($_POST["ole"]))) 
    {
      //echo ('<div><p>'.$_POST["Inputemail"].'.'.$_POST["ole"].'</P></div>');
      $us = $_POST['Inputemail'];
      //$em = $_POST['Inputemail']; 
      $pw = sha1($_POST['ole']); 
      // Comprobamos usuario
          $listaUsuarios = array(
         array('id_usuario' => '','usuario' => '','passwd' => '','metodo' => '','email' => '','Nom_Ape' => '','dni' => '','provincia' => '','Pais' => '','telefono' => '','cuenta' => '','activo' => '','rol_id' => '')
          );
        //$db= Db::getConnect();
        //$sql=$db->query('SELECT * FROM usuarios where email = "'.$us.'" and passwd = "'.$pw.'" ');
        $sql = 'SELECT * FROM usuarios where email = "'.$us.'" and passwd = "'.$pw.'"';
        $consulta = mysqli_query($conexion, $sql);
        // carga en la $listaUsuarios cada registro desde la base de datos
        //  foreach ($sql->fetchAll() as $usuario) {
        while ($usuario = mysqli_fetch_array($consulta)) {
           $listaUsuarios[0]=$usuario;
          }
        
        // Iniciamos sesión
        
         if($us == $listaUsuarios[0]['email'] && $pw == $listaUsuarios[0]['passwd'])
         {
          $_SESSION['login1'] = $listaUsuarios[0]['email'];
          $_SESSION['start'] = time();
          $_SESSION['expire'] = $_SESSION['start'] * (5 * 60);
          $_SESSION['rol1'] = $listaUsuarios[0]['rol_id'];
          $_SESSION['activo'] = $listaUsuarios[0]['activo'];
         }
		// Contamos el num de usuarios activos
        //$num_rows=$conexion->query('SELECT * FROM usuarios where activo=1'); // 1 Pendientes aprobación
        $sql = "SELECT * FROM usuarios where activo=1"; 
        $consulta = mysqli_query($conexion, $sql);
        $num_rows = mysqli_num_rows($consulta);
        $tot=0;
        // foreach ($num_rows->fetchAll() as $usuario) {
        for ($i = 0;$i <= $num_rows; $i++){ 
          $tot=$tot+1;
        }
        $_SESSION['tot_pen'] = $tot;

        //$num_rows=$conexion->query('SELECT * FROM contacto where activo=1'); // 1 Pendientes aprobación
        $sql = "SELECT * FROM contacto where activo=1"; 
        $consulta = mysqli_query($conexion, $sql);
        $num_rows = mysqli_num_rows($consulta);
        $tot=0;
        // foreach ($num_rows->fetchAll() as $contacto) {
        for ($i = 0;$i <= $num_rows; $i++){   
          $tot=$tot+1;
        }
        $_SESSION['tot_con'] = $tot;
      }

    //echo ($_SESSION['login1'].$_SESSION['rol1']);
    //echo('Usuario'.$_POST["Inputuser"].' Rol '.$_POST["ole"].'');
   
    

    //return $listaUsuarios;
    // Redirecciona a una página diferente en el mismo directorio el cual se hizo la petición
	







//////////COMPROBACIÓN SI EXISTE + MENSAJE DE ERROR
///////// 11/08/2019 - YARUB
if ( !empty($_POST['Inputuser']) && !empty($_POST['ole']) && !empty($_POST['Inputemail']) ) 
{
	echo "<script type='text/javascript'>alert('DEBES LOGEAR USANDO EMAIL O NOMBRE DE USUARIO NO AMBAS OPCIONES');  location.href = 'http://localhost/proyecto/home.php';</script>";
}

elseif ( isset($_POST['Inputuser']) && isset($_POST['ole']) && empty($_POST['Inputemail']) ) 
    {
		$us = $_POST['Inputuser'];
		$pw = sha1($_POST['ole']); 

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
			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			//$uri   = '/proyecto';
			$extra = '../home.php';
			header("Refresh:0");
			header("Location: http://$host$uri/$extra");
			exit;	
		}
    }
	
elseif ( isset($_POST['Inputemail']) && isset($_POST['ole']) && empty($_POST['Inputuser'])) 
    {
		$ue = $_POST['Inputemail'];
		$pw = sha1($_POST['ole']); 
		
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
			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			//$uri   = '/proyecto';
			$extra = '../home.php';
			header("Refresh:0");
			header("Location: http://$host$uri/$extra");
			exit;	
		}
	}
else
{
	$host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    //$uri   = '/proyecto';
    $extra = '../home.php';
    header("Refresh:0");
    header("Location: http://$host$uri/$extra");
    exit;	
}

	
//////////FIN COMPROBACIÓN SI EXISTE + MENSAJE DE ERROR
	
	
//   $host  = $_SERVER['HTTP_HOST'];
//    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    //$uri   = '/proyecto';
//    $extra = '../home.php';
//   header("Refresh:0");
//    header("Location: http://$host$uri/$extra");
//    exit;
     
   mysqli_close($conexion);  
  
?>

