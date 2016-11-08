<?php
        ####################################################################################################
        # Veo el registro id completo formateado
        #################################################################################################### 

        $link = mysqli_connect("localhost","root","root","BDCandidatos");
        if (mysqli_connect_errno()) {
            die("Error al conectar: ".mysqli_connect_error());
        }

        $id=$_GET["id"];

        $result = mysqli_query($link, "SELECT * FROM BDAltas where id = $id"); //Método para ver registro

        # Busco el registro
        while ($registro = mysqli_fetch_array($result)){  
        echo "  
            <tr>  
              <td width='150'>".$registro['id']."</td><br>  
              <td width='150'>".$registro['nombre']."</td><br>  
              <td width='150'>".$registro['foto']."</td><br>
              <td width='150'>".$registro['curriculum']."</td><br>
              <td width='150'></td>  

            </tr>  
        ";  
        }  

        # Libero la memoria asociada a result y cierro base de datos
        mysqli_free_result($result);
        mysqli_close($link);


        ####################################################################################################
        # Volver apantalla inicial
        #################################################################################################### 

        $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
        echo "<a href='$url'>Volver</a>";

?>

