<?php 

    echo form_open_multipart('Places/insert');
    echo "
            <label for='nombre'> Nombre: </label> <input type='text' name='nombre' required> </br>
            <label for='descripcion'> Descripcion: </label> <input type='text' name='descripcion' required> </br>
            <label for='longitud'> Longitud: </label> <input type='number' name='longitud' required> </br>
            <label for='latitud'> Latitud: </label> <input type='number' name='latitud' required> </br>

            <input type='submit' value='Insertar'>
        </form>";