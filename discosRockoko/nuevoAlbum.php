<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    $sqlmax= "select MAX(idAlbum) FROM albumes;";

    $datos = $conexion ->query($sqlmax) or die("error interno");

    $fila = $datos->fetch_array();

    $ID= $fila[0] + 1;

    //var_dump($_REQUEST);

    $fechaC= (new \DateTime($_REQUEST["txtfechC"]))->format("Y-m-d") . PHP_EOL;

    $datos = $conexion->prepare("insert into albumes values (?,?,?);");
    $datos->bind_param('iss',$ID,$_REQUEST['txtnombre'],$fechaC);
    $datos->execute() or die('error interno #2');

    echo "
    <div class='alert alert-success' role='alert' style='margin-top:55px;'>
        Registro exitoso 
        <a href='crearNuevoAlbum.php'>volver</a>
    </div>"; 


    include 'piePagina.php';
?>