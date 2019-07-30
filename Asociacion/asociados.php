<?php
session_start();
//define('RAIZ', $_SERVER['DOCUMENT_ROOT']. '/proyecto/'); 
//include(RAIZ . 'asociacion/header.php');
include ('../includes/header.php');
include('../models/connection1.php');
require_once('menu.php');

?>

  
<div class="card">
  <h5 class="card-header">Conoce a nuestros asociados</h5>

  <!-- (1) Formulario de búsqueda por criterios ------->
  <br>
  <div class="container">
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          
       
        <div class="form-row">
           <div class="form-group col-md-1">
            <label for="cid"></label>
            <input type="text" class="form-control" id="cid" name="cid" placeholder="Código">
          </div>
          <div class="form-group col-md-4">
            <label for="cemail"></label>
            <input type="text" class="form-control" id="cemail" name="cemail" placeholder="Email">
          </div>
          <div class="form-group col-md-4">
            <label for="cnom_ape"></label>
            <input type="text" class="form-control" id="cnomape" name="cnomape" placeholder="Nombre / Apellidos">
          </div>
          <div class="form-group col-md-3">
            <label for="ctfno"></label>
            <input type="text" class="form-control" id="ctfno" name="ctfno" placeholder="Teléfono">
          </div>
        </div>
   
        <center><button type="submit" class="btn btn-primary btn-sm" name="buscasocio">Buscar</button></center>
  </form>
</div>


  
    <div class="card-body">
        <div class="container">
          
        
          <table class="table table-hover">
            <thead class="thead-light">
              <tr>
               
                <th scope="col">id</th>
                <th scope="col">Email</th>
                <th scope="col">Asociado</th>               
                <th scope="col">Provincia</th>
                <th scope="col">País</th>
                <th scope="col">Teléfono</th>
                
              </tr>
            </thead>
             <tbody>


          <?php
              
            if (isset($_POST['buscasocio']) && ((isset($_POST['cid']) && $_POST['cid'] !='') || isset($_POST['cemail']) && $_POST['cemail'] !='' || isset($_POST['cnomape']) && $_POST['cnomape'] !='' || isset($_POST['ctfno']) && $_POST['ctfno'] !=''))

            {
              /*
              $registro_por_pagina = 10;
              $paginai = '';
                        
              if(isset($_GET["pagina"]))
                  {
                    //$paginai = $_GET["pagina"];
                    $paginai = 1;
                   }
                   else
                      {
                        $paginai = 1;
                       }
              $start_from = ($paginai)*$registro_por_pagina;*/
              //echo("iniciados");
               
               $sqlInicial=("SELECT id_usuario,usuario,email,Nom_Ape,dni,pr.provincia,pa.iso,telefono,cuenta,activo,rol_id 
                                  FROM paises pa  
                                  inner join usuarios us on us.Pais = pa.id
                                  inner join provincias pr on pr.id_provincia = us.provincias                                
                                  where 1 "); // inyection 
               //$sqlFinal="and rol_id != 95 LIMIT $start_from, $registro_por_pagina";
               $sqlFinal="and rol_id != 95";                   
               $x=0;
               Global $X;
                if(isset($_POST['cid']) && $_POST['cid'] !='')
                    { $sqlInicial = $sqlInicial . " && id_usuario = '$_POST[cid]' ";  }
                if(isset($_POST['cemail']) && $_POST['cemail'] !='')
                    { $sqlInicial = $sqlInicial . " && email like '%$_POST[cemail]%' "; }
                if(isset($_POST['cnomape']) && $_POST['cnomape'] !='')
                    { $sqlInicial = $sqlInicial . " && Nom_Ape like '%$_POST[cnomape]%' "; }
                if(isset($_POST['ctfno']) && $_POST['ctfno'] !='')
                    { $sqlInicial = $sqlInicial . " && telefono like '%$_POST[ctfno]%' "; }
                $sqlInicial = $sqlInicial . $sqlFinal;
                //echo($sqlInicial);
                //$conexion = mysqli_connect("localhost", "socio", "socio", "marte");
                
                $resultT = mysqli_query($conexion, $sqlInicial);
                $total_records = mysqli_num_rows($resultT);
                $number=0;
                     while($row = mysqli_fetch_array($resultT))
                     {
                       $number++;
                       ?>
                       <tr>
                       
                        <td><?php echo $row["id_usuario"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo ($row["Nom_Ape"]); ?></td>
                        <td><?php echo ($row["provincia"]); ?></td>
                        <td><?php echo ($row["iso"]); ?></td>
                        <td><?php echo $row["telefono"]; ?></td>
                       </tr>
                       <?php
                       }
                       echo ('<p>Resultados encontrados '.$total_records.'</p>');
                       $number=0; 
                     ?>  
                    </table>
                     <div align="center">
                    <br />

                <?php
   


            }
            else 
            {
              //$conexion = mysqli_connect("localhost", "socio", "socio", "marte");
              $registro_por_pagina = 10;
              $pagina = '';
              if(isset($_GET["pagina"]))
                {
                 $pagina = mysql_real_escape_string($_GET["pagina"]);
                }
              else
                {
                 $pagina = 1;
                }
            //echo("entra sin inicializar");
            $start_from = ($pagina-1)*$registro_por_pagina;

            $query = "SELECT id_usuario,usuario,email,Nom_Ape,dni,pr.provincia,pa.iso,telefono,cuenta,activo,rol_id 
                                  FROM paises pa  
                                  inner join usuarios us on us.Pais = pa.id
                                  inner join provincias pr on pr.id_provincia = us.provincias                                
                                  where 1 and rol_id != 95 LIMIT $start_from, $registro_por_pagina "  ;

            
            

            $result = mysqli_query($conexion, $query);

            

                     $number=0;
                     while($row = mysqli_fetch_array($result))
                     {
                       $number++;
                       ?>
                       <tr>
                       
                        <td><?php echo $row["id_usuario"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo ($row["Nom_Ape"]); ?></td>
                        <td><?php echo ($row["provincia"]); ?></td>
                        <td><?php echo ($row["iso"]); ?></td>
                        <td><?php echo $row["telefono"]; ?></td>
                       </tr>
                       <?php
                       }
                      //echo ('<p>Resultados encontrados '.$total_records.'</p>');   
                     ?>
                    </table>
                     <div align="center">
                    <br />
                    <?php
                    
                   
                    // 
                                          
                       
                        
                        $page_query = "SELECT id_usuario,usuario,email,Nom_Ape,dni,pr.provincia,pa.iso,telefono,cuenta,activo,rol_id 
                        FROM paises pa  
                        inner join usuarios us on us.Pais = pa.id
                        inner join provincias pr on pr.id_provincia = us.provincias                                
                        where rol_id != 95 ";
                        $page_result = mysqli_query($conexion, $page_query);
                        $total_records = mysqli_num_rows($page_result);
                      
                        $total_pages = ceil($total_records/$registro_por_pagina);
                        $start_loop = $pagina;
                        $diferencia = $total_pages - $pagina;
                        if($diferencia <= $start_loop)
                        {
                         $start_loop = $total_pages - 1;

                        }
 


                 
                    $end_loop = $start_loop + 1;
                   
                    echo('<center><nav aria-label="Page navigation example ">
                        <ul class="pagination justify-content-center">
                        <li><a class="page-link" href="asociados.php?pagina=1" aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                            </a>
                          </li>');
                   
                    if($pagina > 1)
                    {
                
                     echo(' <li class="page-item"><a class="page-link" href="asociados.php?pagina='.($pagina - 1).'">1</a></li>');
                 
                    }
                 
                    for($i=$start_loop; $i<=$total_pages; $i++)
                    {     
                    echo(' <li class="page-item"><a class="page-link" href="asociados.php?pagina='.$i.'">'.$i.'</a></li>');
                  
                    }
                    if($pagina < $end_loop)
                    {
                    
                     echo (' <li class="page-item">
                              <a class="page-link" href="asociados.php?pagina='.($pagina + 1).'" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav></center>');
                    }
                    if($pagina == $end_loop)
                    {
                    
                     echo (' <li class="page-item">
                              <a class="page-link" href="asociados.php?pagina=1" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav></center>');
                    }
                    
 

                //mysqli_close($conexion);

               }
 
               mysqli_close($conexion);
              ?>

           
            
            </tbody>
          </table>  
              
        </div>
    </div>


</div>






            


<?php
   
    require_once ('footer.php');
   
  
?>
      
