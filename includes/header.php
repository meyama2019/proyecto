

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> 

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trabajo - Modulo 3</title>

    <!--<script type="text/javascript" src="http://localhost/proyecto/js/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://localhost/proyecto/js/bootstrap.js"></script> -->
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



    <!--<link rel="stylesheet" type="text/css" href="http://localhost/proyecto/css/bootstrap.min.css"> -->
    <link rel="stylesheet" media="screen" type="text/css" href="http://localhost/proyecto/css/principal.css" />
    <link rel="stylesheet" media="print" type="text/css" href="http://localhost/proyecto/css/imprimir.css" />
    <link rel="stylesheet" media="screen" type="text/css" href="http://localhost/proyecto/css/animate.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="http://localhost/proyecto/js/inicio.js"></script>

    <style type="text/css">
         .carousel-inner img {
            width: 100%;
            max-height: 460px;
        }

        .carousel-inner{
         height: 250px;
        }
    </style>
   
<noscript>
<?php
    include ('nojava.php');
?> 
</noscript> 
       
   
</head>






<body>

  
    
           <div class="container">
            <header id="cabecera">
               
                    <div class="row">
                        <div class="col-9">
                             <h1 class="heartBeat">ASOCIACION DE HOTELEROS DE MARTE</h1>
                        </div>
                        <div class="col-3">
                              <?php
                                if (isset($_SESSION['activo'])) 
                                {
                                    switch ($_SESSION['activo'])
                                    {
                                        case '0':
                                            # code...
                                            echo('<div class="alert alert-success text-truncate" role="alert" >
                                                
                                                 <p>User:'.$_SESSION['login1'].'</p>
                                                
                                                
                                                </div>');
                                            
                                            break;
                                        case '1':
                                            # code...
                                            echo('<div class="alert alert-warning text-truncate " role="alert" >
                                                  <p>Pendiente confirmación </p>
                                                  <p style="font-size:0.8em">'.$_SESSION['login1'].'</p>
                                                </div>');
                                            break;
                                        case '2':
                                            # code...
                                            echo('<div class="alert alert-danger" role="alert">
                                                    <p>Usuario de Baja</p>
                                                    <p style="font-size:0.8em">'.$_SESSION['login1'].'</p>
                                                 
                                                </div>');

                                            break;
                                        
                                        default:
                                            # code...
                                            break;
                                    }
                                }
                                if (isset($_SESSION['start']))
                                {
                                    if (time() - $_SESSION['start'] > 300)
                                    {
                                        header("Location:http://localhost/proyecto/asociacion/inactive.php");
                                    }
                                    else
                                    {
                                        $_SESSION['start'] = time();
                                    }
                                }
                       
                                ?>
                        </div>
                 
                   
               
               

               
                
            </div> 
                 
            <div class="clear">
			
	</div>
            </header>
          
          

              <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>