<?php

// quitar el index.php

// SI NO HAY CONTENIDO DE LA TABLA QUE DIGA QUE NO HAY CONTENIDO, NO UN ERROR.

include ('Security.php');

 class Movies extends Security {
     // CARGO LA VISTA
    public function index() {
        $data["nombreVista"] = "login";
        $this->load->view('templates', $data);
    }

    public function viewInsert(){
     if ($this->compruebaLogin()){
        $data["nombreVista"] = "insertMovie";
        $this->load->view('templates', $data);
     }
    }

    public function insert(){
        if ($this->compruebaLogin()){
        $this->load->model('modelPeliculas');
        $img_name = $this->modelPeliculas->checkImg();
        $nombre = $this->input->get_post('nombre');
        $anyo = $this->input->get_post('anyo');
        $pais = $this->input->get_post('pais');

        $cartel = "assets/img/".$img_name;
        $r = $this->modelPeliculas->insert($nombre, $anyo, $pais, $cartel);

       if ($r == 0) {
                echo "<h4 class='error'> SE HA PRODUCIDO UN ERROR </h4>";

                    $this->load->model('modelPeliculas');
                        $data["moviesList"] = $this->modelPeliculas->getAll();

                        $this->load->model('modelLugares');
                        $data["placesList"] = $this->modelLugares->getAll();

                        $this->load->model('modelLocalizaciones');
                        $data["locationsList"] = $this->modelLocalizaciones->getAll();

                        $data["nombreVista"] = "menu";
                        $this->load->view('templates', $data);
        } else {
                echo "<h4 class='success'> SE HA REALIZADO LA OPERACION CON EXITO </h4>";

                        $this->load->model('modelPeliculas');
                        $data["moviesList"] = $this->modelPeliculas->getAll();

                        $this->load->model('modelLugares');
                        $data["placesList"] = $this->modelLugares->getAll();

                        $this->load->model('modelLocalizaciones');
                        $data["locationsList"] = $this->modelLocalizaciones->getAll();

                        $data["nombreVista"] = "menu";
                        $this->load->view('templates', $data);
            }
        }
    }   
    public function viewUpdate($id){
        if ($this->compruebaLogin()){
        $data["nombreVista"] = "updateMovie";
        $this->load->model('modelPeliculas');
        $data["movieData"] = $this->modelPeliculas->get($id);
        $this->load->view('templates', $data);
        }
    }

    public function update(){
        if ($this->compruebaLogin()){
        $this->load->model('modelPeliculas');
        $titulo = $this->input->get_post('titulo');
        $anyo = $this->input->get_post('anyo');
        $pais = $this->input->get_post('pais');

        $defaultImage = $this->input->get_post('defaultImage');

        $img_name = $this->modelPeliculas->checkImg();
        $id = $this->input->get_post('id');
        $cartel = "assets/img/".$img_name;

        // Si no se ha seleccionado ninguna imagen, cogerá la que hay actualmente. De un campo hidden.
        if (!$img_name){
            $img_name = $this->modelPeliculas->checkImgDefault();
            $cartel = $defaultImage;
        }  


        $r = $this->modelPeliculas->update($id,$titulo, $anyo, $pais, $cartel);
        
       if ($r == 0) {
                echo "<h4 class='error'> SE HA PRODUCIDO UN ERROR </h4>";

                    $this->load->model('modelPeliculas');
                        $data["moviesList"] = $this->modelPeliculas->getAll();

                        $this->load->model('modelLugares');
                        $data["placesList"] = $this->modelLugares->getAll();

                        $this->load->model('modelLocalizaciones');
                        $data["locationsList"] = $this->modelLocalizaciones->getAll();

                        $data["nombreVista"] = "menu";
                        $this->load->view('templates', $data);
        } else {
                echo "<h4 class='success'> SE HA REALIZADO LA OPERACION CON EXITO </h4>";

                        $this->load->model('modelPeliculas');
                        $data["moviesList"] = $this->modelPeliculas->getAll();

                        $this->load->model('modelLugares');
                        $data["placesList"] = $this->modelLugares->getAll();

                        $this->load->model('modelLocalizaciones');
                        $data["locationsList"] = $this->modelLocalizaciones->getAll();

                        $data["nombreVista"] = "menu";
                        $this->load->view('templates', $data);
            }
        }
    }

// le paso el id por el anchor.
    public function delete($id){
        if ($this->compruebaLogin()){
        $this->load->model('modelPeliculas');
        $r = $this->modelPeliculas->delete($id);

        if ($r == 0) {
                echo "<h4 class='error'> SE HA PRODUCIDO UN ERROR </h4>";

                    $this->load->model('modelPeliculas');
                        $data["moviesList"] = $this->modelPeliculas->getAll();

                        $this->load->model('modelLugares');
                        $data["placesList"] = $this->modelLugares->getAll();

                        $this->load->model('modelLocalizaciones');
                        $data["locationsList"] = $this->modelLocalizaciones->getAll();

                        $data["nombreVista"] = "menu";
                        $this->load->view('templates', $data);
        } else {
                echo "<h4 class='success'> SE HA REALIZADO LA OPERACION CON EXITO </h4>";

                        $this->load->model('modelPeliculas');
                        $data["moviesList"] = $this->modelPeliculas->getAll();

                        $this->load->model('modelLugares');
                        $data["placesList"] = $this->modelLugares->getAll();

                        $this->load->model('modelLocalizaciones');
                        $data["locationsList"] = $this->modelLocalizaciones->getAll();

                        $data["nombreVista"] = "menu";
                        $this->load->view('templates', $data);
            }
        }
    }
    
    
}