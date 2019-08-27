<?php
session_start();
include ('../includes/header.php');
include('../models/connection1.php');
    $listaUsuarios = array(
   array('id_usuario' => '','usuario' => '','passwd' => '','metodo' => '','email' => '','Nom_Ape' => '','dni' => '','provincia' => '','Pais' => '','telefono' => '','cuenta' => '','activo' => '1','rol_id' => '')
);
    $listanoticias = array(
  array('id_noticia' => '1','userid' => '1','fechainicio' => '2019-06-25','fechafin' => '2019-06-30','titulo' => 'MOOC: ¿Estás preparado para competir? Transformación digital para pymes.','descripcion' => 'La transformación digital de las empresas es un factor clave hoy día para su competitividad y productividad. Próximamente, Andalucía Digital pone en marcha un MOOC sobre este tema, para los que quieran formarse de forma gratuita y on-line.')
);
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
                                    $sql=('SELECT * FROM noticias order by 3 desc');
                                    $result = mysqli_query($conexion, $sql);
                                    break;
                                  case 2:
                                    # code...
                                    $sql=('SELECT * FROM noticias where fechafin >= curdate() order by 3 desc');
                                    $result = mysqli_query($conexion, $sql);                                   
                                    break;
                                  case 1:
                                    # code...
                                    $sql=('SELECT * FROM noticias where fechafin >= curdate() order by 3 desc limit 5');
                                    $result = mysqli_query($conexion, $sql);
                                   
                                    break;
                                  
                                  default:
                                    # code...
                                    break;
                                }
                            }
                             
                            else
                            {
                               $sql="SELECT * FROM noticias where fechafin >= curdate() order by 3 desc limit 1" ;
                               $result = mysqli_query($conexion, $sql);
                              
                            }
                             
                              foreach ($result as $listanoticias[$x]) {

                              
                                
                              echo('<div class="card ">
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
							  
							  if ($sql == 0 )
								{
									echo('<div class="container" align="center">
									<div class="alert alert-danger" role="alert">
									No hay noticias que mostrar.
									</div></div> ');
									
								}	
								  
                              mysqli_close($conexion);
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
                    goToId($(this).prev().attr('class'));
                }
                else{
                    $(this).prev().prev().show();
                    $(this).prev().slideToggle();
                    $(this).text("Ver más..");
                    goToId($(this).prev().attr('class'));

                }
            });
        });

        function goToId(idName)
        {
            if($("."+idName).length)
            {
                var target_offset = $("."+idName).offset();
                var target_top = target_offset.top;
                $('html,body').animate({scrollTop:target_top},{duration:"slow"});
            }
        }

    }

</script>
