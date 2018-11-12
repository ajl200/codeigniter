
<?php 

    echo form_open_multipart('Movies/insert');
    echo "
            <label for='nombre'> Nombre: </label> <input type='text' name='nombre' required> </br>
            <label for='anyo'> Año: </label> <input type='number' name='anyo' required> </br>
            <label for='pais'> Pais: </label> <input type='text' name='pais' required> </br>
            <label for='cartel'> Cartel: </label> <input type='file' name='cartel' > </br>
            <input type='submit' value='Insertar'>
    </form>";

/* 
file uploading en codeigniter

libreria upload 
$this->load_library('upload'); o algo asi. en el insert
form open multipart

en el controlador:
load usuariomodel
        r1 = this->usuarioModel->upload_image();
        if r1 & r2 = true {
                exito.
        } else
                ha fallado la insercion.
   en el modelo:
        function upload_image(){
                $config["max_width"] = '1000';
                $config["max_height"] = '1000';
                $config["upload_path"] = "./imgs";        Y CREAMOS EL DIRECTORIO IMG puede ser dentro de assets. Y DENTRO PELICULAS, USERS, etc...
                $this->load->library('upload);

                if ($this->upload->do_upload("cartel")){
                        echo "subido con exito";
                        return true;
              } else {
                      echo "error al subir";
                      return false;
              }
        } 
*/