<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Subir imágenes/pdf/doc al servidor en carpeta virtual</title>
</head>
 
<body>

    <!-- ###################################################################################################
    # Formulario desde donde hago la selección de los archivos.
    #################################################################################################### -->
    
    
    <form enctype="multipart/form-data" action="SubirArchivoscarpetaVirtual.php" method="POST">
        <p>Escriba nombre: </p>
        <input name="elnombre" type="text"><br><br>
        <p>Suba la foto JPG</p>
        <input name="uploadedfileJPG" type="file">
         <p>Suba el documento enPDF</p>
        <input name="uploadedfilePDFDOC" type="file"><br><br>
        <input type="submit" value="Subir archivos">
    </form> 
    
</body>
</html>