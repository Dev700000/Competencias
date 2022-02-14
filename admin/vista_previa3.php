<?php
    session_start();
        if (isset($_SESSION['correo']) and $_SESSION['tipo_usuario']=='Administrador') {
          
        } else {
          header("Location: ../cerrar_sesion.php");
        }
        include'../conexion.php';

        $id_encuesta= $_GET['id_encuesta'];
        $titulo = $_GET['titulo'];
        //$id_jefes =$_GET['id_jefes'];
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
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border:none;border-color:#9ABAD9;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#9ABAD9;color:#444;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#9ABAD9;color:#fff;}
.tg .tg-3e6p{background-color: #d2e4fc; font-size:20px;font-family:Arial, Helvetica, sans-serif !important;;color:#000000;border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-k0ei{font-size:20px;font-family:Arial, Helvetica, sans-serif !important;;color:#000000;border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-f3ey{font-size:20px;font-family:Arial, Helvetica, sans-serif !important;;color:#000000;border-color:inherit;text-align:left;vertical-align:top}
.rad{width:20px; height: 20px; }
</style>

<body><div id="icono"></div>
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
  <h2><?php echo $titulo ;?></h2>
 
  <?php
include '../conexion.php';
$d ="1";
$consulta = mysqli_query ($conn,"SELECT * FROM preguntas WHERE id_enc = '$id_encuesta' AND estado = 'activado'")
or die ("error al actualizar los datos");

$i =1;
?>

<form action="../pdf/index.php" method="post">
   <input type="hidden" name="id_encuesta" id="id_encuesta" value="<?php echo $id_encuesta; ?>">

<table class="tg table table-striped table-hover ">
  <tr>
    <th class="tg-3e6p"></th>
    <th class="tg-3e6p">Muy<br> productivo</th>
    <th class="tg-3e6p">Productivo</th>
    <th class="tg-3e6p">Regular</th>
    <th class="tg-3e6p">Poco<br> productivo</th>
    <th class="tg-3e6p">Nada<br> productivo</th>
  </tr>
<?php
  while($datos = mysqli_fetch_assoc($consulta))
  {  ?>
  <tr>
    <td class="tg-f3ey"><h6><?php echo  $i.": ".$datos['pregunta']?></h6></td>
    <td class="tg-f3ey"><center><input class="rad" type="radio" name="<?php echo $datos['id_pregunta'] ?>"></center></td>
    <td class="tg-f3ey"><center><input class="rad" type="radio" name="<?php echo $datos['id_pregunta'] ?>"></center></td>
    <td class="tg-f3ey"><center><input class="rad" type="radio" name="<?php echo $datos['id_pregunta'] ?>"></center></td>
    <td class="tg-f3ey"><center><input class="rad" type="radio" name="<?php echo $datos['id_pregunta'] ?>"></center></td>
    <td class="tg-f3ey"><center><input class="rad"  type="radio"name="<?php echo $datos['id_pregunta'] ?>"></center></td>
  </tr>
  <?php 
$i++;
}?>
</table>
 <button class="btn btn-primary boton ">Ver PDF </button>

</form>
<br>
 </form>
 <form action="../pdf/index.php" method="post">
  <input type="hidden" name="id_encuesta" id="id_encuesta" value="<?php echo $id_encuesta ?>">
  <input type="hidden" name="d" id="d" value="<?php echo $id_encuesta ?>">
   <button class="btn btn-primary boton ">Descargar PDF </button>
 </form>
<br>
<a  href="vista_previa.php" ><button class="btn btn-primary boton">Regresar </button></a>

</center><br>
<?php include "footer.php";  ?>
</div>
	
<script src="../js/mostrar_menu.js"></script>
<script src="../js/js.js"></script>
</body>
</html>