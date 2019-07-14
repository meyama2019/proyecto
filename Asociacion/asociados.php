<?php
session_start();
//define('RAIZ', $_SERVER['DOCUMENT_ROOT']. '/proyecto/'); 
//include(RAIZ . 'asociacion/header.php');
include ('../includes/header.php');
include('../models/connection.php');


     $listaUsuarios = array(array('id_usuario' => '', 'usuario' => '', 'email' => '', 'Nom_Ape' => '','dni' => '', 'provincia' => '', 'nombre' => '', 'telefono' => '','cuenta' => '', 'activo' => '', 'rol_id' => '')
      );
    


    $db=Db::getConnect();
    $sql=$db->query(' SELECT id_usuario,usuario,email,Nom_Ape,dni,pr.provincia,pa.nombre,telefono,cuenta,activo,rol_id 
      FROM usuarios us  
      inner join paises pa on us.Pais = pa.id
      inner join provincias pr on pr.id_provincia = us.provincias      
      where us.rol_id = 2');

    // carga en la $listaUsuarios cada registro desde la base de datos
   
    //return $listaUsuarios;

  
    require_once('menu.php');
    require_once('vasociados.php');
    require_once ('footer.php');
  
?>
      
