<?php 
include_once"../conexion.php";
session_start();

 $id_company=$_SESSION['id_company'];
        if (isset($_SESSION['correo']) and $_SESSION['tipo_usuario']=='Administrador') {
          
        } else {
          header("Location: ../cerrar_sesion.php");
        }
$sql="SELECT area,promedio FROM respuestas_generales WHERE id_company='$id_company'";
$result = mysqli_query($conn,$sql);
if ($result !=''){
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
include 'resultado.php';
}
else {
	echo "<h1>No se encontraron resultados</h1>";
}
?>