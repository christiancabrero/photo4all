$(document).ready(function(){

	console.log('jQuery 3.7.1 cargado');
	
	// Crea el contenedor lightbox (en capa superior pero oculto por CSS)
	$('main').prepend('<div class="lightbox"><div><p>Toca o haz click para cerrar.</p><span></span></div></div>');
	
	// Cuando clicaos en un enlace de la galería muestra el div del ligthbox anteriormente inyectado, rescata la url de la imagen clicada y la inyecta dentro del ligthbox.
	$('main img').click(function(evt) {
		evt.preventDefault();
		$('.lightbox').show();
		var url_imagen = $(this).attr('src');
    	var url_imagen_con_espacios = encodeURI(url_imagen); //Replace space fills with %20
		$('.lightbox span').css('background-image','url('+url_imagen_con_espacios+')');

	});
	
	// Al clicar en cualquier parte del lightbox mostrado en capa superior, lo oculta de nuevo.
	$('.lightbox').click(function(evt) {
		evt.preventDefault();
		$(this).hide();
	});
	
	
}); 
