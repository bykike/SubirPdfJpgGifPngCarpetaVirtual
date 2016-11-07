<?php
        ####################################################################################################
        # Veo el registro id completo formateado
        #################################################################################################### 

        $link = mysqli_connect("localhost","root","root","BDCandidatos");
        if (mysqli_connect_errno()) {
            die("Error al conectar: ".mysqli_connect_error());
        }

        $id=$_GET["id"];
        mysqli_query("select from BDAltas where id = $id"); //Método para ver

        // Aquí vemos el registro formateado.

?>
