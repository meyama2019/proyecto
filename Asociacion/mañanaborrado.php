<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"> 

<html> 
<head> 
    <title>Uso del Objeto Confirm</title> 
    <script language="JavaScript1.2" type="text/javascript"> 
        function eliminar () 
        { 
            var statusConfirm = confirm("¿Realmente desea eliminar esto?"); 
            if (statusConfirm == true) 
            { 
                alert ("Eliminas"); 
            } 
            else 
            { 
                alert("Haces otra cosa"); 
            } 
        } 
    </script> 
</head> 

<body> 
<a href="javascript:eliminar()">Eliminar Esto</a> 


</body> 
</html>  