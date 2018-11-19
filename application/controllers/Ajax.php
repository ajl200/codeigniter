<?php
    class Ajax extends CI_Controller {

        /** Carga la vista del formulario de alta (con Ajax clásico)
         */
        public function comprobarUser() {
            $data["nombreVista"] = "login.php";
            $this->load->view('templates', $data);
        }

        /** Recibe la petición de Ajax, con el email del usuario por POST.
         *  Devuelve un texto (email OK o email en uso)
         */
        public function checkUsername() {
            $this->load->model("modelAjax");
            $r = $this->modelAjax->checkUsername($this->input->get_post("nombre"));
            if ($r)
                $this->output->set_output("Email OK");
            else
                $this->output->set_output("Ese email ya está en uso en el sistema");
        }
        
    }

        
        