<?php 
echo form_open_multipart('Locations/update');
    echo "  <label for='descripcion'> Descripcion: </label> <input type='text' name='descripcion' value='".$locationData['descripcion']."' required> </br>";
    echo "  <label for='peli'> Pelicula: </label> ";


    echo "  <select name='peli'>";
                for ($i = 0; $i < count($moviesList); $i++){
                    if ($moviesList[$i]['id'] == $locationData['id_pelicula']) {
                    echo "<option value='".$moviesList[$i]['id']."' selected> ".$moviesList[$i]['titulo']."</option> ";
                    } else {
                    echo "<option value='".$moviesList[$i]['id']."'> ".$moviesList[$i]['titulo']."</option> ";
                    }
    
                }    
    echo "</select>
</br>";

    echo "<label for='lugar'> Lugar: </label> ";
    echo "<select name='lugar'>"; 
                for ($i = 0; $i < count($placesList); $i++){
                    if ($placesList[$i]['id'] == $locationData['id_lugar']) {

                        
                    echo "<option value='".$placesList[$i]['id']."' selected> ".$placesList[$i]['nombre']." </option> ";
                    } else {
                        echo "<option value='".$placesList[$i]['id']."'> ".$placesList[$i]['nombre']." </option> ";
                    }
            } 
    echo "</select>
    </br>";
    echo       "<label for='fotografia'> Fotografia: </label> <input type='file' name='fotografia'> </br>
                <input type='hidden' name='id' value=". $locationData['id'] ." >
                
                <input type='hidden' name='fotografiaDefault' value=". $locationData['fotografia'] ." >
                <input type='submit' value='Insertar'>
                </form>";