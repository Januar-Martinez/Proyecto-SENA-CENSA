<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    
    //var_dump($_REQUEST);

    $datos = $conexion->prepare("insert into bandasgenero values(?,?);");
    $datos->bind_param('ii',$_REQUEST['txtbanda'],$_REQUEST['txtgeneros']);
    $datos->execute() or die('error interno');

    echo "
    <div class='alert alert-success' role='alert' style='margin-top:55px;'>
        Registro exitoso 
        <a href='crearNuevoInstrumentoMusico.php'>volver</a>
    </div>"; 


    include 'piePagina.php';
?>