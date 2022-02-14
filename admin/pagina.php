

<script>
    /**
     * Array con las imagenes y enlaces que se iran mostrando en la web
     */
    var imagenes=new Array(
        ['../img/imagen2.jpg',''],
        ['../img/imagen1.jpg',''],
        ['../img/imagen3.jpg',''],
        ['../img/imagen4.jpg',''],
        ['../img/imagen5.jpg',''],
        ['../img/imagen6.jpg',''],
        ['../img/imagen7.jpg','']
       
    );
    var contador=0;
 
    /**
     * Funcion para cambiar la imagen y link
     */
    function rotarImagenes()
    {
        // cambiamos la imagen y la url
        contador++
        document.getElementById("imagen").src=imagenes[contador%imagenes.length][0];
        document.getElementById("link").href=imagenes[contador%imagenes.length][1];
    }
 
    /**
     * Función que se ejecuta una vez cargada la página
     */
    onload=function()
    {
        // Cargamos una imagen aleatoria
        rotarImagenes();
 
        // Indicamos que cada 5 segundos cambie la imagen
        setInterval(rotarImagenes,4000);
    }
</script>

<?php include "header.php";  ?>
		<i id="link"><img src="" id="imagen" width="1300" height="600"></i>
	</div>
	<div>
		<ul style="list-style: none;" >
			<li class="textocentrado">
			<b>Gestor usuarios:</b>
			El panel de administrador puede registrar a los evaluadores o a los evaluados dependiendo de las jerarquias de la empresa, tambien puedes modificar, eliminar.

			</li>
			<li class="textocentrado">
				<b>Gestor de competencias:</b>
				Puedes dar de alta las competencias  a evaluar el titulo la descripcion, las preguntas que creas necesarias para hacer la evaluación.
				
			</li>
			<li class="textocentrado">
			<b>Resultados en graficas y pdf:</b>
			Al estar evaluados los usuarios muestra resultados en graficas y tambien PDF de manera individaul, áreas, departamentos o de manera general. 
		</li>
		<li class="textocentrado">
				<b>Gestor de areas y departamentos de forma jerarquica:</b>
				Puedes dar de alta las áreas de la empresa y lo departamentos que pueda tener esa área.
				
			</li>
			<li class="textocentrado">
				<b>Mas información:</b>
				
				<a  href="https://www.youtube.com/watch?v=pTRQQjGnIJg" target="_blank">Video en youtube</a>
				
			</li>
	</ul>
	</div>

<?php include "footer.php";  ?>
