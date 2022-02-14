$(document).ready(function(){
	if ($('#body').not(':empty')){
		
	
$('#inicio').on('click', function(){

	$('#body').load('menu.html');
});
$('#areas').on('click', function(){

	$('#body').load('ver_area_departamento.php');
});
}
	else {
$('#body').load('menu.html');
}
});