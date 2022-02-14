$(document).ready(function(){
	
	$.ajax({
		
		url: 'cargar_areas.php',
		type: 'html',

		
	})
	.done(function(listas_rep){
      $('#area').html(listas_rep)

	})
	.fail(function(){
		alert('Hubo un error al cargar las listas_rep')
	})
})