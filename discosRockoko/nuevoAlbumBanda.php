<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    
    //var_dump($_REQUEST);

    $datos = $conexion->prepare("insert into albumBandas values(?,?);");
    $datos->bind_param('ii',$_REQUEST['txtAlbum'],$_REQUEST['txtbanda']);
    $datos->execute() or die('error interno');

    echo "
    <div class='alert alert-success' role='alert' style='margin-top:55px;'>
        Registro exitoso 
        <a href='CrearNuevoAlbumBanda.php'>volver</a>
    </div>"; 


    include 'piePagina.php'
?>