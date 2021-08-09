<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    //var_dump($_REQUEST);

    $sql = "delete from bandas where idBanda = $_REQUEST[txtidBorrar];";

    $datos = $conexion ->query($sql) or die("error interno");

    echo "
    <div class='alert alert-danger' role='alert' style='margin-top:55px;'>
        Se Elimino la Banda Correctamente
        <a href='inicio.php'>volver</a>
    </div>"; 



    include 'piePagina.php';
?>