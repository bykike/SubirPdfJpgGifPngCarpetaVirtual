<?php
    
        ####################################################################################################
        # Defino carpeta destino para fotos, pdfs y docs y compruebo tanto el tamaño como la extensión
        ####################################################################################################


        $uploadedfileJPGload="true";
        $uploadedfileJPG_size=$_FILES['uploadedfileJPG'][size];
    
        $uploadedfilePDFDOCload="true";
        $uploadedfilePDFDOC_size=$_FILES['uploadedfilePDFDOC'][size];
    
    
        # Compruebo el tamaño para la imagen seleccionada para JPG
    
        // echo $_FILES[uploadedfileJPG][name];
        if ($_FILES[uploadedfileJPG][size] > 1000000) /* Equivale a 500000 equivale a 500Kb */
            {
            $msg=$msg."El archivo es mayor de 1MB, debes reduzcirlo antes de subirlo.<br>"; 
            $uploadedfileJPGload="false";
            echo $msg;
            }

        # Compruebo el tipo de archivo seleccionado sea JPG
    
        if (!($_FILES[uploadedfileJPG][type] =="image/jpeg"))
                {
                    $msg=$msg." Tu archivo tiene que ser JPG. Otros archivos no son permitidos.<br>";
                    $uploadedfileJPGload="false";
                }
    
    
        # Compruebo el tamaño para el documento seleccionado del PDF o DOC
    
        // echo $_FILES[uploadedfilePDFDOC][name];
        if ($_FILES[uploadedfilePDFDOC][size] > 1000000) /* Equivale a 500000 equivale a 500Kb */
            {
            $msg = $msg."El archivo es mayor de 1MB, debes reduzcirlo antes de subirlo.<br>";
            $uploadedfilePDFDOCload="false";
            echo $msg;
            }

        # Compruebo el tipo de archivo seleccionado sea JPG
    
        if (!($_FILES[uploadedfilePDFDOC][type] =="application/pdf" OR               
              $_FILES[uploadedfilePDFDOC][type] =="application/msword"))
                {
                    $msg = $msg." Tu archivo tiene que ser PDF o DOC. Otros archivos no son permitidos.<br>";
                    $uploadedfilePDFDOCload="false";
                }
    
    
    
        ####################################################################################################
        # Subo los archivos a la carpeta /fotos y /curriculums 
        ####################################################################################################    
    

        $file_nameJPG=$_FILES[uploadedfileJPG][name];
        $addJPG="fotos/$file_nameJPG";
    
        if($uploadedfileJPGload=="true")
            {
            
            // Chequeo si el archivo existe y si es así lo renombro
            if (file_exists($addJPG)) 
                {
                
                echo "Anda!!! El archivo existe";
                
                $extension = ".jpg";
                $nombrefichero = time();
                
                $addJPG = "fotos/" . $nombrefichero . $extension;
                
            }

            if(move_uploaded_file ($_FILES[uploadedfileJPG][tmp_name], $addJPG))
                {
                    echo " Ha sido subida satisfactoriamente la imagen al directorio $addJPG. <br>";
                }else{
                      echo "Error al subir la imagen $addJPG al directorio.<br>";
                     }

            }else{
                  //echo $msg;
                 }


        $file_namePDFDOC=$_FILES[uploadedfilePDFDOC][name];
        $addPDFDOC="curriculums/$file_namePDFDOC";

        if($uploadedfilePDFDOCload=="true")
            {
            
            // Chequeo si el archivo existe y si es así lo renombro
            
            if (file_exists($addPDFDOC)) 
                {
                
                echo "Anda!!! El archivo PDF o doc existe $file_namePDFDOC / $addPDFDOC /   ";
                
                // Chequeo qué extensión tiene 
               
                if(end( explode('.', $file_namePDFDOC) ) == "pdf") // Aquí sólo coge hasta el punto por lo que no lo contempla
                    {
                    $extension = ".pdf";
                    }
                if(end( explode('.', $file_namePDFDOC) ) == "doc")
                    {
                    $extension = ".doc";
                    }
                
                var_dump($extension); ////////////////////////////////
                
                $nombrefichero = time();
                
                $addPDFDOC = "curriculums/" . $nombrefichero . $extension;
                
                var_dump($addPDFDOC); ////////////////////////////////

                }
            

            if(move_uploaded_file ($_FILES[uploadedfilePDFDOC][tmp_name], $addPDFDOC))
                {
                    echo " Ha sido subido satisfactoriamente el documento al directorio $addPDFDOC.<br>";
                }else{
                      echo "Error al subir el PDF/Doc $addPDFDOC al directorio.<br>";
                     }

            }else{
                  //echo $msgPDFDOC;
                 } 

        ####################################################################################################
        # Volver al formulario
        #################################################################################################### 

        $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
        echo "<a href='$url'>Volver</a>";
    
?>
