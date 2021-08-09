<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    //var_dump($_REQUEST);

    $sql = "update bandas set 
                            idBanda = $_REQUEST[txtIDNuevo],
                            nombre = '$_REQUEST[txtnombre]',
                            fechaCreacion = '$_REQUEST[txtfechaC]',
                            fechaDisolucion = '$_REQUEST[txtfechaD]',
                            paisOrigen = '$_REQUEST[txtpais]'
                    where idBanda = $_REQUEST[txtIdAnterior];
    ";
    //echo"<br>";
    //echo $sql;
    
    $datos = $conexion ->query($sql) or die("error interno");

    echo "
    <div class='alert alert-info' role='alert' style='margin-top:55px;'>
        Banda Actualizada Correctamente 
        <a href='inicio.php'>volver</a>
    </div>"; 



    include 'piePagina.php';
?>