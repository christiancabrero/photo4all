<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=.25, user-scalable=yes">
		<title>photo4all - Ver fotos</title>
		<meta name="description" content="Comparte fotos con PHP">
		<meta name="keywords" content="HTML, CSS, jQuery, PHP, Photo, Photo Share">
  		<meta name="author" content="Christian Cabrero">
        <link rel="icon" type="image/x-icon" href="favicon.png">
		<link rel="stylesheet" href="estilos.css">
		<script src="jquery-3.7.1.min.js"></script>
		<script src="lightbox.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-74LTNE7BYM"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-74LTNE7BYM');
</script>
	</head>
	<body>
		<header><a href="index.php">Compartir  fotos</a><a class="activo" href="ver-fotos.php">Ver  fotos</a></header>
		<main class="galeria">
        <?php
$directory = "uploads";
$images = glob($directory . "/*");
if(empty($images)){
    echo '<p>No se ha compartido ninguna foto todavía.</p>';
} else if(!empty($images)){
    echo '<div class="grid">';
    foreach($images as $image){
        echo '<div class="image-container">';
        echo '<img src="'.$image.'" width="300px">';
        echo '<form action="eliminar-foto.php" method="POST" class="delete-form">';
        echo '<input type="hidden" name="imagen" value="'.$image.'">';
        echo '<button type="submit" class="delete-btn"><i class="fas fa-trash"></i></button>';
        echo '</form>';
        echo '</div>';
    }
    echo '</div><div><a class="btn blue" href="descargar-fotos.php">Descargar todas</a></div>';
}
?>
		</main>
		<?php include './footer.php'; ?>
	</body>
</html>
