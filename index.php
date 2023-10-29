<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=12.0, minimum-scale=.25, user-scalable=yes">
        <title>photo4all - Compartir</title>
        <meta name="description" content="Comparte fotos con PHP">
		<meta name="keywords" content="HTML, CSS, jQuery, PHP, Photo, Photo Share">
  		<meta name="author" content="Christian Cabrero">
        <link rel="icon" type="image/x-icon" href="favicon.png">
        <link rel="stylesheet" href="estilos.css">
        <script src="jquery-3.7.1.min.js"></script>
    </head>
    <body>
    <header><a class="activo" href="index.php">Compartir  fotos</a><a href="ver-fotos.php">Ver  fotos</a></header>
    <main>
    <form action="post-fotos.php" method="post" enctype="multipart/form-data">
        <div class="drag-drop-box">
        <input style="z-index: 999; opacity: 0; height: 200px; position: absolute; right: 0px; left: 0px; margin-right: auto; margin-left: auto;" id="fileToUpload" multiple="multiple" name="the_file[]" type="file">
        <div class="drag-drop"><div class="input-inner"><div class="input-icon"><i class="fa fa-file-image-o"></i></div><div class="input-text"><h3>Arrastra aquí las fotos que quieras compartir</h3>
        <span style="display:inline-block; margin: 15px 0"><p>ó</p></span>
        </div><a class="btn blue">Seleccionalas</a></div>
        <p>(máximo 2GB) Formatos admitidos: JPG, JPEG, PNG, RAW y HEIC</p>
        </div>
        </div>
        <input class="btn blue" type="submit" name="submit" value="Compartir fotos">
    </form>
    </main>
    <?php include 'footer.php'; ?>
    </body>
    <script src="seleccion-imagenes.js"></script>
</html>
