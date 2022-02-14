<?php

include '../conexion.php';
#if ($conn){
#echo "conectado";
#}
session_start();
  $id_company =$_SESSION['id_company'];

$titulo = $_POST['titulo'];


$sql = "INSERT INTO areas (area,id_company) VALUES('$titulo','$id_company') ";

$result = $conn->query($sql); 

mysqli_close($conn);


header('location: ver_area_departamento.php') ;



?>