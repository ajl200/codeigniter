<?php
    include ('Security.php');
    class Users extends Security {
    // CARGO LA VISTA LOGIN
        public function index() {
        $this->load->view('login.php');
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

                        $data["nombreVista"] = "menu";
                        $this->load->view('login.php');
        } else {
                echo "<h4 class='success'> Bienvenid@ al menú </h4>";

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
        
        public function getAll(){
            $this->load->view('menu.php');
            $this->load->model('modelUser');
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


