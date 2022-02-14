<?php
	
    session_start();
  $id_company =$_SESSION['id_company'];
        if (isset($_SESSION['correo']) and $_SESSION['tipo_usuario']=='Administrador') {
          
        } else {
          header("Location: ../cerrar_sesion.php");
        }
        
include '../conexion.php';

$id_jefes = $_GET['id_jefes'];

//consulta al deartamento

$consulta1 = mysqli_query ($conn,"SELECT * FROM areas  WHERE id_company='$id_company' ") 
or die ("Error con el àrea");



$consulta = mysqli_query ($conn,"SELECT * FROM jefes WHERE id_jefes = '$id_jefes'  AND id_company='$id_company'")
or die ("Error en los datos del usuario");

?>

<!DOCTYPE html>
<html>
<head>
	 <link rel="shortcut icon" href="../img/favicon1.png"><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/EstilosMenu.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <script src="../librerias/jquery/jquery-3.1.1.min.js"></script>
<title>Modificar usuario</title>
</head>
<body>

  <div id="icono"></div>
<nav class="contenedor ">
  
  <center><p >BIENVENIDO ADMINISTRADOR </p></center>

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
    <center><h1>Modificar datos</h1>
  
  <form action="modificar_administrador2.php" method="post">
    <?php 
  while($datos = mysqli_fetch_assoc($consulta))
  {

    ?>
    <div class="form-group col-md-5">
       <input class="form-control border border-success" type="hidden" name="id_jefes" id="id_jefes" value="<?php echo  $id_jefes ?>">
    </div>
    
        <div class="form-group col-md-5">
           Tipo de Usuario:
         <select class="form-control border border-success" id = "tipo_usuario" name="tipo_usuario" > 
          <option value ="<?php echo  $datos['tipo_usuario'] ?>"><?php echo  $datos['tipo_usuario'] ?></option>
           <option value="Jefe area">Jefe de area</option> 
           <option value="Jefe departamento">Jefe de departamento</option> 
            <option value="Administrador">Administrador</option>
        </select>
      </div>
      <div class="form-group col-md-5">  Nombre:
                 <input class="form-control border border-success" id="nombre" name ="nombre" type="text" value ="<?php echo  $datos['nombre'] ?>">
             </div>
           
           <div class="form-group col-md-5">
              Apellido paterno:
                 <input class="form-control border border-success" id="ap" name ="ap" type="text" value ="<?php echo $datos['ap'] ?>">
           </div>
             
            <div class="form-group col-md-5">
               Apellido materno:
                 <input class="form-control border border-success" id="am" name ="am" type="text" value ="<?php echo $datos['am'] ?>">
            </div>
              
            <div class="form-group col-md-5">
              Área:
         <select class="form-control border border-success" id= "area" name="area" >
        <option value="<?php echo  $datos['area'] ?>"><?php echo  $datos['area'] ?></option>
            <?php
  while($datos1 = mysqli_fetch_assoc($consulta1))
  {
    ?>    
  <option value="<?php echo  $datos1['area'] ?>"><?php echo  $datos1['area'] ?></option>           
  <?php
    }
      ?>
         </select>
            </div>
                 
         <div class="form-group col-md-5">
           Departamento:
                  <select class="form-control border border-success" id= "departamento" name="departamento">
                    <option value ="<?php echo  $datos['departamento'] ?>"><?php echo  $datos['departamento'] ?></option>
                      <?php
                      
                      $consulta2 = mysqli_query ($conn,"SELECT * FROM departamentos WHERE id_company='$id_company'")
or die ("Error con losdepartamentos");
//consulta al area 
  while($datos2 = mysqli_fetch_assoc($consulta2))
  {
    ?>    
  <option value="<?php echo  $datos2['departamento'] ?>"><?php echo  $datos2['departamento'] ?></option>
   <?php
    }
      ?>
                 </select>
         </div>
         <div class="form-group col-md-5">
          Puesto de trabajo:
                 <input class="form-control border border-success" id="puesto" name ="puesto" type="text" value ="<?php echo $datos['puesto']?>">
         </div>
        
            <div class="form-group col-md-5">
              Correo electronico:
                 <input class="form-control border border-success"  id="correo" name ="correo" type="email" value ="<?php echo $datos['correo']?>">
            </div>
               
         <div class="form-group col-md-5">
          Contraseña:
               <input class="form-control border border-success" id="pass" name ="pass" type="text" value ="<?php echo $datos['password']?>">
         </div>

            <?php
           }
            ?>    <input type="submit" class="btn btn-dark" value="Guardar cambios">  
           
</form>
<a   href="administracion_contra.php" ><button class="btn btn-success boton">Regresar</button></a>
</div>
<script src="../js/mostrar_menu.js"></script>
<script src="../js/js.js"></script>

</body>
</html>