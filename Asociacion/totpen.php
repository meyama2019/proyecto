  <script type="text/javascript">

                  function getTimeAJAX() {

                      //GUARDAMOS EN UNA VARIABLE EL RESULTADO DE LA CONSULTA AJAX    

                      var totpen = $.ajax({

                          url: 'http://localhost/proyecto/ajax/viewtotpen.php', //indicamos la ruta donde se genera la hora
                              dataType: 'text',//indicamos que es de tipo texto plano
                              async: false     //ponemos el parámetro asyn a falso
                      }).responseText;

                      //actualizamos el div que nos mostrará la hora actual
                      document.getElementById("tot_pen").innerHTML = totpen;
                  }

                  //con esta funcion llamamos a la función getTimeAJAX cada segundo para actualizar el div que mostrará la hora
                  setInterval(getTimeAJAX,100);
  </script>