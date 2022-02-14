<?php


include '../conexion.php';
 $id_area = $_POST['ideliminar'];

mysqli_query ($conn,"DELETE from areas where id_area = '$id_area'")
or die ("error al eliminar los datos");

mysqli_close($conn);
header('location: ver_area_departamento.php') ;
?>