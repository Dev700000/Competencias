<?php
session_start();
  $id_company =$_SESSION['id_company'];
include '../conexion.php';

$departamento = $_POST['departamento'];
$nombre = $_POST['nombre'];
$ap = $_POST['ap'];
$am = $_POST['am'];
$id_area = $_POST['area'];
$puesto = $_POST['puesto'];
$tipo_usuario = "Subordinado";

$query = "SELECT * FROM areas WHERE  id_area ='$id_area'";
	    $resultado = $conn->query($query);
	    $datos = $resultado->fetch_array();
	    $area= $datos['area'];


$sql = "INSERT INTO jefes (nombre,ap,am,area,departamento,puesto,tipo_usuario,id_company,estado) VALUES('$nombre','$ap','$am','$area','$departamento','$puesto','$tipo_usuario','$id_company','1')";  

$result = $conn->query($sql); 

mysqli_close($conn);

header('location: administracion_contra.php');
?>