

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> 

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trabajo - Modulo 3</title>
    <script type="text/javascript" src="http://localhost/proyecto/js/jquery.js"></script>
    <script type="text/javascript" src="http://localhost/proyecto/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/proyecto/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" type="text/css" href="http://localhost/proyecto/css/principal.css" />
    <link rel="stylesheet" media="print" type="text/css" href="http://localhost/proyecto/css/imprimir.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                             <h1>ASOCIACION DE HOTELEROS DE MARTE</h1>
                        </div>
                        <div class="col-3">
                              <?php
                                if (isset($_SESSION['activo'])) 
                                {
                                    switch ($_SESSION['activo'])
                                    {
                                        case '0':
                                            # code...
                                            echo('<div class="alert alert-success" role="alert">Bienvenido 
                                                '.$_SESSION['login1'].'!</div>');
                                            
                                            break;
                                        case '1':
                                            # code...
                                            echo('<div class="alert alert-warning" role="alert">
                                                  Pendiente confirmación '.$_SESSION['login1'].'!
                                                </div>');
                                            break;
                                        case '2':
                                            # code...
                                            echo('<div class="alert alert-danger" role="alert">
                                                  Usuario de Baja - '.$_SESSION['login1'].'!
                                                </div>');

                                            break;
                                        
                                        default:
                                            # code...
                                            break;
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