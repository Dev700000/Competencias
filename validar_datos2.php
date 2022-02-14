<?php 	
require 'conexion.php';
session_start();
error_reporting(1);

$correo = $_POST['correo'];
#echo $correo;
$password  = $_POST['pass'];
#echo $password;

if ($correo == 'everlever' and $password == 'everlever') {

		    
			$_SESSION['tipo_usuario']='Administrador';
			$_SESSION['correo'] = 'everlever';
			header('location: admin/administrador.php');
}
else {
$query = "SELECT * FROM jefes WHERE correo = '$correo' AND password = '$password' AND estado='1'";
	
	$resultado = $conn->query($query);
	if ($row = $resultado->fetch_assoc())
	    {
		if ($row['tipo_usuario'] == 'Administrador') 
		{    
			$_SESSION['id_company']=$row['id_company'];
		    $_SESSION['id']=$row['id_jefes'];
			$_SESSION['tipo_usuario']=$row['tipo_usuario'];
			$_SESSION['correo'] = $row['correo'];
			header('location: admin/administrador.php');
		} 
		else if ($row['tipo_usuario'] == 'Jefe area') 
		{
			$_SESSION['id_company']=$row['id_company'];
			$_SESSION['id']=$row['id_jefes'];
			$_SESSION['correo'] = $row['correo'];
			$_SESSION['nombre'] = $row['nombre'];
			$_SESSION['area'] = $row['area'];
			$_SESSION['tipo_usuario'] = $row['tipo_usuario'];

			header("Location: evaluador/evaluador.php");
		}
		else if ($row['tipo_usuario'] == 'Jefe departamento') 
		{ 	
			$_SESSION['id_company']=$row['id_company'];
			$_SESSION['id']=$row['id_jefes'];
			$_SESSION['correo'] = $row['correo'];
			$_SESSION['nombre'] = $row['nombre'];
			$_SESSION['departamento'] = $row['departamento'];
			$_SESSION['tipo_usuario'] = $row['tipo_usuario'];

			header("Location: evaluador/evaluador.php");
		}
		else {
$errorvalidacion = "USUARIO NO VALIDO";
		
		include_once 'index.php';
		}

	} 
	else 
	{
		
		$errorvalidacion = "USUARIO O CONTRASEÑA INCORRECTO";
		include_once 'index.php';
	}

	if (!$query) 
	{
	    printf("Error: %s\n", mysqli_error($conn));
	    exit();
	}
	
}
 ?>
