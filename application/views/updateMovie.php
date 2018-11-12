<?php 
    echo form_open_multipart('Movies/update');
    echo "
            <label for='nombre'> Titulo: </label> <input type='text' name='titulo' value='".$movieData['titulo']."' required> </br>
            <label for='anyo'> Año: </label> <input type='number' name='anyo' value=". $movieData['anyo'] . " required> </br>
            <label for='pais'> Pais: </label> <input type='text' name='pais' value=". $movieData['pais'] . " required> </br>
            <label for='cartel'> Cartel: </label> <input type='file' name='cartel' value='". $movieData['cartel'] ."' > </br>
                                         <input type='hidden' name='defaultImage' value='". $movieData['cartel'] ."' > </br>
                                         <input type='hidden' name='id' value=". $movieData['id'] ." >
            <input type='submit' value='Aceptar'>
    </form>";


   // DEFAULT IMAGE ES PARA QUE CUANDO EL USUARIO NO QUIERA CAMBIAR LA IMAGEN, ENVIARÁ LA RUTA DE HIDDEN DEFAULTIMAGE. PORQUE EL TYPE FILE SE RESETEA SIEMPRE...
