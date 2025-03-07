<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imagen = $_POST['imagen'];
    
    // Verificar si el archivo existe antes de intentar eliminarlo
    if (file_exists($imagen)) {
        if (unlink($imagen)) {
            echo "La imagen se ha eliminado correctamente.";
        } else {
            echo "Hubo un error al intentar eliminar la imagen.";
        }
    } else {
        echo "La imagen no existe.";
    }
    
    // Redirigir de vuelta a la página de ver fotos
    header("Location: ver-fotos.php");
    exit();
}
?>