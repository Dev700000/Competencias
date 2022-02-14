<?php

include '../conexion.php';
 $id_je = $_GET['id_jefes'];

mysqli_query ($conn,"DELETE from jefes where id_jefes = '$id_je'")
or die ("error al eliminar los datos");

mysqli_close($conn);
header('location: administracion_contra.php');
?>