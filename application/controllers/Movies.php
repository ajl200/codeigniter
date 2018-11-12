<?php

// poner lo de seguridad en cada controlador.        NO SE SI ESTA CORRECTO???
// hacer el input de descripcion mas grande.         TEXTAREA ???? 
// quitar la decoracion de los input de number
// si no se modifica la imagen, debe coger la ultima. Prueba en Movies.php
// quitar el index.php
// poner ANCHORS para ir hacia atrás
// ponerlo en el servidor.

include ('Security.php');

 class Movies extends Security {
     // CARGO LA VISTA
    public function index() {
        $this->load->view('login.php');
    }

    public function viewInsert(){
        $data["nombreVista"] = "insertMovie";
        $this->load->view('templates', $data);
    }

    public function insert(){
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

    public function viewUpdate($id){
        $data["nombreVista"] = "updateMovie";
        $this->load->model('modelPeliculas');
        $data["movieData"] = $this->modelPeliculas->get($id);
        $this->load->view('templates', $data);
    }

    public function update(){
        $this->load->model('modelPeliculas');
        $titulo = $this->input->get_post('titulo');
        $anyo = $this->input->get_post('anyo');
        $pais = $this->input->get_post('pais');

        $defaultImage = $this->input->get_post('defaultImage');

        $img_name = $this->modelPeliculas->checkImg();
        $id = $this->input->get_post('id');
        $cartel = "assets/img/".$img_name;

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

// le paso el id por el anchor.
    public function delete($id){
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