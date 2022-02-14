<?php
      session_start();
      $id_company=$_SESSION['id_company'];
        if (isset($_SESSION['correo']) and $_SESSION['tipo_usuario']=='Administrador') {
          
        } else {
          header("Location: ../cerrar_sesion.php");
        }

include '../conexion.php';
$consulta = mysqli_query ($conn,"SELECT * FROM areas  WHERE id_company='$id_company' ")
or die ("error al actualizar los datos area");
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
         /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#f9fcf7+65,1fc9e0+99 */
background: #f9fcf7; /* Old browsers */
background: -moz-linear-gradient(top,  #f9fcf7 65%, #1fc9e0 99%); /* FF3.6-15 */
background: -webkit-linear-gradient(top,  #f9fcf7 65%,#1fc9e0 99%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom,  #f9fcf7 65%,#1fc9e0 99%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f9fcf7', endColorstr='#1fc9e0',GradientType=0 ); /* IE6-9 */

        }
          .oculto {
      display: none;
    }
</style>
  <title>Registro evaluadores</title>
</head>
<body class="fondo">
  <div id="icono"></div>
  

<nav class="contenedor ocultar"><center><p >BIENVENIDO ADMINISTRADOR </p></center>

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
   <center><h1>Registro de Evaluadores</h1>
  <form action="guardar_datos_administradores.php" method="post">
<?php
     if(isset($datos2)){
        ?>
     <script type="text/javascript">

alert("se ha registrado el usuario");
    
</script>
   <?php
       }
     ?>
       <div class="form-group col-md-5">
           Tipo de Evaluador:
         <select class="form-control " id = "tipo_usuario" name="tipo_usuario"> 
          <option value="0">--Selecciona--</option>
             <option id="jefe_departamento" value="Jefe departamento">Jefe de departamento</option> 
              <option id="jefe_area" value="Jefe area">Jefe de area</option> 
      
        </select>
        </div>
         <div class="form-group col-md-5">
           Nombre:
                 <input id="nombre" name ="nombre" class="form-control " type="text" required placeholder="Introduce tu nombre">
         </div>
            
            <div class="form-group col-md-5 ">
                 Apellido paterno:
                 <input id="ap" name ="ap" type="text" class="form-control " required placeholder="Introduce tu apellido">
            </div>
            
            <div class="form-group col-md-5">
               Apellido materno:
                 <input id="am" name ="am" type="text" class="form-control " required placeholder="Introduce tu apellido">
            </div>
                
              <div class="form-group col-md-5">
        
             Área:
                 <select class="form-control " id= "area" name="area">
                    <option value="0">Elige un área</option> 
                        <?php
    while($datos = mysqli_fetch_assoc($consulta))
    {
        ?>      
    <option value="<?php echo  $datos['id_area'] ?>"><?php echo  $datos['area'] ?></option>           <?php
    }
      ?>
                 </select>
           </div>
                  <div class="form-group col-md-5 no">
                   Departamento:
                  <select class="form-control " id= "departamento" name="departamento">
                    <option value="Ninguno">Ninguno</option>
   
                   
                 </select>
             </div>
         <div class="form-group col-md-5">
           Puesto de trabajo:
                 <input id="puesto"  class="form-control " name ="puesto" type="text"  placeholder="Introduce tu puesto">
         </div>
          <div class="form-group col-md-5">
      Correo electronico:
      <input class="form-control " id="correo" name ="correo" type="email" required placeholder="Introduce tu correo">
   </div>
                
        <div class="form-group col-md-5">
          Contraseña:
               <input class="form-control " id="pass" name ="pass" type="password"  required placeholder="Introduce tu contraseña">
        </div>
                <input style="margin-bottom: 10px;" type="submit" class="btn btn-success" value="Registrar"></center> 
              </form> 
<a href="administracion_contra.php" ><button class="btn btn-dark boton border border-light">Regresar</button></a>
</div>

<script src="../js/mostrar_menu.js"></script>
<script src="../js/js.js"></script>
 
<script type="text/javascript">
    $(document).ready(function(){
     $("#area").change(function(){
        //$("#departamento").find('option').remove().end().apped(
            //'<option value ="whatever"></option>').val('whatever');
        $("#area option:selected").each(function(){
            id_area = $ (this).val();
            $.post("getDepartamento.php",{id_area:id_area},
                function(data){
                    $("#departamento").html(data);
                });
        });
     })
    });
    $('#jefe_area').click(function(){
         $('.no').addClass('oculto');
           
    });
      $('#jefe_departamento').click(function(){
  
           $('.no').removeClass('oculto');
    });
</script>
</body>
</html>