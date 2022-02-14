<?php 
include 'conexion.php';
session_start();

$id_jefes = $_SESSION['id'];

$consulta3 = mysqli_query ($conn,"SELECT * FROM jefes WHERE id_jefes = '$id_jefes'")
or die ("error al actualizar los datos");



 ?>