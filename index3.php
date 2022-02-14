
<html>
<head>
  <link rel="shortcut icon" href="img/favicon1.png">
	<link rel="stylesheet" href="librerias/bootstrap/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<title>Login</title>
</head>
<body>
<div class="modal-dialog text-center">
<div class="col-sm-8 main">
<div class="modal-content">
<form  action="validar_datos2.php" method="post">
     <?php
     if(isset($errorvalidacion)){
      echo "<div class='alert alert-primary' role='alert'>" .$errorvalidacion."</div>";
   
       }
     ?>
     <h2 style="color:black;">Iniciar sesión</h2>
        <div class="form-group">
            
             <label>Correo electrónico:</label> 
               <input class="form-control" id="correo" name ="correo" type="email" required placeholder="Introduce tu correo">
               
   </div>
   <div class="form-group">
              <label>Contraseña:</label>
              <input class="form-control" id="pass" name ="pass" type="password"  required placeholder="Introduce tu contraseña"> 
              
        <div >
          <input class="btn btn-dark border border-light boton" type="submit" value="Entrar" >   
        </div>
           </div> 
            </div>  
             </div>  
              </div>         
 </form>
 <center>

</center>
</body>
</html>