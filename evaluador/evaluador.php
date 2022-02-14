<?php
include_once'../presentacion.php';
error_reporting(1);
$id_company=$_SESSION['id_company'];
        if (isset($_SESSION['correo'])) {
          
        } else {
          header("Location: cerrar_sesion.php");
        }
        

       ?>
	<!DOCTYPE html>
<html>
<head>
  <style type="text/css">

  .espacio
  {
    margin-top: 10px;
    text-align: center;
  }

</style>
    <link rel="shortcut icon" href="../img/favicon1.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/EstilosMenu.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <script src="../librerias/jquery/jquery-3.1.1.min.js"></script>
	<title>Evaluador</title>
</head>
<body >
  <div id="icono"></div>
<nav class="contenedor ">

	<h5>Bienvenido <?php echo $_SESSION['nombre']; ?></h5>
	<p>Subordinados a evaluar</p>

	<?php


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
<a   href="../grafica/barras_area.php?area=<?php echo $area1;?>" ><button class="btn btn-dark boton border border-light ">Resultados </button></a></div>
<?php 
}
else {
  $area='Departamento';

?>
<div>
<a  href="../grafica/barras_departamento.php?departamento=<?php echo $departamento;?>" ><button class="btn btn-dark boton border border-light ">Resultados </button></a></div>
<?php
 }
?>

</nav>
<div id="body" class="cuerpo">
  <?php include "../admin/header.php";  ?>

<img src="../img/evaluador.jpg" width="500" height="300">
<?php include "../admin/footer.php";  ?>
</div>
<script src="../js/mostrar_menu.js"></script>
<script src="../js/js.js"></script>
</body>
</html>