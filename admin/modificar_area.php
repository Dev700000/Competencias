<?php

include '../conexion.php';
$id_area = $_POST['ideditar'];
$titulo = $_POST['tituloeditar'];
//echo $id_area." ".$tipo." ".$titulo;
//echo "<br>";


$query="UPDATE areas SET area='$titulo'  WHERE id_area='$id_area'";
$resultado=$conn->query($query);

header('location: ver_area_departamento.php') ;


?>