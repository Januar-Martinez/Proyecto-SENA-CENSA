<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    $sqlmax= "select MAX(idBanda) FROM bandas;";

    $datosmax = $conexion ->query($sqlmax) or die("error interno #1");

    $fila = $datosmax->fetch_array();

    $ID= $fila[0] + 1;

    var_dump($_REQUEST["chkDisolucion"]);
    //echo"$_REQUEST[flexCheckChecked]";
    exit;

    $datos = $conexion->prepare("insert into bandas values(?,?,?,?,?);");
    $datos->bind_param('issss',$ID,$_REQUEST['txtnombre'],$_REQUEST['txtfechC'],$_REQUEST['txtfechD'],$_REQUEST['txtpais']);
    $datos->execute() or die('error interno #2');

    echo "
    <div class='alert alert-success' role='alert' style='margin-top:55px;'>
        Registro exitoso 
        <a href='crearNuevaBanda.php'>volver</a>
    </div>"; 


    include 'piePagina.php'
?>