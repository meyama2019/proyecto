
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> 

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trabajo - Modulo 3</title>
    <script type="text/javascript" src="http://localhost/proyecto/js/jquery.js"></script>
    <script type="text/javascript" src="http://localhost/proyecto/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/proyecto/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/proyecto/css/bootstrap.css">
    <link rel="stylesheet" media="screen" type="text/css" href="http://localhost/proyecto/css/principal.css" />
    <link rel="stylesheet" media="print" type="text/css" href="http://localhost/proyecto/css/imprimir.css" />

    <script type="text/javascript" src="../js/inicio.js"></script>
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
                                            echo('<div id="iconlogin" class="alert alert-success" role="alert" >Bienvenido '.$_SESSION['login1'].'!</div>');
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
                 
                   
               
            <style type="text/css">
                 #cabecera > .row > .col-3 > #iconlogin {

                    color: red;
                }
            </style>   

               
           <img src="/open-iconic/svg/comment-square.svg">

                <div class="clear"></div>
            </header>
          
          

              <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>