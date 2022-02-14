<?php

include '../conexion.php';
 $id_pregunta = $_POST['ideliminar'];
 $titulo = $_POST['titulo'];
 $id_encuesta = $_POST['id_encuesta'];

mysqli_query ($conn,"DELETE from preguntas where id_pregunta = '$id_pregunta'")
or die ("error al eliminar los datos");

mysqli_close($conn);

header("Location: agregar_preguntas2.php?id_encuesta=$id_encuesta&titulo=$titulo");
?>