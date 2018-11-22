<?php
    include ('Security.php');
    class Users extends Security {
    // CARGO LA VISTA LOGIN
        public function index() {
        
        $data["nombreVista"] = "login";
        $this->load->view('templates', $data);
    }

    public function cerrarSesion(){
        $this->destroy_session();
        $this->index();
    }

    // CHECK DEL USUARIO Y LA CONTRASEÑA
        public function check() {
            $nombre = $this->input->get_post('nombre');
            $passwd = $this->input->get_post("passwd");
            $this->load->model('modelUser');
            $idUsr = -1;
            $idUsr = $this->modelUser->getId($nombre,$passwd);
            
            if ($idUsr == -1) {

                        echo "<h4> Inicie sesión con una contraseña y un usuario válido </h4>";
                        
                        $this->load->model('modelPeliculas');
                        $data["moviesList"] = $this->modelPeliculas->getAll();

                        $this->load->model('modelLugares');
                        $data["placesList"] = $this->modelLugares->getAll();

                        $this->load->model('modelLocalizaciones');
                        $data["locationsList"] = $this->modelLocalizaciones->getAll();

                        $data["nombreVista"] = "login";
                        $this->load->view('templates', $data);
        } else {
                echo "<h4 class='success'> Bienvenid@ al menú </h4>";

                        $this->create_session($idUsr);
                        
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
        
        public function showMenu(){
                        if ($this->compruebaLogin()){
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

        // COMPROBACION AJAX:

        public function checkNombre($nombre) {
            $this->load->model("modelAjax");
            $r = $this->modelAjax->checkNombre($nombre);
            if ($r) // 0 es falso, 1 es true
                $this->output->set_output("0");
            else
                $this->output->set_output("1");
        }
    }

    /* VER SESSION LIBRARY
    class Seguridad extends CI_Controller {
    crear clase seguridad function compruebalogin () {
        if (isset($this->session->idUser)){
            return true
    }  else false.

    y ahora  extends de seguridad todas las demas clases
    class Users extends Seguridad {
    y luego if $this->compruebaLogin()
*/


