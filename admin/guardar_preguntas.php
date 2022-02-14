<?php
session_start();
  $id_company =$_SESSION['id_company'];
include '../conexion.php';
$id_encuesta = $_POST['id_encuesta'];
$titulo = $_POST['titulo'];
$estado = $_POST['estado'];

$pregunta = $_POST['pregunta'];

$sql = "INSERT INTO preguntas (id_enc,pregunta,estado) VALUES('$id_encuesta','$pregunta','$estado') ";

$result = $conn->query($sql); 


	//$datos = "Datos guardados con exito";
header("Location: agregar_preguntas2.php?id_encuesta=$id_encuesta&titulo=$titulo");


?>