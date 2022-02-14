
<?php
session_start();
  $id_company =$_SESSION['id_company'];
include_once'../conexion.php';
$id_area = $_POST['id_area'];
 $query = "SELECT * FROM departamentos WHERE  id_area ='$id_area' ";
	    $resultado = $conn->query($query);
	   
/*$consulta = mysqli_query ($conn,"SELECT * FROM departamentos where id_area ='$id_area'")
or die ("error al actualizar los datos");
$datos = mysqli_fetch_assoc($consulta);*/


while ( $datos = $resultado->fetch_array()) {
	$html = "<option value='Ninguno'>Ninguno</option> ";
	$html = "<option value='".$datos['departamento']."'>".$datos['departamento']."</option> ";
	echo $html;
}

?>