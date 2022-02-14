<?php

include '../conexion.php';
 $id_departamento = $_POST['ideliminar'];
 
$id_area = $_POST['id_area'];
$titulo = $_POST['titulo'];

mysqli_query ($conn,"DELETE FROM departamentos WHERE id_departamento = '$id_departamento' AND id_area='$id_area' ")
or die ("error al eliminar los datos");

mysqli_close($conn);
header("Location: agregar_departamentos.php?id_area=$id_area&titulo=$titulo");
?>