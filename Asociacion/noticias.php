<?php
session_start();
//define('RAIZ', $_SERVER['DOCUMENT_ROOT']. '/proyecto/'); 
//include(RAIZ . 'asociacion/header.php');
include ('../includes/header.php');
include('../models/connection.php');
    $listaUsuarios = array(
   array('id_usuario' => '','usuario' => '','passwd' => '','metodo' => '','email' => '','Nom_Ape' => '','dni' => '','provincia' => '','Pais' => '','telefono' => '','cuenta' => '','activo' => '1','rol_id' => '')
);
    $listanoticias = array(
  array('id_noticia' => '1','userid' => '1','fechainicio' => '2019-06-25','fechafin' => '2019-06-30','titulo' => 'MOOC: ¿Estás preparado para competir? Transformación digital para pymes.','descripcion' => 'La transformación digital de las empresas es un factor clave hoy día para su competitividad y productividad. Próximamente, Andalucía Digital pone en marcha un MOOC sobre este tema, para los que quieran formarse de forma gratuita y on-line.')
);
  
    $db=Db::getConnect();
    $y=0;
    $sql=$db->query('SELECT * FROM usuarios');

    // carga en la $listaUsuarios cada registro desde la base de datos

    foreach ($sql->fetchAll() as $usuario) {
      $listaUsuarios[$y]= $usuario;
      $y=$y+1;
    }
    //return $listaUsuarios;
      require_once('menu.php');

  
?>

          


 

                 <?php
                             $x = 0;
                              if (isset($_SESSION['rol1']))
                              {

                               
                                switch ($_SESSION['rol1']) 
                                {
                                  case 95:
                                    # code...
                                    $sql=$db->query('SELECT * FROM noticias order by 3 desc');
                                    break;
                                   case 2:
                                    # code...
                                     $sql=$db->query('SELECT * FROM noticias where fechafin >= curdate() order by 3 desc');
                                    break;
                                    case 1:
                                    # code...
                                     $sql=$db->query('SELECT * FROM noticias where fechafin >= curdate()  limit 1');
                                    break;
                                  
                                  default:
                                    # code...
                                    break;
                                }
                            }
                             
                            else
                            {
                               $sql=$db->query('SELECT * FROM noticias where fechafin >= curdate()  limit 1');
                            }
                              // $sql=$db->query('SELECT * FROM noticias where fechafin >= curdate()  limit 1');
                              foreach ($sql->fetchAll() as $listanoticias[$x]) {
                                //$listanoticias[]= $noticias;
                                
                              echo('<div class="card">
                                <div class="card-header"><h3> '. utf8_encode($listanoticias[$x]['titulo']) .'            
                                         </h3>
                                      </div>
                                      <div class="card-body">
                                        <h6 class="card-title">'. utf8_encode($listanoticias[$x]['fechainicio']) .'</h6>
                                        <p class="card-text">'. utf8_encode(substr($listanoticias[$x]['descripcion'],0,105)) . '....'.'</p>
                                        <p class="card-text1">'. utf8_encode($listanoticias[$x]['descripcion']) .'</p>
 
                                     
                                        <a href="#" class="btn btn-primary">Ver más..</a>
                                      </div>
                                </div>');

                              $x=$x+1;
                              }
                  
                              $db=Db::cerrar();
                ?>

             

           
         
        
        
  


 <?php
  include ('footer.php');
?>

<script type="text/javascript">

    onload=function() {

        $(document).ready(function () {

            $(".card-text1").hide();

            $(".card-body a").click(function () {

                if ($(this).text() == "Ver más..") {

                    $(this).prev().prev().hide();
                    $(this).prev().slideToggle();
                    $(this).text("Ocultar..");
                    
                }
                else{
                    $(this).prev().prev().show();
                    $(this).prev().slideToggle();
                    $(this).text("Ver más..");

                }
            });
        });

    }

</script>
