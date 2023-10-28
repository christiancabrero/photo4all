$(document).ready(function(){
	$('input[type=file]').on('change', function(e){ 
		if (e.target.files[0]) {
      
      	$('main').append('<ul class="seleccion"><p>Fotos seleccionadas:</p></ul>');
      
     	for(var i=0;i<e.target.files.length;i++){
      		$('ul').append('<li>'+e.target.files[i].name+'</li>');
      	}
      };
    
	});

	$('input[type=submit]').on('click', function(e){
    	$('ul.seleccion').html('<img src="loading.gif" width:"10px"/>');
    });


});