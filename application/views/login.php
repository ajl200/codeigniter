<script language="javascript">

    peticionHttp = new XMLHttpRequest();
    
	function comprobarNombre() {
		var queryString;
		var nombre;

        nombre = document.getElementById('nombre').value;
         alert('<?php echo site_url("/Users/checkNombre/"); ?>' + nombre);
		peticionHttp.onreadystatechange = showResult;
		peticionHttp.open('POST', '<?php echo site_url("/Users/checkNombre/");?>' + nombre, true);
		peticionHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		peticionHttp.send(null);
	}

	function showResult(){
        //alert('primero');
		if(peticionHttp.readyState == 4) {
            //alert('readyState');
			if(peticionHttp.status == 200) {
               
                if(peticionHttp.responseText == 0){
                    document.getElementById("mensajeAjax").innerHTML = 'Ese usuario no existe.';
                } else 
                    document.getElementById("mensajeAjax").innerHTML = 'Usuario correcto.';
			} 
		}
	}

</script>

<?php 

echo "<div class='container'>";
    echo form_open('Users/check');
    echo "
            <label for='nombre'> Nombre: </label> <input id='nombre' type='text' name='nombre' onblur='comprobarNombre();' > </br>
            <label for='passwd'> Password: </label> <input type='password' name='passwd'> </br>
            <input type='submit' value='Inicio'>

            <div id='mensajeAjax'></div>
    </form>";
echo "</div>";
