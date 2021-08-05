<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    $sqlmax= "select MAX(idBanda) FROM bandas;";

    $datosmax = $conexion ->query($sqlmax) or die("error interno #1");

    $fila = $datosmax->fetch_array();

    $ID= $fila[0] + 1;

    //var_dump($_REQUEST["chkDisolucion"]);

    $fechaC= (new \DateTime($_REQUEST["txtfechC"]))->format("Y-m-d") . PHP_EOL;
    $fechaD= (new \DateTime($_REQUEST["txtfechD"]))->format("Y-m-d") . PHP_EOL;

    if($_REQUEST["chkDisolucion"]=="activa"):
        $fechaDisolucion="0000-00-00";
    else:
        $fechaDisolucion=$fechaD;
    endif;
    //echo $fechaDisolucion;
    //exit;

    $datos = $conexion->prepare("insert into bandas values(?,?,?,?,?);");
    $datos->bind_param('issss',$ID,$_REQUEST['txtnombre'],$fechaC,$fechaDisolucion,$_REQUEST['txtpais']);
    $datos->execute() or die($datos->error);

    echo "
    <div class='alert alert-success' role='alert' style='margin-top:55px;'>
        Registro exitoso 
        <a href='crearNuevaBanda.php'>volver</a>
    </div>"; 


    include 'piePagina.php';
?>