<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    
    //var_dump($_REQUEST);

    $datos = $conexion->prepare("insert into albumCanciones values(?,?);");
    $datos->bind_param('ii',$_REQUEST['txtAlbum'],$_REQUEST['txtcancion']);
    $datos->execute() or die('error interno');

    echo "
    <div class='alert alert-success' role='alert' style='margin-top:55px;'>
        Registro exitoso 
        <a href='CrearNuevoAlbumCancion.php'>volver</a>
    </div>"; 


    include 'piePagina.php';
?>