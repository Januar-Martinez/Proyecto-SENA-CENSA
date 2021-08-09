<?php
    include 'conexionBD.php';
    include 'encabezado.php';
   
    echo
    "
        <h1>Agregar Nuevo Instrumento</h1>

        <form action='nuevoInstrumento.php' method='POST'>
            <div>
                <label for='txtdescripcion' class='form-label'>Nombre del instrumento</label>
                <input type='text' name='txtdescripcion' class='form-control' id='txtdescripcion' required>
            </div>
            <div>
                <button type='submit' class='btn btn-primary'>Agregar</button>
            </div>
        </form>
    ";







    include 'piePagina.php';
?>