<?php 
include_once"../conexion.php";
session_start();
 $id_company=$_SESSION['id_company'];
$id_jefes = $_GET['id_jefes'];
$sql="SELECT titulo,opcion FROM respuestas WHERE id_subordinado = '$id_jefes' ";
$result = mysqli_query($conn,$sql);
if (isset($result)){
$valoresy=array();//porcentaje
$valoresx=array();//nombres
while($ver =mysqli_fetch_row($result)) {
	$valoresy[]=$ver[1];
	$valoresx[]=$ver[0];
}
$datosx=json_encode($valoresx);
$datosy=json_encode($valoresy);
?>
<div id ="graficabarras">
	
</div>
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

Plotly.newPlot('graficabarras', data);
</script>
<?php 

 if (isset($_SESSION['correo']) and $_SESSION['tipo_usuario']=='Administrador') 
 {
          include_once 'resultado_trabajador1.php';
  } 
  else if (isset($_SESSION['correo']) and $_SESSION['tipo_usuario']=='Jefe area')
  {
         include_once 'resultado_trabajador2.php';
  }
     else if (isset($_SESSION['correo']) and $_SESSION['tipo_usuario']=='Jefe departamento')
  {
  	include_once 'resultado_trabajador2.php';
  }
    }
else {
  echo "<center><h2>Este usuario aun no ha sido evaluado</h2></center>";
}
   
?>