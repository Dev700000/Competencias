<?php

include '../conexion.php';
$id_encuesta = $_POST['ideditar'];
$titulo = $_POST['tituloeditar'];
$descripcion = $_POST['descripcioneditar'];
$fecha_inicial = $_POST['fecha_inicialeditar'];
$fecha_final = $_POST['fecha_finaleditar'];
$estado = $_POST['estadoeditar'];

$query="UPDATE encuestas SET titulo='$titulo',descripcion='$descripcion',fecha_inicial='$fecha_inicial',fecha_final='$fecha_final',estado='$estado' WHERE id_encuesta='$id_encuesta'";
$resultado=$conn->query($query);
if($resultado>0){

 header('location: agregar_preguntas.php');
}
 else{
 	echo "ocurrio un error";
 }
?>