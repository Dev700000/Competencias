<?php

include 'conexion.php';

$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$pass = $_POST['input_pass'];
$phone = $_POST['phone'];
// $logo = addslashes(file_get_contents($_FILES['logo']['tmp_name']));



$sql = "INSERT INTO companys (name,direction,email,phone,state) VALUES('$nombre','$direccion','$correo','$phone','activo')";

$result = $conn->query($sql); 
if($result){

$consulta2 = mysqli_query ($conn,"SELECT id_company FROM companys WHERE email='$correo' ")
or die ("error al actualizar los datos");
$datos2 = mysqli_fetch_assoc($consulta2);
$id_company =$datos2['id_company'];
$id_company;

$sql2 = "INSERT INTO jefes (tipo_usuario,correo,password,id_company,estado) VALUES('Administrador','$correo','$pass','$id_company','1')";

$result2 = $conn->query($sql2); 
if($result2){
	$hola = 'hola';
	header ('location: index.php?hola=$hola');
}
	else{
		echo "Error al ingresar los datos";
	}

}else
{
echo 'Algo salio mal';
}

mysqli_close($conn);

//header('location: administracion_contra.php')
?>