<?php
    
include ('Security.php');
 class Locations extends Security {

    public function index() {
        $data["nombreVista"] = "login";
        $this->load->view('templates', $data);
    }

    public function viewInsert(){
        if ($this->compruebaLogin()){
            $this->load->model('modelPeliculas');
            $this->load->model('modelLugares');

            $data["placesList"] = $this->modelLugares->getAll();
            $data["moviesList"] = $this->modelPeliculas->getAll();
            
            $data["nombreVista"] = "insertLocation";
            $this->load->view('templates', $data);
        }
    }

    public function insert(){
        if ($this->compruebaLogin()){
        $this->load->model('modelLocalizaciones');
        
        $descripcion = $this->input->get_post('descripcion');
        $img_name = $this->modelLocalizaciones->checkImg();
        $img = "assets/img/".$img_name;


        $id_lugar = $this->input->get_post('lugar');
        $id_pelicula = $this->input->get_post('peli');
        
        
        $r = $this->modelLocalizaciones->insert($descripcion, $img, $id_lugar, $id_pelicula);
        
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
            $this->load->model('modelLocalizaciones');
            $this->load->model('modelPeliculas');
            $this->load->model('modelLugares');

            $data["placesList"] = $this->modelLugares->getAll();
            $data["moviesList"] = $this->modelPeliculas->getAll();
            $data["locationData"] = $this->modelLocalizaciones->get($id);

            $data["nombreVista"] = "updateLocation";
            $this->load->view('templates', $data);
            }
    }

        public function update(){   
            if ($this->compruebaLogin()){
            $this->load->model('modelLocalizaciones');
            $id = $this->input->get_post('id');
            $descripcion = $this->input->get_post('descripcion');
            $img_name = $this->modelLocalizaciones->checkImg();
            $img = "assets/img/".$img_name;

            $id_lugar = $this->input->get_post('lugar');
            $id_pelicula = $this->input->get_post('peli');

            $defaultImage = $this->input->get_post('fotografiaDefault');
            if (!$img_name){
            $img_name = $this->modelLocalizaciones->checkImgDefault();
            $img = $defaultImage;
        }  

            $r = $this->modelLocalizaciones->update($id, $descripcion, $img, $id_lugar, $id_pelicula);

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

        public function delete ($id){
            if ($this->compruebaLogin()){
            $this->load->model('modelLocalizaciones');

            $r = $this->modelLocalizaciones->delete($id);

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