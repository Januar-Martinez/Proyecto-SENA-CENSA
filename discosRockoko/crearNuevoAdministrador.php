<?php
    include 'conexionBD.php';
    include 'encabezado.php';
   
    echo
    "
        <h1>Agregar Nuevo Administrador</h1>
        <div onsubmit='verificarPasswords(); return false'>
            <form action='nuevoAdministrador.php' method='POST'>
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
                    <button type='submit' class='btn btn-primary'>Agregar</button>
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

                // Si las constraseñas no coinciden mostramos un mensaje 
                document.getElementById('error').classList.add('mostrar');

                return false;
            }
            
            else {

                // Si las contraseñas coinciden ocultamos el mensaje de error
                document.getElementById('error').classList.remove('mostrar');

                // Mostramos un mensaje mencionando que las Contraseñas coinciden 
                document.getElementById('ok').classList.remove('ocultar');

                // Desabilitamos el botón de login 
                document.getElementById('login').disabled = true;

                // Refrescamos la página (Simulación de envío del formulario) 
                setTimeout(function() {
                    location.reload();
                }, 3000);

                return true;
            }

        } 
        
    </script>
    ";






    include 'piePagina.php';
?>