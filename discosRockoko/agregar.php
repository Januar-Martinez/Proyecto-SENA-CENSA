<?php
    include 'conexionBD.php';
    include 'encabezado.php';
	
	echo 
	"
		<h1>Agregar</h1>
		
		<div class='row container' style = 'margin-top:50px;'>
			<div class='col-3' style='text-align: center;'><a href='crearNuevoGenero.php' class='btn btn-outline-dark'>Generos Musicales</a></div>
			<div class='col-3' style='text-align: center;'><a href='crearNuevoInstrumento.php' class='btn btn-outline-dark'>Instrumentos Musicales</a></div>
			<div class='col-3' style='text-align: center;'><a href='crearNuevoMusico.php' class='btn btn-outline-dark'>Musicos</a></div>
			<div class='col-3' style='text-align: center;'><a href='crearNuevoInstrumentoMusico.php' class='btn btn-outline-dark'>Instrumentos/Musico</a></div>
		</div>
		
		<div class='row container'>
			<div class='col-3' style='text-align: center;'><a href='#' class='btn btn-outline-dark'>Bandas</a></div>
			<div class='col-3' style='text-align: center;'><a href='#' class='btn btn-outline-dark'>Bandas/Musico</a></div>
			<div class='col-3' style='text-align: center;'><a href='#' class='btn btn-outline-dark'>Bandas/Genero</a></div>
			<div class='col-3' style='text-align: center;'><a href='#' class='btn btn-outline-dark'>Canciones</a></div>
		</div>
		
		<div class='row container'>
			<div class='col-3' style='text-align: center;'><a href='#' class='btn btn-outline-dark'>Albumes</a></div>
			<div class='col-3' style='text-align: center;'><a href='#' class='btn btn-outline-dark'>Album/Canciones</a></div>
			<div class='col-3' style='text-align: center;'><a href='#' class='btn btn-outline-dark'>Album/Bandas</a></div>
			<div class='col-3' style='text-align: center;'><a href='#' class='btn btn-outline-dark'>Administradores</a></div>
		</div>
	";

    include 'piePagina.php';
?>

