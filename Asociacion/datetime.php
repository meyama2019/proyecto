   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script type="text/javascript">
    
         function getTimeAJAX() {

                      //GUARDAMOS EN UNA VARIABLE EL RESULTADO DE LA CONSULTA AJAX    

                      var time = $.ajax({

                          url: 'http://localhost/proyecto/ajax/viewdate.php', //indicamos la ruta donde se genera la hora
                              dataType: 'text',//indicamos que es de tipo texto plano
                              async: false     //ponemos el parámetro asyn a falso
                      }).responseText;

                      //actualizamos el div que nos mostrará la hora actual
                      document.getElementById("myWatch").innerHTML = time;
                  }



               
     //con esta funcion llamamos a la función getTimeAJAX cada segundo para actualizar el div que mostrará la hora
      setInterval(getTimeAJAX,500);
  </script>