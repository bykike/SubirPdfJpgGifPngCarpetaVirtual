<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Subir imágenes/pdf/doc al servidor en carpeta virtual</title>
</head>
 
<body>

    
    <?php
    
        ####################################################################################################
        # Definimos carpeta destino para fotos, pdfs y docs y comprobamos tanto el tamaño como la extensión
        ####################################################################################################


        $uploadedfileJPGload="true";
        $uploadedfileJPG_size=$_FILES['uploadedfileJPG'][size];
    
        $uploadedfilePDFDOCload="true";
        $uploadedfilePDFDOC_size=$_FILES['uploadedfilePDFDOC'][size];
    
    
        # Comprobamos el tamaño para la imagen seleccionada para JPG
    
        echo $_FILES[uploadedfileJPG][name];
        if ($_FILES[uploadedfileJPG][size]>10000000) /* Equivale a 1MB */
            {
            $msg=$msg."El archivo es mayor de 1MB, debes reduzcirlo antes de subirlo<BR>";
            $uploadedfileload="false";
            }

        # Comprobamos el tipo de archivo seleccionado sea JPG
    
        if (!($_FILES[uploadedfileJPG][type] =="image/jpeg" OR 
              $_FILES[uploadedfileJPG][type] =="image/gif" OR                   
              $_FILES[uploadedfileJPG][type] =="image/png" OR 
              
              $_FILES[uploadedfilePDFDOC][type] =="application/pdf" OR               
              $_FILES[uploadedfilePDFDOC][type] =="application/msword"))
                {
                    $msg=$msg." Tu archivo tiene que ser JPG o GIF o PDF. Otros archivos no son permitidos<BR>";
                    $uploadedfileload="false";
                }
    
    
        # Comprobamos el tamaño para el documento seleccionado del PDF o DOC
    
        echo $_FILES[uploadedfilePDFDOC][name];
        if ($_FILES[uploadedfilePDFDOC][size]>10000000) /* Equivale a 1MB */
            {
            $msg=$msg."El archivo es mayor de 1MB, debes reduzcirlo antes de subirlo<BR>";
            $uploadedfilePDFDOCload="false";
            }

        # Comprobamos el tipo de archivo seleccionado sea JPG
    
        if (!($_FILES[uploadedfilePDFDOC][type] =="application/pdf" OR               
              $_FILES[uploadedfilePDFDOC][type] =="application/msword"))
                {
                    $msg=$msg." Tu archivo tiene que ser PDF o DOC. Otros archivos no son permitidos<BR>";
                    $uploadedfilePDFDOCload="false";
                }
    
    
    
        ####################################################################################################
        # Subimos los archivos a la carpeta /fotos y /curriculums 
        ####################################################################################################    
    

        $file_name=$_FILES[uploadedfileJPG][name];
        $add="fotos/$file_name";
        if($uploadedfileJPGload=="true")
            {

            if(move_uploaded_file ($_FILES[uploadedfileJPG][tmp_name], $add))
                {
                    echo " Ha sido subido satisfactoriamente la imagen $add al directorio ";
                }else{
                      echo "Error al subir la imagen $add a la carpeta.";
                     }

            }else{
                  echo $msg;
                 }


        $file_namePDFDOC=$_FILES[uploadedfilePDFDOC][name];
        $addPDFDOC="curriculums/$file_namePDFDOC";
        if($uploadedfilePDFDOCload=="true")
            {

            if(move_uploaded_file ($_FILES[uploadedfilePDFDOC][tmp_name], $addPDFDOC))
                {
                    echo " Ha sido subido satisfactoriamente el documento $addPDFDOC al directorio ";
                }else{
                      echo "Error al subir la imagen $addPDFDOC a la carpeta.";
                     }

            }else{
                  echo $msgPDFDOC;
                 }   
    
    
    

    ?>


    <form enctype="multipart/form-data" action="" method="POST">
        <p>Suba Imagen JPG</p>
        <input name="uploadedfileJPG" type="file">
         <p>Suba documento PDF</p>
        <input name="uploadedfilePDFDOC" type="file">
        <input type="submit" value="Subir archivos">
    </form> 
    
</body>
</html>