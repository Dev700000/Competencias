 <?php
	  session_start();
        if (isset($_SESSION['correo']) and $_SESSION['tipo_usuario']=='Administrador') {
          
        } else {
          header("Location: ../cerrar_sesion.php");
        }
        include '../conexion.php';
$consulta = mysqli_query ($conn,"SELECT * FROM areas ")
or die ("error al actualizar los datos area");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../img/favicon1.png"><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/EstilosMenu.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<script src="../librerias/jquery/jquery-3.1.1.min.js"></script>

	<title>Usuarios</title>
</head>
<body>
	<div id="icono"></div>
<nav class="contenedor ocultar "><center><p >BIENVENIDO ADMINISTRADOR </p></center>

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
	

<center><a href="../cerrar_sesion.php" ><button class="btn btn-dark boton border border-light">Cerrar sesión</button></a>

<!--<div>
<footer>Everlever´s creations</footer></div>-->
</center>


</nav>
<div id="body" class="cuerpo">
		<?php 

include "header.php";

?>
	<center><h1>Administración de usuarios</h1></center>

	<!--<div class="form-group col-md-5"> Buscar usuario
			<input class="form-control border border-success" type="text" name="caja_busqueda" id="caja_busqueda" placeholder="Indroduce el Nombre,Area o Departamento">
		</div>-->
		<button id='btnGroupDrop1' type='button' class='btn btn-primary dropdown-toggle float-right' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
     +Nuevo usuario
    </button>
    <div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>
     <a class='dropdown-item' href='registro_administrador.php'>Evaluador</a>
      <a class='dropdown-item' href='registro_usuario.php'>Subordinado</a>
      </div> 
		
				<div id="mostrar">
			
		</div>

</div>
<!-- Modal EEEEEEEELIMINARRRRRRRR-->
<div class="modal fade" id="modaleliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <center><h5 class="modal-title" id="exampleModalScrollableTitle">Eliminar competencia</h5></center> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>  
      <form action="eliminar_encuesta.php" method="POST">
      <div class="modal-body">
    <input type="hidden" name="ideliminar" id="ideliminar">
       
        <h5>¿Estas seguro de eliminar los datos?</h5> 
      
        
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary">Si</button>
      </div> 
    </div> </form>
  </div>
</div>
	

		<script src="../js/mostrar_menu.js"></script>
         <script src="../js/js.js"></script>
		<script src="../js/main.js"></script>

<!--Funciones para abrir el modal de eliminación -->




</body>
</html>