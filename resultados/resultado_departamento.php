  <?php 
  error_reporting(1);
  session_start();
        if (isset($_SESSION['correo']) and $_SESSION['tipo_usuario']=='Administrador') {
          
        } else {
          header("Location: ../cerrar_sesion.php");
        }
        $id_company=$_SESSION['id_company'];
include_once "../conexion.php";
$sql1="SELECT * FROM promedio_departamentos  WHERE id_company='$id_company' ORDER BY fecha";
$result1 = mysqli_query($conn,$sql1);



/*
$query = "SELECT * FROM promedio_departamentos  WHERE id_company='$id_company' ORDER BY fecha";
      $resultado = $conn->query($query);
$consulta = mysqli_query ($conn,"SELECT departamento FROM promedio_departamentos WHERE id_company='$id_company' ORDER BY fecha ")
    or die ("error al actualizar los datos");*/
    $row_cnt = $consulta->num_rows;
    //echo "numero de resultados: ".$row_cnt;
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <head>
 <link rel="stylesheet" href="../librerias/bootstrap/bootstrap/css/bootstrap.min.css">
  
<link rel="shortcut icon" href="../img/favicon1.png">
  
  
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/EstilosMenu.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script src="../librerias/jquery/jquery-3.1.1.min.js"></script>
<style type="text/css">
    .i
    {
      text-align: left;
      color:black;
    }

</style>
    	<title>Resultado por Departamento</title>
    </head>
    <body>
        <div id="icono"></div>
    

<nav class="contenedor "><center><p >BIENVENIDO ADMINISTRADOR </p></center>

<ul class="menu">
  
  <li id="inicio" class="border border-light" ><span class="fas fa-home icono izquierda" style="font-size: 18px; margin-right: 5px;"></span><a href="../admin/administrador.php">Inicio</a></li> 

  <li id="areas" class="border border-light"><a href="../admin/ver_area_departamento.php"><i style="font-size: 18px; margin-right: 5px;" class="fas fa-users icono izquierda"></i>Areas y departamentos.</a>
  </li>
    

  <li class="border border-light"><i style="font-size: 18px; margin-right: 5px;" class="fas fa-list-ul icono izquierda"></i>Administración de competencias. <i class="icono derecha fa fa-chevron-down"></i>
  <ul>
  
    <li id="VerCompetencia" class="border-bottom border-dark"><a href="../admin/agregar_preguntas.php">Ver competencias.</a></li>
    <li id="Vista" class="border-bottom border-dark"><a href="../admin/vista_previa.php">Vista previa.</a></li>
  </ul></li>
  <li class="border border-light"><i style="font-size: 18px; margin-right: 5px;" class="fas fa-chart-bar icono izquierda"></i>Verificación de resultados. <i class="icono derecha fa fa-chevron-down"></i>
  <ul>
    <li class="border-bottom border-dark"><a href="../resultados/resultado_area.php">Áreas.</a></li>
    <li class="border-bottom border-dark"><a href="../resultados/resultado_departamento.php">Departamentos.</a></li>
    <li class="border-bottom border-dark"><a href="../resultados/resultado_trabajador.php">Individual.</a></li>
    <li class="border-bottom border-dark"><a href="../resultados/resultado_competencia.php">Competencias.</a></li>
    <li class="border-bottom border-dark"><a href="../grafica/barras_general.php">General.</a></li>
    
</ul></li>
  <li class="border border-light"><a href="../admin/administracion_contra.php"><i style="font-size: 18px; margin-right: 5px;" class="fas fa-users-cog icono izquierda"></i>Administración de usuarios.</a>
  </li>
<li id="menu" class="border border-light" ><a href="../admin/eliminar_todos_los_resultados.php"><i style="font-size: 18px; margin-right: 5px;" class="fas fa-users-cog icono izquierda"></i>Eliminación de resultados.</a>
  </li>
  </ul>
<center><a href="../cerrar_sesion.php" ><button class="btn btn-dark boton border border-light">Cerrar sesión</button></a>
<!--<div>
<footer>Everlever´s creations</footer></div>-->
</center>
</nav>
<div id="body" class="cuerpo">
    <?php include "../admin/header.php";  ?>
      <center>
            <br>
    <h2>Departamentos</h2>
 <form action="../pdf/reporte_trabajadores_departamento.php" method="post">
   
  <h5>Filtar por fecha</h5>
   Del la fecha
<input  type="date" name="fi" id="fi">
<br>
Hasta
<input style="margin-top: 10px; margin-bottom: 10px;" type="date" name="fn" id="fn">
<br>

<button class='btn btn-primary ' >Filtrar reporte</button>
</form>
         
    
    <?php
   
       echo "<ul class='list-group col-sm-6'>";     
  while($datos =mysqli_fetch_assoc($result1))

  {
     
    echo "<li class='list-group-item list-group-item-action  i'>";
    echo "<a class='i' href='../grafica/barras_departamento.php?departamento=".$datos['departamento']."'>".$datos['departamento']."</a>";
    echo"<br>";
    echo "</li>";     
}
 echo "</ul>"; 



?>
<br><a target="_blank"  href='../pdf/reporte_trabajadores_departamento.php' ><button class='btn btn-primary '>Reporte general</button></a>
</center>
<br>
<?php include "../admin/footer.php";  ?>
</div>
<script src="../js/mostrar_menu.js"></script>
<script src="../js/js.js"></script>
      
</body>
    </html>