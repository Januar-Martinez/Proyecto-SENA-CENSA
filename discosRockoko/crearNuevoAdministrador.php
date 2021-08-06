<?php
    include 'conexionBD.php';
    include 'encabezado.php';
   
    echo
    "
        <h1>Agregar Nuevo Administrador</h1>
        <div>
            <form onsubmit='verificarPasswords(); return false' action='nuevoAdministrador.php' method='POST'>
                <div>
                    <label for='txtadmin' class='form-label'>Nombre del Administrador</label>
                    <input type='text' name='txtadmin' class='form-control' id='txtadmin'>
                </div>
                <div>
                    <label for='txtpassword' class='form-label'>Contraseña</label>
                    <input type='password' name='txtpassword' class='form-control' id='txtpassword'>
                </div>
                <div>
                    <label for='txtpassword2' class='form-label'>Repetir Contraseña</label>
                    <input type='password' name='txtpassword2' class='form-control' id='txtpassword2'>
                </div>
                <div>
                    <button type='submit' class='btn btn-primary' id='enviar'>Agregar</button>
                </div>
                <div class='alert alert-danger' role='alert' style='visibility:hidden;' id='mensaje'>
                    Contraseñas no coinciden
                </div>
            </form>
        </div>
    ";

    echo"
    <script type='text/javascript'> 

        function verificarPasswords() {
            
            // Ontenemos los valores de los campos de contraseñas 
            txtpassword = document.getElementById('txtpassword');
            txtpassword2 = document.getElementById('txtpassword2');
            // Verificamos si las constraseñas no coinciden 
            if (txtpassword.value != txtpassword2.value) {
                document.getElementById('mensaje').style.visibility = 'visible';
                event.preventDefault()
                return false
            }
            
            else {

                $('#enviar').submit();
                return true;
            }

        } 
        
    </script>
    ";






    include 'piePagina.php';
?>