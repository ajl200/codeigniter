<?php 
        // si el mensaje de error de security existe, mostrará el error
        if(isset($error)) echo $error;
        // se destruye la sesion
        $this->session->userdata = array();

echo "<div class='container'>";
    echo form_open('Users/check');
    echo "
            <label for='nombre'> Nombre: </label> <input type='text' name='nombre'> </br>
            <label for='passwd'> Password: </label> <input type='text' name='passwd'> </br>
            <input type='submit' value='Inicio'>
    </form>";
echo "</div>";

