<?php
session_start();

error_reporting(1);
$hora = new DateTime("now", new DateTimeZone('America/Mexico_City'));
date_default_timezone_get();
$fecha = date("20y-m-d ");
$fechahora= $fecha."-".$hora->format('H:i:s');
$array = array();

include "../conexion.php";

$id_subordinado = $_POST['id_jefes'];
$consult = mysqli_query ($conn,"SELECT * FROM jefes WHERE id_jefes = '$id_subordinado' ")
or die ("error en la consulta");
$dato= mysqli_fetch_assoc($consult);
$area=$dato['area'];
$departamento=$dato['departamento'];
$nombrecompleto = $dato['nombre']." ".$dato['ap']." ".$dato['am'];
$nfilas = $_POST['filas'];
$id_encuesta = $_POST['id_encuesta'];
$titulo = $_POST['titulo'];
$id_company = $dato['id_company'];

$consulta = mysqli_query ($conn,"SELECT * FROM respuestas WHERE id_subordinado = '$id_subordinado' AND id_encuesta = '$id_encuesta'")
or die ("erro en la segunda consulta");
 if($datos= mysqli_fetch_assoc($consulta)){
  ?>
  <!DOCTYPE html>
  <html>
  <head>
     <link rel="shortcut icon" href="../img/favicon1.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/EstilosMenu.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <script src="../librerias/jquery/jquery-3.1.1.min.js"></script>
    <title>Evaluación</title>
  </head>
  <body>
   <div id="icono"></div>
<nav class="contenedor ">
  <h5>Bienvenido <?php echo $_SESSION['nombre']; ?></h5>
  <p>Subordinados a evaluar</p>

  <?php
include "../conexion.php";

$correo = $_SESSION['correo'];
$departamento = $_SESSION['departamento'];
$area = $_SESSION['area'];
$tipo_usuario = $_SESSION['tipo_usuario'];

if ($tipo_usuario == 'Jefe area' ) {
$consulta = mysqli_query ($conn,"SELECT * FROM jefes WHERE area = '$area' AND correo != '$correo' AND tipo_usuario = 'Jefe departamento' AND id_company='$id_company'")
or die ("No se encontraron resultados");

  while($datos = mysqli_fetch_assoc($consulta))
  {
    
    echo "<ul class='menu'>";
  echo "<li class='border border-success'>";
    echo "<a href='competencias.php?id_jefes=".$datos['id_jefes']."'> ".$datos['nombre']." ".$datos['ap']." ".$datos['am']."</a>";
    echo "</li>";
    echo "</ul>"; 
  
   }

}
if ($tipo_usuario == 'Jefe departamento'){

$consulta = mysqli_query ($conn,"SELECT * FROM jefes WHERE departamento = '$departamento' AND correo != '$correo' AND id_company='$id_company'")
or die ("No se encontraron resultados");

  while($datos = mysqli_fetch_array($consulta))
  {
    echo "<ul class='menu'>";
  echo "<li class='border border-success'>";
    echo "<a  href='competencias.php?id_jefes=".$datos['id_jefes']."'>".$datos['nombre']." ".$datos['ap']." ".$datos['am']."</a>";
    echo "</li>";
    echo "</ul>"; 
   $i++;  
   }
}
?>
<center>
<a target ='_top'  href='../cerrar_sesion.php' ><button class='btn btn-dark boton border border-light'>Cerrar sesion</button></a>
<br>
<br>
<?php 
if($tipo_usuario == 'Jefe area'){
  $area = "Area";
?>
<div>
<a  href="../grafica/barras_area.php?area=<?php echo $area1;?>" ><button class="btn btn-dark boton border border-light ">Resultados </button></a></div>
<?php 
}
else {
  $area='Departamento';
?>
<div>
<a href="../grafica/barras_departamento.php?departamento=<?php echo $departamento;?>" ><button class="btn btn-dark boton border border-light ">Resultados </button></a></div>
<?php
 }
?>
</nav>
<div id="body" class="cuerpo">
  <h2> Ya evaluaste a este usuario intenta con otro o otra competencia :)</h2>
</div>
<script src="../js/mostrar_menu.js"></script>
<script src="../js/js.js"></script>
</body>
  </body>
  </html>
 <?php
 	
 }
else {
	
 for ($i = 1; $i <= 100; $i++) {
	if (isset($_POST[$i])){
       $array[$i] = $_POST[$i];
	}
}
$suma = array_sum($array);
 $m = 5 * $nfilas;
         $res = ($suma/$m) * 100;
          if ($res <=20){
            $resultado1 = 'Nada productivo';
             
          }
          else if (($res >= 21.0 ) and ($res <= 35.9)){
            $resultado1 = "Nada productivo";
                
          }
          else if (($res >= 36 )and ($res<= 51.9)){
             $resultado1 ="Poco productivo";
              
          }
          else if (($res >=52 )and ($res<=67.9)){
             $resultado1 = "Regular";
                 
          }
          else if (($res >=68 )and ($res <= 83.9)){
            $resultado1 = "Productivo";
                
          }
          else if (($res>=84 )and ($res <= 100)){
             $resultado1 = "Muy productivo";
            //echo $resultado1;    
          }

          $sql = "INSERT INTO respuestas (id_subordinado,id_encuesta,area,departamento,titulo,opcion,opcion2,fecha,id_company) VALUES('$id_subordinado','$id_encuesta','$area','$departamento','$titulo','$res','$resultado1','$fecha','$id_company')";
              $result = $conn->query($sql);  

$consulta2 = mysqli_query ($conn,"SELECT * FROM respuestas_areas WHERE id_subordinado = '$id_subordinado'")
or die ("error respuestas_areas");
$rowcnt = mysqli_query ($conn,"SELECT * FROM respuestas WHERE id_subordinado = '$id_subordinado'")
or die ("error al actualizar los datos");
$datos= mysqli_fetch_assoc($consulta2);
 if(isset($datos)){
$consulta3 = mysqli_query ($conn,"SELECT SUM(opcion) as total FROM respuestas WHERE id_subordinado = '$id_subordinado'")
or die ("error al sumar el promedio en areas");
$datos3= mysqli_fetch_assoc($consulta3);

$row_cnt = $rowcnt->num_rows; //echo "soy el row cont".$row_cnt."<br>"; 

  $promedio = $datos3['total'] / $row_cnt;
         if ($promedio <=20){
            $resultado1 = 'Nada productivo';           
          }
          else if (($promedio >= 21.0 ) and ($promedio <= 35.9)){
            $resultado1 = "Nada productivo";     
          }
          else if (($promedio >= 36 )and ($promedio<= 51.9)){
             $resultado1 ="Poco productivo";
               
          }
          else if (($promedio >=52 )and ($promedio<=67.9)){
             $resultado1 = "Regular";      
          }
          else if (($promedio >=68 )and ($promedio <= 83.9)){
            $resultado1 = "Productivo";     
          }
          else if (($promedio>=84 )and ($promedio <= 100)){
             $resultado1 = "Muy productivo";  
          }
           $query="UPDATE respuestas_areas SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE id_subordinado='$id_subordinado'";
$resultado=$conn->query($query); 
 }
else {
  $consulta3 = mysqli_query ($conn,"SELECT SUM(opcion) as total FROM respuestas WHERE id_subordinado = '$id_subordinado'")
or die ("error al sumar en respuestas me imagino Promedio_areas");
$datos3= mysqli_fetch_assoc($consulta3);
$total2 = $datos3['total'];
$row_cnt = $rowcnt->num_rows;
  $promedio = $datos3['total'] / $row_cnt;

              if ($promedio <=20){
            $resultado1 = 'Nada productivo';
            
          }
          else if (($promedio >= 21.0 ) and ($promedio <= 35.9)){
            $resultado1 = "Nada productivo";
           
          }
          else if (($promedio >= 36 )and ($promedio<= 51.9)){
             $resultado1 ="Poco productivo";
           
          }
          else if (($promedio >=52 )and ($promedio<=67.9)){
             $resultado1 = "Regular";
            //echo $resultado1;
                 
          }
          else if (($promedio >=68 )and ($promedio <= 83.9)){
            $resultado1 = "Productivo";
            //echo $resultado1;
            
          }
          else if (($promedio>=84 )and ($promedio <= 100)){
             $resultado1 = "Muy productivo";
            //echo $resultado1;
              
          }
             $sql = "INSERT INTO respuestas_areas (id_subordinado,nombre,area,promedio,valoracion,fecha,id_company) VALUES('$id_subordinado','$nombrecompleto','$area','$promedio','$resultado1','$fecha','$id_company')";
              $result = $conn->query($sql); 
}
unset($resultado1);
unset($promedio);
unset($row_cnt2);
unset($datos3);
unset($total2);
unset($consulta2);

/*aqui esta lo del departamentos------------------------------------------------------------------------------------------------------------------*/

$consulta2 = mysqli_query ($conn,"SELECT * FROM respuestas_areas WHERE id_subordinado = '$id_subordinado'AND departamento='$departamento'")
or die ("error ");
$rowcnt = mysqli_query ($conn,"SELECT * FROM respuestas WHERE id_subordinado = '$id_subordinado'")
or die ("error ");
$datos= mysqli_fetch_assoc($consulta2);
 if(isset($datos)){
$consulta3 = mysqli_query ($conn,"SELECT SUM(opcion) as total FROM respuestas WHERE id_subordinado = '$id_subordinado'")
or die ("error ");
$datos3= mysqli_fetch_assoc($consulta3);

$row_cnt = $rowcnt->num_rows; //echo "soy el row cont".$row_cnt."<br>"; 

  $promedio = $datos3['total'] / $row_cnt;

              if ($promedio <=20){
            $resultado1 = 'Nada productivo';
           
          }
          else if (($promedio >= 21.0 ) and ($promedio <= 35.9)){
            $resultado1 = "Nada productivo";
      
          }
          else if (($promedio >= 36 )and ($promedio<= 51.9)){
               $resultado1 = "Poco productivo";
          }
          else if (($promedio >=52 )and ($promedio<=67.9)){
             $resultado1 = "Regular";
            //echo $resultado1;
            
          }
          else if (($promedio >=68 )and ($promedio <= 83.9)){
            $resultado1 = "Productivo";
            //echo $resultado1;
               
          }
          else if (($promedio>=84 )and ($promedio <= 100)){
             $resultado1 = "Muy productivo";
            //echo $resultado1;
              
          }
            $query="UPDATE respuestas_areas SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE id_subordinado='$id_subordinado' AND departamento='$departamento'";
$resultado=$conn->query($query); 
 }
else {
  $consulta3 = mysqli_query ($conn,"SELECT SUM(opcion) as total FROM respuestas WHERE id_subordinado = '$id_subordinado'")
or die ("error en departamentos");
$datos3= mysqli_fetch_assoc($consulta3);
$total2 = $datos3['total'];
$row_cnt = $rowcnt->num_rows;

  $promedio = $datos3['total'] / $row_cnt;

              if ($promedio <=20){
            $resultado1 = 'Nada productivo';
  
          }
          else if (($promedio >= 21.0 ) and ($promedio <= 35.9)){
            $resultado1 = "Nada productivo";
            
          }
          else if (($promedio >= 36 )and ($promedio<= 51.9)){
             $resultado1 ="Poco productivo";
          
          }
          else if (($promedio >=52 )and ($promedio<=67.9)){
             $resultado1 = "Regular";
            
          }
          else if (($promedio >=68 )and ($promedio <= 83.9)){
            $resultado1 = "Productivo";
          
          }
          else if (($promedio>=84 )and ($promedio <= 100)){
            
          }
                       $sql = "INSERT INTO respuestas_areas (id_subordinado,nombre,departamento,promedio,valoracion,fecha,id_company) VALUES('$id_subordinado','$nombrecompleto','$departamento','$promedio','$resultado1','$fecha','$id_company')";
              $result = $conn->query($sql); 
}
unset($resultado1);
unset($promedio);
unset($row_cnt);
unset($datos3);
unset($total2);
unset($consulta2);


/*aqui van los generales-------------------------------------------------------------------------------------------------------------------*/


$consulta2 = mysqli_query ($conn,"SELECT * FROM respuestas_generales WHERE area = '$area'")
or die ("error general");
$rowcnt = mysqli_query ($conn,"SELECT * FROM respuestas_areas WHERE area = '$area'")
or die ("error general");
$datos= mysqli_fetch_assoc($consulta2);
 if(isset($datos)){
$consulta3 = mysqli_query ($conn,"SELECT SUM(promedio) as total FROM respuestas_areas WHERE area = '$area'")
or die ("error general");
$datos3= mysqli_fetch_assoc($consulta3);

$row_cnt = $rowcnt->num_rows; //echo "soy el row cont".$row_cnt."<br>"; 

  $promedio = $datos3['total'] / $row_cnt;
 
              if ($promedio <=20){
            $resultado1 = 'Nada productivo';
           
          }
          else if (($promedio >= 21.0 ) and ($promedio <= 35.9)){
            $resultado1 = "Nada productivo";
           
          }
          else if (($promedio >= 36 )and ($promedio<= 51.9)){
             $resultado1 ="Poco productivo";
            
          }
          else if (($promedio >=52 )and ($promedio<=67.9)){
             $resultado1 = "Regular";
           
          }
          else if (($promedio >=68 )and ($promedio <= 83.9)){
            $resultado1 = "Productivo";
           
          }
          else if (($promedio>=84 )and ($promedio <= 100)){
             $resultado1 = "Muy productivo";
          
          }
          //echo $resultado1;
                $query="UPDATE respuestas_generales SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE area='$area'";
$resultado=$conn->query($query);  
 }
else {
  $consulta3 = mysqli_query ($conn,"SELECT SUM(promedio) as total FROM respuestas_areas WHERE area = '$area'")
or die ("error general");
$datos3= mysqli_fetch_assoc($consulta3);
$total2 = $datos3['total'];
$row_cnt = $rowcnt->num_rows;

  $promedio = $datos3['total'] / $row_cnt;

              if ($promedio <=20){
            $resultado1 = 'Nada productivo';
            
          }
          else if (($promedio >= 21.0 ) and ($promedio <= 35.9)){
            $resultado1 = "Nada productivo";
          
          }
          else if (($promedio >= 36 )and ($promedio<= 51.9)){
             $resultado1 ="Poco productivo";
          
          }
          else if (($promedio >=52 )and ($promedio<=67.9)){
             $resultado1 = "Regular";
           
          }
          else if (($promedio >=68 )and ($promedio <= 83.9)){
           
          }
          else if (($promedio>=84 )and ($promedio <= 100)){
             $resultado1 = "Muy productivo";
        
          }
          //echo $resultado1;
               $sql = "INSERT INTO respuestas_generales (area,promedio,valoracion,fecha,id_company) VALUES('$area','$promedio','$resultado1','$fecha','$id_company')";
              $result = $conn->query($sql); 
}
unset($resultado1);
unset($promedio);
unset($row_cnt);
unset($datos3);
unset($total2);
unset($consulta);
unset($consulta2);
unset($consulta3);
//-------------------------------------------------Ingreso de los promedios Departamento------------------------------------

$consulta2 = mysqli_query ($conn,"SELECT * FROM promedio_departamentos WHERE departamento = '$departamento'")
or die ("error al buscar el dato departamento");
$rowcnt = mysqli_query ($conn,"SELECT * FROM respuestas_areas WHERE departamento = '$departamento'")
or die ("error al buscar los promedio departamento en respuestas areas_areas");
$datos= mysqli_fetch_assoc($consulta2);
 if(isset($datos)){
$consulta3 = mysqli_query ($conn,"SELECT SUM(promedio) as total FROM respuestas_areas WHERE departamento = '$departamento'")
or die ("error al ingreso de promedios");
$datos3= mysqli_fetch_assoc($consulta3);

$row_cnt = $rowcnt->num_rows; //echo "soy el row cont".$row_cnt."<br>"; 

  $promedio = $datos3['total'] / $row_cnt;

              if ($promedio <=20){
            $resultado1 = 'Nada productivo';
          
          }
          else if (($promedio >= 21.0 ) and ($promedio <= 35.9)){
            $resultado1 = "Nada productivo";
         
          }
          else if (($promedio >= 36 )and ($promedio<= 51.9)){
             $resultado1 ="Poco productivo";
          
          }
          else if (($promedio >=52 )and ($promedio<=67.9)){
             $resultado1 = "Regular";
           
          }
          else if (($promedio >=68 )and ($promedio <= 83.9)){
            $resultado1 = "Productivo";
          
          }
          else if (($promedio>=84 )and ($promedio <= 100)){
             $resultado1 = "Muy productivo";
            
          }
          //echo $resultado1;
                  $query="UPDATE promedio_departamentos SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE departamento='$departamento'";
$resultado=$conn->query($query); 
 }
else {
  $consulta3 = mysqli_query ($conn,"SELECT SUM(promedio) as total FROM respuestas_areas WHERE departamento = '$departamento'")
or die ("error al ingreso de promedios");
$datos3= mysqli_fetch_assoc($consulta3);
$total2 = $datos3['total'];
$row_cnt = $rowcnt->num_rows;

  $promedio = $datos3['total'] / $row_cnt;

              if ($promedio <=20){
            $resultado1 = 'Nada productivo';
           
          }
          else if (($promedio >= 21.0 ) and ($promedio <= 35.9)){
            $resultado1 = "Nada productivo";
           
          }
          else if (($promedio >= 36 )and ($promedio<= 51.9)){
             $resultado1 ="Poco productivo";
         
          }
          else if (($promedio >=52 )and ($promedio<=67.9)){
             $resultado1 = "Regular";
         
          }
          else if (($promedio >=68 )and ($promedio <= 83.9)){
            $resultado1 = "Productivo";
          
          }
          else if (($promedio>=84 )and ($promedio <= 100)){
             $resultado1 = "Muy productivo";
         
          }
            // echo $resultado1;
                  $sql = "INSERT INTO promedio_departamentos (departamento,promedio,valoracion,fecha,id_company) VALUES('$departamento','$promedio','$resultado1','$fecha','$id_company')";
              $result = $conn->query($sql); 
}
unset($resultado1);
unset($promedio);
unset($row_cnt);
unset($datos3);
unset($total2);
unset($consulta);
unset($consulta2);
unset($consulta3);


//------------------------------------------Promedio_areas=respuestas_generales-------------------------------------------------------------

$consulta2 = mysqli_query ($conn,"SELECT * FROM respuestas_generales WHERE area = '$area'")
or die ("error al Promedio_areas");
$rowcnt = mysqli_query ($conn,"SELECT * FROM respuestas_areas WHERE area = '$area'")
or die ("error al Promedio_areas");
$datos= mysqli_fetch_assoc($consulta2);
 if(isset($datos)){
$consulta3 = mysqli_query ($conn,"SELECT SUM(promedio) as total FROM respuestas_areas WHERE area = '$area'")
or die ("error al Promedio_areas");
$datos3= mysqli_fetch_assoc($consulta3);

$row_cnt = $rowcnt->num_rows; //echo "soy el row cont".$row_cnt."<br>"; 

  $promedio = $datos3['total'] / $row_cnt;

              if ($promedio <=20){
            $resultado1 = 'Nada productivo';
          
          }
          else if (($promedio >= 21.0 ) and ($promedio <= 35.9)){
            $resultado1 = "Nada productivo";
           
          } 
          
          else if (($promedio >= 36 )and ($promedio<= 51.9)){
             $resultado1 ="Poco productivo";
            
          }
          else if (($promedio >=52 )and ($promedio<=67.9)){
             $resultado1 = "Regular";
           
          }
          else if (($promedio >=68 )and ($promedio <= 83.9)){
            $resultado1 = "Productivo";
         
          }
          else if (($promedio>=84 )and ($promedio <= 100)){
             $resultado1 = "Muy productivo";
            //echo $resultado1;
                  
          }
           $query="UPDATE respuestas_generales SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE area='$area'";
$resultado=$conn->query($query); 
 }
else {
  $consulta3 = mysqli_query ($conn,"SELECT SUM(promedio) as total FROM respuestas_areas WHERE area = '$area'")
or die ("Promedio_areas");
$datos3= mysqli_fetch_assoc($consulta3);
$total2 = $datos3['total'];
$row_cnt = $rowcnt->num_rows;

  $promedio = $datos3['total'] / $row_cnt;

              if ($promedio <=20){
            $resultado1 = 'Nada productivo';
          
          }
          else if (($promedio >= 21.0 ) and ($promedio <= 35.9)){
            $resultado1 = "Nada productivo";
          
          }
          else if (($promedio >= 36 )and ($promedio<= 51.9)){
             $resultado1 ="Poco productivo";
         
          }
          else if (($promedio >=52 )and ($promedio<=67.9)){
             $resultado1 = "Regular";
           
          }
          else if (($promedio >=68 )and ($promedio <= 83.9)){
            $resultado1 = "Productivo";
           
          }
          else if (($promedio>=84 )and ($promedio <= 100)){
             $resultado1 = "Muy productivo";
          
          }
            //echo $resultado1;
               $sql = "INSERT INTO respuestas_generales (area,promedio,valoracion,fecha,id_company) VALUES('$area','$promedio','$resultado1','$fecha','$id_company')";
              $result = $conn->query($sql); 
}
unset($resultado1);
unset($promedio);
unset($row_cnt);
unset($datos3);
unset($total2);
unset($consulta);
unset($consulta2);
unset($consulta3);


/*promedio por competencias//////*/



$consulta2 = mysqli_query ($conn,"SELECT * FROM competencia WHERE area = '$area' AND titulo='$titulo'")
or die ("error al buscar competencia");
$rowcnt = mysqli_query ($conn,"SELECT * FROM respuestas WHERE area = '$area' AND titulo='$titulo'")
or die ("error al buscar competencia");
$datos= mysqli_fetch_assoc($consulta2);
 if(isset($datos)){
$consulta3 = mysqli_query ($conn,"SELECT SUM(opcion) as total FROM respuestas WHERE area = '$area' AND titulo='$titulo'")
or die ("buscar competencia");
$datos3= mysqli_fetch_assoc($consulta3);

$row_cnt = $rowcnt->num_rows; //echo "soy el row cont".$row_cnt."<br>"; 

  $promedio = $datos3['total'] / $row_cnt;

              if ($promedio <=20){
            $resultado1 = 'Nada productivo';
          
          }
          else if (($promedio >= 21.0 ) and ($promedio <= 35.9)){
            $resultado1 = "Nada productivo";
            
          }
          else if (($promedio >= 36 )and ($promedio<= 51.9)){
             $resultado1 ="Poco productivo";
            
          }
          else if (($promedio >=52 )and ($promedio<=67.9)){
             $resultado1 = "Regular";
            
          }
          else if (($promedio >=68 )and ($promedio <= 83.9)){
            $resultado1 = "Productivo";
           
          }
          else if (($promedio>=84 )and ($promedio <= 100)){
             $resultado1 = "Muy productivo";
          
          }
            //echo $resultado1;
        $query="UPDATE competencia SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE area='$area'AND titulo='$titulo'";
$resultado=$conn->query($query); 
 }
else {

  $consulta3 = mysqli_query ($conn,"SELECT SUM(opcion) as total FROM respuestas WHERE area = '$area' AND titulo='$titulo'")
or die ("error al actualizar los datos");
$datos3= mysqli_fetch_assoc($consulta3);
$total2 = $datos3['total'];
$row_cnt = $rowcnt->num_rows;

  $promedio = $datos3['total'] / $row_cnt;

              
              if ($promedio <=20){
            $resultado1 = 'Nada productivo';
           
          } 
          else if (($promedio >= 21.0 ) and ($promedio <= 35.9)){
            $resultado1 = "Nada productivo";
            
          }
          else if (($promedio >= 36 )and ($promedio<= 51.9)){
             $resultado1 ="Poco productivo";
          
          }
          else if (($promedio >=52 )and ($promedio<=67.9)){
             $resultado1 = "Regular";
           
          }
          else if (($promedio >=68 )and ($promedio <= 83.9)){
            $resultado1 = "Productivo";
           
          }
          else if (($promedio>=84 )and ($promedio <= 100)){
             $resultado1 = "Muy productivo";
         
          }
           //echo $resultado1;
       $competencia = "INSERT INTO competencia (area,titulo,promedio,valoracion,fecha,id_company) VALUES('$area','$titulo','$promedio','$resultado1','$fecha','$id_company')";
              $resultados = $conn->query($competencia); 
}



mysqli_close($conn);
?>
 
<!DOCTYPE html>
  <html>
  <head>
     <link rel="shortcut icon" href="../img/favicon1.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/EstilosMenu.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <script src="../librerias/jquery/jquery-3.1.1.min.js"></script>
    <title>Evaluación</title>
  </head>
  <body>
   <div id="icono"></div>
<nav class="contenedor ">
  <h5>Bienvenido <?php echo $_SESSION['nombre']; ?></h5>
  <p>Subordinados a evaluar</p>

  <?php
include "../conexion.php";

$correo = $_SESSION['correo'];
$departamento = $_SESSION['departamento'];
$area = $_SESSION['area'];
$tipo_usuario = $_SESSION['tipo_usuario'];

if ($tipo_usuario == 'Jefe area' ) {
$consulta = mysqli_query ($conn,"SELECT * FROM jefes WHERE area = '$area' AND correo != '$correo' AND tipo_usuario = 'Jefe departamento' AND id_company='$id_company'")
or die ("No se encontraron resultados");

  while($datos = mysqli_fetch_assoc($consulta))
  {
    
    echo "<ul class='menu'>";
  echo "<li class='border border-success'>";
    echo "<a href='competencias.php?id_jefes=".$datos['id_jefes']."'> ".$datos['nombre']." ".$datos['ap']." ".$datos['am']."</a>";
    echo "</li>";
    echo "</ul>"; 
  
   }

}
if ($tipo_usuario == 'Jefe departamento'){

$consulta = mysqli_query ($conn,"SELECT * FROM jefes WHERE departamento = '$departamento' AND correo != '$correo' AND id_company='$id_company'")
or die ("No se encontraron resultados");

  while($datos = mysqli_fetch_array($consulta))
  {
    echo "<ul class='menu'>";
  echo "<li class='border border-success'>";
    echo "<a  href='competencias.php?id_jefes=".$datos['id_jefes']."'>".$datos['nombre']." ".$datos['ap']." ".$datos['am']."</a>";
    echo "</li>";
    echo "</ul>"; 
   $i++;  
   }
}
?>


<center>
<a target ='_top'  href='../cerrar_sesion.php' ><button class='btn btn-dark boton border border-light'>Cerrar sesion</button></a>
<br>
<br>
<?php 
if($tipo_usuario == 'Jefe area'){
  $area = "Area";
?>
<div>
<a  href="../grafica/barras_area.php?area=<?php echo $area1;?>" ><button class="btn btn-dark boton border border-light ">Resultados </button></a></div>
<?php 
}
else {
  $area='Departamento';

?>
<div>
<a href="../grafica/barras_departamento.php?departamento=<?php echo $departamento;?>" ><button class="btn btn-dark boton border border-light ">Resultados </button></a></div>
<?php
 }
?>

</nav>
<div id="body" class="cuerpo">
  <h2>El usuario ha sido evaluado  :)</h2>
</div>
<script src="../js/mostrar_menu.js"></script>
<script src="../js/js.js"></script>
</body>
  </body>
  </html>

<?php 


}
?>

