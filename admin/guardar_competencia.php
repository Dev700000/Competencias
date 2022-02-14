<?php
session_start();
  $id_company =$_SESSION['id_company'];
include '../conexion.php';
#if ($conn){
#echo "conectado";
#}

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$fecha_inicial = $_POST['fecha_inicial'];
$fecha_final = $_POST['fecha_final'];
$estado = $_POST['estado'];


$sql = "INSERT INTO encuestas (titulo,descripcion,fecha_inicial,fecha_final,estado,id_company) VALUES('$titulo','$descripcion','$fecha_inicial','$fecha_final','$estado','$id_company')";

$result = $conn->query($sql); 

mysqli_close($conn);
header('location: agregar_preguntas.php');


?>