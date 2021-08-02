<?php
    include 'conexionBD.php';
    include 'encabezado.php';

    $sql= "select * from musicos;";
    $sql2= "select * from instrumentosMusicales;";

    $musicos= $conexion ->query($sql) or die("error interno");
    $instrumento= $conexion ->query($sql2) or die("error interno");

    echo
    "
        <h1>Agregar Instrumento/Musico</h1>
        <form action='nuevoInsMusico.php' method='POST'>
            <div>
                <label for='txtmusico' class='form-label'>Nombre del musico</label>
                <select name='txtmusico'>
    ";
                while($fila = $musicos->fetch_array()):
                    echo"<option value='$fila[idMusico]'>$fila[nombre]</option>";
                endwhile;
    echo
    "
                </select>
            </div>
            <div>
                <label for='txtinstrumento' class='form-label'>Instrumento</label>
                <select name='txtinstrumento'>
    ";
                while($fila2 = $instrumento->fetch_array()):
                    echo"<option value='$fila2[idInstrumento]'>$fila2[descripcion]</option>";
                endwhile;
    echo
    "
                </select>
            </div>
            <div>
                <button type='submit' class='btn btn-primary'>Sign in</button>
            </div>
        </form>
    ";




    
    //echo"<select name='txtmusico'>
            
    //";
    //while($fila = $musicos->fetch_array()):
    //    echo"<option value='$fila[idMusico]'>$fila[nombre]</option>";

    //endwhile;




    include 'piePagina.php';
?>