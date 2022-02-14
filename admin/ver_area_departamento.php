<?php
    session_start();
        if (isset($_SESSION['correo']) and $_SESSION['tipo_usuario']=='Administrador') {
          
        } else {
          header("Location: ../cerrar_sesion.php");
        }
        $id_company =$_SESSION['id_company'];
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

  
   <style type="text/css">
    .fondo{ 
  background: url(img/fo.jpg) no-repeat center center fixed;
  background-size: cover; 
}
   </style>
	<title>Áreas</title>
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
<div id="body" class="cuerpo" >
<?php include "header.php";  ?>

  <center><h1>Áreas</h1></center>
<h5>Seleccione el titulo del área a la que desea agregar departamentos</h5>
<?php   
include '../conexion.php';
$consulta = mysqli_query ($conn,"SELECT * FROM areas where area !='' AND id_company ='$id_company'")
or die ("error al actualizar los datos");
?>
<button type="button" class="btn btn-primary float-right"data-toggle="modal" data-target="#exampleModalScrollable">+ Nueva área</button>
<table class='table table-sm table-bordered table-hover table-condensed'>

<tr  class='table-primary'>
<th style="display: none;">ID</th>
<th >Titulo</th>

<th>Acciones</th>

</tr>
<?php

while($datos = mysqli_fetch_assoc($consulta))
{
  ?>
  <tr>
  <td style="display: none;"><?php echo $datos['id_area']; ?></td>
  <td><a style="color: black;" href="agregar_departamentos.php?id_area=<?php echo $datos['id_area']?>&titulo=<?php echo $datos['area'];?>"><?php echo $datos['area']?></a></td>
<td><button id='btnGroupDrop1' type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
      Acción
    </button>
    <div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>
      <a class='dropdown-item editar' href="#">Modificar</a>
      <a class='dropdown-item eliminar' href="#">Eliminar</a>
      </div> </td>
  </tr>
  <?php
}

mysqli_close($conn);
echo "</table>";

?>


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
      <form action="guardar_area.php" method="POST">
      <div class="modal-body">
    
        <div class="form-group">
          Titulo:
                 <input class="form-control" id="titulo" name ="titulo" type="text" required placeholder="Introduce el titulo">
         </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div> 
    </div> </form>
  </div>
</div> 
<!-- Modal EDIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIITAR-->
<div class="modal fade" id="exampleModalScrollable2" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <center><h5 class="modal-title" id="exampleModalScrollableTitle">Modificar área</h5></center> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>  
      <form action="modificar_area.php" method="POST">
      <div class="modal-body">
    <input type="hidden" name="ideditar" id="ideditar">
        <div class="form-group">
          Titulo:
                 <input class="form-control" id="tituloeditar" name ="tituloeditar" type="text" required placeholder="Introduce el titulo">
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
      <form action="eliminar_area.php" method="POST">
      <div class="modal-body">
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
<?php include "footer.php";  ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
<script src="../js/mostrar_menu.js"></script>
<script src="../js/js.js"></script>
<!--Funciones para abrir el modal de eliminación -->
<script type="text/javascript">
  //cuando el documento este listo
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

<!--Funciones para abrir el modal de edición -->
<script type="text/javascript">
  //cuando el documento este listo
  $(document).ready(function(){
    //activar la funcion cuando el botonn con el la clase edit se oprima
$('.editar').on('click', function(){
  //abrir el modal con el #id
$('#exampleModalScrollable2').modal('show');

$tr = $(this).closest("tr");
//lavariable data es igual a lo que se mapeo en el tr y th
var data = $tr.children("td").map(function(){
  //regresa a la variable como texto
   return $(this).text();
}).get();
//imprime en consola el arreglo recabado por el mapeo en variable data que ahora es un texto
console.log(data);
//en cada id del formulario aparece le asignamos lo que aparecera segun con os datos recabados en tr de la tabala
$('#ideditar').val(data[0]);
$('#tituloeditar').val(data[1]);

});
  });
</script>
</body>
</html>