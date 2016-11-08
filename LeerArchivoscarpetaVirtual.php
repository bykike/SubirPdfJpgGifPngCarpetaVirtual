<?php

        ####################################################################################################
        # Leo todo lo que hay en la base de datos MySql
        #################################################################################################### 

        $link = mysqli_connect("localhost","root","root","BDCandidatos");
        if (mysqli_connect_errno()) {
            die("Error al conectar: ".mysqli_connect_error());
        }
        
        $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
        $result = mysqli_query($link, "SELECT * FROM BDAltas");


        while (($fila = mysqli_fetch_array($result))!=NULL){

           printf("<tr> 
           <td>&nbsp;%s</td>
           <td>&nbsp;%s</td>
           <td>&nbsp;%s</td>
           <td><a href=\"VerRegistro.php?id=%d\">Ver</a></td>
           </tr><br><br>", 
           $fila['nombre'],$fila['foto'],$fila['curriculum'],$fila['id']);
            
        }

        # Libero la memoria asociada a result y cierro base de datos
        mysqli_free_result($result);
        mysqli_close($link);

?>

