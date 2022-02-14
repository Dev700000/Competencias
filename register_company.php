<?php
      /* session_start();
        if (isset($_SESSION['correo']) and $_SESSION['tipo_usuario']=='Administrador') {
          
        } else {
          header("Location: ../cerrar_sesion.php");
        }
*/

    
        ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/EstilosMenu.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script src="librerias/jquery/jquery-3.1.1.min.js"></script>

	<title>Registrar empresas</title>
    <style type="text/css">
        .fondo{
         /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#f9fcf7+65,1fc9e0+99 */
background: #f9fcf7; /* Old browsers */
background: -moz-linear-gradient(top,  #f9fcf7 65%, #1fc9e0 99%); /* FF3.6-15 */
background: -webkit-linear-gradient(top,  #f9fcf7 65%,#1fc9e0 99%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom,  #f9fcf7 65%,#1fc9e0 99%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f9fcf7', endColorstr='#1fc9e0',GradientType=0 ); /* IE6-9 */

        }
        .grande{
            width: 15px;
            height: 15px;

    
        }

    </style>
</head>
<body class="fondo">

    <center><h1>Registre su empresa</h1>
    <form action="save_company.php" method="post" name="elformulario" enctype="multipart/form-data">
 
       
         <div class="form-group col-md-5">
             Nombre de la compañia: *
                 <input id="nombre" name ="nombre" class="form-control border" type="text" required placeholder="Introduce el nombre">
         </div>
              
            <div class="form-group col-md-5 ">
                   Dirección: *
                 <input id="direccion" name ="direccion" type="text" class="form-control border" required placeholder="Introduce tu direccion">
            </div>
          
            <div class="form-group col-md-5">
                Correo electrónico: *
                 <input id="correo" name ="correo" type="text" class="form-control border" required placeholder="Introduce correo">
            </div>
             <div class="form-group col-md-5">

                Contraseña: * 
                <span  id="passwd_sitio"> <input name="input_pass" id="input_pass" value="" type="password" class="form-control border" required placeholder="Introduce Contraseña"></span>
                Ver contraseña:<input type="checkbox" class="grande" name="input_ver" value="ver" onclick="ver_password();">
            </div>
           
                 <div class="form-group col-md-5">
                   Telefono:
                 <input id="phone"  class="form-control border" name ="phone" type="text"  placeholder="Introduce tu Telefono">
                 </div>
                 <!--  Logotipo de la empresa (Opcional):<br>
                 <div class="col-md-5 custom-file"> 
                  
  <input type="file" class="custom-file-input" id="customFile" name="logo">
  <label class="custom-file-label" for="customFile">Elige un archivo .png .jpg .jpge</label>
</div> -->
<br>

                    <input style="margin-bottom: 10px; margin-top: 10px;" type="submit" class="btn btn-success" value="Registrar"></center>
                </form><br>
                    <a href="index.php" ><button class="btn btn-danger boton border border-light ">Cancelar</button></a>

 <script language="JavaScript">
function ver_password() {
    var passwd_valor = document.elformulario.input_pass.value;
 
    document.getElementById('passwd_sitio').innerHTML
        = (document.elformulario.input_ver.checked)
        ? '<input type="text"  class="form-control border"   name="input_pass" value="" required placeholder="Introduce Contraseña">'
        : '<input type="password" class="form-control border" name="input_pass" value="" required placeholder="Introduce Contraseña">'
        ;
 
    document.elformulario.input_pass.value = passwd_valor;
}
</script>

</body>
</html>