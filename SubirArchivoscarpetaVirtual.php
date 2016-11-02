<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Subir imágenes/pdf/doc al servidor en carpeta virtual</title>
</head>
 
<body>

    
    <?php
    
        ################################################################
        # Definimos carpeta destino para fotos, pdfs y docs
        ################################################################


        $uploadedfileImageload="true";
        $uploadedfile_size=$_FILES['uploadedfile'][size];
    
    
        echo $_FILES[uploadedfile][name];
        if ($_FILES[uploadedfile][size]>10000000) /* Equivale a 1MB */
        {$msg=$msg."El archivo es mayor de 1MB, debes reduzcirlo antes de subirlo<BR>";
        $uploadedfileload="false";}

        if (!($_FILES[uploadedfile][type] =="image/jpeg" OR 
              $_FILES[uploadedfile][type] =="image/gif" OR                   
              $_FILES[uploadedfile][type] =="image/png" OR 
              $_FILES[uploadedfile][type] =="application/pdf" OR               
              $_FILES[uploadedfile][type] =="application/msword"))
                {
                    $msg=$msg." Tu archivo tiene que ser JPG o GIF o PDF. Otros archivos no son permitidos<BR>";
                    $uploadedfileload="false";
                }

        $file_name=$_FILES[uploadedfile][name];
        $add="imagen/$file_name";
        if($uploadedfileload=="true"){

            if(move_uploaded_file ($_FILES[uploadedfile][tmp_name], $add)){
            echo " Ha sido subido satisfactoriamente la imagen XXXX al directorio XXXX ";
            }else{echo "Error al subir la imagen XXXX";}

        }else{echo $msg;}



    ?>


    <form enctype="multipart/form-data" action="" method="POST">
        <p>Suba Imagen JPG</p>
        <input name="uploadedfile" type="file">
         <p>Suba documento PDF</p>
        <input name="uploadedfilePDF" type="file">
        <input type="submit" value="Subir archivos">
    </form> 
    
</body>
</html>