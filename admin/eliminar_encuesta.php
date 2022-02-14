<?php

include '../conexion.php';
 $id_encuesta = $_POST['ideliminar'];

mysqli_query ($conn,"DELETE from encuestas where id_encuesta = '$id_encuesta'")
or die ("error al eliminar los datos");

mysqli_close($conn);
header('location: agregar_preguntas.php');
?>