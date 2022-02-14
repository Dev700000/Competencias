<!doctype html>
<html lang="en-US">
<head>
    <link rel="shortcut icon" href="img/favicon1.png">

    <script src="../librerias/jquery/jquery-3.1.1.min.js"></script>
<style type="text/css">
    @charset "utf-8";
/* CSS Document */

/* ---------- FONTAWESOME ---------- */
/* ---------- http://fortawesome.github.com/Font-Awesome/ ---------- */
/* ---------- http://weloveiconfonts.com/ ---------- */

@import url(http://weloveiconfonts.com/api/?family=fontawesome);

/* ---------- ERIC MEYER'S RESET CSS ---------- */
/* ---------- http://meyerweb.com/eric/tools/css/reset/ ---------- */

@import url(http://meyerweb.com/eric/tools/css/reset/reset.css);

/* ---------- FONTAWESOME ---------- */

[class*="fontawesome-"]:before {
  font-family: 'FontAwesome', sans-serif;
}

/* ---------- GENERAL ---------- */

body {
    background-color: #2c3338;
    color: #606468;
    font-family: 'Open Sans', Arial, sans-serif;
    font-size: 14px;
    line-height: 1.5em;
}

a {
    color: #eee;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

input {
    border: none;
    font-family: 'Open Sans', Arial, sans-serif;
    font-size: 14px;
    line-height: 1.5em;
    padding: 0;
    -webkit-appearance: none;
}

p {
    line-height: 1.5em;
}

.clearfix { *zoom: 1; } /* For IE 6/7 */
.clearfix:before, .clearfix:after {
    display: table;
    content: "";
}
.clearfix:after { clear: both; }

/* ---------- LOGIN ---------- */

#login {
    margin: 50px auto;
    width: 280px;
}

#login form span {
    background-color: #363b41;
    border-radius: 3px 0px 0px 3px;
    -moz-border-radius: 3px 0px 0px 3px;
    -webkit-border-radius: 3px 0px 0px 3px;
    color: #606468;
    display: block;
    float: left;
    height: 50px;
    line-height: 50px;
    text-align: center;
    width: 50px;
}

#login form input {
    height: 50px;
}

#login form input[type="text"], input[type="password"] {
    background-color: #3b4148;
    border-radius: 0px 3px 3px 0px;
    -moz-border-radius: 0px 3px 3px 0px;
    -webkit-border-radius: 0px 3px 3px 0px;
    color: white;
    margin-bottom: 1em;
    padding: 0 16px;
    width: 198px;
}

#login form input[type="submit"] {
    border-radius: 3px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    background-color:  #1E9D07;
    color: #eee;
    font-weight: bold;
    margin-bottom: 2em;
    text-transform: uppercase;
    width: 280px;
}

#login form input[type="submit"]:hover {
    background-color: #1A8407;
}

#login > p {
    text-align: center;
}

#login > p span {
    padding-left: 5px;
}
</style>
	<meta charset="utf-8">

	<title>Login</title>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>

<body>

    <div id="login">
        
        <form action="validar_datos2.php" method="post">
             <?php
     if(isset($errorvalidacion)){
      echo "<div style='background-color: red; color:white; text-align: center;'>" .$errorvalidacion."</div> <br><br>";
   
       }
       else {
        echo "<br><br><br>";
       }
     ?>
             <center><strong style="background-color: #1E9D07; color: white; padding:5px">INICIO DE SESIÓN</strong></center><br>
            <fieldset class="clearfix">
               
                <p><span class="fontawesome-user"></span><input type="text" name="correo" value="Correo electrónico" onBlur="if(this.value == '') this.value = 'Correo electrónico'" onFocus="if(this.value =! '') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
                <p><span class="fontawesome-lock"></span><input type="password" name="pass" value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
                <p><input type="submit" value="Entrar"></p>

            </fieldset>

        </form>
        
        <p>¿No estas registrado? <a href="register_company.php">Registrate</a><span class="fontawesome-arrow-right"></span></p>

    </div> <!-- end login -->

</body>
</html>