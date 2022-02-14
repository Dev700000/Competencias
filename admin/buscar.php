<?php 
//include 'conexion.php';
session_start();
error_reporting(1);
 $id_company =$_SESSION['id_company'];

$mysqli = new mysqli("localhost","root","","competencias");
echo "<center><h3>Evaluadores</h3></center>";
$consulta = "SELECT * FROM jefes WHERE tipo_usuario != 'subordinado' AND id_company='$id_company'"
or die ("error al actualizar los datos");
if(isset($_POST['consulta'])){
	$q = $mysqli->real_escape_string($_POST['consulta']);
	$consulta = "SELECT id_jefes,nombre,ap,am,area,departamento,puesto,tipo_usuario,correo,password FROM jefes WHERE id_company='$id_company' AND  tipo_usuario != 'subordinado'AND nombre LIKE '%".$q."%' OR area LIKE'%".$q."%' OR tipo_usuario LIKE '%".$q."%' OR departamento LIKE '%".$q."' OR ap LIKE '%".$q."%' OR am LIKE '%".$q."%' "
or die ("error al actualizar los datos");

}
$resultado = $mysqli->query($consulta);
if ($resultado->num_rows > 0){
	
?>
	<table class='table table-sm table-bordered table-hover table-condensed'>

<tr  class='table-success'>
<th class='d-none'>ID</th>
<th id= 'nombre'>Nombre</th>

<th class='noquieroverteenmobil' >Área</th>
<th  class='noquieroverteenmobil' >Departamento</th>
<th  class='noquieroverteenmobil'  >Puesto</th>
<th  class='noquieroverteenmobil' >Usuario</th>
<th >Correo Electronico</th>
<th >Contraseña</th>
<th >Acciones</th>

</tr>
<?php
while($datos = $resultado->fetch_assoc())
{
	?>
	<tr>
	<td class='d-none'><?php echo $datos['id_jefes']; ?></td>
	<td><?php echo $datos['nombre']." ".$datos['ap']." ".$datos['am']; ?></td>
	
	<td  class='noquieroverteenmobil' ><?php echo $datos['area']; ?></td>
	<td  class='noquieroverteenmobil' ><?php echo $datos['departamento']; ?></td>
	<td  class='noquieroverteenmobil' ><?php echo $datos['puesto']; ?></td>
	<td  class='noquieroverteenmobil' ><?php echo $datos['tipo_usuario']; ?></td>
	<td><?php echo $datos['correo']; ?></td>
	<td><?php echo $datos['password']; ?></td>
	
	 <td><button id='btnGroupDrop1' type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
      Acción
    </button>
    <div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>
       <a class='dropdown-item ' href='modificar_administrador.php?id_jefes=<?php echo $datos['id_jefes']; ?>'>Modificar</a>
       <a class='dropdown-item ' href='eliminar_administrador.php?id_jefes=<?php echo $datos['id_jefes']; ?>'>Eliminar</a>
      </div> </td>
	 </tr>
	 <?php 
}
?>
 </table>
<?php
}
else {
	echo "No hay resultados con ".$q;
}
echo "<h3>Subordinados</h3>";
$consulta1 = "SELECT * FROM jefes WHERE tipo_usuario = 'subordinado' AND id_company='$id_company'"
or die ("error al actualizar los datos");
if(isset($_POST['consulta'])){

	$q = $mysqli->real_escape_string($_POST['consulta']);
	$consulta1 = "SELECT id_jefes,nombre,ap,am,area,departamento,puesto,tipo_usuario,correo,password FROM jefes  where id_company='$id_company' AND tipo_usuario !='administrador'  AND nombre LIKE '%".$q."%' OR area LIKE'%".$q."%' OR tipo_usuario LIKE '%".$q."%' OR departamento LIKE '%".$q."' OR ap LIKE '%".$q."%' OR am LIKE '%".$q."%'"
or die ("error al actualizar los datos");
}

$resultado = $mysqli->query($consulta1);
if ($resultado->num_rows > 0){
?>
<table class='table table-sm table-bordered table-hover table-condensed'>

<tr  class='table-success'>
<th class='d-none'>ID</th>
<th>Nombre</th>

<th >Área</th>
<th >Departamento</th>
<th  class='noquieroverteenmobil' >Puesto</th>
<th  class='noquieroverteenmobil' >Usuario</th>

<th >Acciones</th>

</tr>
<?php
while($datos = $resultado->fetch_assoc())
{
	?>
	<tr>
	<td class='d-none'><?php echo $datos['id_jefes']; ?></td>
	<td><?php echo $datos['nombre']." ".$datos['ap']." ".$datos['am'];  ?></td>
	
	<td><?php echo $datos['area']; ?></td>
	<td><?php echo $datos['departamento']; ?></td>
	<td  class='noquieroverteenmobil' ><?php echo $datos['puesto']; ?></td>
	<td  class='noquieroverteenmobil' ><?php echo $datos['tipo_usuario']; ?></td>
	
<td><button id='btnGroupDrop1' type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
      Acción
    </button>
    <div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>
       <a class='dropdown-item ' href='modificar_administrador.php?id_jefes=<?php echo $datos['id_jefes']; ?>''>Modificar</a>
       <a class='dropdown-item ' href='eliminar_administrador.php?id_jefes=<?php echo $datos['id_jefes']; ?>''>Eliminar</a>
     </div>
 </td>
	</tr>
	<?php
}
?>
</table>
<?php

}
else {
	echo "No hay resultados con ".$q;
}


	
mysqli_close($mysqli);
include "footer.php";



?>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
<script type="text/javascript">
  //cuando el documento este listo
  $(document).ready(function(){
    //activar la funcion cuando el botonn con el la clase edit se oprima
$('#eliminar').on('click', function(){
  //abrir el modal con el #id
$('#modaleliminar').modal('show');

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