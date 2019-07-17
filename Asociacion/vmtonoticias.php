<div class="card">
    <h5 class="card-header" style="background-color: #F78181">Gestión de Noticias</h5>

    <br>
    <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">


            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="cmtoid"></label>
                    <input type="text" class="form-control" id="cmtoid" name="cmtoid" placeholder="Id Noticia">
                </div>
                <div class="form-group col-md-3">
                    <label for="cmtouserid"></label>
                    <input type="text" class="form-control" id="cmtouserid" name="cmtouserid" placeholder="Usuario">
                </div>
                <div class="form-group col-md-3">
                    <label for="cmtofechaini"></label>
                    <input type="text" class="form-control" id="cmtofechaini" name="cmtofechaini" placeholder="01/01/2019">
                </div>
                <div class="form-group col-md-3">
                    <label for="cmtofechafin"></label>
                    <input type="text" class="form-control" id="cmtofechafin" name="cmtofechafin" placeholder="31/12/2019">
                </div>

                <div class="form-group col-md-3">
                    <label for="cmtotitulo"></label>
                    <input type="text" class="form-control" id="cmtotitulo" name="cmtotitulo" placeholder="Titulo">
                </div>

                <div class="form-group col-md-3">
                    <label for="cmtodescrip"></label>
                    <input type="text" class="form-control" id="cmtodescrip" name="cmtodescrip" placeholder="Descripcion">
                </div>



            </div>
            <center><button type="submit" class="btn btn-primary btn-sm " name="mto_buscarrol" >Buscar</button></center>
            <div class="container">
                <div class="form-row">
                    <button type="submit" class="btn btn-outline-danger " name="mto_newrol" >Nuevo</button>
                </div>
            </div>


        </form>
    </div>

    <div class="card-body">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="container">
                <br>
                <table class="table table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Id Noticia</th>
                        <th scope="col">Id Usuario</th>
                        <th scope="col">Fecha Inicio</th>
                        <th scope="col">Fecha Fin</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripcion</th>


                    </tr>
                    </thead>
                    <tbody>


                    <?php
                    $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
                    $acentos="SET NAMES 'utf8'";
                    mysqli_query($conexion, $acentos);
                    $sqlInicial="SELECT * FROM noticias where 1 ";
                    $x=0;
                    Global $X;
                    if(isset($_POST['mto_buscarrol']) )
                    {

                        if(isset($_POST['cmtoid']) && $_POST['cmtoid'] !='')
                        {
                            $sqlInicial = $sqlInicial . " && id_noticia = '$_POST[cmtoid]'";
                        }
                        if(isset($_POST['cmtouserid']) && $_POST['cmtouserid'] !='')
                        {
                            $sqlInicial = $sqlInicial . " && userid like '%$_POST[cmtouserid]%'";
                        }

                        if(isset($_POST['cmtofechaini']) && $_POST['cmtofechaini'] !='')
                        {
                            $sqlInicial = $sqlInicial . " && fechainicio like '%$_POST[cmtofechaini]%'";
                        }

                        if(isset($_POST['cmtofechafin']) && $_POST['cmtofechafin'] !='')
                        {
                            $sqlInicial = $sqlInicial . " && fechafin like '%$_POST[cmtofechafin]%'";
                        }

                        if(isset($_POST['cmtotitulo']) && $_POST['cmtotitulo'] !='')
                        {
                            $sqlInicial = $sqlInicial . " && titulo '%$_POST[cmtotitulo]%'";
                        }


                        if(isset($_POST['cmtodescrip']) && $_POST['cmtodescrip'] !='')
                        {
                            $sqlInicial = $sqlInicial . " && descripcion like '%$_POST[cmtotlf]%'";
                        }

                        $sql=$db->query($sqlInicial);

                        foreach ($sql->fetchAll() as $listaUsuarios[$x])
                        {
                            echo ('
                                             <tr>
                                            <th scope="row">'. utf8_encode($listaUsuarios[$x]['id_noticia']).'</th>
                                            <td>'. utf8_encode($listaUsuarios[$x]['userid']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['fechainicio']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['fechafin']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['titulo']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['descripcion']). '</td>
                                            
                                            <td><button type="submit" class="btn btn-outline-danger btn-sm" name="edit-rol" 
                                                value='.$listaUsuarios[$x]['id_noticia'].'>Editar</button>
                                                <button type="submit" class="btn btn-outline-danger btn-sm" name="edit-rol" 
                                                value='.$listaUsuarios[$x]['id_noticia'].'>Eliminar</button></td>
                                            ');




                            $x=$x+1;
                            $X=$x;

                        }




                        echo ('<p>Resultados encontrados '.$X.'</p>');

                    }
                    else
                    {
                        $conexion = mysqli_connect('localhost', 'socio', 'socio', 'marte');
                        $acentos="SET NAMES 'utf8'";
                        mysqli_query($conexion, $acentos);
                        $sqlInicial="SELECT * FROM noticias where 1 ";
                        $x=0;


                        $sql=$db->query($sqlInicial);

                        foreach ($sql->fetchAll() as $listaUsuarios[$x])
                        {


                            echo ('
                                             <tr>
                                            <th scope="row">'. utf8_encode($listaUsuarios[$x]['id_noticia']).'</th>
                                            <td>'. utf8_encode($listaUsuarios[$x]['userid']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['fechainicio']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['fechafin']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['titulo']). '</td>
                                            <td>'. utf8_encode($listaUsuarios[$x]['descripcion']). '</td>
                                            <td><button type="submit" class="btn btn-outline-danger btn-sm" name="edit-rol" 
                                                value='.$listaUsuarios[$x]['id_noticia'].'>Editar</button>
                                                <button type="submit" class="btn btn-outline-danger btn-sm" name="edit-rol" 
                                                value='.$listaUsuarios[$x]['id_noticia'].'>Eliminar</button></td>
                                            ');
                            $x=$x+1;
                            $X=$x;

                        }






                        echo ('<p>Resultados encontrados '.$X.'</p>');

                    }

                    mysqli_close($conexion);


                    ?>




                    </tbody>
                </table>

            </div>
        </form>
    </div>
</div>



</div>
