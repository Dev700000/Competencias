<?php 

   if (isset($_SESSION['correo']) and $_SESSION['tipo_usuario']=='Administrador') {
   	?>

   	<header class="encabezado" >
	
	<a href="../cerrar_sesion.php" ><i id="cerrar" class="fas fa-sign-out-alt" style="font-size: 30px; margin-right: 30px; "></i></a>
	<a href="administrador.php" ><span  class="fas fa-home"  style="font-size: 30px; margin-left: 30px;"></span></a>

</header>
   	<?php
   }
      else if (isset($_SESSION['correo']) and $_SESSION['tipo_usuario']=='Jefe area' or  $_SESSION['tipo_usuario']=='Jefe departamento'){
      	?>
      	 	<header class="encabezado" >
	
	<a href="../cerrar_sesion.php" ><i id="cerrar" class="fas fa-sign-out-alt" style="font-size: 30px; margin-right: 30px; "></i></a>
	<a href="../evaluador/evaluador.php" ><span  class="fas fa-home"  style="font-size: 30px; margin-left: 30px;"></span></a>

</header>
      	<?php

          
        } else {
          header("Location: ../cerrar_sesion.php");
        }
         ?>

