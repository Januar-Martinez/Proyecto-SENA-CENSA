<?php
    include 'conexionBD.php';
    include 'encabezado.php';
   
    echo
    "
        <h1>Agregar Nueva Banda</h1>

        <form class='row g-3' action='nuevaBanda.php' method='POST'>
            <div class='col-md-6'>
                <label for='txtnombre' class='form-label'>Nombre</label>
                <input type='text' name='txtnombre' class='form-control' id='txtnombre'>
            </div>
            <div class='col-md-6'>
                <label for='txtfechC' class='form-label'>Fecha de Creación (AAAA-MM-DD)</label>
                <input type='text' name='txtfechC' class='form-control' id='txtfechC'>
            </div>
            <div class='col-md-6'>
                <div class='form-check'>
                    <input class='form-check-input' name='chkDisolucion' onClick='ActivarCasilla(this);' type='checkbox' value='hola' id='flexCheckChecked' checked>
                    <label class='form-check-label' for='flexCheckChecked'>
                        Banda Activa
                    </label>
                </div>
                <label for='txtfechD' class='form-label'>Fecha de Disolucón (AAAA-MM-DD)</label>
                <input type='text' name='txtfechD' class='form-control' id='txtfechD' style='visibility:hidden'>
            </div>
            <div class='col-md-6'>
                <label for='txtpais' class='form-label'>País de Origen</label>
                <input type='text' name='txtpais' class='form-control' id='txtpais'>
            </div>
            <div class='col-md-12'>
                <button type='submit' class='btn btn-primary'>Agregar</button>
            </div>
        </form>
    ";


    echo "<script >
    function ActivarCasilla(casilla) 
    {
        
        disolucion=document.getElementById('flexCheckChecked');
        if(disolucion.checked){
            document.getElementById('txtfechD').style.visibility = 'hidden';
        }else{
            document.getElementById('txtfechD').style.visibility = 'visible';
        }
    }
    </script>";





    include 'piePagina.php';
?>