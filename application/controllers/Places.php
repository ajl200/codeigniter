<?php
    
include ('Security.php');
 class Places extends Security {

    public function index() {
        $this->load->view('login.php');
    }

    public function viewInsert(){
        if ($this->compruebaLogin()){
        $data["nombreVista"] = "insertPlace";
        $this->load->view('templates', $data);
        }
    }

    public function insert(){
        if ($this->compruebaLogin()){
        $this->load->model('modelLugares');

        $nombre = $this->input->get_post('nombre');
        $descripcion = $this->input->get_post('descripcion');
        $longitud = $this->input->get_post('longitud');
        $latitud = $this->input->get_post('latitud');

        $r = $this->modelLugares->insert($nombre,$descripcion,$longitud,$latitud);

        if ($r == -1) {
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

    // LE ESTAMOS PASANDO EL id POR EL ANCHOR DE MODIFICAR EN EL menu.php
    public function viewUpdate($id){
        if ($this->compruebaLogin()){
        $this->load->model('modelLugares');
        $data["placeData"] = $this->modelLugares->get($id);

        $data["nombreVista"] = "updatePlace";
        $this->load->view('templates',$data);
        }
    }

    public function update(){
        if ($this->compruebaLogin()){
            $id = $this->input->get_post('id');
            $nombre = $this->input->get_post('nombre');
            $descripcion = $this->input->get_post('descripcion');
            $longitud = $this->input->get_post('longitud');
            $latitud = $this->input->get_post('latitud');

            $this->load->model('modelLugares');
            $r = $this->modelLugares->update($id,$nombre,$descripcion,$longitud,$latitud);

            if ($r == -1) {
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

// LE ESTAMOS PASANDO EL id POR EL ANCHOR DE DELETE EN EL menu.php
    public function delete($id){
        if ($this->compruebaLogin()){
        $this->load->model('modelLugares');
        $r = $this->modelLugares->delete($id);

        if ($r == -1) {
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
