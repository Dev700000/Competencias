<?php

include '../conexion.php';
$id_j = $_POST['id_jefes'];
$tipo_usuario = $_POST['tipo_usuario'];
$nombre = $_POST['nombre'];
$ap = $_POST['ap'];
$am = $_POST['am'];
$area = $_POST['area'];
$departamento= $_POST['departamento'];
$puesto = $_POST['puesto'];
$correo = $_POST['correo'];
$password = $_POST['pass'];

$query="UPDATE jefes SET nombre='$nombre',ap='$ap',am='$am',area='$area',departamento='$departamento',puesto='$puesto',tipo_usuario = '$tipo_usuario',correo='$correo',password = '$password'   WHERE id_jefes='$id_j'";
$resultado=$conn->query($query);
if($resultado>0){

  
 header('location: administracion_contra.php');
}
 else{
 	echo "ocurrio un error";
 	header('location: administracion_contra.php');
 }
?>