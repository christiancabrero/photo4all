<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=12.0, minimum-scale=.25, user-scalable=yes">
    <title>Foto Foral - Resultado</title>
    <meta name="description" content="Comparte fotos con PHP">
	<meta name="keywords" content="HTML, CSS, jQuery, PHP, Photo, Photo Share">
  	<meta name="author" content="Christian Cabrero">
    <link rel="icon" type="image/x-icon" href="favicon.png">
	<link rel="stylesheet" href="estilos.css">
    <script src="jquery-3.7.1.min.js"></script>
</head>
<body>
<header><a class="activo" href="index.php">Compartir  fotos</a><a href="ver-fotos.php">Ver  fotos</a></header>

<?php
    $currentDirectory = getcwd();
    $uploadDirectory = "/uploads/";
    $errors = []; // Store errors here

	// Count # of uploaded files in array
	$total_files = '';
	$total_size = 0;
    $total_types = array();
	
    $allowed_types = array('jpeg','JPEG','jpg','JPG','png','PNG','raw','RAW','heic','HEIC','webp','WEBP','gif','GIF');
    $error_type = false;
    
 echo '<main class="resultado"><div class="resultado-post">';
 
    if(isset($_POST['submit'])) {
    	
		define('KB', 1024);
        define('MB', 1048576);
        define('GB', 1073741824);
        define('TB', 1099511627776);

        $files = array_filter($_FILES['the_file']['name']); 
        $total_count = count($_FILES['the_file']['name']);

        for( $i=0 ; $i < $total_count ; $i++ ) {
        $total_size = $total_size + $_FILES['the_file']['size'][$i];

        $filename = $_FILES['the_file']['name'][$i];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!in_array($ext, $allowed_types)) {
                $error_type = true;
            }

        }

		if($total_size > 2*GB){
        	$errors[] = "<p>Los archivos son mayores de 2GB.</p><p>Comprime las fotos o sube menos fotos a la vez antes de intentar subirlas de nuevo.</p>";
			foreach ($errors as $error) {
            	echo $error.'<p>Debido al error no se ha subido ningún archivo.</p><a class="btn blue" href="index.php">Volver</a>';
            }
		} else if ($error_type){
			$errors[] = "<p>La extensión del archivo no está permitida.</p><p>Asegurate de que sea <b>.jpg</b>, <b>.jpeg</b>, <b>.png</b> ó <b>.raw</b></p>";
            foreach ($errors as $error) {
            	echo $error.'<p>Debido al error no se ha subido ningún archivo.</p><a class="btn blue" href="index.php">Volver</a>';
            }
      	} else if (empty($errors)){
          	//echo ('<p>Imágenes subidas correctamente.</p>');
            
            // Loop through each file
            for( $i=0; $i<$total_count; $i++){

            $fileName = $_FILES['the_file']['name'][$i];
    		$tmp = $_FILES['the_file']['tmp_name'][$i];

    // set the filename as the basename + extension
    $upload_path = $currentDirectory . $uploadDirectory . basename($fileName); 

    // move the file to the upload dir
    $success = move_uploaded_file($tmp, $upload_path);

                    //Upload the file into the temp dir
                    if( $success ){
                    	$error_subida = false;
                        echo $fileName.'<p>subida correctamente.</p>';
                        
                    } else{
                    	$error_subida = true;
                    	echo '<p>La subida de imagenes falló.</p><a class="btn blue" href="index.php">Volver</a>';
                    }


            }//fin contador fotos
            
            if(!$error_subida){
            	echo '<p><b>Todas las fotos se han subido correctamente.</b></p><a class="btn blue" href="ver-fotos.php">Ver fotos</a>';
            }
            
        }//Fin ejecución sin errores

        echo '</div></main>';
        include 'footer.php';
        echo '</body></html>';

    } else{
        echo '<p>Ha ocurrido un error con la subida.</p><p>Contacta con el administrador</p></div></main>';
        include 'footer.php';
        echo '</body></html>';
    }
?>
