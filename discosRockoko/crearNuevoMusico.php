<?php
    include 'conexionBD.php';
    include 'encabezado.php';
   
    echo
    "
        <h1>Agregar Nuevo Musico</h1>

        <form class='row g-3' action='nuevoMusico.php' method='POST'>
            <div class='col-md-6'>
                <label for='txtnombre' class='form-label'>Nombre</label>
                <input type='text' name='txtnombre' class='form-control' id='txtnombre'>
            </div>
            <div class='col-md-6'>
                <label for='txtdireccion' class='form-label'>Dirección</label>
                <input type='text' name='txtdireccion' class='form-control' id='txtdireccion'>
            </div>
            <div class='col-md-6'>
                <label for='txtTelefono' class='form-label'>Teléfono</label>
                <input type='text' name='txtTelefono' class='form-control' id='txtTelefono'>
            </div>
            <div class='col-md-6'>
                <label for='txtedad' class='form-label'>Edad</label>
                <input type='number' name='txtedad' class='form-control' id='txtedad'>
            </div>
            <div class='col-md-12'>
                <button type='submit' class='btn btn-primary'>Agregar</button>
            </div>
        </form>
    ";







    include 'piePagina.php';
?>