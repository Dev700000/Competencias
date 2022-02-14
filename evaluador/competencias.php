<?php
include_once '../conexion.php';
error_reporting(1);
	  session_start();
      $id_company =$_SESSION['id_company'];
        if (isset($_SESSION['correo'])) {
          
        } else {
          header("Location: cerrar_sesion.php");
        }

        $tipo_usuario = $_SESSION['tipo_usuario'];
        $area1 = $_SESSION['area'];
       $departamento = $_SESSION['departamento'];
       if(isset($_GET['id_jefes'])){
        $id_jefes = $_GET['id_jefes'];
        $consulta = mysqli_query ($conn,"SELECT * FROM jefes WHERE id_jefes = '$id_jefes'")
or die ("error al actualizar los datos");
$datos = mysqli_fetch_assoc($consulta);
$nombre = $datos['nombre']." ".$datos['ap'];


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
  echo "<li class='border border-dark' >";
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
  <center>

  <h2>Selecione la competencia a evaluar</h2>
<div> Evaluando a <h4 style="color:green;"><?php echo " ".$nombre;?></h4> Ver
<a href="../grafica/barras_trabajador.php?id_jefes=<?php echo $id_jefes;?>" ><button class="btn btn-primary ">Resultados </button></a></div>
  <?php
include "../conexion.php";
 

$consulta = mysqli_query ($conn,"SELECT * FROM encuestas WHERE estado ='activado' AND id_company='$id_company' ORDER BY fecha_inicial ") or die ("error al actualizar los datos");

  while($datos = mysqli_fetch_assoc($consulta))
  {
    $id_encuesta=$datos['id_encuesta'];

$consulta1 = mysqli_query ($conn,"SELECT * FROM respuestas WHERE id_encuesta ='$id_encuesta' AND id_subordinado ='$id_jefes' ") or die ("Error ");
if($datos1 = mysqli_fetch_assoc($consulta1)){
  //aqui va algo que diga esta competencia ha sido evaluada
  ?>
 
<?php
}
  else {
   if(strtotime($datos['fecha_final']) > time()) {
  }
?>
<div class="list-group col-md-8">
<a href="evaluar1.php?id_encuesta=<?php echo $id_encuesta;?>&id_jefes=<?php echo $id_jefes?>&titulo=<?php echo $datos['titulo'];?>" class="list-group-item list-group-item-action ">
<div class="d-flex w-100 justify-content-between">
<h5 class="mb-1"><?php echo $datos['titulo'];?></h5>
<small>Estara disponible hasta: <?php echo $datos['fecha_final'];?></small>
</div>
<small class="mb-1"><?php echo $datos['descripcion'];?></small>
</a>
 
</div>
<?php 
}
if(strtotime($datos['fecha_final']) == time()) {

  ?>
  <div class="list-group col-md-8">
<a href="evaluar1.php?id_encuesta=<?php echo $datos['id_encuesta'];?>&id_jefes=<?php echo $id_jefes?>&titulo=<?php echo $datos['titulo'];?>" class="list-group-item list-group-item-action ">
<div class="d-flex w-100 justify-content-between">
<h5 class="mb-1"><?php echo $datos['titulo'];?></h5>
<small><?php echo $datos['fecha_final'];?></small>
</div>
<small class="mb-1"><?php echo $datos['descripcion'];?></small>
</a>
 
</div>
<!--<a  href="pdf/reporte_general_competencias.php" ><button class="btn btn-dark boton">Generar reporte </button></a>-->

<?php 
//$row_cnt = $consulta->num_rows;
}
//echo  $row_cnt;

}


}
else {
echo "<h2>Porfavor seleccione al colaborador que desea evaluar</h2>";
} 
?>
</center><br>
<?php include "../admin/footer.php";  ?>
</div>
</center>


<script src="../js/mostrar_menu.js"></script>
<script src="../js/js.js"></script>
	
</body>
</html>