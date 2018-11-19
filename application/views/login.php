<script>
    peticionHttp = new XMLHttpRequest();

    function checkUsername() {
        var queryString;
        var nombre;

        nombre = document.getElementById('nombre');
        queryString = '&nombre=' + encodeURIComponent(nombre.value);

        peticionHttp.onreadystatechange = muestraResultadoComprobacionNombre;
        peticionHttp.open('POST', '<?php echo site_url("ajax/check_Username");?>', true);
        peticionHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        peticionHttp.send(queryString);
    }

    function muestraResultadoComprobacionNombre() {
        if (peticionHttp.readyState == 4) {
            if (peticionHttp.status == 200) {
                document.getElementById("mensajeAjax").innerHTML = peticionHttp.responseText;
            }
        }
    }
</script>

<?php 

echo "<div class='container'>";
    echo form_open('Users/check');
    echo "
            <label for='nombre'> Nombre: </label> <input type='text' name='nombre' onblur='checkUsername()' > </br>
            <label for='passwd'> Password: </label> <input type='text' name='passwd'> </br>
            <input type='submit' value='Inicio'>
    </form>";
echo "</div>";
