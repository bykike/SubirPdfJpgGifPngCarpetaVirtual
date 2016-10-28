<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Subir varias imagenes/pdf al servidor en carpeta virtual</title>
</head>
 
<body>

    
    <?php
        ################################################################
        # Definimos la carpeta destino fotos
        ################################################################

        $carpetaDestino="fotos/";

        # Si hay algun archivo_foto que subir
        if($_FILES["archivo_foto"]["name"][0])
        {

            # Recorremos todos los arhivos que se han subido
            for($i=0;$i<count($_FILES["archivo_foto"]["name"]);$i++)
            {

                # Si es un formato de imagen o pdf
                if($_FILES["archivo_foto"]["type"][$i]=="application/pdf" || $_FILES["archivo_foto"]["type"][$i]=="image/jpeg" || $_FILES["archivo_foto"]["type"][$i]=="image/pjpeg" || $_FILES["archivo_foto"]["type"][$i]=="image/gif" || $_FILES["archivo_foto"]["type"][$i]=="image/png")
                {

                    # Si exite la carpeta o se ha creado
                    if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                    {
                        $origen=$_FILES["archivo_foto"]["tmp_name"][$i];
                        $destino=$carpetaDestino.$_FILES["archivo_foto"]["name"][$i];

                        # Movemos el archivo_foto
                        if(@move_uploaded_file($origen, $destino))
                        {
                            echo "<br>".$_FILES["archivo_foto"]["name"][$i]." movido correctamente";
                        }else{
                            echo "<br>No se ha podido mover el archivo_foto: ".$_FILES["archivo_foto"]["name"][$i];
                        }
                    }else{
                        echo "<br>No se ha podido crear la carpeta: up/".$user;
                    }
                }else{
                    echo "<br>".$_FILES["archivo_foto"]["name"][$i]." - NO es imagen jpg";
                }
            }
        }else{
            echo "<br>No se ha subido ninguna imagen";
        }

        ################################################################
        # Definimos la carpeta destino curriculums
        ################################################################

        $carpetaDestino="curriculums/";

        # Si hay algun archivo_cv que subir
        if($_FILES["archivo_cv"]["name"][0])
        {

            # Recorremos todos los arhivos que se han subido
            for($i=0;$i<count($_FILES["archivo_cv"]["name"]);$i++)
            {

                # Si es un formato de imagen o pdf
                if($_FILES["archivo_cv"]["type"][$i]=="application/pdf" || $_FILES["archivo_cv"]["type"][$i]=="image/jpeg" || $_FILES["archivo_cv"]["type"][$i]=="image/pjpeg" || $_FILES["archivo_cv"]["type"][$i]=="image/gif" || $_FILES["archivo_cv"]["type"][$i]=="image/png")
                {

                    # Si exite la carpeta o se ha creado
                    if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                    {
                        $origen=$_FILES["archivo_cv"]["tmp_name"][$i];
                        $destino=$carpetaDestino.$_FILES["archivo_cv"]["name"][$i];

                        # Movemos el archivo_cv
                        if(@move_uploaded_file($origen, $destino))
                        {
                            echo "<br>".$_FILES["archivo_cv"]["name"][$i]." movido correctamente";
                        }else{
                            echo "<br>No se ha podido mover el archivo_cv: ".$_FILES["archivo_cv"]["name"][$i];
                        }
                    }else{
                        echo "<br>No se ha podido crear la carpeta: up/".$user;
                    }
                }else{
                    echo "<br>".$_FILES["archivo_cv"]["name"][$i]." - NO es imagen jpg";
                }
            }
        }else{
            echo "<br>No se ha subido ninguna imagen";
        }


    ?>


    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data" name="inscripcion">
        <p>Suba el foto</p>
        <input type="file" name="archivo_foto[]" multiple="multiple">
        <br>
        <br>
        <p>Suba el cv</p>
        <input type="file" name="archivo_cv[]" multiple="multiple">
        <br>
        <br>         
        <input type="submit" value="Enviar"  class="trig">
    </form>
    
</body>
</html>