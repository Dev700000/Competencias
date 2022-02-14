<?php 
include_once"../conexion.php";
error_reporting(1);
        if (isset($_SESSION['correo']) and $_SESSION['tipo_usuario']=='Administrador') {
          
        } else {
          header("Location: ../cerrar_sesion.php");
        }
$area = $_GET['area'];
$consulta = mysqli_query ($conn,"SELECT * FROM competencia WHERE area = '$area' AND id_company='$id_company'")
or die ("error al actualizar los datos");
$sql="SELECT titulo,promedio FROM competencia WHERE area = '$area' AND id_company='$id_company'";
$sql1="SELECT SUM(promedio) as total FROM competencia WHERE area = '$area' AND id_company='$id_company'";
$result1 = mysqli_query($conn,$sql1);
;

$sumar =mysqli_fetch_assoc($result1);
$row_cnt = $consulta->num_rows;
/*echo "nummero de resultados ".$row_cnt;
echo "<br>";
echo $sumar['total'];*/
	$res = $sumar['total'] / $row_cnt;
	//echo "el promedio es: ".$promedio;
	/* if ($res <=20){
            $resultado1 = 'Nada productivo';
          
          }
          else if (($res > 21.0 ) and ($res <= 35.9)){
            $resultado1 = "Nada productivo";
           
          }
          else if (($res > 36 )and ($res<= 51.9)){
           
          }
          else if (($res >52 )and ($res<=67.9)){
             $resultado1 = "Regular";
            
          }
          else if (($res >68 )and ($res <= 83.9)){
            $resultado1 = "Productivo";
          
          }
          else if (($res>84 )and ($res <= 100)){
             $resultado1 = "Muy productivo";
           
          }
*/
switch ($res) {
    case 20:
       $resultado1 = 'Nada productivo';
        break;
    case (($res > 21.0 ) and ($res <= 35.9)):
         $resultado1 = "Nada productivo";
        break;
    case (($res > 36 )and ($res<= 51.9)):
           $resultado1 = "Poco productivo";
           break;
    case (($res > 52 )and ($res<= 67.9)):
           $resultado1 = "Regular";
           break;
    case (($res >68 )and ($res <= 83.9)):
           $resultado1 = "Productivo";
           break;
    case (($res>84 )and ($res <= 100)):
         $resultado1 = "Muy productivo";
        break;
}


$result = mysqli_query($conn,$sql);
$valoresy=array();//porcentaje
$valoresx=array();//nombres
while($ver =mysqli_fetch_row($result)) {
	$valoresy[]=$ver[1];
	$valoresx[]=$ver[0];
}
$datosx=json_encode($valoresx);
$datosy=json_encode($valoresy);
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
<script src="plotly-latest.min.js"></script>
	<title>Resultados competencia</title>
	<style type="text/css">

	.cursor{
		cursor: pointer;
	}
		.vertical{
		transform: rotate(-90deg);
		/*float: left;*/
		float: left;
		margin-top: 30%;
			}
	</style>
	<title>Resutados competencias</title>
</head>
<body>
	<div id="icono"></div>
	

<nav class="contenedor "><center><p >BIENVENIDO ADMINISTRADOR </p></center>

<ul class="menu">
	
	<li id="inicio" class="border border-light" ><span class="fas fa-home icono izquierda" style="font-size: 18px; margin-right: 5px;"></span><a href="../admin/administrador.php">Inicio</a></li> 

	<li id="areas" class="border border-light"><a href="../admin/ver_area_departamento.php"><i  style="font-size: 18px; margin-right: 5px;" class="fas fa-users icono izquierda"></i>Areas y departamentos.</a>
	</li>
	<li class="border border-light cursor"><i  style="font-size: 18px; margin-right: 5px;" class="fas fa-list-ul icono izquierda"></i>Administración de competencias. <i class="icono derecha fa fa-chevron-down"></i>
	<ul>

		<li id="VerCompetencia" class="border-bottom border-dark"><a href="../admin/agregar_preguntas.php">Ver competencias.</a></li>
		<li id="Vista" class="border-bottom border-dark"><a href="../admin/vista_previa.php">Vista previa.</a></li>
	</ul></li>
	<li class="border border-light cursor"><i  style="font-size: 18px; margin-right: 5px;" class="fas fa-chart-bar icono izquierda"></i>Verificación de resultados. <i class="icono derecha fa fa-chevron-down"></i>
	<ul>
		<li class="border-bottom border-dark"><a href="../resultados/resultado_area.php">Áreas.</a></li>
		<li class="border-bottom border-dark"><a href="../resultados/resultado_departamento.php">Departamentos.</a></li>
		<li class="border-bottom border-dark"><a href="../resultados/resultado_trabajador.php">Individual.</a></li>
		<li class="border-bottom border-dark"><a href="../resultados/resultado_competencia.php">Competencias.</a></li>
		<li class="border-bottom border-dark"><a href="../grafica/barras_general.php">General.</a></li>
		
</ul></li>
	<li class="border border-light"><a href="../admin/administracion_contra.php"><i  style="font-size: 18px; margin-right: 5px;" class="fas fa-users-cog icono izquierda"></i>Administración de usuarios.</a>
	</li>
<li id="menu" class="border border-light" ><a href="../admin/eliminar_todos_los_resultados.php"><i  style="font-size: 18px; margin-right: 5px;" class="fas fa-users-cog icono izquierda"></i>Eliminación de resultados.</a>
	</li>
	</ul>
<center><a href="../cerrar_sesion.php" ><button class="btn btn-dark boton border border-light">Cerrar sesión</button></a>
<!--<div>
<footer>Everlever´s creations</footer></div>-->
</center>
</nav>
<div id="body" class="cuerpo">
	<?php include "../admin/header.php";  ?>
	<center><h1>Resultados del área <?php echo $area; ?></h1>
		<br><h5>Promedio del área
						<?php echo round($res,1)." ".$resultado1; ?></h5>
	<div class="container">
		
			<div class="col-sm-10">
				<div class="panel panel-primary  border border-primary">
					<h5 class="vertical">Promedio</h5>
					<div class="panel panel-heading">
					</div>
					<div class="panel panel-body">
						
							<div class="col-sm-10">
								<div class="color" id="myDiv">
									
							
						</div>
				
				</div>
				<h5>Competencias</h5>
			</div>
		</div>
	</div>
	<form action="pdf/" method="post">
		
	</form>
	<?php 
		
		if($_SESSION['tipo_usuario'] == 'Administrador'){
		?>
	<a  href='../resultados/resultado_area.php' ><button class='btn btn-primary '>Regresar </button></a>
	<?php
}
	else {}
		
	?>
	</center> <br>
	<?php include "../admin/footer.php";  ?>
</div>
<script src="../js/mostrar_menu.js"></script>
<script src="../js/js.js"></script>
	
<script type="text/javascript">
	function crearcadenabarra(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>

<script type="text/javascript">
	datosx=crearcadenabarra('<?php echo $datosx; ?>');
	datosy=crearcadenabarra('<?php echo $datosy; ?>');
	var data = [
  {
    x: datosx,
    y: datosy,
    type: 'bar'
  }
];

Plotly.newPlot('myDiv', data);
</script>
</body>
</html>