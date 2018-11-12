<?php 


    echo form_open_multipart('Locations/insert');
    echo "  <label for='descripcion'> Descripcion: </label> <input type='text' name='descripcion' required> </br>";
    echo "  <label for='peli'> Pelicula: </label> ";
    echo "  <select name='peli'>";
                for ($i = 0; $i < count($moviesList); $i++){
                    $id = $moviesList[$i]['id'];
                echo "<option value='$id'> ".$moviesList[$i]['titulo']."</option> ";
    
                }    
    echo "</select>
</br>";
    echo "  <label for='lugar'> Lugar: </label> ";
    echo "<select name='lugar'>"; // NO SE POR QUE NO ME DEJA PONER ID LUGARES??? 
                for ($i = 0; $i < count($placesList); $i++){
                    $id = $placesList[$i]['id'];
                echo "<option value='$id'> ".$placesList[$i]['nombre']." </option> ";
            }       
            
            
    echo "</select>
</br>";
    
echo       "<label for='fotografia'> Fotografia: </label> <input type='file' name='fotografia'> </br>
            <input type='submit' value='Insertar'>
            </form>";