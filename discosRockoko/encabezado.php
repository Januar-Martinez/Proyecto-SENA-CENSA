<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Rockoko</title>
    <link rel="icon" type="image/png" href="img/miFavicon.png">
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<?php
    session_start();
    if(isset($_SESSION['usuario'])):
        echo"
        <div class='wrapper'>
            <div class='sidebar'>
                <h2>Rockoko</h2>
                <ul>
                    <li><a href='inicio.php'><i class='fas fa-home'></i>Inicio</a></li>
                    <li><a href='agregar.php'><i class='fas fa-plus-square'></i>Agregar</a></li>
                    <li><a href='canciones.php'><i class='fas fa-compact-disc'></i>Canciones</a></li>
                    <li><a href='generos.php'><i class='fas fa-music'></i>Generos Musicales</a></li>
                    <li><a href='instrumentos.php'><i class='fas fa-guitar'></i>Instrumentos</a></li>
                </ul> 
            
                <div class='social_media'>
                    <a href='cerrarSesion.php'><i class='fas fa-sign-out-alt'></i></i></a>
                </div>
            </div>
            <div class='main_content'>
                <div class='header'>Bienvenidos a la discografíca Rockoko</div>  
                <div class='info'>
        ";
    else:
		echo "
		<div class='alert alert-danger' role='alert' style='margin-top:55px;'>
            Acceso denegado. 
			Debe <a href='index.php'>iniciar sesión</a>
        </div>";        
		exit;
    endif;
?>