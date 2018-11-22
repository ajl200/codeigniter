
<?php 
 echo "<div class='container'>";
    echo "<button id='botonPeliculas' type='button' onclick='showPeliculas()'>Peliculas</button>";
    echo "<button id='botonLugares' type='button' onclick='showLugares()'>Lugares</button>";
    echo "<button id='botonLocalizacion' type='button' onclick='showLocalizaciones()'>Localizaciones</button>";

   

    echo "<div id='movies'>";
            echo "<table><thead><td>id</td><td>Nombre</td><td>Año</td><td>Pais</td><td>Cartel</td></thead>";
            for ($i = 0; $i < count($moviesList); $i++) {
                $movie = $moviesList[$i];
                echo "<tr> <td> ".$movie["id"]."</td> <td>".$movie["titulo"]."</td> <td>". $movie["anyo"]." </td> <td> ".$movie["pais"]."</td> <td> <img src=' ".base_url($movie["cartel"])."' width = 100px height = 100px></td> <td> ".anchor('Movies/viewUpdate/'.$movie["id"],'Modificar')."</td> <td> ".anchor('Movies/delete/'.$movie["id"],'Eliminar')."</td>";
            }
            echo "</tr>";
            echo "</table>";
            echo anchor('Movies/viewInsert','Insertar Pelicula');
            
    echo "</div>";

     echo "<div id='lugares'>";
            echo "<table><thead><td>id</td><td>Lugar</td><td>Descripcion</td><td>Longitud</td><td>Latitud</td></thead>";
            for ($i = 0; $i < count($placesList); $i++) {
                $places = $placesList[$i];
                echo "<tr> <td> ".$places["id"]."</td> <td> ".$places["nombre"]."</td> <td>". $places["descripcion"]." </td> <td> ".$places["longitud"]."</td> <td> ".$places["latitud"]."</td> <td> ".anchor('Places/viewUpdate/'.$places["id"],'Modificar')."</td> <td> ".anchor('Places/delete/'.$places["id"],'Eliminar')."</td> ";
            }
            echo "</tr>";
            echo "</table>";
            echo anchor('Places/viewInsert','Insertar Lugar');
           
    echo "</div>";

    echo "<div id='localizaciones'>";
            echo "<table><thead><td>id</td><td>Descripcion</td><td>Fotografia</td><td>Pelicula</td><td>Lugar</td> </thead>";
            
            for ($i = 0; $i < count($locationsList); $i++) {
                $location = $locationsList[$i];
                echo "<tr> <td> ".$location["id"]."</td> <td> ".$location["descripcion"]."</td>  <td> <img src=' ".base_url($location["fotografia"])."' width = 100px height = 100px> </td> <td> ".$location["titulo"]."</td>  <td> ".$location["nombre"]."</td>  <td> ".anchor('Locations/viewUpdate/'.$location["id"],'Modificar')."</td> <td> ".anchor('Locations/delete/'.$location["id"],'Eliminar')."</td> ";
            }
            echo "</tr>";
            echo "</table>";
            echo anchor('Locations/viewInsert','Insertar Localizacion');
           
    echo "</div>";

    echo anchor('Users/cerrarSesion','Logout');
    echo "</div>";

