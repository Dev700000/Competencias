<?php
    session_start();
        if (isset($_SESSION['correo']) and $_SESSION['tipo_usuario']=='Administrador') {
          
        } else {
          header("Location: ../cerrar_sesion.php");
        }
        $id_company =$_SESSION['id_company'];
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../librerias/bootstrap/bootstrap/css/bootstrap.min.css">
      <link rel="shortcut icon" href="../img/favicon1.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/EstilosMenu.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <script src="../librerias/jquery/jquery-3.1.1.min.js"></script>
	<title>Competencias</title>
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
  <?php include "header.php";  ?>
  <center>
  <h1>Competencias</h1>
  <?php
include '../conexion.php';
$consulta = mysqli_query ($conn,"SELECT * FROM encuestas WHERE id_company='$id_company'")
or die ("error al actualizar los datos");


  while($datos = mysqli_fetch_assoc($consulta))
  {
   /* echo "<ul>";
    echo "<li>";
    echo "<a href='vista_previa2.php?id_encuesta=".$datos['id_encuesta']."&titulo=".$datos['titulo']."'>".$datos['titulo']."</a>";
    echo"<br>";
    echo "</li>";
    echo "</ul>";   */
  
   if($datos['estado']=='desactivado'){
?>

<div class="list-group col-md-8">

  <a href="vista_previa3.php?id_encuesta=<?php echo $datos['id_encuesta'];?>&titulo=<?php echo $datos['titulo']?>" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between ">
      <h5 class="mb-1 "><?php echo $datos['titulo'];?></h5>
      <small><?php echo $datos['fecha_inicial'];?></small>
    </div>
    <small class="mb-1"><?php echo $datos['descripcion'];?></small>
  </a>
 
</div>
<!--<a  href="pdf/reporte_general_competencias.php" ><button class="btn btn-dark boton">Generar reporte </button></a>-->
<?php
}else {
  ?>
<div class="list-group col-md-8">

  <a href="vista_previa3.php?id_encuesta=<?php echo $datos['id_encuesta'];?>&titulo=<?php echo $datos['titulo']?>" class="list-group-item list-group-item-action ">
    <div class="d-flex w-100 justify-content-between ">
      <h5 class="mb-1 "><?php echo $datos['titulo'];?>   </h5>
      <small><?php echo $datos['fecha_inicial'];?></small>
    </div>
    <small class="mb-1"><?php echo $datos['descripcion'];?></small>
  </a>
 
</div>
<?php
} 
}
?>
<br>
</center>
<?php include "footer.php";  ?>
</div>

<script src="../js/mostrar_menu.js"></script>
<script src="../js/js.js"></script>
</body>
</html>