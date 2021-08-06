<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    $sqlmax= "select MAX(idAdministrador) FROM administradores;";

    $datos = $conexion ->query($sqlmax) or die("error interno");

    $fila = $datos->fetch_array();

    $ID= $fila[0] + 1;

    $password=md5($_REQUEST['txtpassword']);


    //var_dump($_REQUEST);

    $datos = $conexion->prepare("insert into administradores values (?,?,?);");
    $datos->bind_param('iss',$ID,$_REQUEST['txtadmin'],$password);
    $datos->execute() or die('error interno #2');

    echo "
    <div class='alert alert-success' role='alert' style='margin-top:55px;'>
        Registro exitoso 
        <a href='crearNuevoAdministrador.php'>volver</a>
    </div>"; 


    include 'piePagina.php';
?>