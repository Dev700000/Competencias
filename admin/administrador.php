<?php
include_once'../presentacion.php';

  if(isset($_SESSION['correo']) and $_SESSION['tipo_usuario']=='Administrador')
  {
          
   } else {
          header("Location: ../cerrar_sesion.php");
   }
?>
<!DOCTYPE html>
<html>
<head> 
<style type="text/css">
	.centrado{
		text-align: center;
	}
</style>
    <link rel="shortcut icon" href="../img/favicon1.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../librerias/bootstrap/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/EstilosMenu.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<script src="../librerias/jquery/jquery-3.1.1.min.js"></script>
	<style type="text/css">
	.textocentrado{
		text-align: center;
	}

</style>
<style type="text/css">
     .lol{
     	/* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#5ee5c5+0,b4df5b+100 */
background: #5ee5c5; /* Old browsers */
background: -moz-linear-gradient(top,  #5ee5c5 0%, #b4df5b 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top,  #5ee5c5 0%,#b4df5b 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom,  #5ee5c5 0%,#b4df5b 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#5ee5c5', endColorstr='#b4df5b',GradientType=0 ); /* IE6-9 */


     }
	.espacio
	{
		margin-top: 10px;
		text-align: center;
	}

</style>

	<title>S.E.Administrador</title>
</head>

<body>	
	<div id="icono" ></div>
	

<nav class="contenedor "><center><p style="color:black;" >BIENVENIDO ADMINISTRADOR </p></center>

<ul class="menu">
	
	<li id="inicio" class="border border-light" ><span class="fas fa-home icono izquierda" style="font-size: 18px; margin-right: 5px;"></span><a class="centrado" href="administrador.php" >Inicio</a></li> 

	<li id="areas" class="border border-light"><span style="font-size: 18px;margin-right: 5px;" class="fas fa-users icono izquierda"></span><a  href="ver_area_departamento.php">Areas y departamentos.</a>
	</li>
		

	<li class="border border-light"><span class="fas fa-list-ul icono izquierda" style="font-size: 18px; margin-right: 5px;" ></span>Administración de competencias. <span class="icono derecha fa fa-chevron-down"></span>
	<ul>
	
		<li id="VerCompetencia" class="border-bottom border-dark"><a href="agregar_preguntas.php">Ver competencias.</a></li>
		<li id="Vista" class="border-bottom border-dark"><a href="vista_previa.php">Vista previa.</a></li>
	</ul></li>
	<li class="border border-light"><i style="font-size: 18px; margin-right: 5px;" class="fas fa-chart-bar icono izquierda"></i>Verificación de resultados. <i class="icono derecha fa fa-chevron-down"></i>
	<ul>
		<li class="border-bottom border-dark"><a href="../resultados/resultado_area.php">Áreas.</a></li>
		<li class="border-bottom border-dark"><a href="../resultados/resultado_departamento.php">Departamentos.</a></li>
		<li class="border-bottom border-dark"><a href="../resultados/resultado_trabajador.php">Individual.</a></li>
		<li class="border-bottom border-dark"><a href="../resultados/resultado_competencia.php">Competencias.</a></li>
		<li class="border-bottom border-dark"><a href="../grafica/barras_general.php">General.</a></li>
		
</ul></li>
	<li class="border border-light"><a href="administracion_contra.php"><i style="font-size: 18px; margin-right: 5px;" class="fas fa-users-cog icono izquierda"></i>Administración de usuarios.</a>
	</li>
<li id="menu" class="border border-light" ><a href="eliminar_todos_los_resultados.php"><i style="font-size: 18px; margin-right: 5px;" class="far fa-trash-alt icono izquierda"></i>Eliminación de resultados.</a>
	</li>
	</ul>
<center><a href="../cerrar_sesion.php" ><button class="btn btn-dark boton border border-primary">Cerrar sesión</button></a>
<!--<div>
<footer>Everlever´s creations</footer></div>-->
</center>
</nav>
<div id="body" class="cuerpo">
	<div  >

	
<?php 

include "header.php";

?>
	
<h3>BIENVENIDO AL SISTEMA DE EVALUACIÓN.</h3>
<h4>MANUAL DE USUARIO.</h4>
<p>Todo lo que necesitas saber sobre este sistema.</p>
<a target="_blank" href="manual_de_usuario.php"><button class="btn btn-success" style="margin-bottom: 50px;">Ver manual.</button></a>

<?php 

include "footer.php";

?>

	

</div>
<script src="../js/mostrar_menu.js"></script>
<script src="../js/js.js"></script>
</body>
</html>