<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    $sqlmax= "select MAX(idTitulo) FROM tituloCanciones;";

    $datos = $conexion ->query($sqlmax) or die("error interno");

    $fila = $datos->fetch_array();

    $ID= $fila[0] + 1;

    //var_dump($_REQUEST);
    $sql= "insert into tituloCanciones values ($ID, '$_REQUEST[txtdescripcion]')";

    $datos = $conexion ->query($sql) or die("error interno");

    echo "
    <div class='alert alert-success' role='alert' style='margin-top:55px;'>
        Registro exitoso 
        <a href='crearNuevoGenero.php'>volver</a>
    </div>"; 


    include 'piePagina.php'
?>