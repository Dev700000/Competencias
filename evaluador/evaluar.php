<?php 
 session_start();
extract($_POST);
extract($_GET);
extract($_SESSION);
error_reporting(1);
$hora = new DateTime("now", new DateTimeZone('America/Mexico_City'));
date_default_timezone_get('America/Mexico_City');
$fecha = date("d/m/y");
$fechayhora= $fecha."-".$hora->format('G:i');

        if (isset($_SESSION['correo'])) {
          
        } else {
          header("Location: cerrar_sesion.php");
        }
//error_reporting(1);
//extraigo id_encuesta y id_subordinado

$id_jefes = $_GET['id_jefes'];
$id_encuesta = $_GET['id_encuesta'];
include'../conexion.php';
if(isset($id_jefes) && isset($id_encuesta))
{
$_SESSION[jid]=$id_jefes;
$_SESSION[eid]=$id_encuesta;
header("location:evaluar.php");
}
if(!isset($_SESSION[jid]) || !isset($_SESSION[eid]))
{
echo "algo salio mal";
exit();
}

   
$consulta = mysqli_query($conn,"SELECT * FROM respuestas WHERE id_subordinado = '$jid' AND id_encuesta = '$eid'")
or die("error al actualizar los datos");
$datos = mysqli_fetch_assoc($consulta);


$rs = mysqli_query ($conn,"SELECT * FROM preguntas WHERE id_enc = '$eid' AND estado = 'activado'")
or die ("error al actualizar los datos");

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../librerias/bootstrap/bootstrap/css/bootstrap.min.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>evaluación</title>
</head>
<body>
  <?php
  if(!isset($_SESSION[qn]))
{
  $_SESSION[qn]=0;
  mysqli_query($conn,"delete from respuestas where id_subordinado='$jid'") or die(mysql_error());
  $_SESSION[r2]=0;
}
else
{ 
  if($submit =='Siguiente' && isset($ans))
     {    if ($row3 = $datos)
      {echo "<h3>ya evaluaste esta competencia a este usuario, intenta con otra<h3>";
      exit();
    }else {
      $r += $ans;
        $_SESSION[r] = $r;
     
        mysqli_data_seek($rs,$_SESSION[qn]);
        $row= mysqli_fetch_row($rs);  
       // $sql ="INSERT INTO respuestas (id_subordinado,id_encuesta,opcion,fecha) VALUES('$jid','$eid','$ans','$fechayhora')";
        //$result = $conn->query($sql); 

        //mysqli_close($conn);
       

        $_SESSION[qn] = $_SESSION[qn]+1;
        echo $r;
      }
    }
    else if($submit =='Terminar' && isset($ans))
    {     $r += $ans;
     $_SESSION[r] += $ans;
       mysqli_data_seek($rs,$_SESSION[qn]);
        $row= mysqli_fetch_row($rs); 
        $row_cnt = $rs->num_rows;
        //echo  $row_cnt;
        //echo "<br>";
        //echo $r;
        //echo "<br>";
         $m = 5 * $row_cnt;
         //echo $m."soy m";
          //echo "<br>";
         $res = ($r/$m) * 100;
          echo round($res,2);
          echo "<br>";
          if ($res <=20){
            $resultado1 = 'Nada productivo';
            echo $resultado1;
               $sql = "INSERT INTO respuestas (id_subordinado,id_encuesta,opcion,opcion2,fecha) VALUES('$jid','$eid','$res','$resultado1','$fechayhora')";
              $result = $conn->query($sql); 
          }
          else if (($res > 21.0 ) and ($res <= 35.9)){
            $resultado1 = "Nada productivo";
            echo $resultado1;
              $sql = "INSERT INTO respuestas (id_subordinado,id_encuesta,opcion,opcion2,fecha) VALUES('$jid','$eid','$res','$resultado1','$fecha')";
              $result = $conn->query($sql); 
          }
          else if (($res > 36 )and ($res<= 51.9)){
             $resultado1 ="Poco productivo";
            echo $resultado1;
              $sql = "INSERT INTO respuestas (id_subordinado,id_encuesta,opcion,opcion2,fecha) VALUES('$jid','$eid','$res','$resultado1','$fecha')";
              $result = $conn->query($sql); 
          }
          else if (($res >52 )and ($res<=67.9)){
             $resultado1 = "Regular";
            echo $resultado1;
              $sql = "INSERT INTO respuestas (id_subordinado,id_encuesta,opcion,opcion2,fecha) VALUES('$jid','$eid','$res','$resultado1','$fecha')";
              $result = $conn->query($sql); 
          }
          else if (($res >68 )and ($res <= 83.9)){
            $resultado1 = "Productivo";
            echo $resultado1;
              $sql = "INSERT INTO respuestas (id_subordinado,id_encuesta,opcion,opcion2,fecha) VALUES('$jid','$eid','$res','$resultado1','$fecha')";
              $result = $conn->query($sql); 
          }
          else if (($res>84 )and ($res <= 100)){
             $resultado1 = "Muy productivo";
            echo $resultado1;
              $sql = "INSERT INTO respuestas (id_subordinado,id_encuesta,opcion,opcion2,fecha) VALUES('$jid','$eid','$res','$resultado1','$fecha')";
              $result = $conn->query($sql); 
          }
     
        mysqli_close($conn);
        echo "<br>";
        echo "<h3>Gracias por evaluar esta competencia a este usuario<h3>";
        
        unset($_SESSION[qn]);
        unset($_SESSION[jid]);
        unset($_SESSION[eid]);
        unset($_SESSION[r]);  
        exit;
    } 
  }
  ?>

<?php
 $row_cnt = $rs->num_rows;
mysqli_data_seek($rs,$_SESSION[qn]);
$row= mysqli_fetch_row($rs);
$n = $_SESSION[qn] + 1;
?>
<form  method="post" action="evaluar.php">


<div>

<input type="hidden" name ="id_jefes" id="id_jefes" value="<?php echo $jid;?>"></div>
<div>

<input type="hidden" name ="id_encuesta" id="id_encuesta" value="<?php echo $eid;?>" ></div>
<div>
  <h3>pregunta  <?php echo $n.' de '.$row_cnt.': '. $row[2];?></h3>
</div>
<div>
  <input type="radio" name="ans" value=5> Muy productivo
</div>
<div>
  <input  type="radio" name="ans" value=4> Productivo
</div>
<div>
  <input  type="radio" name="ans" value=3> Regular
</div>
<div>
  <input  type="radio" name="ans" value=2> Poco productivo
</div>
<div>
  <input  type="radio" name="ans" value=1> Nada productivo
</div>
<?php
if($_SESSION[qn]<mysqli_num_rows($rs)-1){
  ?>
<input type="submit" name="submit" id="submit" value='Siguiente'></form>
<?php
}else{?>
<input type="submit" name="submit" id="submit" value='Terminar'></form>
<?php
}
  
?>


</body>
</html>
