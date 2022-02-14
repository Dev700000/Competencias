<?php

include "../conexion.php";
error_reporting(1);
	  session_start();
        if (isset($_SESSION['correo'])) {
          
        } else {
          header("Location: cerrar_sesion.php");
        }
        $id_company=$_SESSION['id_company'];
        $id_encuesta= $_GET['id_encuesta'];
        $titulo = $_GET['titulo'];
        $id_jefes =$_GET['id_jefes'];
 ?>
<!DOCTYPE html>
<html>
<head>
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

<body>
   <div id="icono"></div>
<nav class="contenedor ">
  <h5>Bienvenido <?php echo $_SESSION['nombre']; ?></h5>
  <p>Subordinados a evaluar</p>

  <?php
include "../conexion.php";

$correo = $_SESSION['correo'];
$departamento = $_SESSION['departamento'];
$area = $_SESSION['area'];
$tipo_usuario = $_SESSION['tipo_usuario'];

if ($tipo_usuario == 'Jefe area' ) {
$consulta = mysqli_query ($conn,"SELECT * FROM jefes WHERE area = '$area' AND correo != '$correo' AND tipo_usuario = 'Jefe departamento' AND id_company='$id_company'")
or die ("No se encontraron resultados");

  while($datos = mysqli_fetch_assoc($consulta))
  {
    
    echo "<ul class='menu'>";
  echo "<li class='border border-dark'>";
    echo "<a  href='competencias.php?id_jefes=".$datos['id_jefes']."'> ".$datos['nombre']." ".$datos['ap']." ".$datos['am']."</a>";
    echo "</li>";
    echo "</ul>"; 
  
   }

}
if ($tipo_usuario == 'Jefe departamento'){

$consulta = mysqli_query ($conn,"SELECT * FROM jefes WHERE departamento = '$departamento' AND correo != '$correo' AND id_company='$id_company'")
or die ("No se encontraron resultados");

  while($datos = mysqli_fetch_array($consulta))
  {
    echo "<ul class='menu'>";
  echo "<li class='border border-dark'>";
    echo "<a  href='competencias.php?id_jefes=".$datos['id_jefes']."'>".$datos['nombre']." ".$datos['ap']." ".$datos['am']."</a>";
    echo "</li>";
    echo "</ul>"; 
   $i++;  
   }
}
?>


<center>
<a target ='_top'  href='../cerrar_sesion.php' ><button class='btn btn-dark boton border border-light'>Cerrar sesion</button></a>
<br>
<br>
<?php 
if($tipo_usuario == 'Jefe area'){
  $area = "Area";
?>
<div>
<a  href="../grafica/barras_area.php?area=<?php echo $area1;?>" ><button class="btn btn-dark boton border border-light ">Resultados </button></a></div>
<?php 
}
else {
  $area='Departamento';

?>
<div>
<a   href="../grafica/barras_departamento.php?departamento=<?php echo $departamento;?>" ><button class="btn btn-dark boton border border-light ">Resultados </button></a></div>
<?php
 }
?>

</nav>

<div id="body" class="cuerpo">
  <?php include "../admin/header.php";  ?>
  <center>
  <h2><?php echo $titulo ;?></h2>
 <?php
$consulta = mysqli_query ($conn,"SELECT * FROM preguntas WHERE id_enc = '$id_encuesta' AND estado = 'activado'")
or die ("error al actualizar los datos");
$row_cnt = $consulta->num_rows;

$i=1;
?>
<form action="evaluar2.php" method="post">
   <input type="hidden" name="id_encuesta" id="id_encuesta" value="<?php echo $id_encuesta; ?>">
   <input type="hidden" name="filas" id="filas" value="<?php echo $row_cnt; ?>">
    <input type="hidden" name="id_jefes" id="id_jefes" value="<?php echo $id_jefes; ?>">
     <input type="hidden" name="titulo" id="titulo" value="<?php echo $titulo; ?>">

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
  {  
    ?>
  <tr>
<td class="tg-f3ey"><h6><?php echo  $i.": ".$datos['pregunta']?></h6></td>
<td class="tg-f3ey"><center><input class="rad" type="radio"name="<?php echo$datos['id_pregunta']?>" value="5" required ></center></td>
<td class="tg-f3ey "><center><input class="rad" required type="radio"name="<?php echo$datos['id_pregunta']?>"value="4"></center></td>
<td class="tg-f3ey"><center><input class="rad" required type="radio"name="<?php echo$datos['id_pregunta']?>"value="3"></center></td>
<td class="tg-f3ey"><center><input class="rad" required type="radio"name="<?php echo$datos['id_pregunta']?>"value="2"></center></td>
<td class="tg-f3ey"><center><input class="rad" required type="radio"name="<?php echo$datos['id_pregunta']?>"value="1"></center></td>
  </tr>
  <?php 
$i++;
}
?>
</table>
 <button class="btn btn-primary boton ">Evaluar</button>

</form>

</center>
<br>
<?php include "../admin/footer.php";  ?>

</div>
<script src="../js/mostrar_menu.js"></script>
<script src="../js/js.js"></script>
	
</body>
</html>