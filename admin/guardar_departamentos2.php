<?php
session_start();
  $id_company =$_SESSION['id_company'];
include '../conexion.php';
$id_area = $_POST['id_area'];
$estado = "activado";

$pregunta = $_POST['departamento'];
$titulo = $_POST['titulo'];
$sql = "INSERT INTO departamentos (id_area,departamento,id_company) VALUES('$id_area','$pregunta','$id_company')";

$result = $conn->query($sql); 



header("Location: agregar_departamentos.php?id_area=$id_area&titulo=$titulo");
//header("Location: evaluador/frame.php");


?>