<?php
include '../conexion.php';
session_start();
$id_company=$_SESSION['id_company'];
//pude hacerla eliminacion con inner join pero me da weba
mysqli_query ($conn,"DELETE FROM promedio_departamentos AND id_company=$id_company ");
mysqli_query ($conn,"DELETE FROM competencia WHERE area != '1' AND id_company=$id_company");

mysqli_query ($conn,"DELETE FROM respuestas WHERE area != '1' AND id_company=$id_company");
mysqli_query ($conn,"DELETE FROM respuestas_areas AND id_company=$id_company");
mysqli_query ($conn,"DELETE FROM respuestas_generales AND id_company=$id_company");
mysqli_close($conn);

header('location: eliminar_todos_los_resultados.php') ;
?>