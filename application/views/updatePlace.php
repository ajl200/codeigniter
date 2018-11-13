<?php 

    echo form_open_multipart('Places/update');
    echo "
            <label for='nombre'> Nombre: </label> <input type='text' name='nombre' value='". $placeData['nombre'] . "' required> </br>
            <label for='descripcion'> Descripcion: </label> <input type='text' name='descripcion' value='". $placeData['descripcion'] . "' required> </br>
            <label for='longitud'> Longitud: </label> <input type='number' name='longitud' value='". $placeData['longitud'] . "' required> </br>
            <label for='latitud'> Longitud: </label> <input type='number' name='latitud' value='". $placeData['latitud'] . "' required> </br>
            <input type='hidden' name='id' value=". $placeData['id'] ." >
            <input type='submit' value='Aceptar'>
    </form>";

    echo anchor('Users/showMenu','Volver al menu');