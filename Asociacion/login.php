
   

  

<?php
  session_start();
require_once('../models/connection.php');

//Inputuser
//Inputemail
//InputPassword





//define('RAIZ', $_SERVER['DOCUMENT_ROOT'].'/');
//include('../proyecto/includes/header.php');
define('RAIZ', $_SERVER['DOCUMENT_ROOT']. '/proyecto/'); 
include(RAIZ . 'asociacion/header.php');

require_once('../models/connection.php');
   
   // Cuando el usuer entra alias y passwd
    if (isset($_POST["Inputuser"]) && (isset($_POST["ole"]))) 
    {
     // echo ('<div><p>'.$_POST["Inputuser"].'.'.$_POST["ole"].'</P></div>');
      $us = $_POST['Inputuser'];
      //$em = $_POST['Inputemail']; 
      $pw = sha1($_POST['ole']); 
      // Comprobamos usuario
          $listaUsuarios = array(
         array('id_usuario' => '','usuario' => '','passwd' => '','metodo' => '','email' => '','Nom_Ape' => '','dni' => '','provincia' => '','Pais' => '','telefono' => '','cuenta' => '','activo' => '','rol_id' => '')
          );
        $db= Db::getConnect();
        $sql=$db->query('SELECT * FROM usuarios where usuario = "'.$us.'" and passwd = "'.$pw.'"');
        // carga en la $listaUsuarios cada registro desde la base de datos
          foreach ($sql->fetchAll() as $usuario) {
           $listaUsuarios[0]=$usuario;
          }
        
        // Iniciamos sesión
        
         if($us == $listaUsuarios[0]['usuario'] && $pw == $listaUsuarios[0]['passwd'])
         {
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
        $db= Db::getConnect();
        $sql=$db->query('SELECT * FROM usuarios where email = "'.$us.'" and passwd = "'.$pw.'" ');
        // carga en la $listaUsuarios cada registro desde la base de datos
          foreach ($sql->fetchAll() as $usuario) {
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
        $num_rows=$db->query('SELECT * FROM usuarios where activo=1'); // 1 Pendientes aprobación
        $tot=0;
         foreach ($num_rows->fetchAll() as $usuario) {
          $tot=$tot+1;
        }
        $_SESSION['tot_pen'] = $tot;

      }

    //echo ($_SESSION['login1'].$_SESSION['rol1']);
    //echo('Usuario'.$_POST["Inputuser"].' Rol '.$_POST["ole"].'');
   
    

    //return $listaUsuarios;
    // Redirecciona a una página diferente en el mismo directorio el cual se hizo la petición
    
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    //$uri   = '/proyecto';
    $extra = '../home.php';
    header("Location: http://$host$uri/$extra");
    exit;
     
  
?>
