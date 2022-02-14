<?php

      session_start();
        if (isset($_SESSION['correo']) and $_SESSION['tipo_usuario']=='Administrador') {
          
        } else {
          header("Location: ../cerrar_sesion.php");
        }


include '../conexion.php';

$id_area = $_GET['id_area'];
$titulo = $_GET['titulo'];
?>
<!DOCTYPE html>
<html> 
<head>
  <link rel="stylesheet" href="../librerias/bootstrap/bootstrap/css/bootstrap.min.css">
   <link rel="shortcut icon" href="../img/favicon1.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/EstilosMenu.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script src="../librerias/jquery/jquery-3.1.1.min.js"></script>
    <title>Departamentos</title>
</head>
<body>
	<div id="icono"></div>
<nav class="contenedor ocultar "><center><p >BIENVENIDO ADMINISTRADOR </p></center>

<ul class="menu">
  
  <li id="inicio" class="border border-light" ><span class="fas fa-home icono izquierda" style="font-size: 18px; margin-right: 5px;"></span><a class="centrado" href="administrador.php" >Inicio</a></li> 

  <li id="areas" class="border border-light"><span style="font-size: 18px;margin-right: 5px;" class="fas fa-users icono izquierda"></span><a  href="ver_area_departamento.php">Areas y departamentos.</a>
  </li>
    

  <li class="border border-light"><span class="fas fa-list-ul icono izquierda" style="font-size: 18px; margin-right: 5px;" ></span>Administración de competencias. <span class="icono derecha fa fa-chevron-down"></span>
  <ul>
  
    <li id="VerCompetencia" class="border-bottom border-dark"><a href="agregar_preguntas.php">Ver competencias.</a></li>
    <li id="Vista" class="border-bottom border-dark"><a href="vista_previa.php">Vista previa.</a></li>
  </ul></li>
  <li class="border border-light"><i style="font-size: 18px; margin-right: 5px;" class="fas fa-chart-bar icono izquierda"></i>Verificación de resultados. <i class="icono derecha fa fa-chevron-down"></i>
  <ul>
    <li class="border-bottom border-dark"><a href="../resultados/resultado_area.php">Áreas.</a></li>
    <li class="border-bottom border-dark"><a href="../resultados/resultado_departamento.php">Departamentos.</a></li>
    <li class="border-bottom border-dark"><a href="../resultados/resultado_trabajador.php">Individual.</a></li>
    <li class="border-bottom border-dark"><a href="../resultados/resultado_competencia.php">Competencias.</a></li>
    <li class="border-bottom border-dark"><a href="../grafica/barras_general.php">General.</a></li>
    
</ul></li>
  <li class="border border-light"><a href="administracion_contra.php"><i style="font-size: 18px; margin-right: 5px;" class="fas fa-users-cog icono izquierda"></i>Administración de usuarios.</a>
  </li>
<li id="menu" class="border border-light" ><a href="eliminar_todos_los_resultados.php"><i style="font-size: 18px; margin-right: 5px;" class="far fa-trash-alt icono izquierda"></i>Eliminación de resultados.</a>
  </li>
  </ul>
    

<center><a href="../cerrar_sesion.php" ><button class="btn btn-dark boton border border-light">Cerrar sesión</button></a>

<!--<div>
<footer>Everlever´s creations</footer></div>-->
</center>
    
</nav>
<div id="body" class="cuerpo">
    <?php include "header.php";  ?>
<center><h1><?php echo $titulo; ?></h1>
        <button type="button" class="btn btn-primary float-right"data-toggle="modal" data-target="#exampleModalScrollable">+ Nuevo departamento</button>
<table class='table table-sm table-bordered table-hover table-condensed'>
<?php  
$consulta = mysqli_query ($conn,"SELECT * FROM departamentos WHERE id_area ='$id_area'")
or die ("error al actualizar los datos");
echo "<table class='table table-sm table-bordered table-hover'>";
echo "<tr class='table-primary'>";
echo "<th class='d-none'>ID</th>";
echo "<th >Departamento</th>";
//echo "<th id= 'estado'>Estado</th>";
echo "<th colspan ='2'>Acciones</th>";
echo "</tr>";

while($datos = mysqli_fetch_array($consulta))
{
    echo "<tr>";
     echo "<td class='d-none'>". $datos['id_departamento']."</td>";
    echo "<td>". $datos['departamento']."</td>";
    //echo "<td>". $datos['estado']."</td>";
    echo "<td> <a href='#'><button class='btn btn-danger eliminar'>Eliminar</button></a></td>";
   // echo "<td> <a target='derecha' href='modificar_pregunta.php?id_pregunta=".$datos['id_pregunta']."'><button class='btn btn-primary'>Modificar</button></a></td>";
    echo "</tr>";
}

mysqli_close($conn);
echo "</table>";
?>


    <div>
         <a  href="ver_area_departamento.php" ><button class="btn btn-primary ">Regresar </button></a>
    </div>
   
    </center>
    <br><br>
    <?php include "footer.php";  ?>
</div>
<!-- modal registrooooooooooooooooooooooooo-->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <center><h5 class="modal-title" id="exampleModalScrollableTitle">Rellene los campos</h5></center> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>  
      <form action="guardar_departamentos2.php" method="POST">
      <div class="modal-body">
    <input type="hidden" name="id_area" id="id_area" value=" <?php echo $id_area; ?>">
    <input type="hidden" name="titulo" id="titulo" value=" <?php echo $titulo; ?>">
        <div class="form-group">
          Titulo:
                 <input class="form-control" id="departamento" name ="departamento" type="text" required placeholder="Introduce el titulo">
         </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div> 
    </div> </form>
  </div>
</div> 

<!-- Modal EEEEEEEELIMINARRRRRRRR-->
<div class="modal fade" id="exampleModalScrollable3" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <center><h5 class="modal-title" id="exampleModalScrollableTitle">Eliminar área</h5></center> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>  
      <form action="eliminar_departamento.php" method="POST">
      <div class="modal-body">
         <input type="hidden" name="titulo" id="titulo" value=" <?php echo $titulo; ?>">
         <input type="hidden" name="id_area" id="id_area" value=" <?php echo $id_area; ?>">
        
    <input type="hidden" name="ideliminar" id="ideliminar">
       
        <h5>¿Estas seguro de eliminar los datos?</h5> 
      
        
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary">Si</button>
      </div> 
    </div> </form>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="../js/mostrar_menu.js"></script>
<script src="../js/js.js"></script>
	
	<!--Funciones para abrir el modal de eliminación -->
<script type="text/javascript">
  //cuando el documento este listo//esto lo puedo omitir si ponemos este scrpt al final del dom como esta áqui
  $(document).ready(function(){
    //activar la funcion cuando el botonn con el la clase edit se oprima
$('.eliminar').on('click', function(){
  //abrir el modal con el #id
$('#exampleModalScrollable3').modal('show');

$tr = $(this).closest("tr");
//lavariable data es igual a lo que se mapeo en el tr y th
var data = $tr.children("td").map(function(){
  //regresa a la variable como texto
   return $(this).text();
}).get();
//imprime en consola el arreglo recabado por el mapeo en variable data que ahora es un texto
console.log(data);
//en cada id del formulario aparece le asignamos lo que aparecera segun con os datos recabados en tr de la tabala
$('#ideliminar').val(data[0]);

});
  });
</script>

</body>
</html>