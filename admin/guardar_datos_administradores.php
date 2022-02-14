<?php
session_start();
  $id_company =$_SESSION['id_company'];
include '../conexion.php';
#if ($conn){
#echo "conectado";
#}

$tipo_usuario = $_POST['tipo_usuario'];
$nombre = $_POST['nombre'];
$ap = $_POST['ap'];
$am = $_POST['am'];
$id_area = $_POST['area'];
$departamento = $_POST['departamento'];
$puesto = $_POST['puesto'];
$correo = $_POST['correo'];
$password = $_POST['pass'];

$query = "SELECT * FROM areas WHERE  id_area ='$id_area' ";
	    $resultado = $conn->query($query);
	    $datos = $resultado->fetch_array();
	    $area= $datos['area'];


$sql = "INSERT INTO jefes (tipo_usuario,nombre,ap,am,area,departamento,puesto,correo,password,id_company,estado) VALUES('$tipo_usuario','$nombre','$ap','$am','$area','$departamento','$puesto','$correo','$password','$id_company','1') ";

$result = $conn->query($sql); 

mysqli_close($conn);

header('location: administracion_contra.php')
?>