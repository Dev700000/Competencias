<?php

include '../conexion.php';
$id_pregunta = $_POST['ideditar'];
$pregunta = $_POST['tituloeditar'];
$estado = $_POST['estadoeditar'];
$id_encuesta = $_POST['id_encuesta'];
$titulo = $_POST['titulo'];


$query="UPDATE preguntas SET pregunta='$pregunta',estado='$estado'  WHERE id_pregunta='$id_pregunta'";
$resultado=$conn->query($query);
if($resultado>0){


 header("Location: agregar_preguntas2.php?id_encuesta=$id_encuesta&titulo=$titulo");
}
 else{
 	echo "ocurrio un error";
 	 header("Location: agregar_preguntas2.php?id_encuesta=$id_encuesta&titulo=$titulo");
 }
?>